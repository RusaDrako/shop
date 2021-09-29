<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$array*}

{if $array}
	{if is_array($array)}
	{foreach from=$array item=v key=k}
		/ <a href="/section/{$v->ID}">{$v->TITLE}</a>
	{/foreach}
	{/if}
{/if}
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
