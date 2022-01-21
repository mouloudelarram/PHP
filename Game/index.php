<?php 
    session_start();
    if (isset($_GET['logout']))   
        unset($_SESSION['user']);
    if (!isset($_SESSION['user']))
        header('location:./user/login.php'); 
    if (isset($_POST['score'])){
        include './database/connection.php';
        changeScore($_SESSION['user']['email'], $_POST['score']);
        $_SESSION['user']['score'] = $_POST['score'];
    }        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" type="image/x-icon" href="https://img.icons8.com/ios/50/000000/controller.png">
    <title>Game</title>
</head>
<body>
    <audio>
        <source src="audio/pop.mp3" type="audio/ogg">
    </audio>
    <header>
        <div class="logo">
            <img src="./img/logo.png" alt="Logo">
        </div>
        <div class="userData">
            <h5 class="username">...</h5>
            <h5 class="score">score : ... pt   </h5>
            <h5 class="logout">Log Out </h5>
        </div>
    </header>
    <main>
        <section>
            <svg viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="50px" id="blobSvg">
                <defs>
                    <linearGradient id="gradient" x1="0%" y1="0%" x2="0%" y2="100%">
                    <stop offset="0%" style="stop-color: rgb(255, 95, 109);"></stop>
                    <stop offset="100%" style="stop-color: rgb(255, 195, 113);"></stop>
                    </linearGradient>
                </defs>
                <path fill="url(#gradient)">
                    <animate attributeName="d" dur="1000ms" repeatCount="indefinite" values="
                    M403.5,306Q405,362,364,417.5Q323,473,250,474Q177,475,147,411Q117,347,111,298.5Q105,250,118,207Q131,164,171,147Q211,130,251,126Q291,122,338,137Q385,152,393.5,201Q402,250,403.5,306Z ; 
                    M436,299.5Q386,349,346,385Q306,421,246,434.5Q186,448,145.5,402Q105,356,68,303Q31,250,68,197.5Q105,145,155,129Q205,113,259.5,83.5Q314,54,355.5,98.5Q397,143,441.5,196.5Q486,250,436,299.5Z ; 
                    M429.5,314Q426,378,369,409Q312,440,246,453Q180,466,125,423.5Q70,381,95.5,315.5Q121,250,118,201Q115,152,149.5,100Q184,48,247,56.5Q310,65,337,116Q364,167,398.5,208.5Q433,250,429.5,314Z ; 
                    M403.5,306Q405,362,364,417.5Q323,473,250,474Q177,475,147,411Q117,347,111,298.5Q105,250,118,207Q131,164,171,147Q211,130,251,126Q291,122,338,137Q385,152,393.5,201Q402,250,403.5,306Z  "/>
                </path>
            </svg>
        </section>
        <aside>
        </aside>
    </main>
    <footer>
        <div class="options">
            <h5 class="start">Start</h5>
            <h5 class="stop" >Stop</h5>
            <h5 class="save" >Save</h5>
        </div>
        <div class="speed">
            <h5 class="speedValue">speed:1</h5>
            <input type="range" min="1" max="10" value="1" id="speed">
            <h5 class="size">size: </h5>
            <select>
                <option value='50'>50%</option>
                <option value='100'>100%</option>
                <option value='200'>200%</option>
            </select>
        </div>  
        <div class="point">
            <h5>total points : 0</h5>
        </div>
    </footer>
    <script src="./js/script.js"></script>
</body>
</html>