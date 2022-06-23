<?php 
include 'connection.php';

$uname = $_POST['uname'];
$mail = $_POST['email'];
$password = $_POST['pwd'];

$sql = "INSERT INTO registration(uname,email,password) VALUES('$uname','$mail','$password')";
$query = mysqli_query($conn,$sql);
if($query)
{
	header('Location:login.php');
}
else
{
	echo "data not entered".mysqli_error($conn);
}
