<?php
namespace app\model\shop\section;

/**
 * @author Петухов Леонид <l.petuhov@okonti.ru>
 */
class data extends \RD_Obj_Data {



	/** */
	protected function setting() {
		$this->table_name   = 'section';
	}



	/** */
	public function getSectionListParentId($section_parent_id) {
		$sql = "SELECT :col: FROM :tab: WHERE section_parent_id = {$section_parent_id}";
		$data = $this->select($sql);
		return $data;
	}



/**/
}
