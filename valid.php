<?php 
include 'connection.php';
$id = $_GET['ab'];
$sql = "update question set status = 2 where qid = $id ";
$query = mysqli_query($conn,$sql);
if ($query) 
{
	header('Location: admin.php');
}
?>