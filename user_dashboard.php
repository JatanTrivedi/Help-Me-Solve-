<?php
session_start();
$uid = $_SESSION['uid'];
?>
<?php
include 'connection.php';

$sql = "SELECT * FROM profile WHERE uid = '$uid'";
$query = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($query);
$value = mysqli_fetch_array($query);

$question = "SELECT * FROM question WHERE uid = '$uid'";
$qquery = mysqli_query($conn, $question);
$qrows = mysqli_num_rows($qquery);
$qvalues = mysqli_fetch_array($qquery);

$answer = "SELECT * FROM answer WHERE uid = '$uid'";
$answer_query = mysqli_query($conn, $answer);
$answer_rows = mysqli_num_rows($answer_query);
$answer_values = mysqli_fetch_array($answer_query);

$arrival = "SELECT * FROM registration WHERE uid = '$uid'";
$a_query = mysqli_query($conn, $arrival);
$a_values = mysqli_fetch_array($a_query);

$int = "SELECT intrests FROM profile WHERE uid= '$uid'";
$intquery = mysqli_query($conn, $int);
$int_count = mysqli_num_rows($intquery);
// print_r($intquery);

//$badge_count = $qrows + $answer_rows;

// if ($badge_count > '0') {
//   // echo $_SESSION['badge_count'];
//   if ($badge_count == '2') {
//     $_SESSION['badge_count'] = '2';
//     // echo $_SESSION['badge_count'];
//   } else if ($badge_count == '5') {
//     $_SESSION['badge_count'] = '5';
//     // echo $_SESSION['badge_count'];
//   } else if ($badge_count == '10') {
//     $_SESSION['badge_count'] = '10';
//     // echo $_SESSION['badge_count'];
//   }
// } else {
//   //  echo $_SESSION['badge_count'];

//   $_SESSION['badge_count'] = '0';
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>USER DASHBOARD|Project 2</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <!-- Style CSS -->
  <link rel="stylesheet" href="css/style.css" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet" />
  <style>
    #profile_btn {
      position: absolute;
      right: 300px;
      top: 100px;
    }
  </style>
</head>

