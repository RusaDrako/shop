<?php

$module = "/{$group}/" . basename(__FILE__, '.php');



/** Вывод редактирования разделов */
$func = function () {
	$section_list = \factory::call()->getObj('shop\section')->getSectionListTree();
	view_shop::call()->variable('list', $section_list);
	view_shop::call()->page('admin/section/section__common');
};
# Заглавная страница
router::call()->any("/{$module}/", $func);



/** Сохранение разделов */
$func = function () {
//	print_info(\request::call());
	$arr_id        = \request::call()->get('id',        []);
	$arr_title     = \request::call()->get('title',     []);
	$arr_weight    = \request::call()->get('weight',    []);
	$arr_parent    = \request::call()->get('parent',    []);
	$arr_deleted   = \request::call()->get('deleted',   []);

	foreach ($arr_id as $k => $v) {
		if ($k == 'new') {
			foreach ($arr_id[$k] as $k_2 => $v_2) {
				if ($arr_title[$k][$k_2]) {
					$section_item_parent = \factory::call()->getObj('shop\section')->getByKey($arr_parent[$k][$k_2]);
					$section_item = $section_item_parent->createAssociatedSectionItem();
					$section_item->setProp('TITLE',    $arr_title[$k][$k_2]);
					$section_item->setProp('WEIGHT',   $arr_weight[$k][$k_2]);
					$section_item->save();
				}
			}
			continue;
		}
		$section_item = \factory::call()->getObj('shop\section')->getByKey($v);
		$section_item->setProp('TITLE',    $arr_title[$v]);
		$section_item->setProp('WEIGHT',   $arr_weight[$v]);
		if (isset($arr_deleted[$v]) && $arr_deleted) {
			$section_item->setDeleted();
		} else {
			$section_item->cleanDeleted();
		}
		$section_item->save();
	}
	header('Location:'.$_SERVER['HTTP_REFERER']);
	exit;
};
# Заглавная страница
router::call()->any("/{$module}/save/", $func);
