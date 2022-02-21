<?php
    try {
        $username='redouane';
        $db = new PDO('mysql:host=localhost;dbname=gidb', 'root', '');
        $req = $db->prepare('SELECT * FROM users WHERE username=:u');
        $req->execute(['u'=> $username]);
        $res = $req->fetchAll();
        foreach ($res as $r) {
?>
<p><?php echo $r["username"], "----", $r["score"] ; ?></p>
<?php }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>