<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$card*}
{*print_info data=$list*}
<div class="row border-bottom border-dark bg-primary">
	<div class="col-1 p-0 py-1">
		№
	</div>
	<div class="col p-0 py-1">
		Наименование
	</div>
	<div class="col-1 p-0 py-1 text-right">
		Стоимость
	</div>
	<div class="col-1 p-0 py-1 text-right">
		Скидка
	</div>
	<div class="col-1 p-0 py-1 text-right">
		Кол-во
	</div>
	<div class="col-1 p-0 py-1 text-right">
		Сумма
	</div>
</div>
{foreach from=$list->get_array() item=v key=k}
	<div class="row border-bottom border-dark">
		<div class="col-1 px-2 py-2">
			{$k+1}
		</div>
		<div class="col px-0 py-1">
			<a href="/goods/{$v->GOODS_ID}">
				{$v->TITLE}
			</a>
		</div>
		<div class="col-1 p-0 pt-2 text-right">
			{$v->PRICE|string_format:"%.2f"} руб.
		</div>
		<div class="col-1 p-0 pt-2 text-right">
			{$v->DISCOUNT} %
		</div>
		<div class="col-1 p-0 pt-2 text-right">
			{$v->QUANTITY} шт.
		</div>
		<div class="col-1 p-0 pt-2 text-right">
			{$v->AMOUNT|string_format:"%.2f"} руб.
		</div>
	</div>
{/foreach}
<div class="row mb-2 bg-success">
	<div class="col p-0 py-1 text-right">
		<strong>ИТОГО:</strong>
	</div>
	<div class="col-2 p-0 py-1 text-right">
		<strong>{$card->AMOUNT|string_format:"%.2f"} руб.</strong>
	</div>
</div>
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
