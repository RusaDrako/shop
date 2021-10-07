<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$list*}
<div class="row border-bottom border-dark bg-primary">
	<div class="col-3 p-1 py-2">
		Статус
	</div>
	<div class="col-4 p-1 py-2">
		Дата
	</div>
	<div class="col p-1 py-2">
		Комментарий
	</div>
</div>
{foreach from=$list->get_array() item=v key=k}
	<div class="row border-bottom border-dark">
		<div class="col-3 p-1 py-2">
			<span class="badge {$v->STATUS_COLOR}">{$v->STATUS_TITLE}</span>
		</div>
		<div class="col-4 p-1 py-2">
			{$v->CREATED}
		</div>
		<div class="col p-1 py-2 text-sm">
			{$v->COMMENT}
		</div>
	</div>
{/foreach}
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
