<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$list*}
{*print_info data=$status_arr*}
<h4>Список заказов</h4>
{include file="admin/orders/orders__search.tpl"}
<br>
<hr>
<br>
{include file="admin/orders/orders__list.tpl"}
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
