<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$leaf*}
{assign var="data" value=$leaf->getData()}
{assign var="items" value=$leaf->getLeafs()}

<input type="hidden" name="id[{$data->ID}]" value="{$data->ID}">
<div class="input-group py-1">
	<span class="input-group-text" style="width: 75px;">
		{$data->ID}
	</span>
	<label class="input-group-text text-center bg-warning" style="width: 50px;">
		<input class="form-check-input" type="checkbox" name="deleted[{$data->ID}]" value="1"  style="width: 100%; height: 100%;" {if $data->DELETED}checked="checked"{/if}>
	</label>
	<input class="form-control" type="text" name="title[{$data->ID}]" value="{$data->TITLE}">
	<input class="input-group-text bg-light" type="text" name="weight[{$data->ID}]" value="{$data->WEIGHT}" style="width: 75px;">
</div>

<div class="row">
	<div class="col offset-1 mt-2">
		{if $items}
			{foreach from=$items item=v key=k}
			{include file="admin/section/section__tree_leaf.tpl" leaf=$v}
			{/foreach}
		{/if}

		<div class="input-group py-1">
			<input type="hidden" name="id[new][]">
			<input type="hidden" name="parent[new][]" value="{$data->ID}">
			<span class="input-group-text" style="width: 75px;">
				<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;{$data->ID}
			</span>
			<label class="input-group-text bg-warning" style="width: 50px;">
{* }				<input class="form-check-input" type="checkbox" name="deleted[new][]" value="0">{ *}
			</label>
			<input class="form-control" type="text" name="title[new][]" value="">
			<input class="input-group-text bg-light" type="text" name="weight[new][]" value="0" style="width: 75px;">
		</div>

	</div>
</div>

<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
