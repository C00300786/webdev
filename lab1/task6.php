<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        
      $cart = array("Bread","Butter","Mayonaise","Ham");
      for ($i=0; $i < 4; $i++) 
      { 
       echo  $cart[$i];
       echo "<br>";        
      }
    ?>
    
</body>
</html>