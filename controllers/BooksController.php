<?php

class BooksController extends BaseController {
	private $db;

	public function onInit () {
		$this->title = 'Books';
		$this->db = new BooksModel();
	}

	public function index () {
		$this->authorize();
		$this->authorize();		
		$this->render_view();
	}

	public function showBooks() {		
		$this->authorize();
		$this->books = $this->db->getAll();
		$this->render_view(__FUNCTION__, false);
	}
}