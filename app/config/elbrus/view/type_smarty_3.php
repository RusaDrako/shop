<?php
namespace app\config\elbrus\view;

//require_once('type_smarty_modifire.php');
//require_once('type_smarty_function.php');



/**
 * @author Петухов Леонид <l.petuhov@okonti.ru>
 */
class type_smarty_3 extends \view_adapter {



	/** Загружает настройки шаблонизатора */
	public function _setting() {
		$folder_root = \registry::call()->get('FOLDER_ROOT');
		$folder = $folder_root . 'vendor/smarty';
		# Добавляем в автозагрузку игнорирование папки Smarty
		\Elbrus\Framework\core_cmd_autoload_class::add_folder_ignore($folder);

		$this->_extension = '.tpl';
		# Проверка загруженности Smarty
		if (!class_exists('Smarty')) {
			return;
		}
		# Шаблоны header и footer
//		$this->_header = '_skin/lteadmin/header';
//		$this->_footer = '_skin/lteadmin/footer';

		# Активируем библиотеку
		$this->_obj_template_engine                 = new \Smarty();
		$this->_obj_template_engine->template_dir   = $folder_root . 'app/template/template_smarty_3/';
		$this->_obj_template_engine->compile_dir    = $folder_root . 'cache/smarty/templates';
		$this->_obj_template_engine->cache_dir      = $folder_root . 'cache/smarty/cache';

		\registry::call()->set('FOLDER_SMARTY_TEMPLATE', $this->_obj_template_engine->template_dir);

		$arr_modifier = smarty_modifier__registry();
		foreach ($arr_modifier as $k => $v) {
			$this->_obj_template_engine->registerPlugin("modifier", $k, $v);
//v2		$this->_obj_template_engine->register_modifier("phone","\core_2\view\smarty_modifier__phone_format");
		}

		$arr_function = smarty_function__registry();
		foreach ($arr_function as $k => $v) {
			$this->_obj_template_engine->registerPlugin("function", $k, $v);
		}

	}





	/** Загружает переменную в шаблонизатор
	 * @param string $name Имя переменной в шаблонизаторе
	 * @param string|array|object $value Значение переменной
	 */
	public function variable($name, $value) {
		$this->_obj_template_engine->assign($name, $value);
	}





	/** Выводит указанный шаблон
	 * @param string $link Ссылка на файл шаблона
	 */
	public function block($link) {
		$this->_obj_template_engine->display($this->_name_file($link));
	}





	/** Возвращает html-код указанного шаблона
	 * @param string $link Ссылка на файл шаблона
	 */
	public function html($link) {
		return $this->_obj_template_engine->fetch($this->_name_file($link));
	}





/**/
}
