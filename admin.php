<?php
include 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADMIN|Project 2</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet" />
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
                <h2>Admin Dashboard</h2>
                <form method="GET">
                    <table class="table">
                        <?php
                        $sql = "select * from question where status = 0";
                        $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        $count = 0;

                        while ($row = mysqli_fetch_array($query)) {
                            $count++;
                        ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $row['question']; ?></td>
                                <td><a href="valid.php?ab=<?php echo $row['qid']; ?>">
                                        <input type="button" value="Valid" class="btn btn-success btn-md"></a></td>
                                <td><a href="delete.php?did=<?php echo $row['qid']; ?>">
                                        <input type="button" value="Reject" class="btn btn-danger btn-md" name="submit"></a></td>
                            </tr>
                        <?php } ?>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>

</html>