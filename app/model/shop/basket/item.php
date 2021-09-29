<?php
namespace app\model\shop\basket;

/**
 * @author Петухов Леонид <l.petuhov@okonti.ru>
 */
class item extends \RD_Obj_Item {



	/* * Подготовка данных к var_dump() и серилизации JSON (JsonSerializable) * /
	protected function __preparationData($arr) {
		$arr = parent::__preparationData($arr);
		return $arr;
	}



	/** Настройки объекта */
	protected function setting() {

		# Ключевое поле объекта
		$this->set_column_id('id_basket');   # Ключевое поле

		# Основные свойства объекта (соответствуют столбцам таблицы)
		$column = [
			'id_basket'        => 'ID',            # ID записи
			'employee_id'      => 'EMPLOYEE_ID',   # ID клиента
			'goods_id'         => 'GOODS_ID',      # ID товара
			'basket_count'     => 'COUNT',         # Кол-во
			'basket_created'   => 'CREATED',       # Добавлен
			'basket_deleted'   => 'DELETED',       # Удалён
		];

		foreach ($column as $k => $v) {
			$this->set_column_name($k, $v);
		}

		# Дополнительные свойства объекта
/*		$column = [
			'COLUMN_NAME',
		];
		foreach ($column as $k => $v) {
			$this->set_add_data($v, $v);
		}/**/

		# Генерируемые свойства объекта
		$function = [
			'COST'     => function() {
				$goods_item = $this->getAssociatedGoodsItem();
				return $goods_item->COST * $this->COUNT;
			},
		];
		foreach ($function as $k => $v) {
			$this->set_gen_data($k, $v);
		}/**/

		# Дополнительные объекты работы с данными
/*		$object = [
			'OBJECT_NAME'     => new \object\_common\contact\phone(),
		];
		foreach ($object as $k => $v) {
			$this->set_sub_obj($k, $v);
		}/**/
	}





	/* * Заполнение свойств объекта * /
	protected function filter($name, $value) {
		switch ($name) {
			case 'ID':
				$value = (int) $value;
				break;
		}
		return $value;
	}





	/* * Сохранение записи * /
	public function save() {
		$this->setProp('UPDATED',   date('Y-m-d H:i:s'));
		parent::save();
	}



	/** Добавляет заданное единиц товара */
	public function addGoodsOne($add_count) {
		$this->setProp('COUNT', $this->COUNT + $add_count);
		$goods_item = $this->getAssociatedGoodsItem();
		if ($this->COUNT > $goods_item->AVAILABLE_QUANTITY
				&& $goods_item->AVAILABLE_QUANTITY >= 0) {
			$this->setProp('COUNT', $goods_item->AVAILABLE_QUANTITY);
		}
	}



	/** Удаляет заданное единиц товара */
	public function removeGoodsOne(int $remote_count) {
		$this->setProp('COUNT', $this->COUNT - $remote_count);
		if ($this->COUNT < 0) {
			$this->setProp('COUNT', 0);
		}
	}



	/** Ставит маркер удаления позиции */
	public function setDeletedBasket() {
		$this->setProp('DELETED', date('Y-m-d H:I:s'));
	}/**/



	private $_employee_item = false;

	/** Возвращает связанного клиента */
	public function getAssociatedEmployeeItem() {
		if ($this->_employee_item === false) {
			$this->_employee_item = \factory::call()->getObj('shop\employee')->getByKey($this->EMPLOYEE_ID);
		}
		return $this->_employee_item;
	}



	private $_goods_item = false;

	/** Возвращает связанный товар */
	public function getAssociatedGoodsItem() {
		if ($this->_goods_item === false) {
			$this->_goods_item = \factory::call()->getObj('shop\goods')->getByKey($this->GOODS_ID);
		}
		return $this->_goods_item;
	}



/**/
}
