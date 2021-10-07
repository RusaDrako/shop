<?php
namespace app\model\shop\orders_status_history;

/**
 * @author Петухов Леонид <l.petuhov@okonti.ru>
 */
class data extends \RD_Obj_Data {



	/** */
	protected function setting() {
		$this->table_name   = 'orders_status_history';
	}



	/** Возвращает список заказов пользователя */
	public function getOrdersStatusHistoryListOrder(int $order_id) {
		$sql = "SELECT :col: FROM :tab: WHERE orders_id = {$order_id}";
		$data = $this->select($sql);
		return $data;
	}



/**/
}
