<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./system.css">
    <title>Sign Up</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="../img/logo.png" alt="Logo">
        </div>
    </header>
    <main>
        <form action="./signup.php" method="get">
            <div class="option">
                <a href="./login.php"  class="login">Log In</a>
                <a class="">Sign Up</a></div>
            <div class="main">
                    <h1>Create your account</h1>
                    <input name="username" type="text" value="<?php if (isset($_GET['username'])) echo $_GET['username'];?>"  placeholder="username" required/>
                    <input name="email" type="email" value="<?php if (isset($_GET['email'])) echo $_GET['email'];?>"  placeholder="Email Adresse" required/>
                    <input name="password" type="password" placeholder="Password" required/>
                    <button type="submit" name="submit">Sign Up</button>
                    <?php
                        if (isset($_GET['email']) && isset($_GET['password']) && isset($_GET['username'])){
                            include '../database/connection.php';            
                            if (insertUser($_GET['username'], $_GET['email'], $_GET['password'])){
                                session_start();
                                $_SESSION['user'] = array(
                                    "username" => $_GET['username'],
                                    "score"  => 0,
                                    "email"  => $_GET['email']
                                );
                                header('location:../');
                            }
                            else{
                                echo "<h3 class=\"error\">Please verify your information and try again, Maybe the email or username already exists !<h3>";
                            }
                        }
                    ?>
            </div>
        </form>
    </main>
</body>
</html>
