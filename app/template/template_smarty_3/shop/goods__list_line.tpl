<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$list*}
<div class="row">
	<div class="col">
		<h4>Товар</h4>
	</div>
</div>
{foreach from=$list->get_array() item=v key=k}
<div class="row border-bottom p-2">
	<div class="col-2">
		<a href="shop/goods/{$v->ID}">{$v->TITLE}</a> ({$v->getKey()})
	</div>
	<div class="col p-0">
		{$v->DESCRIPTION}
	</div>
	<div class="col-2 p-0">
		{$v->CREATED}
	</div>
	<div class="col-2 p-0">
		Добавить
	</div>
</div>
{/foreach}
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
