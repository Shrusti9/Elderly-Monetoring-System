<?php 

// include 'testing.php';

$name = "localhost";
$username = "root";
$pass = "";
$db = "goa";

$conn =   mysqli_connect($name, $username, $pass, $db);

if($conn){

	// echo("connection is sucessfull");
} else{

	echo "please check your connection!!";
}

?>