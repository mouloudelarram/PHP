<?php
    try {
        $db = new PDO('mysql:host=localhost;dbname=gidb', 'root', '');
        $sql = 'INSERT INTO users(username, password, score) VALUES (:u, :p, :s)';
        $req = $db->prepare($sql);
        $req->execute(['u'=>'amale','p'=>'1222','s'=> 13]);
        $res = $req->fetchAll();
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>