<?php
namespace app\model\shop\orders;

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
		$this->set_column_id('id_orders');   # Ключевое поле

		# Основные свойства объекта (соответствуют столбцам таблицы)
		$column = [
			'id_orders'              => 'ID',              # ID записи
			'customer_id'            => 'CUSTOMER_ID',     # ID клиента
			'orders_status'          => 'STATUS_ID',       # Статус
			'orders_amount'          => 'AMOUNT',          # Стоимость
			'orders_comment'         => 'COMMENT',         # Комментарий
//			'orders_address'         => 'ADDRESS',         # Адрес доставки
//			'orders_delivery_type'   => 'DELIVERY_TYPE',   # Тип доставки: 0 - самовывоз, 1 - доставка
			'orders_created'         => 'CREATED',         # Дата создания
			'orders_deleted'         => 'DELETED',         # Дата удаления
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
/*		$function = [
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



	/** Расчитывает сумму заказа */
	public function setDataCustomer($customer_item, $status) {
		$this->setProp('CUSTOMER_ID',   $customer_item->ID);
		$this->setProp('STATUS_ID',     $status);
	}



	private $_customer_item = false;

	/** Возвращает связанный элемент клиента */
	public function getAssociatedCustomerItem() {
		if ($this->_customer_item === false) {
			$this->_customer_item = \factory::call()->getObj('shop\customer')->getByKey($this->CUSTOMER_ID);
		}
		return $this->_customer_item;
	}



	private $_item_list = false;

	/** Возвращает связанный элемент товара */
	public function getAssociatedItemList() {
		if ($this->_item_list === false) {
			$this->_item_list = \factory::call()->getObj('shop\item')->getItemListOrdersId((int)$this->ID);
		}
		return $this->_item_list;
	}



	/** Возвращает новую позицию */
	public function createAssociatedItem() {
		$item_item = \factory::call()->getObj('shop\item')->newItem();
		$item_item->setDataOrders($this);

		$item_list = $this->getAssociatedItemList();
//		print_info($item_list, 'item_list');
//		print_info($item_item, 'item_item');
		$item_list->add($item_item);

		return $item_item;
	}



	/** Расчитывает сумму заказа */
	public function calculationOrdersAmount() {
		$item_list = $this->getAssociatedItemList();
		$amount = 0;
		foreach ($item_list->iterator() as $k => $v) {
			$amount = $amount + $v->AMOUNT;
		}
		$this->setProp('AMOUNT',   $amount);
	}



/**/
}
