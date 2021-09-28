<?php
# Подгружаем настройки
require_once('router.php');
# Smarty
require_once('smarty.php');

# Загрузка фабрики
require_once(\registry::call()->get('FOLDER_ROOT') . 'app/factory.php');
