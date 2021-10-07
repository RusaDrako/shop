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
			'id_orders'                    => 'ID',                 # ID записи
			'customer_id'                  => 'CUSTOMER_ID',        # ID клиента
			'orders_status_id'             => 'STATUS_ID',          # ID статуса
			'orders_paymented'             => 'PAYMENTED',          # Отметка об оплате
			'orders_amount'                => 'AMOUNT',             # Стоимость
			'orders_customer_surname'      => 'SURNAME',            # Фамилия
			'orders_customer_name'         => 'NAME',               # Имя
			'orders_customer_middlename'   => 'MIDDLENAME',         # Отчество
			'orders_customer_phone'        => 'PHONE',              # Телефон
			'orders_customer_email'        => 'EMAIL',              # Email
			'orders_delivery_type'         => 'DELIVERY_TYPE',      # Тип доставки: 1 - самовывоз, 2 - курьер, 3 - доставка
			'orders_delivery_address'      => 'DELIVERY_ADDRESS',   # Адрес доставки
			'orders_comment'               => 'COMMENT',            # Комментарий
			'orders_created'               => 'CREATED',            # Дата создания
			'orders_deleted'               => 'DELETED',            # Дата удаления
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
			'STATUS_TITLE'     => function() {
				$arr = $this->obj_data->settingsStatus();
				return isset($arr[$this->STATUS_ID])
						? $arr[$this->STATUS_ID]['title']
						: 'Не определено';
			},
			'STATUS_COLOR'     => function() {
				$arr = $this->obj_data->settingsStatus();
				return isset($arr[$this->STATUS_ID])
						? $arr[$this->STATUS_ID]['color']
						: 'Не определено';
			},
			'DELIVERY_TYPE_TITLE'     => function() {
				$arr = $this->obj_data->settingsDeliveryType();
				return isset($arr[$this->DELIVERY_TYPE])
						? $arr[$this->DELIVERY_TYPE]['title']
						: 'Не определено';
			},
			'DELIVERY_ICON'     => function() {
				$arr = $this->obj_data->settingsDeliveryType();
				return isset($arr[$this->DELIVERY_TYPE])
						? $arr[$this->DELIVERY_TYPE]['icon']
						: 'Не определено';
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



	/** Устанавливает настройки пользователя */
	public function setDataCustomer($customer_item) {
		$this->setProp('CUSTOMER_ID',   $customer_item->ID);
	}



	/** Устанавливает статус заказа */
	public function setOrdersStatus($status_id, $comment = null) {
		if ($status_id == $this->STATUS_ID) { return; }
		$this->setProp('STATUS_ID',     $status_id);

		$orders_status_history_item = $this->createAssociatedOrdersStatusHistory();
		$orders_status_history_item->setComment($comment);
		return $orders_status_history_item;
	}



	/** Устанавливает ФИО */
	public function setFullName($surname, $name, $middlename) {
		$this->setProp('SURNAME',       $surname);
		$this->setProp('NAME',          $name);
		$this->setProp('MIDDLENAME',    $middlename);
	}



	/** Устанавливает метку об оплате */
	public function setOrdersPayment() {
		$this->setProp('PAYMENTED',   date('Y-m-d H:i:s'));
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

	/** Возвращает связанный позиции */
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





	private $_payment_list = false;

	/** Возвращает связанный список оплат */
	public function getAssociatedPaymentList() {
		if ($this->_payment_list === false) {
			$this->_payment_list = \factory::call()->getObj('shop\payment')->getPaymentListOrdersId((int)$this->ID);
		}
		return $this->_payment_list;
	}



	/** Возвращает новую оплату */
	public function createAssociatedPayment() {
		$payment_item = \factory::call()->getObj('shop\payment')->newItem();
		$payment_item->setDataOrders($this);

		$payment_list = $this->getAssociatedPaymentList();
		$payment_list->add($payment_item);

		return $payment_item;
	}



	/** Расчитывает сумму заказа */
	public function calculationPaymentAmount() {
		$payment_list = $this->getAssociatedPaymentList();
		$amount = 0;
		foreach ($payment_list->iterator() as $k => $v) {
			$amount = $amount + $v->AMOUNT;
		}
		return $amount;
	}



	/** Контроль оплаты заказа */
	public function controlPaymentAmount() {
		if ($this->PAYMENTED) { return; }
		$amount = $this->calculationPaymentAmount();
		if ($amount < $this->AMOUNT) {
			$this->setProp('PAYMENTED', $amount);
		}
	}





	private $_orders_status_history_list = false;

	/** Возвращает связанный список истории статусов */
	public function getAssociatedOrdersStatusHistoryList() {
		if ($this->_orders_status_history_list === false) {
			$this->_orders_status_history_list = \factory::call()->getObj('shop\orders_status_history')->getOrdersStatusHistoryListOrder((int)$this->ID);
		}
		return $this->_orders_status_history_list;
	}



	/** Возвращает новую историю статуса */
	public function createAssociatedOrdersStatusHistory() {
		$orders_status_history_item = \factory::call()->getObj('shop\orders_status_history')->newItem();
		$orders_status_history_item->setDataOrders($this);
		return $orders_status_history_item;
	}



/**/
}
