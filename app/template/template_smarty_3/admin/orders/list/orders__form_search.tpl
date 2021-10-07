<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$list*}
{*print_info data=$status_arr*}
<form method="post" action="/admin/orders">
	<div class="row my-2">
		<div class="col-3">
			<div class="input-group">
				<span class="input-group-text">
					ID
				</span>
				<input class="form-control" type="text" name="id" value="{$input.id}">
			</div>
		</div>
		<div class="col-3">
			<div class="input-group">
				<span class="input-group-text">
					ФИО
				</span>
				<input class="form-control" type="text" name="name" value="{$input.name}">
			</div>
		</div>
		<div class="col-3">
			<div class="input-group">
				<span class="input-group-text">
					Адрес
				</span>
				<input class="form-control" type="text" name="address" value="{$input.address}">
			</div>
		</div>
		<div class="col-3">
			<div class="input-group">
				<span class="input-group-text">
					Телефон
				</span>
				<input class="form-control" type="text" name="phone" value="{$input.phone}">
			</div>
		</div>
	</div>
	<div class="row my-2">
		<div class="col-6">
			<div class="input-group">
				<span class="input-group-text">
					Создан с
				</span>
				<input class="form-control" type="date" name="created_date_from" value="{$input.created_date_from}">
				<span class="input-group-text">
					до
				</span>
				<input class="form-control" type="date" name="created_date_to" value="{$input.created_date_to}">
			</div>
		</div>
		<div class="col-6">
			<div class="input-group">
				<span class="input-group-text">
					Оплачен с
				</span>
				<input class="form-control" type="date" name="paymented_date_from" value="{$input.paymented_date_from}">
				<span class="input-group-text">
					до
				</span>
				<input class="form-control" type="date" name="paymented_date_to" value="{$input.paymented_date_to}">
			</div>
		</div>
	</div>
	<div class="row my-2">
		{foreach from=$status_arr item=v key=k}
		<div class="col">
			<label class="form-control badge {$v.color}">
				<input type="checkbox" name="status[]" value="{$k}" {if in_array($k, $input['status'])}checked="checked"{/if}> {$v.title}
			</label>
		</div>
		{/foreach}
	</div>
	<div class="row my-2">
		<div class="col-4">
			<button class="form-control btn btn-success">
				<i class="fa fa-search" aria-hidden="true"></i>
 				Найти
			</button>
		</div>
	</div>
</form>
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
