<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$list*}
<div class="row border-bottom border-dark bg-primary">
	<div class="col-1 p-1 py-2">
		№ (id)
	</div>
	<div class="col p-1 py-2">
		Тип
	</div>
	<div class="col-2 p-1 py-2 text-end">
		Дата оплаты
	</div>
	<div class="col-2 p-1 py-2 text-end">
		Сумма
	</div>
</div>
{assign var="ammount" value=0}
{foreach from=$list->get_array() item=v key=k}
	<div class="row border-bottom border-dark">
		<div class="col-1 p-1 py-2">
			{$k+1} ({$v->ID})
		</div>
		<div class="col p-1 py-2">
			{$v->TYPE_TITLE}
		</div>
		<div class="col-2 p-1 py-2 text-end">
			{$v->CREATED}
		</div>
		<div class="col-2 p-1 py-2 text-end">
			{$v->AMOUNT|currency}
		</div>
	</div>
	{assign var="ammount" value="`$ammount+$v->AMOUNT`"}
{/foreach}
<div class="row mb-2 bg-success">
	<div class="col p-1 py-2 text-end">
		<strong>ИТОГО:</strong>
	</div>
	<div class="col-2 p-1 py-2 text-end">
		<strong>{$ammount|currency}</strong>
	</div>
</div>
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
