<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$list*}

{foreach from=$list->iterator() item=v key=k}
<div class="row border-bottom py-1">
	<div class="col-1">
		{$v->ID}
	</div>
	<div class="col">
		{$v->TITLE}
	</div>
	<div class="col-2">
		{$v->PASSWORD}
	</div>
	<div class="col-2">
		{$v->EMAIL}
	</div>
	<div class="col-2">
		{$v->CREATED}
	</div>
</div>
{/foreach}
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
