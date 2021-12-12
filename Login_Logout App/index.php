<?php
    //print_r($_COOKIE['name']);
    session_start();
    $_SESSION['userData'];
    //print_r($_SESSION['userData']);
    //unset($_SESSION['userData']);
    if (empty($_COOKIE['name']))    
        if (empty($_SESSION['userData']))
            header('location:./sign up.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>App</title>
</head>
<body>
    <header>
        <?php echo $_SESSION['userData']['name'] ?>
        <button name="logout"><a href="./index.php?action=logout&&logout=true">LogOut</a></button>
        <?php if (isset($_GET['logout'])){
             unset($_SESSION['userData']);
             setcookie("name",$_GET['name'],time() - 60);
             header('location:./login.php');    
        }
        ?>
    </header>
</body>
</html>