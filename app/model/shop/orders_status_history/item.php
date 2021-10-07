<?php
namespace app\model\shop\orders_status_history;

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
		$this->set_column_id('id_orders_status_history');   # Ключевое поле

		# Основные свойства объекта (соответствуют столбцам таблицы)
		$column = [
			'id_orders_status_history'        => 'ID',          # ID записи
			'orders_id'                       => 'ORDERS_ID',   # ID заказа
			'orders_status_id'                => 'STATUS_ID',   # ID статуса заказа
			'orders_status_history_comment'   => 'COMMENT',     # Комментарий
			'orders_status_history_created'   => 'CREATED',     # Дата создания
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
				$arr = \factory::call()->getObj('shop\orders')->settingsStatus();
				return isset($arr[$this->STATUS_ID])
						? $arr[$this->STATUS_ID]['title']
						: 'Не определено';
			},
			'STATUS_COLOR'     => function() {
				$arr = \factory::call()->getObj('shop\orders')->settingsStatus();
				return isset($arr[$this->STATUS_ID])
						? $arr[$this->STATUS_ID]['color']
						: 'Не определено';
			},		];
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



	/** Устанавливает настройки заказа */
	public function setDataOrders($orders_item) {
		$this->setProp('ORDERS_ID',   $orders_item->ID);
		$this->setProp('STATUS_ID',   $orders_item->STATUS_ID);
	}


	/** Устанавливает комментарий */
	public function setComment($comment) {
		$this->setProp('COMMENT',   $comment);
	}



/**/
}
