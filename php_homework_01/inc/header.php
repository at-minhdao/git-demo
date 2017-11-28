<?php 
session_start();
require_once 'dbconn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User</title>
</head>
<body>
	<?php if (isset($_SESSION['arUser'])): ?>
		<div style="text-align: left;">
			<p>Wellcome <?php echo $_SESSION['arUser']['username'] ?>!</p>
		</div>
		<div style="text-align: right;">
			<a href="logout.php">Logout</a>
		</div>
	<?php endif ?>