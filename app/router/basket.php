<?php

$group = '/' . basename(__FILE__, '.php') . '/';





/** Вывод корзины */
$func = function () {
	$customer_item = \factory::call()->getUser();
	view_shop::call()->variable('list', $customer_item->getAssociatedBasketList());
	view_shop::call()->variable('order_delivery_array', \factory::call()->getObj('shop\orders')->settingsDeliveryType());
	view_shop::call()->page('basket/basket__list');
};
# Заглавная страница
router::call()->any("{$group}", $func);





/** Добавление товара в корзину */
$func = function ($id_goods, $add_count = 1) {
	if ($id_goods) {
		$customer_item   = \factory::call()->getUser();
		$basket_item     = \factory::call()->getObj('shop\basket')->getBasketItemCustomerIdGoodsIdOrNew($customer_item->ID, $id_goods);
		$basket_item->addGoodsOne($add_count);
		$basket_item->save();
	}
	header('Location:'.$_SERVER['HTTP_REFERER']);
	exit;
};
# Заглавная страница
router::call()->any("{$group}add/{id_goods}", $func);
router::call()->any("{$group}add/{id_goods}/{add_count}", $func);





/** Удаляет товар из корзину */
$func = function ($id_goods, $remote_count = 1) {
	if ($id_goods) {
		$customer_item   = \factory::call()->getUser();
		$basket_item     = \factory::call()->getObj('shop\basket')->getBasketItemCustomerIdGoodsId($customer_item->ID, $id_goods);
		if ($basket_item) {
			$basket_item->removeGoodsOne($remote_count);
			$basket_item->save();
		}
	}
	header('Location:'.$_SERVER['HTTP_REFERER']);
	exit;
};
# Заглавная страница
router::call()->any("{$group}remove/{id_goods}", $func);
router::call()->any("{$group}remove/{id_goods}/{remote_count}", $func);





/** Добавление товара в корзину */
$func = function ($id_basket) {
	if ($id_basket) {
		$customer_item   = \factory::call()->getUser();
		$basket_item     = \factory::call()->getObj('shop\basket')->getByKey($id_basket);
		if ($basket_item) {
			if ($basket_item->CUSTOMER_ID == $customer_item->ID) {
				$basket_item->changeDeleted();
				$basket_item->save();
			}
		}
	}
	header('Location:'.$_SERVER['HTTP_REFERER']);
	exit;
};
# Заглавная страница
router::call()->any("{$group}delete/{id_basket}", $func);
