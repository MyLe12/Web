<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
</head>

<body>
     <form action = "register.php" method = "POST">

     	<h1>Sign up</h1>

         <p>Already have an account?
			<span class="text-link">
				<a href="./index_login.php">Sign in here</a>
			</span>
		</p>

     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

        <label>Full Name</label>
     	<input type="text" name="fname" ><br></br>

     	<label>User Name</label>
     	<input type="text" name="uname" ><br></br>

     	<label>Password</label>
     	<input type="password" name="password1" ><br></br>

		 <label>Confirm password</label>
     	<input type="password" name="password2" ><br></br>

        <label>Email</label>
     	<input type="text" name="email" ><br></br>

     	<button type="submit">Sign up</button>
     </form>
</body>

</html>