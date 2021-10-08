<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$card*}
{$obj_page->addMenu()}

<div class="row">
	<div class="col-8 offset-2">
		<h4>{$card->TITLE}</h4>
		<br>
	</div>
</div>
<div class="row">
	<div class="col-8 offset-2">
		{include file="admin/goods/card/goods__form_edit.tpl" card=$card}
	</div>
</div>
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
