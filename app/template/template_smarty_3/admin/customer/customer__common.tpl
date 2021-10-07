<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$list*}
{$obj_page->addMenu()}

<h4>Список клиентов</h4>
<hr>
{include file="admin/customer/customer__list.tpl"}
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
