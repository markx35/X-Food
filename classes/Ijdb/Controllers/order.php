<?php
namespace Ijdb\Controllers;
use \Ninja\DatabaseTable;
use \Ninja\Authentication;

class order {
	private $authorsTable;
	private $ordersTable;

	public function __construct(DatabaseTable $ordersTable, DatabaseTable $authorsTable, Authentication $authentication) {
		$this->ordersTable = $ordersTable;
		$this->authorsTable = $authorsTable;
		$this->authentication = $authentication;
	}

	public function list() {
		$result = $this->ordersTable->findAll();

		$orders = [];
		foreach ($result as $order) {
			$author = $this->authorsTable->findById($order['authorId']);

			$orders[] = [
				'id' => $order['id'],
				'ordertext' => $order['ordertext'],
				'orderdate' => $order['orderdate'],
				'f_name' => $author['f_name'],
                //yxie - use firstname and lastname
                'l_name' => $author['l_name'],
                'email' => $author['email'],
				'authorId' => $author['id']
			];

		}
		$title = 'Order list';

		$totalorders = $this->ordersTable->total();

		$author = $this->authentication->getUser();

		return ['template' => 'orders.html.php', 
				'title' => $title, 
				'variables' => [
						'totalorders' => $totalorders,
						'orders' => $orders,
						'userId' => $author['id'] ?? null
					]
				];
	}

	public function home() {
		$title = 'X-Food';

		return ['template' => 'home.html.php', 'title' => $title];
	}
	public function order() {
		$title = 'order';

		return ['template' => 'menu.html.php', 'title' => $title];
	}
	public function checkout() {
		$title = 'Checkout';

		return ['template' => 'order.html.php', 'title' => $title];
	}


	public function delete() {

		$author = $this->authentication->getUser();

		$order = $this->ordersTable->findById($_POST['id']);

		if ($order['authorId'] != $author['id']) {
			return;
		}
		

		$this->ordersTable->delete($_POST['id']);
        //header('location: /order/list'); 5/25/18 JG DEL1L  org
		header('location: index.php?order/list');  // 5/25/18 JG NEW1L  		
	}

	public function saveEdit() {
		$author = $this->authentication->getUser();


		if (isset($_GET['id'])) {
			$order = $this->ordersTable->findById($_GET['id']);

			if ($order['authorId'] != $author['id']) {
				return;
			}
		}

		$order = $_POST['order'];
		//yxie ADD to get the timezone 
		date_default_timezone_set('America/Los_Angeles');
		$currentDateTime = date('Y-m-d H:i:s');
		$order['orderdate'] = $currentDateTime;
		$order['authorId'] = $author['id'];

		$this->ordersTable->save($order);
		//header('location: /order/list'); 5/25/18 JG DEL1L  org
		header('location: index.php?order/list');  //5/25/18 JG NEW1L  
		
	}

	public function edit() {
		$author = $this->authentication->getUser();

		if (isset($_GET['id'])) {
			$order = $this->ordersTable->findById($_GET['id']);
		}

		$title = 'Edit order';

		return ['template' => 'editorder.html.php',
				'title' => $title,
				'variables' => [
						'order' => $order ?? null,
						'userId' => $author['id'] ?? null
					]
				];
	}
	
}