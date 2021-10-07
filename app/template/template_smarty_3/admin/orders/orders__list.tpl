<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$list*}

{foreach from=$list->get_array() item=v key=k}
	<div class="row border-bottom p-0 py-2">
		<div class="col-1">
			<span class="badge {$v->STATUS_COLOR}">{$v->STATUS_TITLE}</span>
		</div>
		<div class="col">
			# {$v->ID}
		</div>
		<div class="col-1">
			<a href="/admin/orders/{$v->ID}">Подробности</a>
		</div>
		<div class="col-3 text-center">
			Создан: {$v->CREATED}
		</div>
		<div class="col-3">
			Оплачен: {$v->PAYMENTED}
		</div>
		<div class="col-2 text-end">
			{$v->AMOUNT|currency}
		</div>
	</div>
	<div class="row border-bottom p-0 py-2">
		<div class="col">
			{$v->SURNAME} {$v->NAME} {$v->MIDDLENAME}
		</div>
		<div class="col-2 text-end">
			{$v->PHONE|phone_a}
		</div>
		<div class="col-2 text-end">
			{$v->EMAIL|email_a}
		</div>
	</div>
	<div class="row border-bottom p-0 py-2">
		<div class="col-2">
			{$v->DELIVERY_ICON} {$v->DELIVERY_TYPE_TITLE}
		</div>
		<div class="col">
			{$v->DELIVERY_ADDRESS}
		</div>
	</div>
	<div class="row border-bottom p-0 py-2">
		<div class="col">
			{$v->COMMENT}
		</div>
	</div>
	<hr>
{/foreach}
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
