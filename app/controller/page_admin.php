<?php
namespace app\controller;

/**
 *
 */
class page_admin {

	private $group = 'admin';

	public function addMenu() {
		$arr_section = [
			['title' => 'Админка',   'link' => "/{$this->group}/"],
			['title' => 'Разделы',   'link' => "/{$this->group}/section/"],
			['title' => 'Товары',    'link' => "/{$this->group}/goods/"],
			['title' => 'Клиенты',   'link' => "/{$this->group}/customer/"],
			['title' => 'Заказы',    'link' => "/{$this->group}/orders/"],
		];
		\view_shop::call()->variable('menu_arr',   $arr_section);
		\view_shop::call()->display('admin/menu');
	}

}
