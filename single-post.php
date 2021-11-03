<?php include('header.php') ?>
<?php include('footer.php') ?>
<?php include('sidebar.php') ?>
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

<body>


<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main"> 
            <?php
                  if (isset($_GET['post_id'])) {
                  $sql = "SELECT * 
                  FROM posts as p INNER JOIN comments AS c ON p.post_id = c.id
                  WHERE p.id = {$_GET['post_id']}";
                  $statement = $connection->prepare($sql);
                  $statement->execute();
                  $statement->setFetchMode(PDO::FETCH_ASSOC);
                  $singlePost = $statement->fetchAll();


                  $sql2 = "SELECT c.autor, c.post_id, c.text FROM comments AS c INNER JOIN posts as p ON c.post_id = p.id WHERE c.post_id = {$_GET['post_id']}";
                    $statement = $conn->prepare($sql2);
                    $statement->execute();
                    $statement->setFetchMode(PDO::FETCH_ASSOC);
                    $comments =  $statement->fetchAll();
                  }

                  foreach ($comments as $comment) {
                  ?>
            <div class="blog-post">
                <h2 class="blog-post-title">Sample blog post</h2>
                <p class="blog-post-meta">January 1, 2014 by <a href="#"><?php echo $comment['author'] ?></a></p>

                
                <ul>
                    <li><hr width="40%"><?php echo $comment['text'] ?></li>
                    
                </ul>
                <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>
                <ul>
                    <li><hr width="40%"><?php echo $comment['text'] ?></li>
                    
                </ul>
                <p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>
            </div><!-- /.blog-post -->

            <div class="blog-post">
                <h2 class="blog-post-title">Another blog post</h2>
                <p class="blog-post-meta">December 23, 2013 by <a href="#"><?php echo $comment['author'] ?></a></p>

                <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
                <blockquote>
                    <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                </blockquote>
                <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
            </div><!-- /.blog-post -->

            <div class="blog-post">
                <h2 class="blog-post-title">New feature</h2>
                <p class="blog-post-meta">December 14, 2013 by <a href="#"><?php echo $comment['author'] ?></a></p>

                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                <ul>
                    <li><hr width="40%"><?php echo $comment['text'] ?></li>
                    
                </ul>
                <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>
            </div><!-- /.blog-post -->

            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>

        </div><!-- /.blog-main -->
        <?php  } ?>
        
    </div><!-- /.row -->

</main><!-- /.container -->


</body>
</html>