<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$card*}
{*print_info data=$goods_list*}
{*print_info data=$section_list*}
{*print_info data=$section_array*}

{include file="section/section__parent.tpl" array=$section_array}
<hr>
{if $section_list->count()}
<h4>Подразделы</h4>
{include file="section/section__list.tpl" list=$section_list}
<hr>
{/if}
<h4>Товары</h4>
{include file="goods/goods__list.tpl" list=$goods_list}

<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
