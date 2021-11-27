<?php
    include './php/data.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stl.css">
    <title>Hanouti</title>
</head>
<body>
    <header>
        <h1>Hanouti</h1>
        <h6>Created By EL ARRAM MOULOUD</h6>
    </header>
    <div>
        <section class="scroller prods">
            <?php
                $indice = 0;
                foreach ($products as $item){
                    print "
                    <div id=".$indice.">
                        <div id=".$indice." class = \"add\">+</div>
                        <img id=".$indice++." src=".$item["path"]." alt=\"\"/>
                        <div class= \"nameandprice\">
                            <h5>".$item["name"]."</h5>
                            <h5>".$item["price"]."</h5>
                        </div>
                    </div>
                    ";
                }
            ?>
        </section>
        <div class="modalInactive">
            
        </div>
        <aside class="scroller">            
            <input type="text" placeholder="Search"/>
            <div>
                <h5>totale : 0 DH</h5>
            </div> 
        </aside>
        <div class="checkout">
            <h5>CheckOut</h5>
        </div>
    </div>
    <script src="js/src.js"></script> 
</body>
</html>