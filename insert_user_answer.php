<?php
session_start();
include 'connection.php';
$qid = $_POST['question_id'];
$uid = $_POST['user_id'];
$answer = $_POST['answer_area'];

$sql = "INSERT INTO answer(uid,qid,answer) VALUES('$uid','$qid','$answer')";
$query = mysqli_query($conn,$sql);
if($query)
{
  header('Location:'. $_SESSION['page_add']);
}
else{
    echo "not inserted";
}
?>