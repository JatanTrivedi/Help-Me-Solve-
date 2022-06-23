<?php

include 'connection.php';
session_start();
extract($_POST);
$tags = $_POST['techno'];
print_r($tags);
$tag = "";
foreach($tags as $tag1)
{
    $tag .= $tag1 . "  ";
    // $tag = $tag.","$tag1;
}

    $sql = "INSERT INTO question(uid,question,body,tags) VALUES('$uid','$title','$body','$tag')";
    $query = mysqli_query($conn, $sql);
    if($query)
    {
        header('location:' . $_SESSION['page_add']);
    }
    else
    {
        echo "failed".mysqli_error($conn);
    }
?>