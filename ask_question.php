<?php
include 'connection.php';
session_start();
$_SESSION['page_add'] = $_SERVER['REQUEST_URI'];
// echo $_SESSION['page_add'];
if (isset($_SESSION['uid'])) {
    $uid = $_SESSION['uid'];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>QUESTION PAGE|Project 2</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <!-- Style CSS -->
        <link rel="stylesheet" href="css/style.css" />
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet" />
        <style>
            :root {
                --text: "Select values";
            }

            .multiple_select {
                height: 30px;
                width: 800px;
                overflow: hidden;
                -webkit-appearance: menulist;
                position: relative;
            }

            .multiple_select::before {
                content: var(--text);
                display: flex;
                margin-left: 5px;
                margin-bottom: 2px;
            }

            .multiple_select_active {
                overflow: visible !important;
            }

            .multiple_select option {
                display: none;
                height: 30px;
                width: 799px;
                background-color: white;
            }

            .multiple_select_active option {
                display: flex;
            }

            .multiple_select option::before {
                content: "\2610";
            }

            .multiple_select option:checked::before {
                content: "\2611";
            }
        </style>
    </head>

    <body>
        <?php include 'user_navbar.php'; ?>

        <div class="container" style="margin: 50px;">
            <form method="POST" action="insert_question.php">
                <input type="hidden" name="uid" value="<?php echo $_SESSION['uid']; ?>">
                <table cellpadding="10">
                    <tr>
                        <th>
                            <h4>Title</h4>
                            <small>Being to the point is always a good option!</small>
                        </th>
                    <tr>
                        <td><input type="text" style="width: 800px;" placeholder="e.g. What is C?" name="title"></td>
                    </tr>
                    </tr>
                    <tr>
                        <th>
                            <h4>Body</h4>
                            <small>Enter details that a person would need to answer your question</small>
                        </th>
                    <tr>
                        <td><textarea name="body" cols="100" rows="10" style="resize:none;"></textarea></td>
                    </tr>
                    </tr>
                    <tr>
                        <th>
                            <h4>Tags</h4>
                            <small>Add tags that are relevant to your question</small>
                        </th>
                    <tr>
                        <td>
                            <!-- <input type="text" style="width: 800px;" placeholder="e.g. C, C++, java, python, etc." name="tags"> -->

                    <tr>
                        <td>PHP</td>
                        <td><input type="checkbox" name="techno[]" value="PHP"></td>
                    </tr>
                    <tr>
                        <td>C</td>
                        <td><input type="checkbox" name="techno[]" value="C"></td>
                    </tr>
                    <tr>
                        <td>html</td>
                        <td><input type="checkbox" name="techno[]" value="html"></td>
                    </tr>
                    <tr>
                        <td>css</td>
                        <td><input type="checkbox" name="techno[]" value="css"></td>
                    </tr>
                    <tr>
                        <td>Javascript</td>
                        <td><input type="checkbox" name="techno[]" value="Javascript"></td>
                    </tr>
                    <tr>
                        <td>C++</td>
                        <td><input type="checkbox" name="techno[]" value="C++"></td>
                    </tr>
                    <tr>
                        <td>Java</td>
                        <td><input type="checkbox" name="techno[]" value="Java"></td>
                    </tr>
                    <tr>
                        <td>bootstrap</td>
                        <td><input type="checkbox" name="techno[]" value="bootstrap"></td>
                    </tr>

                    </td>

                    </tr>
                    <td><span class="text text-danger">Please do not select more than three tags because that could make your question irrelative.</span></td>
                    </tr>
                    <tr>
                        <td><button class="btn btn-primary" type="submit">Post Question</button></td>
                    </tr>

                </table>
            </form>
        </div>
    <?php
} else {
    ?>
        <script>
            alert("you need to log in!");
            window.location.href = "login.php";
        </script>
    <?php
}
    ?>
    <!-- <script>
        $(".multiple_select").mousedown(function(e) {
    if (e.target.tagName == "OPTION") 
    {
      return; //don't close dropdown if i select option
    }
    $(this).toggleClass('multiple_select_active'); //close dropdown if click inside <select> box
});
$(".multiple_select").on('blur', function(e) {
    $(this).removeClass('multiple_select_active'); //close dropdown if click outside <select>
});
	
$('.multiple_select option').mousedown(function(e) { //no ctrl to select multiple
    e.preventDefault(); 
    $(this).prop('selected', $(this).prop('selected') ? false : true); //set selected options on click
    $(this).parent().change(); //trigger change event
});

	
	$("#myFilter").on('change', function() {
      var selected = $("#myFilter").val().toString(); //here I get all options and convert to string
      var document_style = document.documentElement.style;
      if(selected !== "")
        document_style.setProperty('--text', "'Selected: "+selected+"'");
      else
        document_style.setProperty('--text', "'Select values'");
    
	});
    </script> -->
    </body>

    </html>