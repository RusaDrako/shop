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
	echo '<pre>';
	$customer_item = \factory::call()->getUser();
	$basket_list = $customer_item->getAssociatedBasketList();
	if ($basket_list->count()) {
		$orders_item = $customer_item->createAssociatedOrders();
$orders_item->setProp('ID', 1);
//--		$orders_item->save();
		foreach ($basket_list->iterator() as $k => $v) {
			if (!$v->getAssociatedGoodsItem()->AVAILABLE) {
				echo 'Товар недоступен.';
				continue;
			}
			if (!$v->controlQuantityGoods()) {
				echo "\n" . 'Недостаточно товара.';
				continue;
			};
			$item_item = $orders_item->createAssociatedItem();
			$item_item->setDataBasket($v);
//--			$item_item->save();
		}
	}
	$orders_item->calculationOrdersAmount();
//--	$orders_item->save();
//	print_info($orders_item, '$orders_item');
//	print_info($orders_item->getAssociatedItemList(), '$item_list');
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
