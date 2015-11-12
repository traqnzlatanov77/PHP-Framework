<?php

class AccountController extends BaseController {
	private $db;

	public function onInit() {
		$this->title = 'Account';
		$this->db = new AccountModel();
	}

	public function register() {
		if ($this->is_post) {
			$username = $_POST['username'];
			if ($username == null || strlen($username) < 3) {
				$this->addErrorMessage('Username is invalid');
				$this->redirect("account", "register");
			}

			$password = $_POST['password'];
			$email = $_POST['email'];
			$isRegistered = $this->db->register($username, $password, $email);
			if ($isRegistered) {
				$_SESSION['username'] = $username;
				$this->addInfoMessage("Successfull registration");
				$this->redirect("authors", "index");
			} else {
				$this->addErrorMessage('User cannot be created');
			}
			
		}

		$this->render_view(__FUNCTION__);
	}

	public function login() {
		if ($this->is_post) {
			$username = $_POST['username'];
			$password = $_POST['password'];

			$isLoggedIn = $this->db->login($username, $password);
			if ($isLoggedIn) {
				$_SESSION['username'] = $username;
				$this->addInfoMessage("Successfull login");
				return $this->redirect("authors", "index");
			} else {
				$this->addErrorMessage("Login failed");
			}
		}

		$this->render_view(__FUNCTION__);
	}

	public function logout() {
		$this->authorize();
		
		unset($_SESSION['username']);
		$this->addInfoMessage("Logout successfull");
		$this->redirectToUrl('/');
	}
}