<?php
	include('../database/dbConfig.php')
?>
<?php
$errors = array(); 
if (isset($_POST['signUpBtn'])) {
$firstName= mysqli_real_escape_string($conn,$_POST['name']);

  $password_1 = mysqli_real_escape_string($conn, $_POST['password1']);
  $password_2 = mysqli_real_escape_string($conn, $_POST['password2']);
  $password_1 = md5($password_1);
$cell = mysqli_real_escape_string($conn,$_POST['cell']);
$userRole = 'Admin';

 if ($password_1 != $password_2) { array_push($errors, "The two passwords do not match"); }
$cell = preg_replace('/[^0-9]/', '', $cell);
  if((substr($cell,0,1) != '0') || strlen($cell) != 10) {
	  array_push($errors, "You have entered an invalid number");
  }
//INSERT
$query = "INSERT INTO user (name, mobileNumber, userRole, password)
VALUES ('$firstName', '$cell', '$userRole', '$password_1')";
$result = mysqli_query($conn, $query);
// echo $result;
if( $result )
{
?>
<script type="text/javascript">
alert('You are successfully registered, you can now login and secure your space !');
</script>
<?php
echo "<script>window.open('sign_in.php','_self')</script>"; 
}
else
{
?>
<script type="text/javascript">
alert('Wrong password or cellphone number');
</script>
<?php
}

}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Secure_Travelling</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="icon" href="img/taxi.png">
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	
	<body class="is-preload">

<!-- Wrapper -->
	<div id="wrapper">



<article id="Sign Up">
<form method="post" action="">
<div class= "container">
	<h1>Sign Up</h1>
	<hr>
	<p>Please fill in</p>
	<!--<hr>-->
	<label for = "name" >
		<b> name </b></label>
		<input type = "text"  name = "name" required>
	<label for = "cell" >
		<b> cell </b></label>
		<input type = "text"  name = "cell" required>
		<label for = "password" >
		<b> password </b></label>
		<input type = "password"  name = "password1" required>
		<label for = "re-password" >
		<b> re-enter password </b></label>
		<input type = "password" name = "password2" required></form><br>
		<ul class="actions">
			<li><input type="submit" name="signUpBtn" value="Sign Up" class="primary" /></li>
		</ul></form>
</article>


						<footer id="footer">
							<p class="copyright">All rights reserved &copy; Secure_Travelling 2021.</p>
						</footer>

				</div>

			<!-- BG -->
				<div id="bg"></div>

			<!-- Scripts -->
				<script src="assets/js/jquery.min.js"></script>
				<script src="assets/js/browser.min.js"></script>
				<script src="assets/js/breakpoints.min.js"></script>
				<script src="assets/js/util.js"></script>
				<script src="assets/js/main.js"></script>

		</body>
	</html>
