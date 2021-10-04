<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$order_delivery_array*}
<div class="row">
	<div class="col-4 p-1">
		<input class="form-control" type="text" name="surname" value="" placeholder="Фамилия">
	</div>
	<div class="col-4 p-1">
		<input class="form-control" type="text" name="name" value="" placeholder="Имя">
	</div>
	<div class="col-4 p-1">
		<input class="form-control" type="text" name="middlename" value="" placeholder="Отчество">
	</div>
</div>
<div class="row">
	<div class="col-6 p-1">
		<input class="form-control" type="text" name="phone" value="" placeholder="Телефон">
	</div>
	<div class="col-6 p-1">
		<input class="form-control" type="text" name="email" value="" placeholder="Email">
	</div>
</div>
<div class="row">
	<div class="col-2 p-1">
		<select class="form-control" name="delivery_type" placeholder="Доставка">
			{foreach from=$order_delivery_array item=v key=k}
			<option value="{$k}">{$v.title}</option>
			{/foreach}
		</select>
	</div>
	<div class="col-10 p-1">
		<textarea class="form-control" name="address" placeholder="Адрес"></textarea>
	</div>
</div>
<div class="row">
	<div class="col p-1">
		<textarea class="form-control" name="comment" placeholder="Комментарий"></textarea>
	</div>
</div>
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
