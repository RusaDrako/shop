<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{print_info data=$list}
{foreach from=$list->get_array() item=v key=k}
{/foreach}
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
