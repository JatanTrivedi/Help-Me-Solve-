<?php 
session_start();
$uid = $_SESSION['uid'];
include 'connection.php';
extract($_POST);

// $aboutme = $_POST['aboutme'];
$tags = $_POST['intrest'];
$tag = "";
foreach($tags as $tag1)
{
    $tag .= $tag1 . "  ";
    // $tag = $tag.","$tag1;
}


$sql = "SELECT * FROM profile WHERE uid = '$uid'";
$query = mysqli_query($conn,$sql);
$rows = mysqli_num_rows($query);
$value = mysqli_fetch_array($query);

if($rows>0)
{
    $update = "UPDATE profile SET name = '$display_name', location = '$location', title = '$title', about = '$aboutme', intrests = '$tag' WHERE uid = '$uid'";
    $u_query = mysqli_query($conn,$update);
    if($u_query)
    {
        header('location:'.$_SESSION['page_add']);
    }
    else{
        echo "not updated".mysqli_error($conn);
    }
}
else{
    $insert = "INSERT INTO profile(uid,name,location,title,about,intrests) VALUES('$uid','$display_name','$location','$title','$aboutme','$tag')";
    $i_query = mysqli_query($conn,$insert);
    if($i_query)
    {
        header('location:'.$_SESSION['page_add']);
    }
    else
    {
        echo "not inserted".mysqli_error($conn);
    }
}
?>