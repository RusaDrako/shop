<?php
namespace app\model\shop\payment;

/**
 * @author Петухов Леонид <l.petuhov@okonti.ru>
 */
class data extends \RD_Obj_Data {



	/** */
	protected function setting() {
		$this->table_name   = 'payment';
	}



	private $_arr_type = [
		1 => ['title' => 'Наличными'],
		2 => ['title' => 'Картой'],
	];

	/** Возвращает массив настроек для типов доставки */
	public function settingsType() {
		return $this->_arr_type;
	}



	/** Возвращает список заказов пользователя */
	public function getPaymentListOrdersId(int $orders_id) {
		$sql = "SELECT :col: FROM :tab: WHERE orders_id = {$orders_id} AND payment_deleted IS NULL";
		$data = $this->select($sql);
		return $data;
	}



/**/
}
