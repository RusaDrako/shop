<?php

$group = '/' . basename(__FILE__, '.php') . '/';


$func = function () {
//	view::call()->display('_skin/shop/header');
	view_shop::call()->variable('list', \factory::call()->getObj('shop\goods')->getAll());
	view_shop::call()->page('shop/goods__list');
//	print_info(\factory::call()->getObj('shop\goods')->getAll());
//	view::call()->display('_skin/shop/footer');
};
# Заглавная страница
router::call()->any('/', $func);




$func = function ($id) {
	view_shop::call()->variable('card', \factory::call()->getObj('shop\goods')->getByKey($id));
	view_shop::call()->page('shop/goods__card');
};
# Заглавная страница
router::call()->any("{$group}goods/{}", $func);



# Заглавная страница
//router::call()->any($group, 'app\controller\default_page@index');


# Заглавная страница
//router::call()->any($group . '/{}/', 'app\controller\default_page@test');

# Заглавная страница
//router::call()->any($group . '/{}/{id}/', 'app\controller\default_page@test2');
