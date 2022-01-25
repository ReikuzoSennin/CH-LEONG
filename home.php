<?php include('php/authenticate.php') ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Ch Leong Enterprise Sdn Bhd</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="icon" href="media/chleong.png">
</head>
<!-- Header -->
<?php include('header.php'); ?>
<body>
    <section id="space"></section>
    <section id="whoweare">
        <div id="img-container"></div>
        <div id="text-container">
            <h1>WHO WE ARE?</h1>
            <p>Our Company was initially established under the name Ch Leong Enterprise by its founder Mr. Leong Chin Hai on 16 December 1997.
At first he only sold vegetables in the markets and as the business grew he became a supplier of vegetables to traders around Selangor. Later the company name was changed to Ch Leong Enterprise Sdn. Bhd. In 2014. Ch Leong Company continues to grow and is involved in the importation of fresh fruits and vegetables. With packaging and cold storage facilities, we have the ability to supply fruits and vegetables throughout Malaysia. In 2019 Mr. Leong Chin Hai has passed away and his business has been taken over by his business partner. Although he was gone but his business continued. Now the name CH LEONG has also been registered with the intellectual property corporation (MYiPPO). This is to maintain his name as the founder to CH LEONG.</p>
        </div>
    </section>
    <section class="carousel-title">
        <h1>FRUIT</h1>
        <?php
            echo "<div id='carousel'>";
            $results = mysqli_query($con, "SELECT * FROM products WHERE categoryID IN (SELECT categoryID from category WHERE categoryName='FRUIT') GROUP BY productName ORDER BY productID LIMIT 6");
            while ($product = mysqli_fetch_array($results)) {
                echo '<div class="product">';
                    echo '<div id="prod-img-container">';
                        echo "<img src='".$product['productImage']."'>";
                    echo '</div>';
                    echo "<div id='prod-text-container'>";
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
    </section>
    <section class="carousel-title">
        <h1>MEAT & POULTRY</h1>
        <?php
            echo "<div id='carousel'>";
            $results = mysqli_query($con, "SELECT * FROM products WHERE categoryID IN (SELECT categoryID from category WHERE categoryName='MEAT & POULTRY') GROUP BY productName ORDER BY productID LIMIT 6");
            while ($product = mysqli_fetch_array($results)) {
                echo '<div class="product">';
                    echo '<div id="prod-img-container">';
                        echo "<img src='".$product['productImage']."'>";
                    echo '</div>';
                    echo "<div id='prod-text-container'>";
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
    </section>
    <section class="carousel-title">
        <h1>SEAFOOD</h1>
        <?php
            echo "<div id='carousel'>";
            $results = mysqli_query($con, "SELECT * FROM products WHERE categoryID IN (SELECT categoryID from category WHERE categoryName='SEAFOOD') GROUP BY productName ORDER BY productID LIMIT 6");
            while ($product = mysqli_fetch_array($results)) {
                echo '<div class="product">';
                    echo '<div id="prod-img-container">';
                        echo "<img src='".$product['productImage']."'>";
                    echo '</div>';
                    echo "<div id='prod-text-container'>";
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
    </section>
    <section class="carousel-title">
        <h1>VEGETABLES</h1>
        <?php
            echo "<div id='carousel'>";
            $results = mysqli_query($con, "SELECT * FROM products WHERE categoryID IN (SELECT categoryID from category WHERE categoryName='VEGETABLES') GROUP BY productName ORDER BY productID LIMIT 6");
            while ($product = mysqli_fetch_array($results)) {
                echo '<div class="product">';
                    echo '<div id="prod-img-container">';
                        echo "<img src='".$product['productImage']."'>";
                    echo '</div>';
                    echo "<div id='prod-text-container'>";
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
    </section>
    <section id="download">
        <div>
            <h1>Wanted To Become Our Customer?</h1><br><br>
            <p>Please download and fill up the<br>Application Form, then send it back to us!</p><br><br><br>
            <a href="https://docs.google.com/forms/d/e/1FAIpQLScSD8uSYPAqf1VAXpwYbnAIu3lVJ5c4gP7enYA4RxLKe_pjgQ/viewform" target="_blank">Go To Download Page</a>
        </div>
    </section>
</body>
<!-- Footer -->
<?php include('footer.php'); ?>
</html>