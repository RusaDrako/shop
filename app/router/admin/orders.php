<?php

$module = "/{$group}/" . basename(__FILE__, '.php');



/** Вывод списка заказов (+ поиск) */
$func = function () {
//print_info(\request::call());

	$input['id']                    = \request::call()->get('id');
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
	view_shop::call()->page('admin/orders/list/orders__common');
};
# Заглавная страница
router::call()->any("{$module}/", $func);





/** Смена статуса */
$func = function () {
//	print_info(\request::call());

	$order_id    = \request::call()->get('order_id');
	$status_id   = \request::call()->get('status_id');
	$comment     = \request::call()->get('comment');

	$orders_item = \factory::call()->getObj('shop\orders')->getByKey($order_id);
	if (!$orders_item) {
		\factory::call()->getPage()->page_danger('Заказ не найден.');
		exit;
	}

	if (!$status_id) {
		\factory::call()->getPage()->page_danger('Статус не указан.');
		exit;
	}

	$orders_status_history_item = $orders_item->setOrdersStatus($status_id, $comment);
	if ($orders_status_history_item) {
		$orders_item->save();
		$orders_status_history_item->save();
	}

	header('Location:'.$_SERVER['HTTP_REFERER']);
	exit;
};
# Заглавная страница
router::call()->any("{$module}/status/", $func);










/** Добавление оплаты */
$func = function () {
	$order_id     = \request::call()->get('order_id');
	$payment_id   = \request::call()->get('payment_id');
	$amount       = \request::call()->get('amount');

	$orders_item = \factory::call()->getObj('shop\orders')->getByKey($order_id);
	if (!$orders_item) {
		\factory::call()->getPage()->page_danger('Заказ не найден.');
		exit;
	}

	if (!$payment_id) {
		\factory::call()->getPage()->page_danger('Тип оплаты не указан.');
		exit;
	}

	if (!$amount) {
		\factory::call()->getPage()->page_danger('Сумма оплаты не указана.');
		exit;
	}

	$payment_item = $orders_item->createAssociatedPayment();
	$payment_item->setTypeAndAmount($payment_id, $amount);
	$payment_item->save();

	$orders_item->controlPaymentAmount();

	header('Location:'.$_SERVER['HTTP_REFERER']);
	exit;
};
# Заглавная страница
router::call()->any("{$module}/payment/", $func);





/** Вывод подробностей по заказу */
$func = function ($order_id) {
	$control = (string) (int) $order_id;
	if ($order_id != $control) {
		\factory::call()->getPage()->page_danger("Неправильный ID заказа {$order_id}");
		exit;
	}
	$orders_item = \factory::call()->getObj('shop\orders')->getByKey((int) $order_id);
	if (!$orders_item) {
		\factory::call()->getPage()->page_warning("Заказ не найден: {$order_id}");
		exit;
	}
//	$orders_item->calculationOrdersAmount();
	view_shop::call()->variable('card',                         $orders_item);
	view_shop::call()->variable('item_list',                    $orders_item->getAssociatedItemList());
	view_shop::call()->variable('payment_list',                 $orders_item->getAssociatedPaymentList());
	view_shop::call()->variable('orders_status_history_list',   $orders_item->getAssociatedOrdersStatusHistoryList());
	view_shop::call()->variable('status_arr',                   \factory::call()->getObj('shop\orders')->settingsStatus());
	view_shop::call()->variable('payment_arr',                  \factory::call()->getObj('shop\payment')->settingsType());

	view_shop::call()->page('admin/orders/card/orders__common');
	exit;
};
# Заглавная страница
router::call()->any("{$module}/{}/", $func);
