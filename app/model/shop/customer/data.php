<?php
namespace app\model\shop\customer;

/**
 * @author Петухов Леонид <l.petuhov@okonti.ru>
 */
class data extends \RD_Obj_Data {



	/** */
	protected function setting() {
		$this->table_name   = 'customer';
	}



	/* * * /
	public function getList($where) {
		$sql = "SELECT :col: FROM :tab: WHERE {$where}";
		$data = $this->select($sql);
		return $data;
	}



/**/
}
