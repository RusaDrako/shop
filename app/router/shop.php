<?php

$group = '/' . basename(__FILE__, '.php') . '/';





$func = function () {
	$section_item     = \factory::call()->getObj('shop\section')->getByKey(1);
	if (!$section_item) {
		\factory::call()->page_warning('Раздел не найден');
		exit;
	}
	view_shop::call()->variable('card',            $section_item);
	view_shop::call()->variable('goods_list',      $section_item->getAssociatedGoodsList());
	view_shop::call()->variable('section_list',    $section_item->getAssociatedSectionList());
	view_shop::call()->variable('section_array',   $section_item->getSectionParentArray());
	view_shop::call()->page('section/section__common');
};
# Заглавная страница
router::call()->any('/', $func);
