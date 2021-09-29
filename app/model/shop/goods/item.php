<?php
namespace app\model\shop\goods;

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
		$this->set_column_id('id_goods');   # Ключевое поле

		# Основные свойства объекта (соответствуют столбцам таблицы)
		$column = [
			'id_goods'                   => 'ID',                   # ID записи
			'section_id'                 => 'SECTION_ID',           # ID раздела
			'goods_title'                => 'TITLE',                # Заголовок
			'goods_description'          => 'DESCRIPTION',          # Описание
			'goods_price'                => 'PRICE',                # Стоймость
			'goods_discount'             => 'DISCOUNT',             # Скидка
			'goods_available_quantity'   => 'AVAILABLE_QUANTITY',   # Доступное кол-во для продажи (-1 - неограниченное кол-во)
			'goods_created'              => 'CREATED',              # Дата создания
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
			'IMG'         => function() {return '/img/box.png';},
			'AVAILABLE'   => function() {return $this->AVAILABLE_QUANTITY ? 1 : 0;},
			'COST'        => function() {
				return $this->DISCOUNT > 0 && $this->DISCOUNT < 100
						? number_format($this->PRICE * (100 - $this->DISCOUNT) / 100, 2)
						: $this->PRICE;
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
	}/**/





	private $_section_item = false;

	/** Возвращает связанный элемент раздела */
	public function getAssociatedSectionItem() {
		if ($this->_section_item === false) {
			$this->_section_item = \factory::call()->getObj('shop\section')->getByKey($this->SECTION_ID);
		}
		return $this->_section_item;
	}



/**/
}
