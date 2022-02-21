<?php
    try {
        $db = new PDO('mysql:host=localhost;dbname=gidb', 'root', '');
        $sql = 'UPDATE users SET  password= :p, email= :e WHERE username = :u';
        $req = $db->prepare($sql);
        $req->execute(['u'=>'amale','p'=>'0000','e'=> 'a@a.a']);
        $res = $req->fetchAll();
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>

