<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$list*}
<div class="row">
	<div class="col">
		<h4>Корзина</h4>
	</div>
</div>
{foreach from=$list->get_array() item=v key=k}
{assign var="goods_item" value=$v->getAssociatedGoodsItem()}
	<div class="row border border-success mb-2">
		<div class="col-1 px-2 py-2">
			{$k+1}
		</div>
		<div class="col-1 px-0 py-1">
			<a href="/goods/{$goods_item->ID}">
				<img class="border border-warning" src="{$goods_item->IMG}" style="max-width: 100%; max-height: 60px;"/>
			</a>
		</div>
		<div class="col py-2">
			<a href="/goods/{$goods_item->ID}">{$goods_item->TITLE}</a> ({$goods_item->getKey()})
		</div>
		<div class="col-2 pt-2 text-center">
			{$goods_item->COST} руб.
		</div>
		{if $goods_item->AVAILABLE}
			<div class="col-2 px-1 py-2 text-center">
				<a class="btn btn-success" href="/basket/remove/{$goods_item->ID}/1">
					<i class="fa fa-minus" aria-hidden="true"></i>
				</a>
				<span class="border border-success py-1 px-2">
					{$v->QUANTITY}
				</span>
				<a class="btn btn-success" href="/basket/add/{$goods_item->ID}/1">
					<i class="fa fa-plus" aria-hidden="true"></i>
				</a>
			</div>
			<div class="col-2 pt-2 text-center bg-warning">
				{$v->COST} руб.
			</div>
		{else}
			<div class="col-4 pt-2 text-center bg-danger">
				Товар отсутствует
			</div>
		{/if}
	</div>
{/foreach}
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->