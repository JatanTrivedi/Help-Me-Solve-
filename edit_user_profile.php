<?php
session_start();
$uid = $_SESSION['uid'];
$_SESSION['page_add'] = $_SERVER['REQUEST_URI'];
?>
<?php
include 'connection.php';

$sql = "SELECT * FROM profile WHERE uid = '$uid;'";
$query = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($query);
$value = mysqli_fetch_assoc($query);

$intrests = "SELECT intrests FROM profile WHERE uid = '$uid'";
$intquery = mysqli_query($conn,$intrests);
$count_int = mysqli_num_rows($intquery);
$intrest_array = mysqli_fetch_array($intquery);
$array = explode(" ",$intrest_array['intrests']);

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
    #profile_pic {
      width: 150px;
      height: 150px;
    }
    #input_type {
      width: 450px;
    }
  </style>
</head>
<body>
  <?php include 'user_navbar.php'; ?>

  <div style="margin: 30px; padding-left: 30px;">
    <h1><?php echo $_SESSION['uname']; ?></h1>
    <table cellpadding="15">
      <tr>
        <td><a href="user_dashboard.php">Profile</a></td>
        <td><a href="user_dashboard_activity.php?uid=<?php echo $uid;?>">Activity</a></td>
      </tr>
    </table>
  </div>

  <div class="container">
    <h2>Edit Your Profile</h2>
    <hr>
    <h4>Public Information</h4>
    <div class="card">
      <div class="card-body">
        <table cellpadding="5">
          <?php
          if ($rows > 0) {
          ?>
            <form action="update_user_profile.php" method="post">
              <tr>
                <td><input type="hidden" value="<?php echo $_SESSION['uid']; ?>" name="uid"></td>
              </tr>
              <tr>
                <th><label for="display_name">Display Name</label></th>
              </tr>
              <tr>
                <td><input type="text" id="input_type" placeholder="Enter your display name" value="<?php echo $value['name']; ?>" name="display_name"></td>
              </tr>

              <tr>
                <th><label for="location">Location</label></th>
              </tr>
              <tr>
                <td><input type="text" id="input_type" placeholder="Where do you live?" name="location" value="<?php echo $value['location']; ?>"></td>
              </tr>

              <tr>
                <th><label for="title">Title</label></th>
              </tr>
              <tr>
                <td><input type="text" id="input_type" placeholder="Set your title" name="title" value="<?php echo $value['title']; ?>"></td>
              </tr>

              <tr>
                <th><label for="about">About Me</label></th>
              </tr>
              <tr>
                <td><textarea name="aboutme" cols="100" rows="10" style="resize: none;"><?php echo $value['about']; ?></textarea></td>
              </tr>
              <tr>
                <th>
                  <label for="intrest">Your Intrest</label> 
                </th>
              <tr>
                <td>
        

              <tr>
                <td>PHP</td>
                <td><input type="checkbox" name="intrest[]" value="PHP"
                <?php 
                
                if(in_array("PHP",$array))
                {
                  ?>
                  checked
                  <?php
                }
                ?>
                ></input></td>
              </tr>
              <tr>
                <td>C</td>
                <td><input type="checkbox" name="intrest[]" value="C"
                <?php 
                if(in_array("C",$array))
                {
                  ?>
                  checked
                  <?php
                }
                ?>></td>
              </tr>
              <tr>
                <td>html</td>
                <td><input type="checkbox" name="intrest[]" value="html"
                <?php 
               if(in_array("html",$array))
               {
                 ?>
                 checked
                 <?php
               }
                ?>></td>
              </tr>
              <tr>
                <td>css</td>
                <td><input type="checkbox" name="intrest[]" value="css"
                <?php 
               if(in_array("css",$array))
               {
                 ?>
                 checked
                 <?php
               }
                ?>></td>
              </tr>
              <tr>
                <td>Javascript</td>
                <td><input type="checkbox" name="intrest[]" value="Javascript"
                <?php 
                 
                  if(in_array("Javascript",$array))
                {
                  ?>
                  checked
                  <?php
                }
                   
                ?>></td>
              </tr>
              <tr>
                <td>C++</td>
                <td><input type="checkbox" name="intrest[]" value="C++"
                <?php 
                if(in_array("C++",$array))
                {
                  ?>
                  checked
                  <?php
                }
                ?>></td>
              </tr>
              <tr>
                <td>Java</td>
                <td><input type="checkbox" name="intrest[]" value="Java"
                <?php 
                if(in_array("Java",$array))
                {
                  ?>
                  checked
                  <?php
                }
                ?>></td>
              </tr>
              <tr>
                <td>bootstrap</td>
                <td><input type="checkbox" name="intrest[]" value="bootstrap"
                <?php 
                if(in_array("bootstrap",$array))
                {
                  ?>
                  checked
                  <?php
                }
                ?>></td>
              </tr>
              </td>
              </tr>
              </tr>
        </table>
        <button class="btn btn-primary" type="submit">Update Profile</button>
        </form>
      <?php } else {
      ?>
        <form action="update_user_profile.php" method="post">
          <tr>
            <td><input type="hidden" value="<?php echo $_SESSION['uid']; ?>" name="uid"></td>
          </tr>
          <tr>
            <th><label for="display_name">Display Name</label></th>
          </tr>
          <tr>
            <td><input type="text" id="input_type" placeholder="Enter your display name" value="<?php echo $_SESSION['uname']; ?>" name="display_name"></td>
          </tr>

          <tr>
            <th><label for="location">Location</label></th>
          </tr>
          <tr>
            <td><input type="text" id="input_type" placeholder="Where do you live?" name="location"></td>
          </tr>

          <tr>
            <th><label for="title">Title</label></th>
          </tr>
          <tr>
            <td><input type="text" id="input_type" placeholder="Set your title" name="title"></td>
          </tr>

          <tr>
            <th><label for="about">About Me</label></th>
          </tr>
          <tr>
            <td><textarea name="aboutme" cols="100" rows="10" style="resize: none;" placeholder="Mention yourself in few words"></textarea></td>
          </tr>
          <tr>
                <th>
                  <label for="intrest">Your Intrest</label> 
                </th>
              <tr>
                <td>
                  <!-- <input type="text" style="width: 800px;" placeholder="e.g. C, C++, java, python, etc." name="tags"> -->

              <tr>
                <td>PHP</td>
                <td><input type="checkbox" name="intrest[]" value="PHP"
                <?php 
                if(in_array("PHP",$array))
                {
                  ?>
                  checked
                  <?php
                }
                ?>
                ></input></td>
              </tr>
              <tr>
                <td>C</td>
                <td><input type="checkbox" name="intrest[]" value="C"
                <?php 
                if(in_array("C",$array))
                {
                  ?>
                  checked
                  <?php
                }
                ?>></td>
              </tr>
              <tr>
                <td>html</td>
                <td><input type="checkbox" name="intrest[]" value="html"
                <?php 
                if(in_array("html",$array))
                {
                  ?>
                  checked
                  <?php
                }
                ?>></td>
              </tr>
              <tr>
                <td>css</td>
                <td><input type="checkbox" name="intrest[]" value="css"
                <?php 
                if(in_array("css",$array))
                {
                  ?>
                  checked
                  <?php
                }
                ?>></td>
              </tr>
              <tr>
                <td>Javascript</td>
                <td><input type="checkbox" name="intrest[]" value="Javascript"
                <?php 
                if(in_array("Javascript",$array))
                {
                  ?>
                  checked
                  <?php
                }
                ?>></td>
              </tr>
              <tr>
                <td>C++</td>
                <td><input type="checkbox" name="intrest[]" value="C++"
                <?php 
                if(in_array("C++",$array))
                {
                  ?>
                  checked
                  <?php
                }
                ?>></td>
              </tr>
              <tr>
                <td>Java</td>
                <td><input type="checkbox" name="intrest[]" value="Java"
                <?php 
                if(in_array("Java",$array))
                {
                  ?>
                  checked
                  <?php
                }
                ?>></td>
              </tr>
              <tr>
                <td>bootstrap</td>
                <td><input type="checkbox" name="intrest[]" value="bootstrap"
                <?php 
                if(in_array("bootstrap",$array))
                {
                  ?>
                  checked
                  <?php
                }
                ?>></td>
              </tr>
              </td>
              </tr>
              </tr>

          </table>
          <button class="btn btn-primary" type="submit">Update Profile</button>
        </form>
      <?php } ?>

      </div>
    </div>
  </div>

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