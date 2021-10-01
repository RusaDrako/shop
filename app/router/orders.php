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
$orders_item->setProp('ID', 2);
//--		$orders_item->save();
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
//-			$item_item->save();
			$v->setDeleted();
//-			$v->save();
//print_info($orders_item->getAssociatedItemList(), 'AssociatedList');
		}
	}
	$orders_item->calculationOrdersAmount();
//-	$orders_item->save();
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
	$orders_item->calculationOrdersAmount();
	view_shop::call()->variable('card',            $orders_item);
	view_shop::call()->page('orders/orders__common');
	exit;
};
# Заглавная страница
router::call()->any("{$group}{}/", $func);
