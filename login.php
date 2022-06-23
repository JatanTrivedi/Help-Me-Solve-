<?php 
session_start();
$_SESSION['uname'] = 0;
?>
<?php
include "connection.php";
?>

<!DOCTYPE html>  
 <html lang="en">  
  <head>  
   <meta charset="UTF-8" />  
   <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
   <link rel="stylesheet" href="login_css">

   <!-- <link rel="stylesheet" href="css/style.css" /> -->
   <title>Form Input Wave</title>  
  </head>  
  <body>  
     <div class="card">
          <div class="container">  
         <h1><u>Login</u> </h1>  
         <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">  
         <div class="form-control">  
         <input type="text" required  name="email" placeholder="Enter your email">  
         <label>Email</label>  
            </div>  
         <div class="form-control">  
         <input type="password" required name="password" placeholder="Enter you password">  
         <label>Password</label>  
         </div>  
         <button class="btn" type="submit" name="submit">Login</button>  
         <p class="text">Don't have an account? <a href="registration.php" style="color: blue;">Register</a> </p>  
         </form>  
      </div>  
      </div>
      <script type="text/javascript">
         const labels = document.querySelectorAll('.form-control label')  
         labels.forEach(label => {  
         label.innerHTML = label.innerText  
      .split('')  
      .map((letter, idx) => `<span style="transition-delay:${idx * 50}ms">${letter}</span>`)  
      .join('')  
       })  
      </script>  
  </body>  
 </html> 
 <?php


      if(isset($_POST['submit']))
      {
         include "connection.php";
         $email = $_POST['email'];
         $password = $_POST['password'];

         $email_search = "SELECT * from registration where email='$email' ";

         $query = mysqli_query($conn,$email_search);
          $pass = mysqli_fetch_assoc($query);
          $db_pass = $pass['password'];
          

         // $email_count = mysqli_num_rows($query);

         if($db_pass == $password)
         {
            $_SESSION['uname'] = $pass['uname'];
            $_SESSION['uid'] = $pass['uid'];
            header('location:'. $_SESSION['page_add']);       
         }
         else
         {
            ?>
            <script>
               alert("Log in failed");
            </script> 
            <?php   
         } 
      }
    ?>
