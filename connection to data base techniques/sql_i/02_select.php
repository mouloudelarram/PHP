
<?php
    $connection=mysqli_connect('localhost','root','','gidb');
    if($connection){
        echo "connected";
    }else{
        die("Connection Error");
    }
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
    <?php } ?>
