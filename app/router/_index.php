<?php
# Группа маршрутов
$group = router::call()->get_group();

# Если группа не определена
$group = $group ? $group : 'shop';

# Файл группы маршрутов
$file_name = \registry::call()->get('FOLDER_ROOT') . "app/router/{$group}.php";

# Если файл группы маршрутов существует
if (file_exists($file_name)) {
	# Подгружаем маршруты
	require_once($file_name);
}

# Вызов обработчика маршрутизатора (перед этим указываем страницу по умолчанию)
$content = router::call()->router();
