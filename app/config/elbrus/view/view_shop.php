<?php
namespace app\config\elbrus\view;



/**
 * @author Петухов Леонид <l.petuhov@okonti.ru>
 */
class view_shop extends \view {



	/** Возвращает html-код указанного шаблона
	 * @param string $link Ссылка на файл шаблона
	 */
	public function page($link) {
		$this->display('_skin/shop/header');
		$this->display($link);
		$this->display('_skin/shop/footer');
	}



/**/
}
