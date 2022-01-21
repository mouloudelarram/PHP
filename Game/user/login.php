<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./system.css">
    <title>Log In</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="../img/logo.png" alt="Logo">
        </div>
    </header>
    <main>
        <form action="./login.php" method="get">
            <div class="option">
                <a href="" class="">Log In</a>
                <a href="./signup.php" class="signup">Sign Up</a>
            </div>
            <div class="main">
                <h1>Sign in to your account</h1>
                <input name="email" type="email" value="<?php if (isset($_GET['email'])) echo $_GET['email'];?>" placeholder="Email Adresse" required/>
                <input name="password" type="password" placeholder="Password" required/>
                <button type="submit" name="submit">Sign In</button>
                <?php
                    if (isset($_GET['email']) && isset($_GET['password'])){
                        include '../database/connection.php';
                        $table = checkIfExist($_GET['email'], $_GET['password']);
                        if (!empty($table)){
                            session_start();                         
                            $_SESSION['user'] = array(
                                "username" => $table[0]['username'],
                                "score"    => $table[0]['score'],
                                "email"    => $table[0]['email']
                            );
                            header('location:../');
                        }
                        else{
                            echo "<h3 class=\"error\">Please verify your information and try again !<h3>";
                        }
                    }
                    if (isset($_GET['Anonymous'])){
                        session_start();                         
                            $_SESSION['user'] = array(
                                "firstname" => "Anonymous",
                                "lastname"  => "Anonymous",
                                "email"     => "Anonymous"
                            );
                            header('location:../');
                    }
                ?>
            </div>
        </form>
    </main>
</body>
</html>
