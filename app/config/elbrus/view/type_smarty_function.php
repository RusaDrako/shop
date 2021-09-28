<?php
namespace app\config\elbrus\view;

###########################################################################
###########################################################################
###########################################################################
##### Функции
###########################################################################
###########################################################################
###########################################################################

#######################################################################
# Внимание при обновлении функций, необходимо очищать кэш
#######################################################################



# Возвращает массив модификаторов
function smarty_function__registry() {
	return [
		'print_info'			=> __NAMESPACE__ .'\smarty_function__print_info',
	];
}





/** */
function smarty_function__print_info($params) {
	$result = null;
	$title = null;
	$view = null;
	if (!empty($params['view'])) {
		$view = $params['view'];
	}
	if (!empty($params['title'])) {
		$title = $params['title'];
	}
	if (!empty($params['data'])) {
		print_info($params['data'], $title, $view);
//		$result = var_export($params['data'], true);
	}
	return $result;
}




/**/
