<?php include('php/authenticate.php') ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search | Ch Leong Enterprise Sdn Bhd</title>
    <link rel="stylesheet" href="css/search.css">
    <link rel="icon" href="media/chleong.png">
</head>
<!-- Header -->
<?php include('header.php'); ?>
<body>
    <section id="space"></section>
    <section id="search-container">
        <h1>Search Results</h1>
        <div id="search-wrapper">
            <i class="fas fa-search"></i>
            <form action="search.php" method="get">
                <input type="search" id="search-box" name="search" value="<?php echo $_GET['search']?>" placeholder="Search">
            </form>
            <?php
                $results = mysqli_query($con, "SELECT * FROM products WHERE productName LIKE '%".$_GET['search']."%' GROUP BY productName");
            ?>
            <p><?php echo mysqli_num_rows($results)?> products found for "<?php echo $_GET['search'] ?>"</p>
            <?php
                echo "<div id='product-list'>"; 
                while ($product = mysqli_fetch_array($results)) {
                    echo '<div class="product">';
                        echo '<div id="img-container">';
                            echo "<img src='".$product['productImage']."'>";
                        echo '</div>';
                        echo "<div id='text-container'>";
                                    echo "<p>".$product['productName']."</p>";
                                    echo "<p><b>RM".$product['productPrice']."</b></p>";
                        echo "</div>";
                        echo "<form action='product.php?id=".$product['productID']."' method='post'>";
                            echo "<input type='submit' class='addtocart' value='Add to Cart' name='go-to-product'>";
                        echo "</form>";
                    echo '</div>';
                }
                echo "</div>";
            ?>
        </div>
    </section>
</body>
<!-- Footer -->
<?php include('footer.php'); ?>
</html>