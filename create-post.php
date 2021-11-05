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


if(isset($_POST['submit'])){
    $body = $_POST["body"];
    $title = $_POST["title"];
    $author = $_POST["author"];
    $currentDate =  date("Y-m-d h:i");

    if(empty($author) || empty($body) || empty($title) ){
         echo('Nesto nije u redu');
        return;
    }else{
        $sql = "INSERT INTO posts (title,body,author,created_at) VALUES ('$title', '$body', '$author', '$currentDate')";
        $statement = $connection->prepare($sql);
        $statement->execute();

        header("Location: ./posts.php"); 
    }
} 

?>
<div>
<form action = "create-post.php" method="POST" id="postsForma" >
        <input type="text" name="title" placeholder="Title" id="titlePosts"></input><br>        
        <input type="text" name="author" placeholder="category" id="titlePosts"></input><br>        
        <textarea name="body" placeholder ="Enter Post" rows = "10" id="bodyPosts"></textarea><br>
        <button type="submit" name="submit">Submit</button>
    </form>
</div>


            

        </div><!-- /.blog-main -->

        
    </div><!-- /.row -->
<?php include('sidebar.php') ?>
</main><!-- /.container -->

<?php include('footer.php') ?>
</body>
</html>