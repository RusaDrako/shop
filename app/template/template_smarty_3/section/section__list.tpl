<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$list*}

{foreach from=$list->get_array() item=v key=k}
	<a href="/section/{$v->ID}">{$v->TITLE}</a><br>
{/foreach}
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
