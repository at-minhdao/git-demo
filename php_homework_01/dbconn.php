<?php
function dbconn() {
	$servername = "localhost";
	$username = "dtminh188";
	$password = "123";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=staff", $username, $password);
    // set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		// echo "Connected successfully";
		return $conn;
	}
	catch(PDOException $e)
	{
		echo "Connection failed: " . $e->getMessage();
	}
}

function checkUser($username, $password) {
	$conn = dbconn();
	$sql  = "SELECT * FROM users WHERE username=:username";
	$stmt = $conn->prepare($sql);
	$data = array(
		'username' => $username,
	);
	$stmt->execute($data);
	$user = $stmt->fetch(PDO::FETCH_ASSOC);
	if($user == false){
		echo "User $username not found.";
	} else {
		if(md5($password) == $user['password']) {
			$_SESSION['arUser'] = $user;
			header('Location: list.php');
			exit;
		}
		else
			echo 'Password not match.';
	}
}
function getUser($id) {
	$conn = dbconn();
	$sql  = "SELECT * FROM users WHERE id=:id";
	$stmt = $conn->prepare($sql);
	$data = array(
		'id' => $id,
	);
	$stmt->execute($data);
	$arUser = $stmt->fetch(PDO::FETCH_ASSOC);
	return $arUser;
}

function addUser($username, $email, $fullname, $password) {
	$conn = dbconn();
	//check the existence of username
	$sql  = "SELECT * FROM users WHERE username=:username";
	$stmt = $conn->prepare($sql);
	$data = array(
		'username' => $username,
	);
	$stmt->execute($data);
	$arUser = $stmt->fetch(PDO::FETCH_ASSOC);
	//
	if ($arUser == false) {
		$sql  = "INSERT INTO users (username, email, fullname, password) values (:username, :email, :fullname, :password)";
		$stmt = $conn->prepare($sql);
		$data = array(
			'username' => $username,
			'email'    => $email,
			'fullname' => $fullname,
			'password' => md5($password),
		);
		$result = $stmt->execute($data);
		if ($result) {
			return true;
		}
		return false;
	} else {
		echo "Username already exists";
	}

}

function editUser($arUser) {
	$conn = dbconn();
	$arUserOld   = getUser($arUser['id']);
	//name picture
	$tmp         = explode('.', $arUser['avatar']);
	$duoiFile    = end($tmp);
	$tenFileMoi  = 'AT-'.time().'.'.$duoiFile;
	
	//don't change password
	if (empty($arUser['password'])) {
		if (!empty($arUser['avatar'])) {
			//up file
			$tmp_name    = $_FILES['picture']['tmp_name'];
			$path_upload = $_SERVER['DOCUMENT_ROOT'].'/files/'.$tenFileMoi;

			move_uploaded_file($tmp_name, $path_upload);
  		//delete picture old
			if (!empty($arUserOld['avatar'])) {
				unlink($_SERVER['DOCUMENT_ROOT'].'/files/'.$arUserOld['avatar']);
			}
			$sql  = "UPDATE users SET fullname=:fullname, avatar = :picture WHERE id = :id";
			$stmt = $conn->prepare($sql);
			$data = array(
				'fullname' => $arUser[fullname],
				'picture'  => $tenFileMoi,
				'id'       => $_SESSION['arUser']['id'],
			);
			$result = $stmt->execute($data);
		} else {
			$sql  = "UPDATE users SET fullname = :fullname WHERE id = :id";
			$stmt = $conn->prepare($sql);
			$data = array(
				'fullname' => $arUser['fullname'],
				'id'       => $_SESSION['arUser']['id'],
			);
			$result = $stmt->execute($data);
		}
	} else { //change password
		//have edit avatar
		if (!empty($arUser['avatar'])) {
			//up file
			$tmp_name    = $_FILES['picture']['tmp_name'];
			$path_upload = $_SERVER['DOCUMENT_ROOT'].'/files/'.$tenFileMoi;

			move_uploaded_file($tmp_name, $path_upload);
  		//delete picture old
			if (!empty($arUserOld['avatar'])) {
				unlink($_SERVER['DOCUMENT_ROOT'].'/files/'.$arUserOld['avatar']);
			}
			//update
			$sql  = "UPDATE users SET password=:password, fullname=:fullname, avatar = :picture WHERE id = :id";
			$stmt = $conn->prepare($sql);
			$data = array(
				'password' => md5($arUser['password']),
				'fullname' => $arUser[fullname],
				'picture'  => $tenFileMoi,
				'id'       => $_SESSION['arUser']['id'],
			);
			$result = $stmt->execute($data);
		} else { //don't edit avatar
			$sql  = "UPDATE users SET password=:password, fullname = :fullname WHERE id = :id";
			$stmt = $conn->prepare($sql);
			$data = array(
				'password' => md5($arUser['password']),
				'fullname' => $arUser['fullname'],
				'id'       => $_SESSION['arUser']['id'],
			);
			$result = $stmt->execute($data);
		}
	}
	if ($result) {
		return true;
	} else {
		return false;
	}
}

function listUser() {
	$conn = dbconn();
	$sql  = "SELECT * FROM users";
	$stmt = $conn->prepare($sql);
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$stmt->execute();
	$resultSet = $stmt->fetchAll();
	return $resultSet;
}
