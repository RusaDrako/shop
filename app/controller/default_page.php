<?php

namespace app\controller;



/**/
class default_page {



	/**/
	public function __construct() {}



	/**/
	public function default() {
		$this->page_404();
		exit;
	}



	/** Выводит: Страница не найдена */
	public function page_404() {
		\view_shop::call()->page('__error/404');
		exit;
//		echo '404 - Страница не найдена :)';
//		echo '<br>';
//		echo '<a href="\">На главную</a>';
	}



	/** Выводит: Страницу с ошибкой */
	public function page_danger($text) {
		\view_shop::call()->variable('type',   'danger');
		\view_shop::call()->variable('text',   $text);
		\view_shop::call()->page('__error/error');
		exit;
	}



	/** Выводит: Страницу с предупреждением */
	public function page_warning($text) {
		\view_shop::call()->variable('type',   'warning');
		\view_shop::call()->variable('text',   $text);
		\view_shop::call()->page('__error/error');
		exit;
	}



	/** Выводит: Страницу с подтверждением */
	public function page_success($text) {
		\view_shop::call()->variable('type',   'success');
		\view_shop::call()->variable('text',   $text);
		\view_shop::call()->page('__error/error');
		exit;
	}



	/** Выводит: Страницу с информацией */
	public function page_info($text) {
		\view_shop::call()->variable('type',   'info');
		\view_shop::call()->variable('text',   $text);
		\view_shop::call()->page('__error/error');
		exit;
	}



/**/
}
