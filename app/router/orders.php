<?php

$group = '/' . basename(__FILE__, '.php') . '/';





/** Вывод корзины */
$func = function () {
	$customer_item = \factory::call()->getUser();
	view_shop::call()->variable('list', $customer_item->getAssociatedOrdersList());
	view_shop::call()->page('orders/orders__list');
};
# Заглавная страница
router::call()->any("{$group}", $func);





/** Добавление товара в корзину */
$func = function () {
	$basket_arr      = \request::call()->get('basket', []);
//print_info(\request::call(), '\request::call()');
//print_info($basket_arr, '$basket_arr');
	$customer_item   = \factory::call()->getUser();
	$basket_list     = $customer_item->getAssociatedBasketList();
	if ($basket_list->count()) {
//print_info($basket_list, '$basket_list');
		$orders_item = $customer_item->createAssociatedOrders();
//$orders_item->setProp('ID', 2);
		$orders_item->setProp('SURNAME',            \request::call()->get('surname'));
		$orders_item->setProp('NAME',               \request::call()->get('name'));
		$orders_item->setProp('MIDDLENAME',         \request::call()->get('middlename'));
		$orders_item->setProp('PHONE',              \request::call()->get('phone'));
		$orders_item->setProp('EMAIL',              \request::call()->get('email'));
		$orders_item->setProp('DELIVERY_ADDRESS',   \request::call()->get('address'));
		$orders_item->setProp('DELIVERY_TYPE',      \request::call()->get('delivery_type'));
		$orders_item->setProp('COMMENT',            \request::call()->get('comment'));
		$orders_item->save();
		foreach ($basket_list->iterator() as $k => $v) {
//print_info($v, $v->ID);
			if (!in_array($v->ID, $basket_arr)) {
//				echo "\n" . 'Не выбран.<br>';
				continue;
			};
			if (!$v->getAssociatedGoodsItem()->AVAILABLE) {
//				echo 'Товар недоступен.<br>';
				continue;
			}
			if (!$v->controlQuantityGoods()) {
//				echo "\n" . 'Недостаточно товара.<br>';
				continue;
			};
			$item_item = $orders_item->createAssociatedItem();
			$item_item->setDataBasket($v);
			$item_item->save();
			$v->setDeleted();
			$v->save();
		}
	}
	$orders_item->calculationOrdersAmount();
	$orders_item->save();
//print_info($orders_item, '$orders_item');
//print_info($orders_item->getAssociatedItemList(), '$item_list');
	view_shop::call()->variable('card',            $orders_item);
	view_shop::call()->page('orders/orders__common');

	exit;
};
# Заглавная страница
router::call()->any("{$group}new", $func);





/** Добавление товара в корзину */
$func = function ($order_id) {
	$orders_item = \factory::call()->getObj('shop\orders')->getByKey($order_id);
//	$orders_item->calculationOrdersAmount();
	view_shop::call()->variable('card',            $orders_item);
	view_shop::call()->page('orders/orders__common');
	exit;
};
# Заглавная страница
router::call()->any("{$group}{}/", $func);
