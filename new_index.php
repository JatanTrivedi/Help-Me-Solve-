<?php include('server.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Like and Dislike system</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        .posts-wrapper {
            width: 50%;
            margin: 20px auto;
            border: 1px solid #eee;
        }

        .post {
            width: 90%;
            margin: 20px auto;
            padding: 10px 5px 0px 5px;
            border: 1px solid green;
        }

        .post-info {
            margin: 10px auto 0px;
            padding: 5px;
        }

        .fa {
            font-size: 1.2em;
        }

        .fa-thumbs-down,
        .fa-thumbs-o-down {
            transform: rotateY(180deg);
        }

        .logged_in_user {
            padding: 10px 30px 0px;
        }

        i {
            color: blue;
        }
    </style>
</head>

<body>
    <div class="posts-wrapper">
        <?php foreach ($posts as $post) : ?>
            <div class="post">
                <div class="post-info">
                    <!-- if user likes post, style button differently -->
                    <i <?php if (userLiked($post['aid'])) : ?> class="fa fa-thumbs-up like-btn" <?php else : ?> class="fa fa-thumbs-o-up like-btn" <?php endif ?> data-id="<?php echo $post['aid'] ?>"></i>
                    <span class="likes"><?php echo getLikes($post['aid']); ?></span>

                    &nbsp;&nbsp;&nbsp;&nbsp;

                    <!-- if user dislikes post, style button differently -->
                    <i <?php if (userDisliked($post['aid'])) : ?> class="fa fa-thumbs-down dislike-btn" <?php else : ?> class="fa fa-thumbs-o-down dislike-btn" <?php endif ?> data-id="<?php echo $post['aid'] ?>"></i>
                    <span class="dislikes"><?php echo getDislikes($post['aid']); ?></span>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <script src="script.js"></script>
</body>

</html>