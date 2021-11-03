<?php include('dbConnect.php') ?>




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
<?php include('header.php') ?>
<body>

<?php
                
                

                $sql = "SELECT id, title, body, author, created_at FROM posts ORDER BY created_at DESC " ;
                $statement = $connection->prepare($sql);
                
                $statement->execute();
                
                $statement->setFetchMode(PDO::FETCH_ASSOC);
                
                $posts = $statement->fetchAll();
                
                
                
                
?>

<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">
        <?php
            foreach ($posts as $post) {
         ?>
            <div class="blog-post">
                <h2 class="blog-post-title"><a href="single-post.php"><?php echo($post['title']) ?></a></h2>
                <p class="blog-post-meta"><?php echo($post['created_at']) ?><a href="#">Mark</a></p>

                <p><?php echo $post['body'] ?></p>
                
            </div><!-- /.blog-post -->

            <div class="blog-post">
                <h2 class="blog-post-title"><a href="single-post.php"><?php echo($post['title']) ?></a></h2>
                <p class="blog-post-meta"><?php echo($post['created_at']) ?><a href="#">Jacob</a></p>

                <p><?php echo $post['body'] ?></p>
            </div><!-- /.blog-post -->

            <div class="blog-post">
                <h2 class="blog-post-title"><a href="single-post.php"><?php echo($post['title']) ?></a></h2>
                <p class="blog-post-meta"><?php echo($post['created_at']) ?><a href="#">Chris</a></p>

                <p><?php echo $post['body'] ?></p>
            </div><!-- /.blog-post -->

            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>
        <?php
            }
        ?>
        </div><!-- /.blog-main -->

        
    </div><!-- /.row -->

</main><!-- /.container -->
<?php include('sidebar.php') ?>
</body>
<?php include('footer.php') ?>
</html>
