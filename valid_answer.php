<?php 
include 'connection.php';
$id = $_GET['ab'];
$sql = "UPDATE answer set status = 2 where aid = $id ";
$query = mysqli_query($conn,$sql);
if ($query) 
{
	header('Location: answer_admin.php');
}
?>