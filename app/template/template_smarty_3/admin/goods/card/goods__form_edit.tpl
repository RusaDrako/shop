<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$card*}
<form method="post" action="/admin/goods/save" enctype="multipart/form-data">
	<input type="hidden" name="id" value="{$card->ID}" />
	<div class="row">
		<div class="col-1 py-1 text-end">
			<strong>ID:</strong>
		</div>
		<div class="col-2 py-1">
			{$card->ID}
		</div>
		<div class="col-2 py-1 text-end">
			<strong>Цена:</strong>
		</div>
		<div class="col-3 py-1">
			{$card->COST|currency}
		</div>
		<div class="col-2 py-1 text-end">
			<strong>Доступен:</strong>
		</div>
		<div class="col-2 py-1">
			{if $card->AVAILABLE}ДА{else}НЕТ{/if}
		</div>
	</div>
	<div class="row">
		<div class="col py-1">
			<div class="input-group">
				<span class="input-group-text" style="width:150px;">Заголовок</span>
				<input class="form-control" type="text" name="title" value="{$card->TITLE}"/>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col py-2 text-center">
			<a href="{$card->IMG_URL}" target="_blank">
				<img class="border border-warning" src="{$card->IMG_URL}" style="max-width:100%;max-height:300px;">
			</a>
			<br><br>
			<input class="form-control" type="file" name="image" accept="image/jpeg">
		</div>
	</div>
	<div class="row">
		<div class="col-6 py-1">
			<div class="input-group">
				<span class="input-group-text" style="width:150px;">Стоймость</span>
				<input class="form-control" type="text" name="price" value="{$card->PRICE}" />
				<span class="input-group-text" style="width:50px;">₽</span>
			</div>
		</div>
		<div class="col py-1">
			<div class="input-group">
				<span class="input-group-text" style="width:150px;">Скидка</span>
				<input class="form-control" type="text" name="discount" value="{$card->DISCOUNT}" />
				<span class="input-group-text" style="width:50px;">%</span>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col py-1">
			<div class="input-group">
				<span class="input-group-text" style="width:150px;">Количество</span>
				<input class="form-control" type="text" name="available_quantity" value="{if $card->AVAILABLE_QUANTITY == -1}0{else}{$card->AVAILABLE_QUANTITY}{/if}" />
				<span class="input-group-text" style="width:50px;">шт</span>
				<label class="input-group-text">
					<input type="checkbox" name="available_quantity_unlimited" value="1" {if $card->AVAILABLE_QUANTITY == -1}checked="checked"{/if} />&nbsp;
					Неограничено
				</label>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col py-1">
		</div>
		<div class="input-group">
			<span class="input-group-text" style="width:150px;">Описание</span>
			<textarea class="form-control" name="description" style="min-height:200px;">{$card->DESCRIPTION}</textarea>
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-6 offset-3">
			<button class="btn btn-success form-control" type="submit">Сохранить</button>
		</div>
	</div>
</form>
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
