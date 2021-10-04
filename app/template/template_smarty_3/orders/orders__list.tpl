<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$list*}
{foreach from=$list->get_array() item=v key=k}
	<div class="row border-bottom p-0 py-2">
		<div class="col-1 text-center">
			{$v->ID}
		</div>
		<div class="col text-center">
			{$v->CREATED}
		</div>
		<div class="col-2 text-right">
			{$v->AMOUNT|currency}
		</div>
		<div class="col-2 text-center">
			{$v->STATUS_TITLE}
		</div>
		<div class="col-2">
			<a href="/orders/{$v->ID}">Подробнее</a>
		</div>
	</div>
{/foreach}
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
