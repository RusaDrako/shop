<?php
namespace app\model\shop\basket;

/**
 * @author Петухов Леонид <l.petuhov@okonti.ru>
 */
class data extends \RD_Obj_Data {



	/** */
	protected function setting() {
		$this->table_name   = 'basket';
	}



	/** Возвращает список позицей в корзине пользователя */
	public function getBasketListCustomerIdActive(int $customer_id) {
		$sql = "SELECT :col: FROM :tab: WHERE customer_id = {$customer_id} AND basket_deleted IS NULL";
		$data = $this->select($sql);
		return $data;
	}



	/** Получает позицию в корзине для указанной пары пользователь-товар */
	public function getBasketItemCustomerIdGoodsId(int $customer_id, int $goods_id) {
		$sql = "SELECT :col: FROM :tab: WHERE customer_id = {$customer_id} AND goods_id = {$goods_id} AND basket_deleted IS NULL";
		$data = $this->select($sql);
		$data = $data->first();
		return $data;
	}



	/** Получает позицию в корзине для указанной пары пользователь-товар или создаёт новую */
	public function getBasketItemCustomerIdGoodsIdOrNew(int $customer_id, int $goods_id) {
		$data = $this->getBasketItemCustomerIdGoodsId($customer_id, $goods_id);
		if ($data === NULL) {
			$data = $this->newItem();
			$data->setProp('CUSTOMER_ID', $customer_id);
			$data->setProp('GOODS_ID', $goods_id);
		}
		return $data;
	}



	/** Получает позицию в корзине для указанной пары позиция-пользователь */
	public function getBasketItemBasketIdCustomerIdActive(int $basket_id, int $customer_id) {
		$sql = "SELECT :col: FROM :tab: WHERE :key: = {$basket_id} AND customer_id = {$customer_id} AND basket_deleted IS NULL";
		$data = $this->select($sql);
		$data = $data->first();
		return $data;
	}



/**/
}
