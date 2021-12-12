<?php
    
    $tableDatas = array();
    function getData(){
        $dataFile = fopen("./data/data.txt","r");
        while(!feof($dataFile)){
            $lienData = fgets($dataFile);
            $tableData = explode(" ",$lienData);
            $tableData = array(
                "name"=>$tableData[0],
                "password"=>$tableData[1],
                "email"=>$tableData[2]
            );
            array_push($GLOBALS['tableDatas'],$tableData);
        }
        fclose($dataFile);
        //print_r($_GLOBALS['tableDatas']);
        return $GLOBALS['tableDatas'];
    }
    function putData($name, $email, $password){
        $dataFile = fopen("./data/data.txt","a");
        fwrite($dataFile,"\n".$name." ".$password." ".$email." ".".") ;
        fclose($dataFile);
    }
    function search($name, $email){
        foreach($GLOBALS['tableDatas'] as $item){
            if ($item['name'] == $name || $item['email'] == $email)
            {
                return true;
            }
        }
        return false;
    }  
    
?>