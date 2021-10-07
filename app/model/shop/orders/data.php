<?php
namespace app\model\shop\orders;

/**
 * @author Петухов Леонид <l.petuhov@okonti.ru>
 */
class data extends \RD_Obj_Data {



	/** */
	protected function setting() {
		$this->table_name   = 'orders';
	}



	private $_arr_status = [
		1 => ['title' => 'Новый',              'color' => 'bg-warning text-dark'],
		2 => ['title' => 'Оплачен',            'color' => 'bg-danger'],
		3 => ['title' => 'В обработке',        'color' => 'bg-info text-dark'],
		4 => ['title' => 'В сборке',           'color' => 'bg-primary'],
		5 => ['title' => 'Ожидает отправки',   'color' => 'bg-light text-dark border border-dark'],
		6 => ['title' => 'Отправлен',          'color' => 'bg-dark'],
		7 => ['title' => 'Доставлен',          'color' => 'bg-secondary'],
		8 => ['title' => 'Закрыт',             'color' => 'bg-success'],
		9 => ['title' => 'Отменён',            'color' => 'bg-success text-warning'],
	];

	/** Возвращает массив настроек для типов доставки */
	public function settingsStatus() {
		return $this->_arr_status;
	}



	private $_arr_delivery_type = [
		1 => ['title' => 'Самовывоз',   'icon' => '<i class="fa fa-building" aria-hidden="true"></i>'],
		2 => ['title' => 'Курьер',      'icon' => '<i class="fa fa-user" aria-hidden="true"></i>'],
		3 => ['title' => 'Доставка',    'icon' => '<i class="fa fa-truck" aria-hidden="true"></i>'],
	];

	/** Возвращает массив настроек для типов доставки */
	public function settingsDeliveryType() {
		return $this->_arr_delivery_type;
	}



	/** Возвращает список заказов пользователя */
	public function getOrdersListCustomerId(int $customer_id) {
		$sql = "SELECT :col: FROM :tab: WHERE customer_id = {$customer_id} AND orders_deleted IS NULL";
		$data = $this->select($sql);
		return $data;
	}



	/** Возвращает список заказов пользователя */
	public function getOrdersListSearchFilter(array $input) {
		$filter = [
			'orders_deleted IS NULL',
		];

		if (isset($input['number']) && $input['number']) {
			$filter[] = "id_orders = {$input['number']}";
		}
		if (isset($input['name']) && $input['name']) {
			$filter[] = "orders_customer_surname LIKE '%{$input['name']}%' OR orders_customer_name LIKE '%{$input['name']}%' OR orders_customer_middlename LIKE '%{$input['name']}%'";
		}
		if (isset($input['phone']) && $input['phone']) {
			$filter[] = "orders_customer_phone LIKE '%{$input['phone']}%'";
		}
		if (isset($input['address']) && $input['address']) {
			$filter[] = "orders_delivery_address LIKE '%{$input['address']}%'";
		}
		if (isset($input['created_date_from']) && $input['created_date_from']
				&& isset($input['created_date_to']) && $input['created_date_to']) {
			$filter[] = "orders_created BETWEEN '{$input['created_date_from']}' AND '{$input['created_date_to']}'";
		}
		if (isset($input['paymented_date_from']) && $input['paymented_date_from']
				&& isset($input['paymented_date_to']) && $input['paymented_date_to']) {
			$filter[] = "orders_paymented BETWEEN '{$input['paymented_date_from']}' AND '{$input['paymented_date_to']}'";
		}
		if (isset($input['status']) && $input['status']) {
			$str_status = \implode($input['status'], ',');
			$filter[] = "orders_status_id IN ({$str_status})";
		}

		$str_where = \implode($filter, ' AND ');
		$sql = "SELECT :col: FROM :tab: WHERE {$str_where}";
//print_info($sql);
		$data = $this->select($sql);
		return $data;
	}



/**/
}
