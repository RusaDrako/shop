<?php

$group = '/' . basename(__FILE__, '.php') . '/';





/** Вывод корзины */
$func = function () {
	$employee_item = \factory::call()->getUser();
	view_shop::call()->variable('list', $employee_item->getAssociatedBasketList());
	view_shop::call()->page('shop/basket__list');
};
# Заглавная страница
router::call()->any("{$group}", $func);





/** Добавление товара в корзину */
$func = function ($id_goods, $add_count = 1) {
	if ($id_goods) {
		$employee_item   = \factory::call()->getUser();
		$basket_item     = \factory::call()->getObj('shop\basket')->getBasketItemEmployeeIdGoodsIdOrNew($employee_item->ID, $id_goods);
		$basket_item->addGoodsOne($add_count);
		$basket_item->save();
	}
	echo 'ok';
	exit;
};
# Заглавная страница
router::call()->any("{$group}add/{id_goods}", $func);
router::call()->any("{$group}add/{id_goods}/{add_count}", $func);





/** Удаляет товар из корзину */
$func = function ($id_goods, $remote_count = 1) {
	if ($id_goods) {
		$employee_item   = \factory::call()->getUser();
		$basket_item     = \factory::call()->getObj('shop\basket')->getBasketItemEmployeeIdGoodsId($employee_item->ID, $id_goods);
		if ($basket_item) {
			$basket_item->removeGoodsOne($remote_count);
			if ($basket_item->COUNT <= 0) {
				$basket_item->setDeletedBasket();
			}
			$basket_item->save();
		}
	}
	echo 'ok';
	exit;
};
# Заглавная страница
router::call()->any("{$group}remove/{id_goods}", $func);
router::call()->any("{$group}remove/{id_goods}/{remote_count}", $func);





/** Добавление товара в корзину */
$func = function ($id_basket) {
	if ($id_basket) {
		$employee_item   = \factory::call()->getUser();
		$basket_item     = \factory::call()->getObj('shop\basket')->getBasketItemBasketIdEmployeeIdActive($id_basket, $employee_item->ID);
		if ($basket_item) {
			$basket_item->setDeletedBasket();
			$basket_item->save();
		}
	}
	echo 'ok';
	exit;
};
# Заглавная страница
router::call()->any("{$group}delete/{id_basket}", $func);
