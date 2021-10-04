<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{print_info data=$card}
<div class="row mb-2">
	<div class="col py-1">
		Заказ номер: {$card->ID}
	</div>
	<div class="col-3 py-1 text-right">
		{$card->STATUS_TITLE}
	</div>
	<div class="col-3 py-1 text-right">
		{$card->AMOUNT|currency}
	</div>
</div>
<div class="row mb-2">
	<div class="col-4 py-1">
		{$card->SURNAME} {$card->NAME} {$card->MIDDLENAME}
	</div>
	<div class="col py-1 text-right">
		{$card->PHONE|phone}
	</div>
	<div class="col py-1 text-right">
		{$card->EMAIL}
	</div>
</div>
<div class="row mb-2">
	<div class="col-4 py-1">
		{$card->DELIVERY_TYPE_TITLE}
	</div>
	<div class="col py-1 text-right">
		{$card->DELIVERY_ADDRESS}
	</div>
</div>
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
