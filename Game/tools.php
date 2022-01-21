<?php 
    include './database/connection.php';
    if (isset($_POST['users']))
        echo json_encode(selectUsers());    
    elseif (isset($_POST['currentuser'])) {
        session_start();
        echo json_encode($_SESSION['user']);
    }
    else
        echo null;        
?>