<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['uid'])) {
    $user_id = $_SESSION['uid'];
    // $sql = "SELECT * FROM profile WHERE uid = '$user_id'";
    // $query = mysqli_query($conn, $sql);
    // $rows = mysqli_num_rows($query);
    // $value = mysqli_fetch_array($query);
}

include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="user_navbar.css">
</head>

<body>
    <?php
    if (isset($_SESSION['uid'])) {
    ?>
        <nav class="navbar bg-light navbar-expand-lg navbar-dark">
            <a href="index2.php"><strong class="logo">XYZanswers</strong></a>

            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                    <span class="navbar-toggler-icon"> </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item">
                            <a href="index2.php" style="color:dimgray;"><i class="fas fa-home fa-2x"></i>
                        </li>
                        <li class="nav-item">

                            <a href="question_display_page.php" style="color:dimgray;"><i class="fas fa-newspaper fa-2x"></i></a>
                        </li>
                        <!-- <li class="nav-item">
                        <a href="index.html" class="nav-link active">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.html" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.html" class="nav-link">Services</a>
                    </li> -->
                        <div class="container">
                            <form class="example" action="search_results.php">
                                <input type="text" placeholder="Search..." name="search">
                                <button type="submit">go</button>
                            </form>
                        </div>

                    </ul>
                    <div class="content" style="position: relative; bottom: 5.5px;">
                        <a href="user_dashboard.php" class="nav-link">
                            <div class="dropdown">
                                <!-- <button class="dropbtn">Dropdown</button> -->
                                <img src="assets/img/1.jpg" class="dropimg" style="border-radius: 50%; width:40px; height: 40px;">
                                <div class="dropdown-content">
                                    <a href="user_dashboard.php">My Profile</a>
                                    <hr>
                                    <a href="logout.php">Log Out</a>
                                </div>
                            </div>
                        </a>
                    </div>
                    <a href="ask_question.php" class="nav-link"><button class="btn btn-outline-primary">Ask Questions</button></a>

                </div>
            </div>
        </nav>
    <?php
    } else {
    ?>
        <nav class="navbar bg-light navbar-expand-lg navbar-dark">
            <a href="#"><strong class="logo">XYZanswers</strong></a>
            <div class="container">


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item">
                            <a href="index2.php" style="color:dimgray;"><i class="fas fa-home fa-2x"></i> </a>
                        </li>
                        <li class="nav-item">
                            <a href="question_display_page.php" style="color:dimgray;"><i class="fa fa-newspaper fa-2x"></i></a>
                        </li>

                        <!-- <li class="nav-item">
                        <a href="index.html" class="nav-link active">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.html" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.html" class="nav-link">Services</a>
                    </li> -->
                        <div class="container">
                            <form class="example" action="search_results.php">
                                <input type="text" placeholder="Search..." name="search">
                                <button type="submit">go</button>
                            </form>
                        </div>
                    </ul>
                    <a href="ask_question.php" class="nav-link"><button class="btn btn-outline-primary">Ask Questions</button></a>
                    <a href="login.php" class="nav-link">
                        <button class="btn btn-outline-primary">Login | Sign Up</button>
                    </a>

                </div>
            </div>
        </nav>
    <?php } ?>
</body>

</html>