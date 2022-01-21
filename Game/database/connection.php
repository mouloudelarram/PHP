<?php
    try{
        $connection = new PDO("mysql:host=localhost;dbname=game","root","");
    }catch(PDOException $e){
        $e->getMessage();
    }
    function insertUser($username, $email, $password){
        try{
            $request =  $GLOBALS['connection']->prepare("INSERT INTO users (username, email, password) VALUES(:US, :EM, :PS)");
            $request->execute(['US'=>$username, 'EM'=>$email, 'PS'=> $password]);
            return true;
        }catch(PDOException $e){
            $e->getMessage();
            return false;
        }
    }
    function selectUsers(){
        try{
            $request =  $GLOBALS['connection']->prepare("SELECT username, score FROM users ORDER BY score DESC  ");
            $request->execute();
            return $request->fetchAll();
        }catch(PDOException $e){
            $e->getMessage();
        }
    }
    function checkIfExist($email, $password){
        try{
            $request = $GLOBALS['connection']->prepare("SELECT * FROM users WHERE email = :EM AND password = :PS");
            $request->execute(['EM'=>$email, 'PS'=>$password]);
            return $request->fetchAll();
        }catch(PDOException $e){
            $e->getMessage();
        }
    }
    function changeScore($email, $score){
        try{
                $req = $GLOBALS['connection']->prepare('UPDATE users SET  score= :SC WHERE email = :EM ');
                $req->execute(['EM'=>$email,'SC'=>$score]);
            return true;
        }catch(PDOException $e){
            $e->getMessage();
            return false;
        }
    }
?>