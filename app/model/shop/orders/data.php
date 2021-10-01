<?php
namespace app\model\shop\orders;

/**
 * @author Петухов Леонид <l.petuhov@okonti.ru>
 */
class data extends \RD_Obj_Data {



	/** */
	protected function setting() {
		$this->table_name   = 'orders';
	}



	/** Возвращает список заказов пользователя */
	public function getOrdersListCustomerId(int $customer_id) {
		$sql = "SELECT :col: FROM :tab: WHERE customer_id = {$customer_id} AND orders_deleted IS NULL";
		$data = $this->select($sql);
		return $data;
	}



/**/
}
