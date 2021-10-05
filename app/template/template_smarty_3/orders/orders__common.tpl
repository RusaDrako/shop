<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$card*}

<h4>Заказ</h4>
<br>
{include file="orders/orders__card.tpl" card=$card}

{if $item_list->count()}
	<br><br>
	<h4>Позиции</h4>
	<br>
	{include file="orders/item__list.tpl" list=$item_list}
{/if}

{if $payment_list->count()}
	<br><br>
	<h4>Оплата</h4>
	<br>
	{include file="orders/payment__list.tpl" list=$payment_list}
{/if}

<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
