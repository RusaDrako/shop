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
	public function getSectionListTree() {
		$data = $this->getAll();
		$arr = [];
		foreach ($data->iterator() as $v) {
			$obj = new \app\model\_added\tree_leaf();
			$obj->setData($v);
			$arr[$v->ID] = $obj;
		}

		$arr_parent = [];
		foreach ($arr as $v) {
			$id = $v->getData()->PARENT_ID;
			if ($id) {
				if (isset($arr[$id])) {
					$arr[$id]->addLeaf($v);
					$arr[$id]->addLeafUnique($v);
					continue;
				}
			}
			$arr_parent[] = $v;
		}

/*		$sql = "SELECT :col: FROM :tab: WHERE section_parent_id = {$section_parent_id}";
		$data = $this->select($sql);/**/
		return $arr_parent;
	}



	/** */
	public function getSectionListParentId($section_parent_id) {
		$sql = "SELECT :col: FROM :tab: WHERE section_parent_id = {$section_parent_id}";
		$data = $this->select($sql);
		return $data;
	}



/**/
}
