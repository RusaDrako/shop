<?php

$module = "/{$group}/" . basename(__FILE__, '.php');



/** Вывод редактирования разделов */
$func = function () {
	$customer_list = \factory::call()->getObj('shop\customer')->getAll();
	view_shop::call()->variable('list', $customer_list);
	view_shop::call()->page('admin/customer/customer__common');
};
# Заглавная страница
router::call()->any("/{$module}/", $func);
