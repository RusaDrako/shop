<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$list*}
{foreach from=$list->get_array() item=v key=k}
	<div class="row border-top border-dark">
		<div class="col-1 px-2 py-2">
			{$k+1}
		</div>
		<div class="col px-0 py-1">
			<a href="/goods/{$v->GOODS_ID}">
				{$v->TITLE} ({$v->getKey()})
			</a>
		</div>
		<div class="col-1 p-0 pt-2 text-center">
			{$v->PRICE} руб.
		</div>
		<div class="col-1 p-0 pt-2 text-center">
			{$v->DISCOUNT} %
		</div>
		<div class="col-1 p-0 pt-2 text-center">
			{$v->QUANTITY} шт.
		</div>
		<div class="col-1 p-0 pt-2 text-center">
			{$v->AMOUNT} руб.
		</div>
	</div>
{/foreach}
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
