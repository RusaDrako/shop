<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{print_info data=$card}
<div class="row">
	<div class="col">
		<h4>{$card->TITLE} ({$card->getKey()})</h4>
	</div>
	<div class="col-1 text-right">

		<a class="btn btn-default" href="/project/task/new/{$project_id}">
			123<i class="fa fa-plus"></i>
		</a>
	</div>
</div>

<div class="row border-bottom p-2">

	<div class="col p-0">
		{$card->DESCRIPTION}
	</div>
	<div class="col-2 p-0">
		{$card->CREATED}
	</div>
</div>
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
