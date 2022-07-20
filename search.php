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
                $sql = "SELECT * FROM variants v 
                JOIN products p 
                USING (productid) 
                WHERE UPPER(p.productName) LIKE UPPER('%".$_GET['search']."%')
                AND VARIANTID IN
                (
                    SELECT VARIANTID FROM
                    (
                        SELECT VARIANTID, row_number() over (partition by productid order by productid asc) rn
                        FROM VARIANTS
                    )WHERE RN=1
                )";
                $results = oci_parse($con, $sql);
                oci_execute($results);
                $nrows = oci_fetch_all($results, $res);
            ?>
            <p><?php echo $nrows?> products found for "<?php echo $_GET['search'] ?>"</p>
            <?php
                echo "<div id='product-list'>"; 
                for($i=0; $i<$nrows; $i++) {
                    echo '<div class="product">';
                        echo '<div id="img-container">';
                            echo "<img src='".$res['VARIANTIMAGE'][$i]."'>";
                        echo '</div>';
                        echo "<div id='text-container'>";
                                    echo "<p>".$res['PRODUCTNAME'][$i]."</p>";
                                    echo "<p><b>RM".$res['VARIANTPRICE'][$i]."</b></p>";
                        echo "</div>";
                        echo "<form action='product.php?id=".$res['VARIANTID'][$i]."' method='post'>";
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