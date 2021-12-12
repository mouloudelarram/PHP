<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/sign up.css">
    <title>Sign Up System</title>
</head>
<body>
        <form method="GET" class="signup">
            <h3>Sign Up with new account</h3>
            
            
            <div>
            <label for="name">name : </label>
            <input type="text" name ="name" placeholder="your name goes here" value="<?php if (isset($_GET['name'])) echo $_GET['name'];?>" required/>
            </div>
            <div>
            <label for="email">email : </label>
            <input type="text" name ="email" placeholder="your email goes here" value="<?php if (isset($_GET['email'])) echo $_GET['email']?>" required/>
            </div>
            <div>
            <label for="password">password : </label>
            <input type="password" name ="password" placeholder="your password goes here" required/>
            </div>
            <div>
            <label for="confirm password">confirm password : </label>
            <input type="password" name ="conf_password" placeholder="your password goes here" required/>
            </div>
            <div>
                <a href="./login.php">login</a>
                <button type="submit" name="submit">Submit</button>
            </div>  
        </form>
        <?php
            if (isset($_GET['erreur'])){
                echo $_GET['erreur'];
            }
            if (isset($_GET['password']) && isset($_GET['conf_password'])){
                include './data/data.php';
                if ($_GET['password'] ==  $_GET['conf_password']){
                    if (!search($_GET['name'], $_GET['email'])){
                        putData($_GET['name'], $_GET['email'], $_GET['password']);
                        session_start();
                        $_SESSION['userData'] = array(
                            "name"=> $_GET['name'],
                            "email"=> $_GET['email'],
                            "password"=>$_GET['password']
                        );
                        print_r($_SESSION['userData']);
                        header('location:./index.php');
                    }
                    else{
                        header('location:./sign up.php?name='.$_GET['name'].'&email='.$_GET['email'].'&erreur=email or name already exist');
                    }                    
                }
                else{
                    header('location:./sign up.php?name='.$_GET['name'].'&email='.$_GET['email'].'&erreur=password erreur');
                    
                }
            }
                
        ?>

</body>
</html>