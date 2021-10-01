<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$list*}

<div class="row p-2">
	{foreach from=$list->get_array() item=v key=k}
	<div class="col-3 p-1">
		<div class="border border-primary p-1">
			<a href="/section/{$v->ID}">{$v->TITLE}</a>
		</div>
	</div>
	{/foreach}
</div>
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
