<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$list*}
<div class="row">
	<div class="col">
		<h4>Товар</h4>
	</div>
</div>
<div class="row p-2">
	{for $foo=1 to 5}
	{foreach from=$list->get_array() item=v key=k}
		<div class="col-4 p-2">
			<div class="border border-success rounded p-2">
				<div class="row p-0 mx-0 my-2">
					<div class="col p-0">
						<a href="/shop/goods/{$v->ID}">
							<img class="border border-warning rounded" src="/img/logo-project.png" style="width: 100%; max-height: 250px;"/>
						</a>
					</div>
				</div>
				<div class="row p-0 m-2">
					<div class="col p-0">
						<a href="/shop/goods/{$v->ID}">{$v->TITLE}</a> ({$v->getKey()})
					</div>
				</div>
				<div class="row p-0 m-0">
					<div class="col-6 p-0 pt-2">
						<span class="p-2 bg-warning rounded">{$v->PRICE} руб.</span>
					</div>
					<div class="col-6 p-0 text-right">
						<span class="btn btn-success border">
							<i class="fa fa-shopping-basket" aria-hidden="true"></i>
						</span>
					</div>
				</div>
			</div>
		</div>
	{/foreach}
	{/for}
</div>
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
