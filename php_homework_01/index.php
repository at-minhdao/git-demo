<?php 
require_once 'inc/header.php';
?>
<div align="center">
	<?php 
	if (isset($_POST['btnLogin'])) {
		//receive data
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		//validate
		if (empty($username)) {
			$msgErr = "Please enter username!";
		}
		if (empty($password)) {
			$msgErr = "Please enter password!";
		}
		if (empty($username) && empty($password)) {
			$msgErr = "Please enter username and password!";
		}
		checkUser($username, $password);
	}
	?>
	<form action="" method="POST">
		<table>
			<?php if (isset($msgErr)): ?>
				<tr>
					<td colspan="2" style="color: red"><?php echo $msgErr ?></td>
				</tr>
			<?php endif ?>
			<caption>Login</caption>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username" required></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password" required></td>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type="submit" name="btnLogin" value="Login"></td>
			</tr>
			<tr>
				<td align="center" colspan="2"><a href="signin.php">Sign in!</a></td>
			</tr>
		</table>
	</form>
</div>
<?php 
require_once 'inc/header.php';
?>


