<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$card*}
<div class="row mb-2">
	<div class="col-2 py-1 text-end">
		<strong>ID</strong>
	</div>
	<div class="col py-1">
		{$card->ID}
	</div>
</div>
<div class="row mb-2">
	<div class="col-2 py-1 text-end">
		<strong>Статус</strong>
	</div>
	<div class="col py-1">
		<span class="badge {$card->STATUS_COLOR}">{$card->STATUS_TITLE}</span>
	</div>
</div>
<div class="row mb-2">
	<div class="col-2 py-1 text-end">
		<strong>Сумма:</strong>
	</div>
	<div class="col py-1">
		{$card->AMOUNT|currency}
	</div>
</div>
<div class="row mb-2">
	<div class="col-2 py-1 text-end">
		<strong>Создан:</strong>
	</div>
	<div class="col py-1">
		{$card->CREATED}
	</div>
</div>
<div class="row mb-2">
	<div class="col-2 py-1 text-end">
		<strong>Оплачен:</strong>
	</div>
	<div class="col py-1">
		{$card->PAYMENTED}
	</div>
</div>
<div class="row mb-2">
	<div class="col-2 py-1 text-end">
		<strong>ФИО:</strong>
	</div>
	<div class="col py-1">
		{$card->SURNAME} {$card->NAME} {$card->MIDDLENAME}
	</div>
</div>
<div class="row mb-2">
	<div class="col-2 py-1 text-end">
		<strong>Телефон:</strong>
	</div>
	<div class="col py-1">
		{$card->PHONE|phone}
	</div>
</div>
<div class="row mb-2">
	<div class="col-2 py-1 text-end">
		<strong>Email:</strong>
	</div>
	<div class="col py-1">
		{$card->EMAIL|email_a}
	</div>
</div>
<div class="row mb-2">
	<div class="col-2 py-1 text-end">
		<strong>Доставка:</strong>
	</div>
	<div class="col py-1">
		{$card->DELIVERY_TYPE_TITLE}
	</div>
</div>
<div class="row mb-2">
	<div class="col-2 py-1 text-end">
		<strong>Адрес:</strong>
	</div>
	<div class="col py-1">
		{$card->DELIVERY_ADDRESS}
	</div>
</div>
<div class="row mb-2">
	<div class="col-2 py-1 text-end">
		<strong>Комментарий клиента:</strong>
	</div>
	<div class="col py-1">
		{$card->COMMENT}
	</div>
</div>
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
