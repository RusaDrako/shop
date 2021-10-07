<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$card*}
<div class="row mb-2">
	<div class="col-2 py-1">
		<strong>ID {$card->ID}</strong>
	</div>
	<div class="col py-1 text-end">
		<span class="badge {$card->STATUS_COLOR}">{$card->STATUS_TITLE}</span>
	</div>
</div>
<div class="row mb-2">
	<div class="col-2 py-1">
		<strong>Сумма:</strong>
	</div>
	<div class="col-2 py-1">
		{$card->AMOUNT|currency}
	</div>
	<div class="col-1 py-1">
		<strong>Оплачен:</strong>
	</div>
	<div class="col-3 py-1">
		{$card->PAYMENTED}
	</div>
	<div class="col-1 py-1">
		<strong>Создан:</strong>
	</div>
	<div class="col-3 py-1">
		{$card->CREATED}
	</div>
</div>
<div class="row mb-2">
	<div class="col-2 py-1">
		<strong>ФИО:</strong>
	</div>
	<div class="col-2 py-1">
		{$card->SURNAME} {$card->NAME} {$card->MIDDLENAME}
	</div>
	<div class="col-1 py-1">
		<strong>Телефон:</strong>
	</div>
	<div class="col-3 py-1">
		{$card->PHONE|phone}
	</div>
	<div class="col-1 py-1">
		<strong>Email:</strong>
	</div>
	<div class="col-3 py-1">
		{$card->EMAIL|email_a}
	</div>
</div>
<div class="row mb-2">
	<div class="col-2 py-1">
		<strong>Доставка:</strong>
	</div>
	<div class="col-2 py-1">
		{$card->DELIVERY_TYPE_TITLE}
	</div>
	<div class="col-1 py-1">
		<strong>Адрес:</strong>
	</div>
	<div class="col-7 py-1">
		{$card->DELIVERY_ADDRESS}
	</div>
</div>
{if $card->COMMENT}
	<div class="row mb-2">
		<div class="col-2 py-1">
			<strong>Комментарий:</strong>
		</div>
		<div class="col py-1">
			{$card->COMMENT}
		</div>
	</div>
{/if}
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
