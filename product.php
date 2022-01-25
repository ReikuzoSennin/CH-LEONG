<?php 
    include('php/authenticate.php');

    if(!isset($_SESSION["user"])) {
        header('Location:login.php');
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product | Ch Leong Enterprise Sdn Bhd</title>
    <link rel="stylesheet" href="css/product.css">
    <link rel="icon" href="media/chleong.png">
</head>
<!-- Header -->
<?php include('header.php'); ?>
<body>
    <section id="space"></section>
    <section>
        <div class="product">
        <?php
        $results = mysqli_query($con, "SELECT * FROM products WHERE productID=".$_GET['id']."");
        $product = mysqli_fetch_array($results);
        echo '<div id="img-container">';
            echo "<img src='".$product['productImage']."'>";
        echo '</div>';
        echo '<div id="text-container">';
            echo "<p>".(($product['variantName']<>"") ? $product['variantName']:$product['productName'])."</p>";
            echo "<p>RM".$product['productPrice']."</p>";
            if($product['variantName']<>"") {
            echo "<form action='' method='GET' onChange=submit()>";
                echo '<label for="type" id="type-label">Type</label><br><br>';
                echo "<select name='id' id='type'>";
                $result = mysqli_query($con, "SELECT * FROM products WHERE productName='".$product['productName']."' AND productID IN (SELECT productID FROM inventory WHERE productInventory='In Stock')");
                while($variant = mysqli_fetch_array($result)) {
                    echo "<option value='".$variant['productID']."' ".((isset($_GET['id']) && $_GET['id']==$variant['productID']) ? 'selected' : '').">".$variant['variantName']."</option>";
                }
                echo "</select><br>";
            echo "</form>";
            }
            echo "<form action='' method='POST'>";
                echo '<input type="hidden" name="id" value="'.$_GET['id'].'">';
                echo '<label for="quantity" id="quantity-label">Quantity</label><br><br>';
                echo '<input type="number" name="quantity" id="quantity" value="1" min="1" max="99"><br>';
                echo '<input type="submit" id="submit-btn" name="add-to-cart" value="Add to Cart">';
            echo "</form>";
        echo '</div>';
        ?>
        </div>
    </section>
</body>
<!-- Footer -->
<?php include('footer.php'); ?>
</html>