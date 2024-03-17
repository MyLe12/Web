<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
</head>

<body>
     <form action = "login.php" method = "POST">
     	<h1>Login</h1> 

		<p>Don't have an account?
			<span class="text-link">
				<a href="./index_register.php">Sign up here</a>
			</span>
		</p>

     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
		
     	<label>User Name</label>
     	<input type="text" name="uname" ><br></br>

     	<label>Password</label>
     	<input type="password" name="password" ><br></br>

     	<button type="submit">Login</button>
     </form>
</body>

</html>



