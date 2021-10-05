<?php
namespace app\config\elbrus\view;

###########################################################################
###########################################################################
###########################################################################
##### Модификаторы
###########################################################################
###########################################################################
###########################################################################





# Возвращает массив модификаторов
function smarty_modifier__registry() {
	return [
		'fio'            => __NAMESPACE__ .'\smarty_modifier__fio',
		'phone'          => __NAMESPACE__ .'\smarty_modifier__phone_format',
		'phone_a'        => __NAMESPACE__ .'\smarty_modifier__phone_a',
		'phone_hidden'   => __NAMESPACE__ .'\smarty_modifier__phone_hidden',
		'email_a'        => __NAMESPACE__ .'\smarty_modifier__email_a',
		'email_hidden'   => __NAMESPACE__ .'\smarty_modifier__email_hidden',
		'str_hidden'     => __NAMESPACE__ .'\smarty_modifier__str_hidden',
		'tmp_dir'        => __NAMESPACE__ .'\smarty_modifier__template_dir',
		'currency'       => __NAMESPACE__ .'\smarty_modifier__currency',
	];
}





/** Функция-модификатор для смарти: ФИО */
function smarty_modifier__fio($value, $param = '%f %i %o') {
	$arr_value = \explode(' ', $value);
	$arr_replace = [
		'%f' => ucwords($arr_value[0]),
		'%i' => isset($arr_value[1]) ? ucwords($arr_value[1]) : '',
		'%o' => isset($arr_value[2]) ? ucwords($arr_value[2]) : '',
	];
	$value = \str_replace(\array_keys($arr_replace), $arr_replace, $param);
	return $value;
}





/** Функция-модификатор для смарти: Телефон */
function _phone_format($value) {
	return preg_replace("/(\d{1})(\d{3})(\d{3})(\d{2})(\d{2})/ui", '+$1 ($2) $3-$4-$5', $value);
}





/** Функция-модификатор для смарти: Телефон */
function smarty_modifier__phone_format($value) {
	$value = preg_replace('/[^0-9]/ui', '', $value);
	$value = mb_substr($value, 0, 11);
	return _phone_format($value);
}





/** Функция-модификатор: Формат телефона */
function smarty_modifier__phone_a($value) {
	$value = preg_replace('/[^0-9]/ui', '', $value);
	$value = mb_substr($value, 0, 11);
	$phone = _phone_format($value);
	return "<a href=\"tel:+{$value}\">{$phone}</a>";
}





/** Функция-модификатор: Формат телефона */
function smarty_modifier__phone_hidden($value) {
	$value = preg_replace('/[^0-9]/ui', '', $value);
	$value = mb_substr($value, 0, 11);
	return '+' . mb_substr($value, 0, 1) . ' (' . mb_substr($value, 1, 3) . ') ***-**-' . mb_substr($value, -2);
}





/** Функция-модификатор: Скрытая строка */
function smarty_modifier__email_a($value) {
	return "<a href=\"mailto:$value\">{$value}</a>";
}





/** Функция-модификатор: Скрытая строка */
function smarty_modifier__email_hidden($value) {
	$arr_mail = \explode('@', $value);
	$result = '';
	if (isset($arr_mail[1])) {
		$result = mb_substr($arr_mail[0], 0, 1) . '***@' . $arr_mail[1];
	}
	return $result;
}





/** Функция-модификатор: Скрытая строка */
function smarty_modifier__str_hidden($value) {
	return preg_replace("/[\b]*(\w)[\w]*[\b]*/ui", '$1***', $value);
}





/** Функция-модификатор: Модификация папки шаблона */
function smarty_modifier__template_dir($value) {
	$arr = \registry::call()->get('FOLDER_SMARTY_TEMPLATE');
	if (\is_array($arr)) {
		foreach ($arr as $k => $v) {
			$value = \substr($value, \strlen($v));
		}
	}
	$value = \str_replace("\\", '/', $value);
	return $value;
}



/** Функция-модификатор: Модификация папки шаблона */
function smarty_modifier__currency($value) {
	return number_format($value, 2, '.',' ') . ' ₽';
}
