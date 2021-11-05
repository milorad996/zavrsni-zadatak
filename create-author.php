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
    $firstName = $_POST["FirstName"];
    $lastName = $_POST["LastName"];
    $gender = $_POST["gender"];
    

    if(empty($firstName) || empty($lastName) || empty($gender) ){
         echo('Nesto nije u redu');
        return;
    }else{
        $sql = "INSERT INTO author (FirstName,LastName,gender) VALUES ('$firstName', '$lastName', '$gender')";
        $statement = $connection->prepare($sql);
        $statement->execute();

        header("Location: ./posts.php"); 
    }
} 

?>
<div>
<form action = "create-post.php" method="POST" id="postsForma" >
        <input type="text" name="FirstName" placeholder="FirstName" id="titlePosts"></input><br>        
        <input type="text" name="LastName" placeholder="LastName" id="titlePosts"></input><br> 
        <input type="radio" id="gender" name="gender" value="M">
        <label for="gender">M</label><br>
        <input type="radio" id="gender" name="gender" value="Z">
        <label for="gender">Z</label><br>
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