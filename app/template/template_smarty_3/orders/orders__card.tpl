<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$card*}
<div class="row mb-2">
	<div class="col py-1">
		Заказ номер: {$card->ID}
	</div>
	<div class="col-3 py-1 text-right">
		{$card->STATUS_ID}
	</div>
	<div class="col-3 p-0 py-1 text-right">
		На сумму: {$card->AMOUNT} руб.
	</div>
</div>
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
