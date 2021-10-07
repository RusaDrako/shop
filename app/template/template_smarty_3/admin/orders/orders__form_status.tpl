<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$status_arr*}
<form method="post" action="/admin/orders/status">
	<input type="hidden" name="order_id" value="{$card->ID}" />
	<div class="row my-2">
		<div class="col-4">
			<select class="form-select" name="status_id">
				{foreach from=$status_arr item=v key=k}
					<option value="{$k}" {if $k == $card->STATUS_ID}selected="selected"{/if}>{$v.title}</option>
				{/foreach}
			</select>
		</div>
		<div class="col">
 			<input class="form-control" type="text" name="comment" value="" placeholder="Комментарий">
		</div>
		<div class="col-2">
			<button class="form-control btn btn-success" placeholder="Установить статус">
				<i class="fa fa-check" aria-hidden="true"></i>
			</button>
		</div>
	</div>
</form>
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
