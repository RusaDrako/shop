<?php

$group = '/' . basename(__FILE__, '.php') . '/';





$func = function () {
	$section_item     = \factory::call()->getObj('shop\section')->getByKey(1);
	if (!$section_item) {
		\view_shop::call()->variable('type', 'warning');
		\view_shop::call()->variable('text', 'Раздел не найден.');
		\view_shop::call()->page('__error/error');
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





$func = function ($id) {
	$goods_item      = \factory::call()->getObj('shop\goods')->getByKey($id);
	$section_item    = $goods_item->getAssociatedSectionItem();
	$section_array   = $section_item->getSectionParentArray();

	view_shop::call()->variable('card',            $goods_item);
	view_shop::call()->variable('section_array',   $section_array);
	view_shop::call()->page('goods/goods__card');
};
# Заглавная страница
router::call()->any("{$group}goods/{}", $func);



# Заглавная страница
//router::call()->any($group, 'app\controller\default_page@index');


# Заглавная страница
//router::call()->any($group . '/{}/', 'app\controller\default_page@test');

# Заглавная страница
//router::call()->any($group . '/{}/{id}/', 'app\controller\default_page@test2');
