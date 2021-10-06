<?php
namespace app\model\shop\section;

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
		$this->set_column_id('id_section');   # Ключевое поле

		# Основные свойства объекта (соответствуют столбцам таблицы)
		$column = [
			'id_section'          => 'ID',          # ID записи
			'section_parent_id'   => 'PARENT_ID',   # ID родительского элемента
			'section_title'       => 'TITLE',       # Заголовок
			'section_weight'      => 'WEIGHT',      # Вес в сортировке
			'section_created'     => 'CREATED',     # Дата создания
			'section_deleted'     => 'DELETED',     # Дата удаления
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

/*		# Генерируемые свойства объекта
		$function = [
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



	/** Создаёт зависимый раздел */
	public function createAssociatedSectionItem() {
		$section_item = \factory::call()->getObj('shop\section')->newItem();
		$section_item->setProp('PARENT_ID',   $this->ID);
		return $section_item;
	}





	/** Возвращает массив цепочки разделов */
	public function getSectionParentArray($array_parent = []) {
		$section_item = $this->getAssociatedSectionParentItem();
		if ($section_item) {
			$array_parent = $section_item->getSectionParentArray($array_parent);
		}
		$array_parent[] = $this;
		return $array_parent;
	}





	private $_section_parent_item = false;

	/** Возвращает связанный элемент раздела (родительский) */
	public function getAssociatedSectionParentItem() {
		if (!$this->PARENT_ID) {
			$this->_section_parent_item = null;
		}
		if ($this->_section_parent_item === false) {
			$this->_section_parent_item = \factory::call()->getObj('shop\section')->getByKey($this->PARENT_ID);
		}
		return $this->_section_parent_item;
	}





	private $_section_list = false;

	/** Возвращает связанный элемент раздела (родительский) */
	public function getAssociatedSectionList() {
		if ($this->_section_list === false) {
			$this->_section_list = \factory::call()->getObj('shop\section')->getSectionListParentId($this->ID);
		}
		return $this->_section_list;
	}





	private $_goods_list = false;

	/** Возвращает связанный элемент раздела (родительский) */
	public function getAssociatedGoodsList() {
		if ($this->_goods_list === false) {
			$this->_goods_list = \factory::call()->getObj('shop\goods')->getGoodsListSectionId($this->ID);
		}
		return $this->_goods_list;
	}



/**/
}
