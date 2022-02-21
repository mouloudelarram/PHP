<?php
    try {
        $db = new PDO('mysql:host=localhost;dbname=gidb', 'root', '');
        $sql = 'DELETE FROM users WHERE username = :u';
        $req = $db->prepare($sql);
        $req->execute(['u'=>'amale']);
        $res = $req->fetchAll();
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>

