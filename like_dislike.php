<?php
session_start();
// $reaction = 0;
$aid = $_GET['aid'];
if (isset($_GET['like'])) {
    $like = $_GET['like'];
    like($aid,$like);
} else {
    $dislike = $_GET['dislike'];
    dislike($aid,$dislike);
}

function like($aid,$like)
{
    $reaction = 0;
    if($reaction < 1)
    {
    include 'connection.php';
    $sql = "SELECT votes FROM answer WHERE aid = '$aid'";
    $query = mysqli_query($conn, $sql);
    $array = mysqli_fetch_array($query);
    $votes = $array['votes'];
    $votes = $votes + $like;
    //echo $votes;
    $update = "UPDATE answer SET votes = '$votes' WHERE aid = '$aid'";
    $update_query = mysqli_query($conn, $update);
    $reaction = 1;
    // echo $votes;
    if ($update_query) {
        header('location:' . $_SESSION['page_add']);
    } else {
        echo "could not redirect" . mysqli_error($conn);
    }
    }
    else
    {
        dislike($aid,1);
    }
}

function dislike($aid,$dislike)
{
    $reaction = 0;
    if($reaction<1)
    {

    include 'connection.php';
    $sql = "SELECT votes FROM answer WHERE aid = '$aid'";
    $query = mysqli_query($conn, $sql);
    $array = mysqli_fetch_array($query);
    $votes = $array['votes'];
    $votes = $votes - $dislike;
    //echo $votes;
    $update = "UPDATE answer SET votes = '$votes' WHERE aid = '$aid'";
    $update_query = mysqli_query($conn, $update);
    // echo $votes;
    $reaction = 1;
    if ($update_query) {
        header('location:' . $_SESSION['page_add']);
    } else {
        echo "could not redirect" . mysqli_error($conn);
    }
    }
    else
    {
        like($aid,1);
    }
}

?>
