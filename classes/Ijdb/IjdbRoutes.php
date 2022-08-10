<?php
namespace Ijdb;

class IjdbRoutes implements \Ninja\Routes {
	private $authorsTable;
	private $ordersTable;
	private $authentication;

	public function __construct() {
		include __DIR__ . '/../../includes/DatabaseConnection.php';
		//05-12-22 yxie initiallize ordertable, authortable, authentication
		$this->ordersTable = new \Ninja\DatabaseTable($pdo, 'order', 'id');
		$this->authorsTable = new \Ninja\DatabaseTable($pdo, 'author', 'id');
		$this->authentication = new \Ninja\Authentication($this->authorsTable, 'email', 'password');
	}

	public function getRoutes(): array {
		//05-12-22 yxie initiallize orderController, authorController, and loginController
		$orderController = new \Ijdb\Controllers\order($this->ordersTable, $this->authorsTable, $this->authentication);
		$authorController = new \Ijdb\Controllers\Register($this->authorsTable);
		$loginController = new \Ijdb\Controllers\Login($this->authentication);
		//05-12-22 yxie create a routes array
		$routes = [
		//05-12-22 yxie setup the routes array with path
			'author/register' => [
				'GET' => [
					'controller' => $authorController,
					'action' => 'registrationForm'
				],
				'POST' => [
					'controller' => $authorController,
					'action' => 'registerUser'
				]
			],
			'author/success' => [
				'GET' => [
					'controller' => $authorController,
					'action' => 'success'
				]
			],
			'order/edit' => [
				'POST' => [
					'controller' => $orderController,
					'action' => 'saveEdit'
				],
				'GET' => [
					'controller' => $orderController,
					'action' => 'edit'
				],
				'login' => true
				
			],
			'order/delete' => [
				'POST' => [
					'controller' => $orderController,
					'action' => 'delete'
				],
				'login' => true
			],
			'order/list' => [
				'GET' => [
					'controller' => $orderController,
					'action' => 'list'
				]
			],
			//05-25-2022 yxie new route for order 
			'order/order' => [
				'GET' => [
					'controller' => $orderController,
					'action' => 'order'
				]
			],
			'order/checkout' => [
				'POST' => [
					'controller' => $orderController,
					'action' => 'saveorder'
				],
				'GET' => [
					'controller' => $orderController,
					'action' => 'checkout'
				],
				'login' => true
			],
			'login/error' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'error'
				]
			],
			'login/success' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'success'
				]
			],
			'logout' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'logout'
				]
			],
			'login' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'loginForm'
				],
				'POST' => [
					'controller' => $loginController,
					'action' => 'processLogin'
				]
			],
			'' => [
				'GET' => [
					'controller' => $orderController,
					'action' => 'home'
				]
			]
		];

		return $routes;
	}

	public function getAuthentication(): \Ninja\Authentication {
		return $this->authentication;
	}

}