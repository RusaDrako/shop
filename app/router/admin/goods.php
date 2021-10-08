<?php

$module = "/{$group}/" . basename(__FILE__, '.php');



/** Вывод списка заказов (+ поиск) */
$func = function () {
//print_info(\request::call());

	$input['id']      = \request::call()->get('id');
	$input['title']   = \request::call()->get('title');

	$goods_list = \factory::call()->getObj('shop\goods')->getGoodsListSearchFilter($input);
	view_shop::call()->variable('input',          $input);
	view_shop::call()->variable('list',           $goods_list);
	view_shop::call()->page('admin/goods/list/goods__common');
};
# Заглавная страница
router::call()->any("{$module}/", $func);





/** Вывод подробностей по заказу */
$func = function () {
//print_info($_FILES);
	$goods_id   = request::call()->get('id');
	$control    = (string) (int) $goods_id;
	if ($goods_id != $control) {
		\factory::call()->getPage()->page_danger("Неправильный ID товара {$goods_id}");
		exit;
	}
	$goods_item = \factory::call()->getObj('shop\goods')->getByKey((int) $goods_id);
	if (!$goods_item) {
		\factory::call()->getPage()->page_warning("Товар не найден: {$goods_id}");
		exit;
	}

	$goods_item->setProp('TITLE', request::call()->get('title'));
	$goods_item->setProp('DESCRIPTION', request::call()->get('description'));
	$goods_item->setProp('PRICE', request::call()->get('price'));
	$goods_item->setProp('DISCOUNT', request::call()->get('discount'));
	$goods_item->setGoodsAvailableQuantity(request::call()->get('available_quantity'), request::call()->get('available_quantity_unlimited'));


	if (isset($_FILES['image']) && isset($_FILES['image']['tmp_name']) && $_FILES['image']['tmp_name']) {
		$goods_item->uploadFile($_FILES['image']['tmp_name']);
	}
	$goods_item->save();

//print_info($goods_item);

	header('Location:'.$_SERVER['HTTP_REFERER']);
	exit;
};
# Заглавная страница
router::call()->any("{$module}/save/", $func);





/** Вывод подробностей по заказу */
$func = function ($goods_id) {
	$control = (string) (int) $goods_id;
	if ($goods_id != $control) {
		\factory::call()->getPage()->page_danger("Неправильный ID товара {$goods_id}");
		exit;
	}
	$goods_item = \factory::call()->getObj('shop\goods')->getByKey((int) $goods_id);
	if (!$goods_item) {
		\factory::call()->getPage()->page_warning("Товар не найден: {$goods_id}");
		exit;
	}

	view_shop::call()->variable('card',   $goods_item);
	view_shop::call()->page('admin/goods/card/goods__common');
	exit;
};
# Заглавная страница
router::call()->any("{$module}/{}/", $func);
/**/
