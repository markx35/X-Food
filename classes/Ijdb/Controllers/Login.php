<?php
namespace Ijdb\Controllers;

class Login {
	private $authentication;
    //05-12-22 yxie initial authentication 
	public function __construct(\Ninja\Authentication $authentication) {
		$this->authentication = $authentication;
	}
    //05-12-22 yxie back to login page and change the title to log in
	public function loginForm() {
		return ['template' => 'login.html.php', 'title' => 'Log In'];
	}
	public function processLogin() {
		   //05-12-22 yxie if the authentication is valid change the header
		if ($this->authentication->login($_POST['email'], $_POST['password'])) {
			//header('Location: /login/success'); //5/25/18 JG DEL1L  org
            header('Location: index.php?login/success'); //5/25/18 JG NEW1L  
			
		}
		else {
			   //05-12-22 yxie error handling
			return ['template' => 'login.html.php',
					'title' => 'Log In',
					'variables' => [
							'error' => 'Invalid username/password.'
						]
					];
		}
	}
       //05-12-22 yxie create a output for success logoin
	public function success() {
		return ['template' => 'loginsuccess.html.php', 'title' => 'Login Successful'];
	}
     //05-12-22 yxie create a output for error logoin
	public function error() {
		return ['template' => 'loginerror.html.php', 'title' => 'You are not logged in'];
	}
    //05-12-22 yxie create a logout function to reset the info 
	//and delete then go to logout page
	public function logout() {
	    unset($_SESSION);  //5/26/18 JG org DEL1l - it doesn't delete all session info
		session_destroy(); //5/26/18 JG NEW1l  to kill all session information
		return ['template' => 'logout.html.php', 'title' => 'You have been logged out'];
	}
}
