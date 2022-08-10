<?php
namespace Ijdb\Controllers;
use \Ninja\DatabaseTable;
use \Ninja\Authentication;

class joke {
	private $authorsTable;
	private $jokesTable;

	public function __construct(DatabaseTable $jokesTable, DatabaseTable $authorsTable, Authentication $authentication) {
		$this->jokesTable = $jokesTable;
		$this->authorsTable = $authorsTable;
		$this->authentication = $authentication;
	}

	public function list() {
		$result = $this->jokesTable->findAll();

		$jokes = [];
		foreach ($result as $joke) {
			$author = $this->authorsTable->findById($joke['authorId']);

			$jokes[] = [
				'id' => $joke['id'],
				'joketext' => $joke['joketext'],
				'jokedate' => $joke['jokedate'],
				'f_name' => $author['f_name'],
                //yxie - use firstname and lastname
                'l_name' => $author['l_name'],
                'email' => $author['email'],
				'authorId' => $author['id']
			];

		}
		$title = 'Order list';

		$totaljokes = $this->jokesTable->total();

		$author = $this->authentication->getUser();

		return ['template' => 'jokes.html.php', 
				'title' => $title, 
				'variables' => [
						'totaljokes' => $totaljokes,
						'jokes' => $jokes,
						'userId' => $author['id'] ?? null
					]
				];
	}

	public function home() {
		$title = 'X-Food';

		return ['template' => 'home.html.php', 'title' => $title];
	}
	public function joke() {
		$title = 'joke';

		return ['template' => 'menu.html.php', 'title' => $title];
	}
	public function checkout() {
		$title = 'Checkout';

		return ['template' => 'joke.html.php', 'title' => $title];
	}


	public function delete() {

		$author = $this->authentication->getUser();

		$joke = $this->jokesTable->findById($_POST['id']);

		if ($joke['authorId'] != $author['id']) {
			return;
		}
		

		$this->jokesTable->delete($_POST['id']);
        //header('location: /joke/list'); 5/25/18 JG DEL1L  org
		header('location: index.php?joke/list');  // 5/25/18 JG NEW1L  		
	}

	public function saveEdit() {
		$author = $this->authentication->getUser();


		if (isset($_GET['id'])) {
			$joke = $this->jokesTable->findById($_GET['id']);

			if ($joke['authorId'] != $author['id']) {
				return;
			}
		}

		$joke = $_POST['joke'];
		//yxie ADD to get the timezone 
		date_default_timezone_set('America/Los_Angeles');
		$currentDateTime = date('Y-m-d H:i:s');
		$joke['jokedate'] = $currentDateTime;
		$joke['authorId'] = $author['id'];

		$this->jokesTable->save($joke);
		//header('location: /joke/list'); 5/25/18 JG DEL1L  org
		header('location: index.php?joke/list');  //5/25/18 JG NEW1L  
		
	}

	public function edit() {
		$author = $this->authentication->getUser();

		if (isset($_GET['id'])) {
			$joke = $this->jokesTable->findById($_GET['id']);
		}

		$title = 'Edit joke';

		return ['template' => 'editjoke.html.php',
				'title' => $title,
				'variables' => [
						'joke' => $joke ?? null,
						'userId' => $author['id'] ?? null
					]
				];
	}
	
}