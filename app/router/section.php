<?php

$group = '/' . basename(__FILE__, '.php') . '/';





/** Вывод корзины */
$func = function () {
	view_shop::call()->variable('list', \factory::call()->getObj('shop\section')->getAll());
	view_shop::call()->page('shop/section__list');
};
# Заглавная страница
router::call()->any("{$group}", $func);





/** Добавление товара в корзину */
$func = function ($id_section) {
	$section_item     = \factory::call()->getObj('shop\section')->getByKey($id_section);
	if (!$section_item) {
		\view_shop::call()->variable('type', 'warning');
		\view_shop::call()->variable('text', 'Раздел не найден');
		\view_shop::call()->page('__error/error');
		exit;
	}
	view_shop::call()->variable('card',            $section_item);
	view_shop::call()->variable('goods_list',      $section_item->getAssociatedGoodsList());
	view_shop::call()->variable('section_list',    $section_item->getAssociatedSectionList());
	view_shop::call()->variable('section_array',   $section_item->getSectionParentArray());
	view_shop::call()->page('section/section__common');
//	$basket_item->addGoodsOne($add_count);
//	$basket_item->save();
};
# Заглавная страница
router::call()->any("{$group}{id_section}", $func);
