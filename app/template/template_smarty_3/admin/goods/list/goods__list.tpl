<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$list*}

<div class="row border-bottom border-dark bg-primary p-0 py-2">
	<div class="col-1">
		#
	</div>
	<div class="col">
		Наименование
	</div>
	<div class="col-2 text-end">
		Цена
	</div>
	<div class="col-1 text-end">
		Скидка
	</div>
	<div class="col-2 text-end">
		Стоимость
	</div>
	<div class="col-1 text-end">
		Доступно
	</div>
</div>

{foreach from=$list->get_array() item=v key=k}
	<div class="row border-bottom p-0 py-2">
		<div class="col-1">
			{$v->ID}
		</div>
		<div class="col">
			<a href="/admin/goods/{$v->ID}">{$v->TITLE}</a>
		</div>
		<div class="col-2 text-end">
			{$v->PRICE|currency}
		</div>
		<div class="col-1 text-end">
			{$v->DISCOUNT} %
		</div>
		<div class="col-2 text-end">
			{$v->COST|currency}
		</div>
		<div class="col-1 text-end {if !$v->AVAILABLE}bg-warning{/if}">
			{$v->AVAILABLE_QUANTITY}
		</div>
	</div>
{/foreach}
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
