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


	/** Возвращает список заказов пользователя */
	public function getGoodsListSearchFilter(array $input) {
		$filter = [
			'1=1',
		];

		if (isset($input['id']) && $input['id']) {
			$filter[] = "id_goods = {$input['id']}";
		}
		if (isset($input['title']) && $input['title']) {
			$filter[] = "goods_title LIKE '%{$input['title']}%'";
		}

		$str_where = \implode($filter, ' AND ');
		$sql = "SELECT :col: FROM :tab: WHERE {$str_where}";
//print_info($sql);
		$data = $this->select($sql);
		return $data;
	}



/**/
}
