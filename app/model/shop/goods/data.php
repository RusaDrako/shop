<?php
namespace app\model\shop\goods;

/**
 * @author Петухов Леонид <l.petuhov@okonti.ru>
 */
class data extends \RD_Obj_Data {



	/** */
	protected function setting() {
		$this->table_name   = 'goods';
	}



	/** Возвращает список товаров по ID раздела */
	public function getGoodsListSectionId($section_id) {
		$sql = "SELECT :col: FROM :tab: WHERE section_id = {$section_id}";
		$data = $this->select($sql);
		return $data;
	}



/**/
}
