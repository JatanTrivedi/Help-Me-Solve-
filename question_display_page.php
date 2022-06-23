<?php
session_start();
$_SESSION['page_add'] = $_SERVER['REQUEST_URI'];
// echo $_SESSION['page_add'];
include 'connection.php';
// echo $_SESSION['uname'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>QUESTION DISPLAY</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <!-- Style CSS -->
  <link rel="stylesheet" href="css/style.css" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet" />

  <!-- used internal css here for styling the table made down there -->
  <style>
    .question-table{
      width: 700px;
    }
    #stats_td{
      text-align: center;
      width: 90px;
    }
    #question_user_name{
     position: relative;
     left: 80%;
    }
  </style>
</head>

<body>
  <!-- this includes the navigation bar -->
  <?php include 'user_navbar.php'; ?>

  <div class="container">
    <div class="row my-5">
      <div class="col-md-12">
        <?php
        // getting the whole question thing and the related bunch of stuff but this query can be modified because we don't need answer to display on this page now.
        $value = "SELECT * FROM question JOIN answer JOIN registration WHERE question.qid = answer.qid and question.status=3 and answer.status = 2 and question.uid = registration.uid GROUP BY answer.qid ORDER BY question.qid DESC";
        $vqeury = mysqli_query($conn, $value);
        $loop = mysqli_num_rows($vqeury);

        ?>
        <!-- the table for displaying the stuff -->
        <table cellpadding="10" class="question-table">
          <?php
        while ($search = mysqli_fetch_assoc($vqeury)) {
          // query for getting answer count for respective question
          $qid = $search['qid'];
          $answer = "SELECT * FROM answer JOIN question WHERE answer.qid = question.qid and answer.qid = '$qid' GROUP BY answer.aid";
          $answer_query = mysqli_query($conn,$answer);
          $answer_count = mysqli_num_rows($answer_query);
          ?>
        <tr>
          <td id="stats_td"><?php echo $answer_count;
          ?><br> answers</td>
          <td id="question_td">
          <h5><a href="give_answer_user.php?qid=<?php echo $search['qid']; ?>"><?php echo $search['question']; ?></a>
          </h5>
          <p>
          <h6> <?php echo $search['body']; ?></h6>
          <h6>
            <?php
            $tags = $search['tags'];
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
          </p>
          <small id="question_user_name"><a href="profile_display_page.php?uid=<?php echo $search['uid']; ?>"><?php echo $search['uname']; ?></a></small>
          </td>
          <!-- <hr> -->
          <!-- commented the whole answer section for now -->
          <!-- <p>
          <h5><i class="fas fa-arrow-circle-right" style="margin: 0 1rem 0 0"></i><?php //echo $search['answer']; ?>
          </h5>
          <small><a href="give_answer_user.php?qid=<?php //echo $search['qid']; ?>">More answers</a></small>
          <small><?php //echo $answeredBy_array['uname'];?></small>
          </p> -->

        </tr>
        <?php
        }
        ?>
        </table>
        <!-- table ended -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap 4.5 JS -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Popper JS -->
    <script src="js/popper.min.js"></script>
    <!-- Font Awesome -->
    <script src="js/all.min.js"></script>
</body>
</html>