<?php
namespace app\model\_added;



/**
 *
 */
class tree_leaf {
	private $obj;
	private $items = [];


	/** Устанавливает данные листа */
	function setData($data) {
		$this->obj = $data;
	}

	/** Возвращает данные листа */
	function getData() {
		return $this->obj;
	}

	/** Добавляет зависимый лист */
	function addLeaf($obj) {
		$this->items[] = $obj;
	}

	/** Добавляет уникальный зависимый лист */
	function addLeafUnique($obj) {
		if (!\in_array($obj, $this->items)) {
			$this->addLeaf($obj);
		}
	}

	/** Возвращает массив зависимых листов */
	function getLeafs() {
		return $this->items;
	}

}
