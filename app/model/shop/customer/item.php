<?php
namespace app\model\shop\customer;

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
		$this->set_column_id('id_customer');   # Ключевое поле

		# Основные свойства объекта (соответствуют столбцам таблицы)
		$column = [
			'id_customer'         => 'ID',         # ID записи
			'customer_login'      => 'TITLE',      # Логин
			'customer_password'   => 'PASSWORD',   # Пароль
			'customer_email'      => 'EMAIL',      # Email
			'customer_token'      => 'TOKEN',      # Токен логирования
			'customer_created'    => 'CREATED',    # Дата создания
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
			'FUNCTIOB_NAME'     => function() {return null;},
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



	/** Возвращает связанный спиок корзины */
	public function createAssociatedOrders() {
		$orders_item = \factory::call()->getObj('shop\orders')->newItem();
		$orders_item->setDataCustomer($this, 1);
		return $orders_item;
	}


	/** Возвращает связанный спиок корзины */
	public function getAssociatedBasketList() {
		$list = \factory::call()->getObj('shop\basket')->getBasketListCustomerIdActive($this->ID);
		return $list;
	}



	private $_orders_list = false;

	/** Возвращает связанный элемент раздела */
	public function getAssociatedOrdersList() {
		if ($this->_orders_list === false) {
			$this->_orders_list = \factory::call()->getObj('shop\orders')->getOrdersListCustomerId($this->ID);
		}
		return $this->_orders_list;
	}



/**/
}
