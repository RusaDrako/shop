<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$list*}
<div class="row">
	<div class="col">
		<h4>Корзина</h4>
	</div>
</div>
<br>
<form method="post" action="/orders/new">
	{foreach from=$list->get_array() item=v key=k}
		{assign var="goods_item" value=$v->getAssociatedGoodsItem()}
		<div class="row border border-success mb-2">
			<div class="col-1 px-2 py-2">
				{$k+1}
				{if $goods_item->AVAILABLE && $v->controlQuantityGoods()}
					<input type="checkbox" name="basket[]" value="{$v->ID}">
				{/if}
			</div>
			<div class="col-1 px-0 py-1">
				<a href="/goods/{$goods_item->ID}">
					<img class="border border-warning" src="{$goods_item->IMG_URL}" style="max-width: 100%; max-height: 60px;"/>
				</a>
			</div>
			<div class="col py-2">
				<a href="/goods/{$goods_item->ID}">{$goods_item->TITLE}</a> ({$goods_item->getKey()})
			</div>
			<div class="col-2 pt-2 text-center">
				{$goods_item->COST|currency}
				{if $goods_item->DISCOUNT}
				<br>
				<span class="badge bg-success">Скидка {$goods_item->DISCOUNT} %<span>
				{/if}
			</div>
			{if $goods_item->AVAILABLE}
				<div class="col-2 px-1 py-2 text-center">
					<div class="input-group px-4">
						<span class="input-group-text" onclick="javascript: document.location.href='/basket/remove/{$goods_item->ID}/1';">
							<i class="fa fa-minus" aria-hidden="true"></i>
						</span>
						<input type="text" class="form-control text-center" value="{$v->QUANTITY}">
						<span class="input-group-text" onclick="javascript: document.location.href='/basket/add/{$goods_item->ID}/1';">
							<i class="fa fa-plus" aria-hidden="true"></i>
						</span>
					</div>
					{if !$v->controlQuantityGoods()}
					Недостаточно товара.
					{/if}
				</div>
				<div class="col-2 pt-2 text-center bg-warning">
					{$v->COST|currency}
				</div>
			{else}
				<div class="col-4 pt-2 text-center bg-danger">
					Товар отсутствует
				</div>
			{/if}
			<div class="col-1 pt-2 text-center">
				<a class="btn btn-danger" href="/basket/delete/{$v->ID}">
					<i class="fa fa-trash" aria-hidden="true"></i>
				</a>
			</div>
		</div>
	{/foreach}
	<br><br>
	<h4>Дополнительная информация</h4>
	<br>
	{include file="basket/orders__form_order.tpl" order_delivery_array=$order_delivery_array}
	<hr>
	<div class="row">
		<div class="col-3 offset-9">
			<button class="btn btn-success form-control" type="submit">Оформить заказ</button>
		</div>
	</div>
</form>
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
