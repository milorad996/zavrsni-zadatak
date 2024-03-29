<?php include('dbConnect.php')?>




<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
</head>

<body>

<?php include('header.php') ?>
<main role="main" class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">

            <?php

                $sql = "SELECT * FROM posts WHERE id = {$_GET['post_id']}";
                $statement = $connection->prepare($sql);
                $statement->execute();
                $statement->setFetchMode(PDO::FETCH_ASSOC);
                $singlePost = $statement->fetch();


            ?>

            <article class="va-c-article">
                <header>
                    <h1><?php echo ($singlePost['title']) ?></h1>
                    <div class="va-c-article__meta"><?php echo($singlePost['created_at']) ?> <?php echo($singlePost['author_id']) ?></div>
                </header>

                <div>
                    <p><?php echo ($singlePost['body']) ?></p>
                </div>

            </article>
        <?php
            $error = '';
            if (!empty($_GET['error'])) {
                $error = 'All fields are required';
            }
        ?>

        <div class="comments">
            <?php
                $sql = "SELECT * FROM comments WHERE id={$_GET['post_id']}";
                $statement = $connection->prepare($sql);
                $statement->execute();
                $statement->setFetchMode(PDO::FETCH_ASSOC);
                $comments = $statement->fetchAll();
            ?>
                <h3>comments</h3>
                    
                    <div class="single-comment">
                        <p><?php echo ($comments['text']) ?></p>
                    </div>
                            
        </div>

        
        <?php include('comments.php'); ?>

        </div>

        <?php include('sidebar.php'); ?>

    </div>

</main>
<?php include('footer.php') ?>
</body>

</html>