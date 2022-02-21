<?php
    try {
        $db = new PDO('mysql:host=localhost;dbname=gidb', 'root', '');
        $req = $db->prepare('SELECT * FROM users');
        $req->execute();
        $res = $req->fetchAll();
        foreach ($res as $r) {
?>
<p><?php echo $r["username"].'----'.$r["password"]; ?></p>
<?php }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>