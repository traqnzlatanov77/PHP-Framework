<?php

class BooksModel extends BaseModel {
	public function getAll() {
		$statement = self::$db->query("SELECT title FROM books");
		$result = $statement->fetch_all(MYSQLI_ASSOC);
		return $result;
	}
}