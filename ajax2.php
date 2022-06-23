<?php
$conn = mysqli_connect("localhost","root","","project2");
if(!$conn)
{
	echo "connection error";
}
else
{
	$user = $_POST['p'];	 
	$query = "select * from question where qid = '$user'";

	$result = mysqli_query($conn,$query);


	while($row = mysqli_fetch_array($result)){
		 $que=$row['question'];
		 $id=$row['qid']; 
	}
$arr = array("value_1"=> $que,"value_2"=> $id);
echo json_encode($arr);	
}
	

?>
