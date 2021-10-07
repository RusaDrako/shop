<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$list*}
{*print_info data=$status_arr*}
<form method="post" action="/admin/goods">
	<div class="row my-2">
		<div class="col-2">
			<div class="input-group">
				<span class="input-group-text">
					ID
				</span>
				<input class="form-control" type="text" name="id" value="{$input.id}">
			</div>
		</div>
		<div class="col">
			<div class="input-group">
				<span class="input-group-text">
					Наименование
				</span>
				<input class="form-control" type="text" name="title" value="{$input.title}">
			</div>
		</div>
		<div class="col-2">
			<button class="form-control btn btn-success">
				<i class="fa fa-search" aria-hidden="true"></i>
 				Найти
			</button>
		</div>
	</div>
</form>
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
