<?php
    function getData(){
        $dataFile = fopen("./data/data.txt","r");
        $tableDatas = array();
        while(!feof($dataFile)){
            $lienData = fgets($dataFile);
            $tableData = explode(" ",$lienData);
            $tableData = array(
                "name"=>$tableData[0],
                "password"=>$tableData[1],
                "email"=>$tableData[2]
            );
            array_push($tableDatas,$tableData);
        }
        fclose($dataFile);
        //print_r($tableDatas);
        return $tableDatas;
    }
    function putData($name, $email, $password){
        $dataFile = fopen("./data/data.txt","a");
        fwrite($dataFile,"\n".$name." ".$password." ".$email) ;
        fclose($dataFile);
    }
    
?>