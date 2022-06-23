<?php
include 'connection.php';
session_start();
$_SESSION['page_add'] = $_SERVER['REQUEST_URI'];
$qid = $_GET['qid'];
if (isset($_SESSION['uid'])) {
    $uid = $_SESSION['uid'];
}


$get_question = "SELECT * FROM question WHERE qid = '$qid'";
$question_query = mysqli_query($conn, $get_question);
$question_array = mysqli_fetch_array($question_query);


$get_quser = "SELECT * FROM question JOIN registration WHERE question.uid = registration.uid and question.qid= '$qid'";
$get_quser_query = mysqli_query($conn, $get_quser);
$get_quser_array = mysqli_fetch_assoc($get_quser_query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GIVE ANSWER</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />


    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="popup_css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>
        .table {
            text-align: justify;
            text-justify: inter-word;
            color: dimgrey;
        }

        .question_user {
            position: relative;
            left: 88%;
        }

        .answer_user {
            position: relative;
            left: 88%;
        }
    </style>
</head>

<body>
    <?php include 'user_navbar.php'; ?>

    <div class="row my-5" style="padding-left: 50px;">
        <div class="col-md-12">
            <?php
            $value = "SELECT * FROM answer JOIN question WHERE answer.qid = question.qid and answer.qid = 35 and answer.status = 2 ORDER BY answer.aid DESC;";
            $vqeury = mysqli_query($conn, $value);
            ?>

            <h1> <?php echo $question_array['question']; ?></h1> <br>
            <h6><?php echo $question_array['body']; ?></h6>
            <h6><?php
                $tags = $question_array['tags'];
                $tags_final = explode(" ", $tags);
                foreach ($tags_final as $tag1) {
                ?>
                    <span class="badge badge-dark"><?php echo $tag1; ?></span>
                <?php
                }
                //print_r($tags_final);
                // echo $search['tags'];
                ?>
            </h6>
            <small class="question_user">
                Asked by: <a href="profile_display_page.php?uid=<?php echo $get_quser_array['uid']; ?>"><?php echo $get_quser_array['uname']; ?></a>
            </small>

            <table class="table">
                <?php
                while ($search = mysqli_fetch_assoc($vqeury)) {
                    $aid = $search['aid'];
                    $get_auser = "SELECT * FROM answer JOIN registration WHERE answer.uid = registration.uid and answer.aid= '$aid'";
                    $get_auser_query = mysqli_query($conn, $get_auser);
                    $get_auser_array = mysqli_fetch_assoc($get_auser_query);
                ?>
                    <tr>
                        <td>
                            <!-- to print answers for the question -->
                            <h5><big>A.</big> <?php echo $search['answer']; ?></h5>
                            <!-- user that has answered -->
                            <small class="answer_user">
                                Answered By: <a href="profile_display_page.php?uid=<?php echo $get_auser_array['uid']; ?>"><?php echo $get_auser_array['uname']; ?></a>
                            </small>
                        <?php
                    } ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <!-- check according to the login status that the user can answer the question or not -->
                            <?php
                            if (isset($_SESSION['uid'])) {
                            ?>

                                <div>
                                    <form action="insert_user_answer.php" method="POST" id="main_form">
                                        <input type="hidden" name="user_id" value="<?php echo $uid; ?>">
                                        <input type="hidden" value="<?php echo $qid; ?>" name="question_id">
                                        <!-- <input type="button" onclick="initial()" id="generate_btn" value="Answer" class="btn btn-outline-dark btn-md"> -->
                                        <p>
                                            <strong>
                                                <h5>Your answer</h5>
                                            </strong>
                                            <textarea name="answer_area" id="answer_area" cols="100" rows="10" style="resize: none;"></textarea><br>
                                            <button type="submit" class="btn btn-primary" name="answer_submit">Post your answer</button>
                                        </p>
                                    </form>
                                </div>
                            <?php } else {
                            ?>
                                <div class="popup" onmouseover="myFunction()"> <a href="login.php">Give Answer</a>
                                    <span class="popuptext" id="myPopup">You need to login for doing that!</span>
                                </div> <?php } ?>
                        </td>
                    </tr>

            </table>
        </div>

        <script>
            // When the user clicks on div, open the popup
            function myFunction() {
                var popup = document.getElementById("myPopup");
                popup.classList.toggle("show");
            }
        </script>


</body>

</html>