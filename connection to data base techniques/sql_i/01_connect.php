
<?php
    $connection=mysqli_connect('localhost','root','','gidb');
    if($connection){
        echo "connected";
    }else{
        die("Connection Error");
    }
?>
