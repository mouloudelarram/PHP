
<?php
    $connection=mysqli_connect('localhost','root','','gidb');
    if($connection){
        echo "connected";
    }else{
        die("Connection Error");
    }

    $username="redouane";
    $query="INSERT INTO users(username,password,score) VALUES('$username','1234',12)";
    $result=mysqli_query($connection, $query);
    if(!$result){
      die('Query Error!!!');
    }
    
?>
    