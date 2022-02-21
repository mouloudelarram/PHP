
<?php
    if(isset($_POST["submit"])){
        $usename=$_POST["username"];
        $password=$_POST["password"];
        $connection=mysqli_connect('localhost','root','','gidb');
        if($connection){
            echo "connected";
            
        }else{
            die("Connection Error");
        }
        //Create
       // $query="INSERT INTO user(username,email,password) VALUES('reda','r@r.r','1234')";
        //$result=mysqli_query($connection, $query);
        //if(!$result){
          //  die('Query Error!!!');
        //}
        //Read
        $query="SELECT * FROM user";
        $result=mysqli_query($connection, $query);
        if(!$result){
            die('Query Error!!!');
        }
        while($r=mysqli_fetch_row($result)){//$r=mysqli_fetch_assoc($result
        ?>
        <pre>
        <?php print_r($r);?>
        </pre>
        <?php
        }
        //Update

        //Dellet

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-sm-6">
                <form action="login.php" method="POST">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="text" name="password" class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <input  type="submit" class="btn btn-primary" name="submit" value="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>