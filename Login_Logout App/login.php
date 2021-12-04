<?php
    session_start();
    $_SESSION['userData'] = array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/sign up.css">
    <title>Long In System</title>
</head>
<body>
        <form method="GET" class="signup">
            <h3>Login with your account</h3>
            <div>
            <label for="name">name : </label>
            <input type="text" name ="name" placeholder="your name goes here" required/>
            </div>
            <div>
            <label for="password">password : </label>
            <input type="password" name ="password" placeholder="your password goes here" required/>
            </div>
            <div>
                <a href="./sign up.php">sign up</a>
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>
        <?php
            if (isset($_GET['password']) && isset($_GET['name'])){
                include './data/data.php';
                $tableDatas = getData();
                //print_r($tableDatas);
                  //  echo "<br>";
                for ($i=0; $i<count($tableDatas); $i++){
                    //print_r($tableDatas[$i]);
                    //echo "<br>";
                    if ($tableDatas[$i]['name'] == $_GET['name']  && $tableDatas[$i]['password'] == $_GET['password']){
                        $_SESSION['userData'] = array(
                            "name"=> $_GET['name'],
                            "email"=> $tableDatas[$i]['email'],
                            "password"=>$_GET['password']
                        );
                        //echo "exist";
                        header('location:./index.php');
                    }
                }
                echo " not found";
            }
        ?>
</body>
</html>