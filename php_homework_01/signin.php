<?php 
require_once 'inc/header.php';
?>
<div align="center">
	<?php 
	if (isset($_POST['btnSignup'])) {
		$error    = array();
		$username = trim($_POST['username']);
		$email    = trim($_POST['email']);
		$fullname = trim($_POST['fullname']);
		$password = trim($_POST['password']);

		//validate
		if (strlen($username) < 6) {
			$error['username'] = 'Minimize 6 character';
		}
		if (empty($username)){
			$error['username'] = 'Please enter username';
		}
		if (empty($email)){
			$error['email'] = 'Please enter email';
		}
		if (empty($fullname)){
			$error['fullname'] = 'Please enter fullname';
		}
		if (strlen($password) < 6) {
			$error['password'] = 'Minimize 6 character';
		}
		if (empty($password)){
			$error['password'] = 'Please enter password';
		}

    //add User
		if (count($error) == 0) {
			$result   = addUser($username, $email, $fullname, $password);
			if ($result) {
				$msg = "Success!";
			} else {
				$msg = "Error!";
			}
		}
	}
	?>
	<form action="" method="POST">
		<table>
			<caption>Sign up</caption>
			<tr>
				<td>Username</td>
				<td>
					<input type="text" name="username" value="<?php echo isset($username) ? $username : ''; ?>">
					<?php echo isset($error['username']) ? $error['username'] : ''; ?>
				</td>
			</tr>
			<tr>
				<td>Email</td>
				<td>
					<input type="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>">
					<?php echo isset($error['email']) ? $error['email'] : ''; ?>
				</td>
			</tr>
			<tr>
				<td>Full name</td>
				<td>
					<input type="text" name="fullname" value="<?php echo isset($fullname) ? $fullname : ''; ?>">
					<?php echo isset($error['fullname']) ? $error['fullname'] : ''; ?>
				</td>
			</tr>
			<tr>
				<td>Password</td>
				<td>
					<input type="password" name="password">
					<?php echo isset($error['password']) ? $error['password'] : ''; ?>
				</td>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type="submit" name="btnSignup" value="Sign up"></td>
			</tr>
			<tr>
				<td align="center" colspan="2"><a href="index.php">Login!</a></td>
			</tr>
			<?php if (isset($msg)): ?>
				<tr>
					<td colspan="2" align="center"><?php echo $msg ?></td>
				</tr>
			<?php endif ?>
		</table>
	</form>
</div>
<?php 
require_once 'inc/footer.php.php';
?>