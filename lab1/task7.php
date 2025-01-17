<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        
      $cart = array("Cereal" => 5.00,"Coffee" => 2.50,"Bannan" => 3.50, "Onions" => 1.00,"Lettuce" => 2.40, "tomatos" => 3.50) ;
      for ($i=0; $i < 4; $i++) 
      { 
       echo  $cart[$i];
       echo "<br>";      
      }
    ?>
    
</body>
</html>