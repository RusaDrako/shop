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
	# Получаем клиента
	$customer_item   = \factory::call()->getUser();
	# Список позиций в корзине
	$basket_list     = $customer_item->getAssociatedBasketList();
	# Если в корзине нет позиций
	if (!$basket_list->count()) {
		\factory::call()->getPage()->page_warning('Вкорзине нет товаров для покупки.');
//		header("Location: /basket/");
		exit;
	}

	# Получаем массив элементов для добавления в заказ
	$basket_item_arr = [];
	foreach ($basket_list->iterator() as $k => $v) {
		# Если позиция не найденна в выбраных для заказа позиции
		if (!in_array($v->ID, $basket_arr)) {
//				echo 'Не выбран.<br>';
			continue;
		};
		# Если товар не доступен для заказа
		if (!$v->getAssociatedGoodsItem()->AVAILABLE) {
//				echo 'Товар недоступен.<br>';
			continue;
		}
		# Если количество товара не доступен для заказа
		if (!$v->controlQuantityGoods()) {
//				echo 'Недостаточно товара.<br>';
			continue;
		};
		# Добавляем позицию в список для добавления в звказ
		$basket_item_arr[] = $v;
	}
	# Если нет позиций для добавления
	if (!count($basket_item_arr)) {
		\factory::call()->getPage()->page_warning('Нет позиций для заказа.');
		exit;
	}
//print_info($basket_list, '$basket_list');
	# Формируем заказ
	$orders_item = $customer_item->createAssociatedOrders();
//$orders_item->setProp('ID', 2);
	$orders_item->setFullName(
		\request::call()->get('surname')
		,\request::call()->get('name')
		,\request::call()->get('middlename')
	);
	$orders_item->setProp('PHONE',              \request::call()->get('phone'));
	$orders_item->setProp('EMAIL',              \request::call()->get('email'));
	$orders_item->setProp('DELIVERY_TYPE',      \request::call()->get('delivery_type'));
	$orders_item->setProp('DELIVERY_ADDRESS',   \request::call()->get('address'));
	$orders_item->setProp('COMMENT',            \request::call()->get('comment'));
	$orders_item->save();
	# Добавляем позиции к заказу
	foreach ($basket_item_arr as $k => $v) {
		$item_item = $orders_item->createAssociatedItem();
		$item_item->setDataBasket($v);
		$item_item->save();
		# Удаляем позицию в корзине
		$v->setDeleted();
		$v->save();
	}
	# Расчитываем стоймость заказа
	$orders_item->calculationOrdersAmount();
	$orders_item->save();
	# Переходим на страницу заказа
	header("Location: /orders/{$orders_item->ID}/");
	exit;
};
# Заглавная страница
router::call()->any("{$group}new", $func);





/** Добавление товара в корзину */
$func = function ($order_id) {
	$customer_item = \factory::call()->getUser();
	$orders_item = \factory::call()->getObj('shop\orders')->getByKey($order_id);
	if (!$orders_item || $orders_item->CUSTOMER_ID != $customer_item->ID) {
		\factory::call()->getPage()->page_404();
		exit;
	}
//	$orders_item->calculationOrdersAmount();
	view_shop::call()->variable('card',            $orders_item);
	view_shop::call()->variable('item_list',       $orders_item->getAssociatedItemList());
	view_shop::call()->variable('payment_list',    $orders_item->getAssociatedPaymentList());
	view_shop::call()->page('orders/orders__common');
	exit;
};
# Заглавная страница
router::call()->any("{$group}{}/", $func);
