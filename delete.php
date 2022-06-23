<?php
include 'connection.php';
//mysqli_select_db($conn, 'project2');
$id = $_GET['did'];
//echo $id;
$sql = "update content set status = 1 where qid = $id ";
$query = mysqli_query($conn,$sql);
if($query)
{
	header('Location: admin.php');
}
?>