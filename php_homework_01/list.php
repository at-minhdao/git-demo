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
			$data = listUser();
			$current_page = $data['current_page'];
			$total_page   = $data['total_page'];			
			foreach ($data['listUser'] as $row) {
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
	<div class="pagination">
		<?php 
		// if current_page > 1 and total_page > 1 show button prev
		if ($current_page > 1 && $total_page > 1){
			echo '<a href="list.php?page='.($current_page-1).'">Prev</a> | ';
		}
		// pagination
		    for ($i = 1; $i <= $total_page; $i++){
			if ($i == $current_page){
				echo '<span>'.$i.'</span> | ';
			}
			else{
				echo '<a href="list.php?page='.$i.'">'.$i.'</a> | ';
			}
		}

		// if current_page < $total_page and total_page > 1 show button prev
		if ($current_page < $total_page && $total_page > 1){
			echo '<a href="list.php?page='.($current_page+1).'">Next</a> | ';
		}
		?>
	</div>
</div>
<?php 
require_once 'inc/header.php';
?>
