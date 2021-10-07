<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$list*}
{*print_info data=$status_arr*}
{$obj_page->addMenu()}

<h4>Список заказов</h4>
{include file="admin/orders/list/orders__form_search.tpl"}
<br>
<hr>
<br>
{include file="admin/orders/list/orders__list.tpl"}
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
