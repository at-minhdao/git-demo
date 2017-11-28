<?php 
require_once 'inc/header.php';
require_once 'inc/checkUser.php';
?>
<div style="text-align: left;">
	<a href="edit.php?id=<?php echo $_SESSION['arUser']['id'] ?>">Edit</a>
</div>
<div align="center">
	<form action="" method="POST">
		<table border="1px">
			<caption>List user</caption>
			<tr>
				<th>ID</th>
				<th>Username</th>
				<th>Avatar</th>
				<th>Email</th>
				<th>Full name</th>
			</tr>
			<?php 
			$listUser = listUser();
			foreach ($listUser as $row) {
				?>
				<tr>
					<td><?php echo $row['id'] ?></td>
					<td><?php echo $row['username'] ?></td>
					<td><img src="files/<?php echo $row['avatar'] ?>" width='50px'></td>
					<td><?php echo $row['email'] ?></td>
					<td><?php echo $row['fullname']; ?></td>
				</tr>
				<?php 
			} ?>
		</table>
	</form>
</div>
<?php 
require_once 'inc/header.php';
?>
