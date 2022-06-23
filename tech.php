<?php
include 'connection.php';
?>
<?php

// include 'connection.php';
// // $himu = $_SESSION["que"];
// //$sql = "INSERT INTO content(question,answer) VALUES('$himu','')";
// $query = mysqli_query($conn,$sql);

// if($query)
// {
//     echo "string";
// }
// else
// {
//     echo "np";
// }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Techie|Project 2</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar bg-light navbar-expand-lg navbar-dark">
        <div class="container">
            <a href="http://" target="_blank" rel="noopener noreferrer"><strong class="logo">XYZanswers</strong></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="index.html" class="nav-link active">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.html" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.html" class="nav-link">Services</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.html" class="nav-link">Project</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.html" class="nav-link">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row text-center my-5">
            <div class="col-md-12 my-4 pt-20">
                <h2>Techie Dashboard</h2>

                <table class="table">

                    <?php
                    $sql = "select * from question where status = 2";
                    $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    $count = 0;

                    while ($row = mysqli_fetch_array($query)) {
                        $a = $row['qid'];
                        $b = $row['question'];
                        $count++;
                    ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $b; ?></td>
                            <!-- <td><input type="submit" value="Answer" class="btn btn-success btn-md"></td>  -->
                            <td>
                                <!-- Trigger the modal with a button -->
                                <a href="#?a1=<?php echo $a; ?> ">
                                    <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal" onclick="display(<?php echo $a; ?>)">Answer</button>
                                </a>
                            <?php } ?>
                            <form method="GET" action="answer.php" id="form1">

                                <!-- Modal -->
                                <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"></h4>
                                            </div>
                                            <div class="modal-body form-group" style="text-align:left;">

                                                <input type="hidden" name="qid" id="qid" class="form-control">

                                                <input id="par" class="form-control" type="text" name="quesu" size="50" style="border:none;" disabled="true"></input>

                                                <textarea name="ans" class="form-control" rows="7" cols="50" placeholder="Enter answer here"></textarea>
                                            </div>
                                            <div class="modal-body">
                                                <a href="javascript:$('form1').submit();"> <button name="submit" class="btn btn-success" onclick="myFunction()">Submit</button></a>
                                                <input type="reset" value="reset" class="btn btn-danger" />
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </td>
                        </tr>


                </table>
                </form>

            </div>
        </div>
    </div>
    <div id="par2"></div>
    <script type="text/javascript">
        function display(x) {
            $.ajax({
                url: 'ajax2.php',
                type: "POST",
                dataType: 'json',
                data: ({
                    p: x
                }),
                success: function(data) {
                    var value1 = data.value_1;
                    var value2 = data.value_2;
                    // alert(value1);  
                    document.getElementById("par").value = value1;
                    document.getElementById("qid").value = value2;
                }
            });

        }

        function myFunction() {
            document.getElementById("form1").submit();
        }
    </script>


</body>

</html>