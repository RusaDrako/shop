<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{print_info data=$list}
<div class="row">
	<div class="col">
		<h4>Товар</h4>
	</div>
</div>
<div class="row p-2">
	{for $foo=1 to 5}
	{foreach from=$list->get_array() item=v key=k}
		<div class="col-3 p-1">
			<div class="border border-success m-0 h-100">
				<div class="row p-0 mx-0 my-2">
					<div class="col p-0 text-center">
						<a href="/shop/goods/{$v->ID}">
							<img class="border border-warning" src="{$v->IMG}" style="max-width: 100%; max-height: 200px;"/>
						</a>
					</div>
				</div>
				<div class="row p-0 m-2">
					<div class="col p-0">
						({$v->getKey()}) <a href="/shop/goods/{$v->ID}">{$v->TITLE}</a>
					</div>
				</div>
				<div class="row p-0 m-0">
				{if $v->AVAILABLE}
					<div class="col p-0 py-2">
						<span class="p-2 bg-warning">{$v->COST} руб.</span>
					</div>
					<div class="col-4 p-0 text-right">
						<span class="btn btn-success">
							<i class="fa fa-shopping-basket" aria-hidden="true"></i>
						</span>
					</div>
				{else}
					<div class="col p-0 py-2 text-center bg-danger">
						<span class="p-2">Товар отсутствует</span>
					</div>
				{/if}
				</div>
			</div>
		</div>
	{/foreach}
	{/for}
</div>
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
