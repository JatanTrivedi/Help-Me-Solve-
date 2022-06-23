<?php
include 'connection.php';
//mysqli_select_db($conn, 'project2');
$id = $_GET['did'];
//echo $id;
$sql = "UPDATE answer set status = 1 where aid = $id ";
$query = mysqli_query($conn,$sql);
if($query)
{
	header('Location: answer_admin.php');
}
?>