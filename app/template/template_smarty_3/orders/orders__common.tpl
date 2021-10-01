<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} -->
{*print_info data=$card*}

<h4>Заказ</h4>
{include file="orders/orders__card.tpl" card=$card}

<h4>Позиции</h4>
{include file="orders/item__list.tpl" list=$card->getAssociatedItemList()}
<!-- {"`$smarty.current_dir`/`$smarty.template`"|tmp_dir} end -->
