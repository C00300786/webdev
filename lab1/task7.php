<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    //array
      $cart = [
        "Cereal" => 5.00,
        "Coffee" => 2.50,
        "Bananas" => 3.50,
        "Onions" => 1.00,
        "Lettuce" => 2.40,
        "Tomatoes" => 3.50,
    ];
    
    // Output each item's name and price
    foreach ($cart as $item => $price) {
        echo "Item: $item costs : $" . number_format($price, 2) . "<BR>";
    }
    ?>
    
</body>
</html>