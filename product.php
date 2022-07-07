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
        $sql = "SELECT * FROM variants v
                JOIN products p
                ON v.productID = p.productID
                WHERE v.variantID=".$_GET['id']."";
        $result = mysqli_query($con, $sql);
        $product = mysqli_fetch_array($result);
        echo '<div id="img-container">';
            echo "<img src='".$product['variantImage']."'>";
        echo '</div>';
        echo '<div id="text-container">';
            echo "<p>".(($product['variantName']<>"") ? $product['variantName']:$product['productName'])."</p>";
            echo "<p>RM".$product['variantPrice']."</p>";
            $sql = "SELECT * FROM variants
                    WHERE productID = ".$product['productID']."";
            $results = mysqli_query($con, $sql);
            if(mysqli_num_rows($results) > 1) {
            echo "<form action='' method='GET' onChange=submit()>";
                echo '<label for="type" id="type-label">Type</label><br><br>';
                echo "<select name='id' id='type'>";
                while($products = mysqli_fetch_array($results)) {
                    echo "<option value='".$products['variantID']."' ".((isset($_GET['id']) && $_GET['id']==$products['variantID']) ? 'selected' : '').">".$products['variantName']."</option>";
                }
                echo "</select><br>";
            echo "</form>";
            }
            $sql = "SELECT * FROM inventory
            WHERE variantID = ".$product['variantID']."
            AND productInventory = 'In Stock'";
            $stock = mysqli_query($con, $sql);
            if(mysqli_num_rows($stock) > 0) {
            echo "<form action='' method='POST'>";
                echo '<input type="hidden" name="id" value="'.$_GET['id'].'">';
                echo '<label for="quantity" id="quantity-label">Quantity</label><br><br>';
                echo '<input type="number" name="quantity" id="quantity" value="1" min="1" max="99"><br>';
                echo '<input type="submit" id="submit-btn" name="add-to-cart" value="Add to Cart">';
            echo "</form>";
            } else {
                echo "<p>OUT OF STOCK</p>";
            }
        echo '</div>';
        ?>
        </div>
    </section>
</body>
<!-- Footer -->
<?php include('footer.php'); ?>
</html>