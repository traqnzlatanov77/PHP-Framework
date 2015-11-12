<?php

abstract class BaseController {
	protected $controller_name;
	protected $layout_name = DEFAULT_LAYOUT_NAME;
	protected $is_view_rendered = false;
	protected $is_post = false;
	protected $isLoggedIn;
	protected $validationErrors;

	function __construct($controller_name) {
		$this->controller_name = $controller_name;
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->is_post = true;
		}

		if (isset($_SESSION['username'])) {
			$this->isLoggedIn = true;
		}

		$this->onInit();
	}

	public function onInit() {
		$this->title = 'Home';
		// Implement initialization logic in the subclasses
	}

	public function index() {
		// Implement the default action in subclassess
	}

	public function render_view($view_name = "index", $include_layout = true) {
		if (!$this->is_view_rendered) {
			if ($include_layout) {
				$header_file = 'views/layouts/'. $this->layout_name . '/header.php';
				include_once($header_file);
			}
			$view_file_name = 'views/' . $this->controller_name.'/'. $view_name.'.php';
			include_once($view_file_name);
			if ($include_layout) {
				$footer_file = 'views/layouts/' . $this->layout_name . '/footer.php';
				include_once($footer_file);
			}
			
			$this->is_view_rendered = true;
		}
	}

	public function redirectToUrl($url) {
		header("Location: " . $url);
		die;
	}

	public function redirect($controller_name, $action_name = null, $params = null) {
		$url = '/' . urlencode($controller_name);

		if ($action_name != null) {
			$url .= '/' . urldecode($action_name);
		}

		if ($params != null) {
			$encoded_params = array_map('urlencode', $params);
			$url .= implode('/', $encoded_params);
		}

		$this->redirectToUrl($url);
	}

	public function authorize() {
		if (!$this->isLoggedIn) {
			$this->addErrorMessage("Please login");
			$this->redirect("account", "login");
		}
	}

	public function addValidationError($field, $message) {
		$this->validationErrors[$field] = $message;
	}

	public function getValidationError($field) {
		return $this->validationErrors[$field];
	}

	function addMessage($msg, $type) {
		if (!isset($_SESSION['messages'])) {
			$_SESSION['messages'] = array();
		}

		array_push($_SESSION['messages'], 
			array('text' => $msg, 'type' => $type));
	}

	function addInfoMessage($msg) {
		$this->addMessage($msg, 'info');
	}

	function addErrorMessage($msg) {
		$this->addMessage($msg, 'error');
	}
}