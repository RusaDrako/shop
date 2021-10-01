<?php
namespace app\model\shop\item;

/**
 * @author Петухов Леонид <l.petuhov@okonti.ru>
 */
class data extends \RD_Obj_Data {



	/** */
	protected function setting() {
		$this->table_name   = 'item';
	}



	/** Возвращает список позиций заказов */
	public function getItemListOrdersId(int $orders_id) {
		$sql = "SELECT :col: FROM :tab: WHERE orders_id = {$orders_id} AND item_deleted IS NULL";
		$data = $this->select($sql);
		return $data;
	}



/**/
}
