<?php
session_start();

define('_ELBRUS_START', microtime(true));



error_reporting(E_ALL);
ini_set("display_errors", true);



# Подгружаем ядро
require_once('../../vendor/autoload.php');
# Запуск ядра и всех переменных
\Elbrus\Framework\core::call(/*Берём настройки по умолчанию*/);


# Подгружаем настройки
require_once('../config/autoload.php');
# Проходим по маршрутам
require_once(\registry::call()->get('FOLDER_ROOT') . 'app/router/_index.php');
