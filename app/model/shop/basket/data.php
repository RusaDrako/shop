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
	public function getBasketListEmployeeId(int $employee_id) {
		$sql = "SELECT :col: FROM :tab: WHERE employee_id = {$employee_id} AND basket_deleted IS NULL";
		$data = $this->select($sql);
		return $data;
	}



	/** Получает позицию в корзине для указанной пары пользователь-товар */
	public function getBasketItemEmployeeIdGoodsId(int $employee_id, int $goods_id) {
		$sql = "SELECT :col: FROM :tab: WHERE employee_id = {$employee_id} AND goods_id = {$goods_id} AND basket_deleted IS NULL";
		$data = $this->select($sql);
		$data = $data->first();
		return $data;
	}



	/** Получает позицию в корзине для указанной пары пользователь-товар или создаёт новую */
	public function getBasketItemEmployeeIdGoodsIdOrNew(int $employee_id, int $goods_id) {
		$data = $this->getBasketItemEmployeeIdGoodsId($employee_id, $goods_id);
		if ($data === NULL) {
			$data = $this->newItem();
			$data->setProp('EMPLOYEE_ID', $employee_id);
			$data->setProp('GOODS_ID', $goods_id);
		}
		return $data;
	}



	/** Получает позицию в корзине для указанной пары позиция-пользователь */
	public function getBasketItemBasketIdEmployeeIdActive(int $basket_id, int $employee_id) {
		$sql = "SELECT :col: FROM :tab: WHERE :key: = {$basket_id} AND employee_id = {$employee_id} AND basket_deleted IS NULL";
		$data = $this->select($sql);
		$data = $data->first();
		return $data;
	}



/**/
}
