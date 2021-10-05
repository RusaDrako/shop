<?php
namespace app\model\shop\payment;

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
		$this->set_column_id('id_payment');   # Ключевое поле

		# Основные свойства объекта (соответствуют столбцам таблицы)
		$column = [
			'id_payment'        => 'ID',            # ID записи
			'orders_id'         => 'ORDERS_ID',     # ID заказа
			'payment_type'      => 'TYPE',          # Тип оплаты: 1 - наличными, 2 - картой...
			'payment_amount'    => 'AMOUNT',        # Сумма оплаты
			'payment_comment'   => 'COMMENT',       # Комментарий
			'payment_created'   => 'CREATED',       # Дата создания
			'payment_deleted'   => 'DELETED',       # Дата удаления
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
			'TYPE_TITLE'     => function() {
				$arr = $this->obj_data->settingsType();
				return isset($arr[$this->TYPE])
						? $arr[$this->TYPE]['title']
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



	/** Обновляет данные из заказа */
	public function setDataOrders($orders_item) {
		if (!$orders_item->ID) {
			throw new \Exception("Не определён ID заказа", 1);

		}
		$this->setProp('ORDERS_ID',   $orders_item->ID);
	}



/**/
}
