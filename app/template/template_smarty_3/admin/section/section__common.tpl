<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$list*}
<h4>Разделы</h4>

<form action="/admin/section/save">
	<div class="row p-2">
		<div class="col p-1">
		{foreach from=$list item=v key=k}
			{include file="admin/section/section__tree_leaf.tpl" leaf=$v}
		{/foreach}
		</div>
	</div>
	<div class="row">
		<div class="col-3 offset-9">
			<button class="btn btn-success form-control" type="submit">Сохранить</button>
		</div>
	</div>
</form>
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
