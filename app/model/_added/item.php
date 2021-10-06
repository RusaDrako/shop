<?php
namespace app\model\_added;



/**
 * @author Петухов Леонид <l.petuhov@okonti.ru>
 */
class item extends \RD_Obj_Item {



	/** Сохранение записи и добавление метки обновления и создания */
	public function save() {
		if (!$this->getKey()) {
			try {
				$this->setProp('CREATED', date('Y-m-d H:i:s'));
			} catch (\Exception $e) { }
		}
		try {
			$this->setProp('UPDATED', date('Y-m-d H:i:s'));
		} catch (\Exception $e) { }
		parent::save();
	}



	/** Меняет маркер удаления */
	public function changeDeleted() {
		try {
			if (!$this->DELETED) {
				$this->setProp('DELETED', date('Y-m-d H:I:s'));
			} else {
				$this->setProp('DELETED', NULL);
			}
		} catch (\Exception $e) { }
	}/**/



	/** Ставит маркер удаления */
	public function setDeleted() {
		try {
			$this->setProp('DELETED', date('Y-m-d H:I:s'));
		} catch (\Exception $e) { }
	}/**/



	/** Снимает маркер удаления */
	public function cleanDeleted() {
		try {
			$this->setProp('DELETED', NULL);
		} catch (\Exception $e) { }
	}/**/



/**/
}
