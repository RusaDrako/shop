<?php

$module = "/{$group}/" . basename(__FILE__, '.php');



/** Вывод редактирования разделов */
$func = function () {
//print_info(\request::call());

	$input['number']                = \request::call()->get('number');
	$input['name']                  = \request::call()->get('name');
	$input['phone']                 = \request::call()->get('phone');
	$input['address']               = \request::call()->get('address');
	$input['created_date_from']     = \request::call()->get('created_date_from');
	$input['created_date_to']       = \request::call()->get('created_date_to');
	$input['paymented_date_from']   = \request::call()->get('paymented_date_from');
	$input['paymented_date_to']     = \request::call()->get('paymented_date_to');
	$input['status']                = \request::call()->get('status', []);

	$orders_list = \factory::call()->getObj('shop\orders')->getOrdersListSearchFilter($input);
	view_shop::call()->variable('input',          $input);
	view_shop::call()->variable('list',           $orders_list);
	view_shop::call()->variable('status_arr',     \factory::call()->getObj('shop\orders')->settingsStatus());
	view_shop::call()->variable('delivery_arr',   \factory::call()->getObj('shop\orders')->settingsDeliveryType());
	view_shop::call()->page('admin/orders/orders__common');
};
# Заглавная страница
router::call()->any("/{$module}/", $func);
