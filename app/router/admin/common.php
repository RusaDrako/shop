<?php

$module = "/{$group}/" . basename(__FILE__, '.php');



/** Вывод корзины */
$func = function () use ($group) {
	$arr_section = [
		['title' => 'Разделы',   'link' => "/{$group}/section/"],
		['title' => 'Товары',    'link' => "/{$group}/goods/"],
		['title' => 'Клиенты',   'link' => "/{$group}/customer/"],
		['title' => 'Заказы',    'link' => "/{$group}/orders/"],
	];
	view_shop::call()->variable('list', $arr_section);
	view_shop::call()->page('admin/common');
};
# Заглавная страница
router::call()->any("/{$group}/", $func);
