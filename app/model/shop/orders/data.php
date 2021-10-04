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



	private $_arr_status = [
		1 => ['title' => 'Новый'],
		2 => ['title' => 'Оплачен'],
		3 => ['title' => 'В обработке'],
		4 => ['title' => 'В сборке'],
		5 => ['title' => 'Ожидает отправки'],
		6 => ['title' => 'Отправлен'],
		7 => ['title' => 'Доставлен'],
		8 => ['title' => 'Закрыт'],
	];

	/** Возвращает массив настроек для типов доставки */
	public function settingsStatus() {
		return $this->_arr_status;
	}



	private $_arr_delivery_type = [
		1 => ['title' => 'Самовывоз'],
		2 => ['title' => 'Курьер'],
		3 => ['title' => 'Доставка'],
	];

	/** Возвращает массив настроек для типов доставки */
	public function settingsDeliveryType() {
		return $this->_arr_delivery_type;
	}



	/** Возвращает список заказов пользователя */
	public function getOrdersListCustomerId(int $customer_id) {
		$sql = "SELECT :col: FROM :tab: WHERE customer_id = {$customer_id} AND orders_deleted IS NULL";
		$data = $this->select($sql);
		return $data;
	}



/**/
}
