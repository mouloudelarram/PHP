<?php
    try {
       $db = new PDO('mysql:host=localhost;dbname=gidb', 'root', '');
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>
