<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{if $type == 'danger'}
	{assign var="alert_class" value='alert-danger'}
	{assign var="alert_icon" value='fa fa-ban'}
	{assign var="alert_title" value='Внимание!'}
{elseif $type == 'warning'}
	{assign var="alert_class" value='alert-warning'}
	{assign var="alert_icon" value='fa fa-exclamation-triangle'}
	{assign var="alert_title" value='Внимание!'}
{elseif $type == 'success'}
	{assign var="alert_class" value='alert-success'}
	{assign var="alert_icon" value='fa fa-check'}
	{assign var="alert_title" value='Внимание!'}
{else}
	{assign var="alert_class" value='alert-info'}
	{assign var="alert_icon" value='fa fa-info'}
	{assign var="alert_title" value='Внимание!'}
{/if}
<div class="alert {$alert_class}">
	<div class="row">
		<div class="col">
			<h5><i class="icon {$alert_icon}"></i> {$alert_title}</h5>
		</div>
		<div class="col-2 text-end">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	</div>
	{$text}
</div>
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
