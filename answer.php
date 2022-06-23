<?php 

$conn = mysqli_connect("localhost","root","","project2");
if(!$conn)
{
	echo "connection error";
}
else
{
	$que = $_GET['qid'];
    $ans = $_GET['ans'];
    
    $sql = "INSERT INTO answer(qid,answer) VALUES('$que','$ans')";
    $query = mysqli_query($conn,$sql);
    if(!$query)
    {
    	echo "DATA COULD NOT BE UPDATED";

    }
    else
    {
    	header('Location: tech.php');
    	$sql1 = "UPDATE question set status=3 where qid = '$que'";
    	$query1 = mysqli_query($conn,$sql1);
    }

	
}

?>