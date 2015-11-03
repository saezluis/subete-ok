<?php

/* start the session */
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
 <title>Check Login</title>
 <meta charset = "utf8" />
</head>

<body>

<?php
	 $host_db = "localhost";
	 $user_db = "root";
	 $pass_db = "123";
	 $db_name = "subete";
	 $tbl_name = "usuarios";

		// Connect to server and select databse.
		$con=mysqli_connect("$host_db", "$user_db", "$pass_db")or die("Cannot Connect to Data Base.");

		mysqli_select_db($con,"$db_name")or die("Cannot Select Data Base");

		// sent from form
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql= "SELECT * FROM $tbl_name WHERE rut = '$username' and password ='$password'";

		$result=mysqli_query($con,$sql);

		// counting table row
		$count = mysqli_num_rows($result);
		// If result matched $username and $password

		if($count == 1){

		$_SESSION['loggedin'] = true;
		$_SESSION['username'] = $username;
		$_SESSION['start'] = time();
		$_SESSION['expire'] = $_SESSION['start'] + (100 * 100 * 60) ;//ojo quitarle las 3 horas a la sesion
	
			header("Location:index.php");
			
			//echo "<br> Bienvenido! " . $_SESSION['username'];
			
		}
	 else {
	 echo "Rut o Contraseña están incorrectos.";
	 echo "<br>";
	 echo "<br>";
	 echo "<a href='login.php'>Volver a Intentarlo</a>";
	}
?>

</body>
</html>