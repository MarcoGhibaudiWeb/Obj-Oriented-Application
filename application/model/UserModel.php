<?php

class UserModel extends BaseModel
{

	public function login($user){

		$email = $user['email'];
		$password = $user['password'];
	
		$stmt = $this->db->prepare("SELECT * FROM profile where email='$email' and password=sha1('$password')");
		$stmt->execute();
		$login = $stmt->fetch(PDO::FETCH_ASSOC);

		if($stmt->rowCount()){
			
			return $login;
			
		}

	}

 	public function register($user){

			$email = $user['email'];
		$password = $user['password'];
		$fName = $user['fName'];
		$lName = $user['lName'];
	
		$stmt = $this->db->prepare("SELECT * FROM profile where email='$email'");
		$stmt->execute();
		$user = $stmt->fetchAll();

		if($stmt->rowCount() == 0){
			
			$stmt = $this->db->prepare("INSERT INTO profile (fname, lname, password, email, priviledge)
			values ('$fName','$lName',sha1('$password'), '$email','No')");
			$stmt->execute();
			return true;
			
	
		} 
	
	}

	public function account($uID){

		$stmt = $this->db->prepare("SELECT * FROM profile where uID='$uID'");
		$stmt->execute();
		$account = $stmt->fetch(PDO::FETCH_ASSOC);

		return $account;		

	}


}

