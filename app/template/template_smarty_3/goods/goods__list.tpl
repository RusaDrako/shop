<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$list*}

<div class="row p-2">
	{foreach from=$list->get_array() item=v key=k}
		<div class="col-3 p-1 position-relative">
			<div class="border border-success m-0 h-100 p-2">
				<div class="row p-0 mx-0 my-2">
					<div class="col p-0 text-center">
						<a href="/goods/{$v->ID}" title="{$v->TITLE}">
							<img class="border border" src="{$v->IMG}" style="max-width: 100%; max-height: 200px;"/>
						</a>
					</div>
				</div>
				<div class="row p-0 m-2">
					<div class="col p-0" style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
						({$v->getKey()}) <a href="/goods/{$v->ID}" title="{$v->TITLE}">{$v->TITLE}</a>
					</div>
				</div>
				<div class="row p-0 m-0">
				{if $v->AVAILABLE}
					<div class="col p-0 py-2">
						<span class="p-2 bg-success text-light"><strong>{$v->COST|currency}</strong></span>
					</div>
					{if $v->DISCOUNT}
{* }						<div class="col p-0 py-2">
							<span class="p-2 border border-danger text-sm" title="Старая цена">{$v->PRICE|currency}</span>
						</div>{ *}
						<div class="position-absolute top-0 end-0 bg-danger text-light text-center m-2" style="width: 75px;">
							<strong>- {$v->DISCOUNT} %</strong>
						</div>
					{/if}
					<div class="col-2 p-0 text-end">
						<a class="btn btn-success" href="/basket/add/{$v->ID}">
							<i class="fa fa-plus" aria-hidden="true"></i>
						</a>
					</div>
				{else}
					<div class="col p-0 py-2 text-center bg-danger text-light">
						<span class="p-2">Товар отсутствует</span>
					</div>
				{/if}
				</div>
			</div>
		</div>
	{/foreach}
</div>
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
