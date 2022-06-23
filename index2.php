<?php
include 'connection.php';
session_start();
$_SESSION['page_add'] = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>INDEX</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="navbar_css.css">
</head>

<body>
    <!-- <nav class="navbar bg-light navbar-expand-lg navbar-dark">
        <a href="#" rel="noopener noreferrer"><strong class="logo">XYZanswers</strong></a>
        <div class="container">


            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="ask_question.php" class="nav-link">Ask a Question</a>
                    </li>
                    <li class="nav-item">
                        <div class="container">
                            <form class="example" action="search_results.php">
                                <input type="text" placeholder="Search..." name="search">
                                <button type="submit">go</button>
                            </form>
                        </div>
                    </li>
                </ul>
                <?php
                if (isset($_SESSION['uid'])) {
                ?>
                    <a href="user_dashboard.php" class="nav-link">
                        <?php echo $_SESSION['uname']; ?>
                    </a>


                <?php
                } else {
                ?>
                    <a href="login.php" class="nav-link"><button class="btn btn-outline-primary">Login | Sign Up</button></a>
                <?php } ?>
            </div>
        </div>
    </nav> -->

    <?php include 'user_navbar.php';?>

    <div class="container">
        <section class="my-4">
            <h1><a href="question_display_page.php">Top Questions</a> </h1>
            <?php
            $question = "SELECT * FROM question WHERE status = 2 or status = 3 ORDER BY qid DESC ";
            $ques_query = mysqli_query($conn, $question);
            $count = 0;

            ?>
            <table cellpadding="10" style="font-size: larger;">
                <?php
                while ($array = mysqli_fetch_array($ques_query)) {
                    $count++;
                ?>
                    <tr>
                        <td><?php echo $count . "."; ?></td>
                        <td><a href="give_answer_user.php?qid=<?php echo $array['qid']; ?>"><?php echo $array['question']; ?></a> </td>
                    </tr>
                <?php } ?>
            </table>
        </section>

        <section style="position: absolute; top: 400px; left: 340px;">
            <?php include 'counter.php'; ?>
        </section>
    </div>
</body>

</html>