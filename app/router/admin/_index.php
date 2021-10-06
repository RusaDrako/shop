<?php

### TODO Добавить логирование сотрудника

# Группа маршрутов
$group2 = router::call()->get_group(2);

# Если группа не определена
$group2 = $group2 ? $group2 : 'common';

# Файл группы маршрутов
$file_name = \registry::call()->get('FOLDER_ROOT') . "app/router/admin/{$group2}.php";

# Если файл группы маршрутов существует
if (file_exists($file_name)) {
	# Подгружаем маршруты
	require_once($file_name);
}

# Вызов обработчика маршрутизатора (перед этим указываем страницу по умолчанию)
$content = router::call()->router();
exit;
