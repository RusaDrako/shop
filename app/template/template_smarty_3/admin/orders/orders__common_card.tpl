<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$card*}

<h4>Заказ</h4>
<br>
{include file="orders/orders__card.tpl" card=$card}

<br><br>

<small>
	<h4>Позиции</h4>
	<br>
	{include file="admin/orders/item__list.tpl" list=$item_list}

	<br><br>

	<div class="row">
		<div class="col">
			<h4>История статусов</h4>
			<br>
			{include file="admin/orders/orders__form_status.tpl"}
			<br>
			{include file="admin/orders/orders_status_history__list.tpl" list=$orders_status_history_list}
		</div>
		<div class="col offset-1">
			<h4>История оплата</h4>
			<br>
			{include file="admin/orders/orders__form_payment.tpl"}
			<br>
			{include file="admin/orders/payment__list.tpl" list=$payment_list}
		</div>
	</div>
</small>
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
