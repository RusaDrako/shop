<?php
class_alias('RD_Router', 'router');
# Общие настройки
router::call()->set_server_setting();
# Корневая папка
router::call()->set_root_folder(\registry::call()->get('FOLDER_ROOT'));
# Заглавная страница
router::call()->add_default('app\controller\default_page@page_404');
