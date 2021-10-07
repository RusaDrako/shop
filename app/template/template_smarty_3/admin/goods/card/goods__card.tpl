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
		<strong>Заголовок</strong>
	</div>
	<div class="col py-1">
		{$card->TITLE}
	</div>
</div>
<div class="row mb-2">
	<div class="col-2 py-1 text-end">
		<strong>Стоймость:</strong>
	</div>
	<div class="col py-1">
		{$card->PRICE|currency}
	</div>
</div>
<div class="row mb-2">
	<div class="col-2 py-1 text-end">
		<strong>Скидка:</strong>
	</div>
	<div class="col py-1">
		{$card->DISCOUNT} %
	</div>
</div>
<div class="row mb-2">
	<div class="col-2 py-1 text-end">
		<strong>Цена:</strong>
	</div>
	<div class="col py-1">
		{$card->COST|currency}
	</div>
</div>
<div class="row mb-2">
	<div class="col-2 py-1 text-end">
		<strong>Доступен:</strong>
	</div>
	<div class="col py-1">
		{if $card->AVAILABLE}ДА{else}НЕТ{/if}
	</div>
</div>
<div class="row mb-2">
	<div class="col-2 py-1 text-end">
		<strong>Количество:</strong>
	</div>
	<div class="col py-1">
		{if $card->AVAILABLE_QUANTITY == -1}
			Не ограничено
		{else}
			{$card->AVAILABLE_QUANTITY} шт
		{/if}
	</div>
</div>
<div class="row mb-2">
	<div class="col-2 py-1 text-end">
		<strong>Описание:</strong>
	</div>
	<div class="col py-1">
		{$card->DESCRIPTION}
	</div>
</div>
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
