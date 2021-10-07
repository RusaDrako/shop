<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$payment_arr*}
<form method="post" action="/admin/orders/payment">
	<input type="hidden" name="order_id" value="{$card->ID}" />
	<div class="row my-2">
		<div class="col-4">
			<select class="form-select" name="payment_id">
				{foreach from=$payment_arr item=v key=k}
					<option value="{$k}">{$v.title}</option>
				{/foreach}
			</select>
		</div>
		<div class="col">
 			<input class="form-control" type="text" name="amount" value="0" placeholder="Сумма">
		</div>
		<div class="col-2">
			<button class="form-control btn btn-success" placeholder="Добавить оплату">
				<i class="fa fa-plus" aria-hidden="true"></i>
			</button>
		</div>
	</div>
</form>
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
