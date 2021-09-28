<?php

namespace app\controller;



/**/
class default_page {



	/**/
	public function __construct() {}



	/**/
	public function default() {
		\view_shop::call()->variable('type', 'danger');
		\view_shop::call()->variable('text', '404 - Страница не найдена :)');
		\view_shop::call()->page('__error/error');
//		echo '404 - Страница не найдена :)';
//		echo '<br>';
//		echo '<a href="\">На главную</a>';
	}



/**/
}
