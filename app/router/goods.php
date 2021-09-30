<?php

$group = '/' . basename(__FILE__, '.php') . '/';





$func = function ($id) {
	$goods_item      = \factory::call()->getObj('shop\goods')->getByKey($id);
	$section_item    = $goods_item->getAssociatedSectionItem();
	$section_array   = $section_item->getSectionParentArray();

	view_shop::call()->variable('card',            $goods_item);
	view_shop::call()->variable('section_array',   $section_array);
	view_shop::call()->page('goods/goods__card');
};
# Заглавная страница
router::call()->any("{$group}{}", $func);
