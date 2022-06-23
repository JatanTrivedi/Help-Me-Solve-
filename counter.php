<?php
include 'connection.php';

$users = "SELECT * FROM registration";
$user_query = mysqli_query($conn,$users);
$user_count = mysqli_num_rows($user_query);

$questions = "SELECT * FROM question WHERE status= 2 or status = 3";
$question_query = mysqli_query($conn,$questions);
$question_count = mysqli_num_rows($question_query);

$answers = "SELECT * FROM answer WHERE status = 2";
$answer_query = mysqli_query($conn,$answers);
$answer_count = mysqli_num_rows($answer_query);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
      integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
      crossorigin="anonymous"
    />
    <!-- <link rel="stylesheet" href="style.css" /> -->
    <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
  
    <title>Increment Counter</title>
  </head>
  <body>
    <table cellpadding="10" cellspacing="10">
      <tr>
        <td>
    <div class="counter-container">
      <div style="position: relative; left:60px;">
        <i class="fas fa-users fa-4x" style="position: relative; right: 25px;"></i>
      <div class="counter" data-target="<?php echo $user_count;?>" style="font-size: 4em;"></div>
      </div>
      <span style="font-size: 4em;">Users</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </div>
    </div>
    </td>
    <td>
    <div class="counter-container">
      <div style="position:relative; left:120px;">
        <i class="fas fa-question fa-4x" style="position: relative; right: 10px;"></i>
      <div class="counter" data-target="<?php echo $question_count;?>" style="font-size: 4em;"></div>
      </div>
      <span style="font-size: 4em;">Questions</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    </td>
    <td>
    <div class="counter-container">
      <div style="position:relative; left:100px;">
        <i class="fas fa-lightbulb fa-4x" style="position: relative; right: 7px;"></i>
      <div class="counter" data-target="<?php echo $answer_count;?>" style="font-size: 4em;"></div>
      </div>
      <span style="font-size: 4em;">Answers</span>
    </div>
    </td>
    </tr>
    </table>
    <script>
      const counters = document.querySelectorAll(".counter");
      counters.forEach((counter) => {
        counter.innerText = "0";
        const updateCounter = () => {
          const target = +counter.getAttribute("data-target");
          const c = +counter.innerText;
          const increment = target / 200;
          if (c < target) {
            counter.innerText = `${Math.ceil(c + increment)}`;
            setTimeout(updateCounter, 200);
          } else {
            counter.innerText = target;
          }
        };
        updateCounter();
      });
    </script>
  </body>
</html>
