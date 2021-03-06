<?php
namespace app\model\shop\basket;

/**
 * @author Петухов Леонид <l.petuhov@okonti.ru>
 */
class item extends \app\model\_added\item {



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
			'customer_id'      => 'CUSTOMER_ID',   # ID клиента
			'goods_id'         => 'GOODS_ID',      # ID товара
			'basket_quantity'  => 'QUANTITY',      # Кол-во
			'basket_created'   => 'CREATED',       # Дата создания
			'basket_deleted'   => 'DELETED',       # Дата удаления
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
				return $goods_item->COST * $this->QUANTITY;
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



	/** Проверяет наличие достаточного кол-ва товара */
	public function controlQuantityGoods() {
		return $this->getAssociatedGoodsItem()->controlQuantityGoods($this->QUANTITY);
	}



	/** Добавляет заданное единиц товара */
	public function controlQuantity() {
		$goods_item = $this->getAssociatedGoodsItem();
		if (!$goods_item->controlQuantityGoods($this->QUANTITY)) {
			$this->setProp('QUANTITY', $goods_item->AVAILABLE_QUANTITY);
		} else if ($this->QUANTITY < 1) {
			$this->setProp('QUANTITY', 1);
		}
	}



	/** Добавляет заданное единиц товара */
	public function addGoodsOne($add_count) {
		$this->setProp('QUANTITY', $this->QUANTITY + $add_count);
		$this->controlQuantity();
	}



	/** Удаляет заданное единиц товара */
	public function removeGoodsOne(int $remote_count) {
		$this->setProp('QUANTITY', $this->QUANTITY - $remote_count);
		$this->controlQuantity();
	}



	private $_customer_item = false;

	/** Возвращает связанный элемент клиента */
	public function getAssociatedCustomerItem() {
		if ($this->_customer_item === false) {
			$this->_customer_item = \factory::call()->getObj('shop\customer')->getByKey($this->CUSTOMER_ID);
		}
		return $this->_customer_item;
	}



	private $_goods_item = false;

	/** Возвращает связанный элемент товара */
	public function getAssociatedGoodsItem() {
		if ($this->_goods_item === false) {
			$this->_goods_item = \factory::call()->getObj('shop\goods')->getByKey($this->GOODS_ID);
		}
		return $this->_goods_item;
	}



/**/
}
