<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{print_info data=$card}
<div class="row">
	<div class="col">
		<h4>{$card->TITLE} ({$card->getKey()})</h4>
	</div>
	{if $card->AVAILABLE}
		<div class="col-2">
			<h4><b>{$card->COST} руб.</b></h4>
		</div>
		<div class="col-1 text-right">
			<a class="btn btn-success" href="/basket/add/{$card->ID}/">
				<i class="fa fa-plus"></i>
			</a>
		</div>
	{else}
		<div class="col-3 p-0 py-2 text-center bg-danger">
			<span class="p-2">Товар отсутствует</span>
		</div>
	{/if}
</div>

<div class="row p-2">
	<div class="col-5 p-0 border text-center" style="background: #fff">
		<img class="border border-warning" src="{$card->IMG}" style="max-width: 100%; max-height: 100%;"/>
	</div>
	<div class="col">
		{$card->DESCRIPTION}
	</div>
</div>
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
