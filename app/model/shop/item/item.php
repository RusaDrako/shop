<?php
namespace app\model\shop\item;

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
		$this->set_column_id('id_item');   # Ключевое поле

		# Основные свойства объекта (соответствуют столбцам таблицы)
		$column = [
			'id_item'           => 'ID',            # ID записи
			'orders_id'         => 'ORDERS_ID',     # ID заказа
			'goods_id'          => 'GOODS_ID',      # ID товара
			'goods_guid'        => 'GUID',          # GUID товара для синхронизации с внешними системами
			'item_title'        => 'TITLE',         # Наименование
			'item_description'  => 'DESCRIPTION',   # Описание
			'item_price'        => 'PRICE',         # Стоимость
			'item_discount'     => 'DISCOUNT',      # Скидка
			'item_quantity'     => 'QUANTITY',      # Количество
			'item_created'      => 'CREATED',       # Дата создания
			'item_deleted'      => 'DELETED',       #
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
			'COST'        => function() {
				return $this->DISCOUNT > 0 && $this->DISCOUNT < 100
						? number_format($this->PRICE * (100 - $this->DISCOUNT) / 100, 2)
						: $this->PRICE;
			},
			'AMOUNT' => function () {
				return $this->COST * $this->QUANTITY;
			}
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



	/** Обновляет данные из заказа */
	public function setDataOrders($orders_item) {
		if (!$orders_item->ID) {
			throw new \Exception("Не определён ID заказа", 1);

		}
		$this->setProp('ORDERS_ID',   $orders_item->ID);
	}



	/** Обновляет данные из корзины */
	public function setDataBasket($basket_item) {
		$this->setProp('QUANTITY',   $basket_item->QUANTITY);
		$goods_item = $basket_item->getAssociatedGoodsItem();
		$this->_setDataGoods($goods_item);
	}



	/** Обновляет данные из товара */
	private function _setDataGoods($goods_item) {
		$this->setProp('GOODS_ID',      $goods_item->ID);
		$this->setProp('GUID',          $goods_item->GUID);
		$this->setProp('TITLE',         $goods_item->TITLE);
		$this->setProp('DESCRIPTION',   $goods_item->DESCRIPTION);
		$this->setProp('PRICE',         $goods_item->PRICE);
		$this->setProp('DISCOUNT',      $goods_item->DISCOUNT);
	}



	private $_orders_item = false;

	/** Возвращает связанный элемент клиента */
	public function getAssociatedOrdersItem() {
		if ($this->_orders_item === false) {
			$this->_orders_item = \factory::call()->getObj('shop\orders')->getByKey($this->ORDERS_ID);
		}
			return $this->_orders_item;
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