<body>
  <?php include 'user_navbar.php'; ?>


  <div style="margin: 30px; padding-left: 30px;">
    <h1><?php echo $_SESSION['uname']; ?></h1>
    <small><b> Member from:
        <?php
        $changedate = $a_values['arrival'];
        $newdate = date("d-m-Y", strtotime($changedate));
        echo $newdate;
        ?></b></small>
    <a href="edit_user_profile.php"><button class="btn btn-primary" id="profile_btn">Edit Profile</button></a>
    <table cellpadding="15">
      <tr>
        <td><a href="user_dashboard.php">Profile</a></td>
        <td><a href="user_dashboard_activity.php?uid=<?php echo $uid;?>">Activity</a></td>
      </tr>
    </table>
  </div>
  <section style="position: absolute; top: 230px; left: 80px;">
    <h4>Stats</h4>
    <div class="card">
      <div class="card-body">
        <table cellpadding="10">
          <tr>
            <td><?php echo $answer_rows; ?><br><a href="display_user_question.php">answers</a> </td>
            <td><?php echo $qrows; ?> <br><a href="display_user_question.php">questions</a></td>
          </tr>
        </table>
      </div>
    </div>
  </section>

  <section style="position: relative; top: 130px; left: 80px; width: 250px;">
    <h4>Intrests</h4>
    <div class="card">
      <div class="card-body">
        <?php
        if ($int_count < 1) {
        ?>
          <span class="text text-danger">No intrests selected</span> <br>
          <small><span class="text text-primary">Select your intrests from <b><a href="edit_user_profile.php?uid=<?php echo $uid; ?>">edit profile</a> </b> option</span></small>
          <?php
        } else {
          if ($value['intrests'] == '') {
          ?>
            <span class="text text-danger">No intrests selected</span> <br>
            <small><span class="text text-primary">Select your intrests from <b><a href="edit_user_profile.php?uid=<?php echo $uid; ?>">edit profile</a> </b> option</span></small>
          <?php
          }
          else{
          $tags = $value['intrests'];
          $tags_final = explode(" ", $tags);
          foreach ($tags_final as $tag1) {
          ?>
            <span class="badge badge-dark"><?php echo $tag1; ?></span>
        <?php
          }
        }
        }
        //print_r($tags_final);
        // echo $search['tags'];
        ?>
      </div>
    </div>
  </section>

  <section style="position: absolute; top: 230px; left: 400px; width: 800px;">
    <h4>Badges</h4>
    <div class="card">
      <div class="card-body">
        <div>
          <?php
          if (($qrows == 0 && $answer_rows == 0) || ($qrows == 0 || $answer_rows == 0)) {
          ?>
            <div>
              <div>
                <img src="assets/img/medal.png" alt="image" style="width: 100px;">
              </div>
              <div style="position: absolute; left: 150px; top: 20px;">
                <img src="assets/img/silver_medal.png" alt="image" style="width: 100px;">
              </div>
              <div style="position: absolute; left: 290px; top: 20px;">
                <img src="assets/img/bronze_medal.png" alt="image" style="width: 100px;">
              </div>
              <p><span class="text text-danger">You have still not recived any contributor badge.</span> <br><span class="text text-primary"><small>To get yours you need to ask questions and give appropriate answers to the questions of your intrest. </small></span></p>
            </div>
          <?php
          }
          if (($qrows > 0 && $qrows <= 2) && ($answer_rows > 0 && $answer_rows <= 2)) {
          ?>
            <div>
              <img src="assets/img/bronze_medal.png" alt="image" style="width: 100px;"> <br>
              <span>Your contributor level is: <span class="text text-primary">Rookie</span></span>
            </div>
          <?php } else if (($qrows > 2 && $qrows <= 5) && ($answer_rows > 2 && $answer_rows <= 5)) {
          ?>
            <div>
              <img src="assets/img/silver_medal.png" alt="image" style="width: 100px;"> <br>
              <span>Your contributor level is: <span class="text text-primary">Intermidiate</span></span>
            </div>
          <?php
          } else if ($qrows > 5 && $answer_rows > 5) {
          ?>
            <div>
              <img src="assets/img/medal.png" alt="image" style="width: 100px;"> <br>
              <span>Your contributor level is: <span class="text text-primary">Expert</span></span>
            </div>
          <?php
          }
          ?>

        </div>
      </div>
    </div>
  </section>
  
  <section style="position: relative; top: 90px; left: 400px; width: 800px;">
    <h4>Tags</h4>
    <div class="card">
      <div class="card-body">
        <!-- based on questions -->
        <div>
          <h5>These tags are recieved based on your questions:</h5>
          <?php
          if ($qrows == 0 && $answer_rows == 0) {
          ?>
            <span class="text text-danger">You have not recieved any tags here.</span>
          <?php
          }
          if ($qrows > 0 && $qrows <= 2) {
          ?>
            <span class="badge badge-danger">SPARK</span>
          <?php
          } else if ($qrows > 2 && $qrows <= 5) {
          ?>
            <span class="badge badge-danger">CONTRIBUTOR</span> <br>
            <span class="badge badge-danger">QUESTIONER</span>
          <?php
          } else if ($qrows > 5) {
          ?>
            <span class="badge badge-danger">EXAMINOR</span> <br>
            <span class="badge badge-danger">SEEKER</span> <br>
            <span class="badge badge-danger">ANXIOUS</span> <br>
          <?php
          } else if ($qrows == 0) {
          ?>
            <span class="text text-primary"><a href="ask_question.php">Ask few questions to get one!</a> </span>
          <?php
          }

          ?>
        </div>
        <hr>

        <!-- based on answers -->
        <div>
          <h5>These tags are recieved based on your answers:</h5>
          <?php
          if ($qrows == 0 && $answer_rows == 0) {
          ?>
            <span class="text text-danger">You have not recieved any tags here.</span>
          <?php
          }
          if ($answer_rows > 0 && $answer_rows <= 2) {
          ?>
            <span class="badge badge-primary">QUICKIE</span>
          <?php
          } else if ($answer_rows > 2 && $answer_rows <= 5) {
          ?>
            <span class="badge badge-primary">CONTRIBUTOR</span> <br>
            <span class="badge badge-primary">PRO</span>
          <?php
          } else if ($answer_rows > 5) {
          ?>
            <span class="badge badge-primary">GENIUS</span> <br>
            <span class="badge badge-primary">TEACHER</span> <br>
            <span class="badge badge-primary">ERUDITE</span> <br>
          <?php
          } else if ($answer_rows == 0) {
          ?>
            <span class="text text-primary"><a href="question_display_page.php">Answer a few to get one!</a></span>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </section>

  <section style="position: relative; top: 150px; left: 400px; width: 800px;">
    <h4>About</h4>
    <?php
    if ($rows > 0) {
    ?>
      <div class="card">
        <div class="card-body">
          <?php
          if ($value['about'] == '') {
          ?>
            You have still not completed your profile, <a href="edit_user_profile.php"> complete it now! </a>
          <?php } else {
            echo $value['about'];
          }
          ?>
        </div>
      </div>
    <?php } else {
    ?>
      <div class="card">
        <div class="card-body">
          You have still not completed your profile, <a href="edit_user_profile.php"> complete it now! </a>
        </div>
      </div>

    <?php } ?>

  </section>
  
  










  <!--  <footer>
      <div class="container">
        <div class="row text-light text-center py-4 justify-content-center">
          <div class="col-sm-10 col-md-8 col-lg-6">
            <a href="http://" target="_blank" rel="noopener noreferrer"><strong class="logo" style="color: #4981b3;">Q & A</strong></a>
            <p>
              Use the adjective amazing to describe something that so good, it
              surprises you, like the amazing beauty of rocky mountain.
            </p>
            <ul class="social pt-3">
              <li>
                <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>
              </li>
              <li>
                <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
              </li>
              <li>
                <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
              </li>
              <li>
                <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer> -->

  <!-- <div class="socket text-light text-center py-4">
      <p>&copy;<a href="#">Brainiac Infosystem</a></p>
    </div>
 -->



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