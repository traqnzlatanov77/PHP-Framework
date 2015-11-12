<?php

class AuthorsController extends BaseController {
	private $db;

	public function onInit () {
		$this->title = 'Authors';
		$this->db = new AuthorsModel();
	}

	public function index () {
		$this->authorize();
		$this->authors = $this->db->getAll();
		$this->render_view();
	}

	public function create () {
		$this->authorize();

		if ($this->is_post) {
			$name = $_POST['author_name'];
			if (strlen($name) < 5) {
				$this->addValidationError('author_name', 'Author name length should be grater than 2');
				$this->render_view(__FUNCTION__);
			}

			if ($this->db->createAuthor($name)) {
				$this->addInfoMessage("Author created");	
				$this->redirect("authors");
			} else {
				$this->addErrorMessage("Error creating author");
			}
		}

		// __FUNCTION__ holds the name of the function 
		$this->render_view(__FUNCTION__);
	}

	public function delete ($id) {
		$this->authorize();
		
		if ($this->db->deleteAuthor($id)) {
			$this->addErrorMessage("Author deleted");
			
		} else {
			$this->addErrorMessage("Cannot delete author");
		}
		
		$this->redirect('authors');
	}
}