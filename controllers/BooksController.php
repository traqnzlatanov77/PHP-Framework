<?php

class BooksController extends BaseController {
	private $db;

	public function onInit () {
		$this->title = 'Books';
		$this->db = new BooksModel();
	}

	public function index ($page = 0, $pageSize = 10) {
		if ($page < 0) {
			$page = 0;
		}
		if ($pageSize > 10) {
			$pageSize = 10;
		}
		$this->authorize();
		$from = $page * $pageSize;
		$this->page = $page;
		$this->pageSize = $pageSize;
		$this->books = $this->db->getFilteredBooks($from, $pageSize);

		$this->render_view();
	}

	public function showBooks() {		
		$this->authorize();
		$this->books = $this->db->getAll();
		$this->render_view(__FUNCTION__, false);
	}
}