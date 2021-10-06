<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$list*}
<h4>Разделы управления</h4>
<div class="row p-2">
	<div class="col p-1">
	{foreach from=$list item=v key=k}
		<a class="btn btn-primary btn-block m-1" href="{$v.link}">{$v.title}</a>
	{/foreach}
	</div>
</div>
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
