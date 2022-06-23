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
</head>

<body>
  <?php include 'user_navbar.php'; ?>

  <div class="container">

      <?php
      $search_query = $_GET['search'];
      $sql = "SELECT * FROM question WHERE question OR tags LIKE '%$search_query%'";
      $query = mysqli_query($conn,$sql);
      $count = mysqli_num_rows($query);
      if($count>0)
      {
        ?><h1 class="text text-success my-4 py-2">Search results for <em>"<?php echo $_GET['search'];?>"</em></h1><?php
          while( $result = mysqli_fetch_array($query))
          {
      ?>
      <a href="give_answer_user.php?qid=<?php echo $result['qid']; ?>"><h3><?php echo $result['question'];?></h3></a>
      <?php }
      }
      else{
        ?><h2 class="text text-danger my-4">NO RESULTS FOUND FOR <em>"<?php echo $_GET['search'];?>"</em></h2>
        <p><i class="fas fa-sad-tear"></i> sorry we have nothing to show...</p>
        <?php
      } ?>
  </div>

    <!-- jQuery -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap 4.5 JS -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Popper JS -->
    <script src="js/popper.min.js"></script>
    <!-- Font Awesome -->
    <script src="js/all.min.js"></script>
    <script type="text/javascript">
      // function answer(x) {
      //   var element = document.getElementsByName('hidden_div');
      //   var div_element = element[x].getAttribute('id');
      //   var answer_btn = document.getElementsByName('element_button');
      //   var button_element = answer_btn[x].getAttribute('id');

      //   if (x == div_element) {
      //     //document.getElementById(answer_btn).style.display = "block";  

      //     if (document.getElementById(div_element).style.display === "none") {
      //       document.getElementById(div_element).style.display = "block";

      //       document.getElementById(button_element).value = "cancel";
      //     } else {
      //       document.getElementById(div_element).style.display = "none";

      //       document.getElementById(button_element).value = "ANSWER";

      //     }
      //   }
      // }
    </script>
</body>

</html>