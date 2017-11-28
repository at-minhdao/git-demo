<?php 
require_once 'inc/header.php';
require_once 'inc/checkUser.php';
?>
<div style="text-align: left;">
	<a href="list.php">List</a>
</div>
<div align="center">
	<?php 
	$arUser = getUser($_GET['id']);
	if (isset($_POST['btnEdit'])) {
		//receive data
		$arErr  = array();
		$arUser = array();
		$arUser['id']       = $_POST['id'];
		$arUser['username'] = $_POST['username'];
		$arUser['email']    = $_POST['email'];
		$arUser['fullname'] = $_POST['fullname'];
		$arUser['password'] = trim($_POST['password']);
		$arUser['avatar']   = $_FILES['picture']['name'];
		//validate
		if (strlen($arUser['password']) < 6 && !empty($arUser['password'])) {
			$arErr['password'] = 'Minimize 6 character.';
		}
		if (count($arErr) == 0) {
			$result = editUser($arUser);
			if ($result) {
				$msg = "Success!";
			} else {
				$msg = "Error!";
			}
		}
	}
	?>
	<form action="" method="POST" enctype="multipart/form-data">
		<table>
			<caption>Edit</caption>
			<tr>
				<td><input type="hidden" name="id" value="<?php echo $arUser['id'] ?>"></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username" value="<?php echo $arUser['username'] ?>" readonly></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="email" name="email" value="<?php echo $arUser['email'] ?>" readonly></td>
			</tr>
			<tr>
				<td>Fullname</td>
				<td><input type="text" name="fullname" value="<?php echo $arUser['fullname'] ?>"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td>
					<input type="password" name="password">
					<?php echo isset($arErr['password']) ? $arErr['password'] : ''; ?>
				</td>
			</tr>
			<tr>
				<td>Avatar</td>
				<td align="center"><input type="file" name="picture"></td>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type="submit" name="btnEdit" value="Edit"></td>
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