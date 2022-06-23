<?php
session_start();
$_SESSION['page_add'] = $_SERVER['REQUEST_URI'];

include 'connection.php';

$arrival = "SELECT * FROM registration";
$a_query = mysqli_query($conn, $arrival);
$a_values = mysqli_fetch_array($a_query);
$users = mysqli_num_rows($a_query);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>HOME</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/gsdk.css" rel="stylesheet" />
    <link href="assets/css/demo.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">

    <!--     Font Awesome     -->
    <link href="bootstrap3/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
</head>

<body>
    <div id="navbar-full">
        <div class="container">
            <nav class="navbar navbar-ct-blue navbar-transparent navbar-fixed-top" role="navigation">

                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="ask_question.php">Ask a question</a></li>
                            <?php
                            if (!isset($_SESSION['uid'])) {
                            ?>
                                <li><a href="login.php" class="btn btn-round btn-default">Login | Sign Up</a></li>
                            <?php } else {
                            ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['uname']; ?> <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">My Profile</a></li>
                                        <li><a href="question_display_page.php">Answer Questions</a></li>
                                        <!-- <li><a href="#">Something</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something</a></li> -->
                                        <li class="divider"></li>
                                        <li><a href="logout.php">Log Out</a></li>
                                    </ul>
                                </li>

                            <?php
                            }

                            ?>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div><!--  end container-->

        <div class='blurred-container'>
            <div class="motto">
                <div class="border" style="position: relative; right: 155px;">xyzanswers</div>
                <div class="content" style="font-size: medium; position:relative; left: 150px; top: 10px;">
                    Encyclopedia of C
                </div>
            </div>
            <div class="img-src" style="background-image: url('assets/img/cover_4.jpg')"></div>
            <div class='img-src blur' style="background-image: url('assets/img/cover_4_blur.jpg')"></div>
        </div>

    </div>

    <section style="position: absolute; left: 50px;">
        <h1><em> Top Questions</em></h1>
        <?php
        $questions = "SELECT * FROM question ORDER BY qid DESC";
        $q_query = mysqli_query($conn, $questions);
        $count = 0;
        while ($array = mysqli_fetch_array($q_query)) {
            $count++;
        ?>
            <table class="table" style="font-size: 25px;" cellpadding="10">
                <tr>
                    <td><?php echo $count . "."; ?></td>
                    <td><?php echo $array['question']; ?></td>
                </tr>
            </table>
        <?php } ?>
    </section>

    <section style="position: relative; top: 550px;">
        <?php include 'counter.php';?>
    </section>



</body>

<script src="jquery/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

<script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>
<script src="assets/js/gsdk-checkbox.js"></script>
<script src="assets/js/gsdk-radio.js"></script>
<script src="assets/js/gsdk-bootstrapswitch.js"></script>
<script src="assets/js/get-shit-done.js"></script>
<script src="assets/js/custom.js"></script>

<!-- <script type="text/javascript">
    $('.btn-tooltip').tooltip();
    $('.label-tooltip').tooltip();
    $('.pick-class-label').click(function() {
        var new_class = $(this).attr('new-class');
        var old_class = $('#display-buttons').attr('data-class');
        var display_div = $('#display-buttons');
        if (display_div.length) {
            var display_buttons = display_div.find('.btn');
            display_buttons.removeClass(old_class);
            display_buttons.addClass(new_class);
            display_div.attr('data-class', new_class);
        }
    });
    $("#slider-range").slider({
        range: true,
        min: 0,
        max: 500,
        values: [75, 300],
    });
    $("#slider-default").slider({
        value: 70,
        orientation: "horizontal",
        range: "min",
        animate: true
    });
    $('.carousel').carousel({
        interval: 4000
    });
</script> -->

</html>