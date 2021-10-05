<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$order_delivery_array*}
<div class="row">
	<div class="col-4 p-1">
		<div class="form-floating">
			<input class="form-control" id="floatingSurname" type="text" name="surname" value="" placeholder="Фамилия">
			<label for="floatingSurname">Фамилия</label>
		</div>
	</div>
	<div class="col-4 p-1">
		<div class="form-floating">
			<input class="form-control" id="floatingName" type="text" name="name" value="" placeholder="Имя">
			<label for="floatingName">Имя</label>
		</div>
	</div>
	<div class="col-4 p-1">
		<div class="form-floating">
			<input class="form-control" id="floatingMiddlename" type="text" name="middlename" value="" placeholder="Отчество">
			<label for="floatingMiddlename">Отчество</label>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-6 p-1">
		<div class="form-floating">
			<input class="form-control" id="floatingPhone" type="text" name="phone" value="" placeholder="Телефон">
			<label for="floatingPhone">Телефон</label>
		</div>
	</div>
	<div class="col-6 p-1">
		<div class="form-floating">
			<input class="form-control" id="floatingEmail" type="text" name="email" value="" placeholder="Email">
			<label for="floatingEmail">Email</label>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-3 p-1">
		<div class="form-floating">
			<select class="form-control" id="floatingDelivery" name="delivery_type" placeholder="Доставка">
				{foreach from=$order_delivery_array item=v key=k}
				<option value="{$k}">{$v.title}</option>
				{/foreach}
			</select>
			<label for="floatingDelivery">Доставка</label>
		</div>
	</div>
	<div class="col p-1">
		<div class="form-floating">
			<textarea class="form-control" id="floatingAddress" name="address" placeholder="Комментарий"></textarea>
			<label for="floatingAddress">Адрес</label>
		</div>
	</div>
</div>
<div class="row">
	<div class="col p-1">
		<div class="form-floating">
			<textarea class="form-control" id="floatingComment" name="comment" placeholder="Комментарий"></textarea>
			<label for="floatingComment">Комментарий</label>
		</div>
	</div>
</div>
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
