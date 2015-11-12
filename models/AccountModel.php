<?php

class AccountModel extends BaseModel {

	public function register($username, $password, $email) {
		$statement = self::$db->prepare("SELECT COUNT(id) FROM users WHERE username = ?");
		$statement->bind_param("s", $username);
		$statement->execute();
		$result = $statement->get_result()->fetch_assoc();
		if ($result['COUNT(id)']) {
			return false;
		}

		$hash_pass = password_hash($password, PASSWORD_BCRYPT);	

		$statement = self::$db->prepare("SELECT COUNT(id) FROM users WHERE email = ?");
		$statement->bind_param("s", $email);
		$statement->execute();
		$result = $statement->get_result()->fetch_assoc();
		if ($result['COUNT(id)']) {
			return false;
		}

		$registerStatement = self::$db->prepare("INSERT INTO users (username, pass_hash, email) VALUES (?, ?, ?)");
		$registerStatement->bind_param("sss", $username, $hash_pass, $email);		
		$registerStatement->execute();

		return true;
	}

	public function login($username, $password) {
		$statement = self::$db->prepare("SELECT id, username, pass_hash FROM users WHERE username = ?");
		$statement->bind_param("s", $username);
		$statement->execute();
		$result = $statement->get_result()->fetch_assoc();
		
		if (password_verify($password, $result['pass_hash'])) {
			return true;
		}

		return false;
	}
}