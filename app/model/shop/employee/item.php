<?php
namespace app\model\shop\employee;

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
		$this->set_column_id('id_employee');   # Ключевое поле

		# Основные свойства объекта (соответствуют столбцам таблицы)
		$column = [
			'id_employee'         => 'ID',         # ID записи
			'employee_login'      => 'TITLE',      # Логин
			'employee_password'   => 'PASSWORD',   # Пароль
			'employee_email'      => 'EMAIL',      # Email
			'employee_token'      => 'TOKEN',      # Токен логирования
			'employee_created'    => 'CREATED',    # Дата создания
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





	/* * * /
	public function getItem() {
		$item = \factory::call()->getObj($table_name)->getByKey($this->KEY);
		return $item;
	}



/**/
}
