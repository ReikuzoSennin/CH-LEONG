<?php include('php/authenticate.php') ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop | Ch Leong Enterprise Sdn Bhd</title>
    <link rel="stylesheet" href="css/shop.css">
    <link rel="icon" href="media/chleong.png">
</head>
<!-- Header -->
<?php include('header.php'); ?>
<script>
    $( function() {
        var min = <?php echo (isset($_GET['min'])) ? json_encode($_GET['min']) : 0; ?>,
        max = <?php echo (isset($_GET['max'])) ? json_encode($_GET['max']) : 290; ?>;
        $( "#slider-range" ).slider({
        range: true,
        min: 0,
        max: 290,
        values: [ min, max ],
        slide: function( event, ui ) {
            $( "#text-min" ).val("RM"+ ui.values[ 0 ]);
            $( "#text-max" ).val("RM"+ ui.values[ 1 ]);
        },
        change: function( event, ui ) {
            $('#min').val(ui.values[ 0 ]);
            $('#max').val(ui.values[ 1 ]);
            $("#priceform").submit();
        }
        });
        $( "#text-min" ).val("RM"+ $( "#slider-range" ).slider("values", 0 ));
        $( "#text-max" ).val("RM"+ $( "#slider-range" ).slider("values", 1 ));
    });
    $(function () {
        $('.adds').click(function add() {
            var $rooms = $(this).siblings(".quantity");
            var a = $rooms.val();
            if (a <= 98) {
                a++;
                $rooms.val(a);
                $(".subs").prop("disabled", !a);
            }
            else {
                $(".adds").prop("disabled", true);
            }
        });
        $(".subs").prop("disabled", !$(".quantity").val());
        $(".adds").prop("disabled", !$(".quantity").val());
        $('.subs').click(function subst() {
            var $rooms = $(this).siblings(".quantity");
            var b = $rooms.val();
            if (b >= 2) {
                b--;
                $rooms.val(b);
                $(".adds").prop("disabled", !b);
            }
            else {
                $(".subs").prop("disabled", true);
            }
        });
    });
</script>
<body>
    <section id="space"></section>
    <section id="shop">
        <h1>Our Products</h1>
        <div class="align-right">
            <form action="" method="get" onChange=submit()>
                <select name="sortby" id="sortby">
                    <option value="sortby" <?php echo ((isset($_GET['sortby']) && $_GET['sortby']=="sortby") ? "selected" : "") ?>>Sort By</option>
                    <option value="priceasc" <?php echo ((isset($_GET['sortby']) && $_GET['sortby']=="priceasc") ? "selected" : "") ?>>Price (low to high)</option>
                    <option value="pricedesc" <?php echo ((isset($_GET['sortby']) && $_GET['sortby']=="pricedesc") ? "selected" : "") ?>>Price (high to low)</option>
                    <option value="nameasc" <?php echo ((isset($_GET['sortby']) && $_GET['sortby']=="nameasc") ? "selected" : "") ?>>Name A-Z</option>
                    <option value="namedesc" <?php echo ((isset($_GET['sortby']) && $_GET['sortby']=="namedesc") ? "selected" : "") ?>>Name Z-A</option>
                </select>
                <?php echo (isset($_GET['category']) ? '<input type="hidden" name="category" value="'.$_GET['category'].'">' : "") ?>
                <?php echo (isset($_GET['min']) ? '<input type="hidden" name="min" value="'.$_GET['min'].'">' : "") ?>
                <?php echo (isset($_GET['max']) ? '<input type="hidden" name="max" value="'.$_GET['max'].'">' : "") ?>
            </form>
        </div>
        <div class="flex">
            <div id="filters">
                <h1>Filter by</h1>
                <hr class="solid">
                <h2>Collection</h2>
                <form action="" method="get" id="filter-category" onChange=submit()>
                <?php
                    echo (isset($_GET['sortby']) ? '<input type="hidden" name="sortby" value="'.$_GET['sortby'].'">' : "");
                    echo (isset($_GET['max']) ? '<input type="hidden" name="max" value="'.$_GET['max'].'">' : "");
                    echo (isset($_GET['min']) ? '<input type="hidden" name="min" value="'.$_GET['min'].'">' : "");
                    echo '<input type="radio" id="all" name="category" value="all" '.((isset($_GET["category"]) && $_GET["category"]=="all") ? "checked" : "").'>';
                    echo '<label for="all">All</label><br>';
                    $filters = oci_parse($con, "SELECT DISTINCT categoryName FROM category");
                    oci_execute($filters);
                    while($row = oci_fetch_array($filters)) {
                        echo '<input type="radio" id="'.$row['CATEGORYNAME'].'" name="category" value="'.$row['CATEGORYNAME'].'" '.((isset($_GET["category"]) && $_GET["category"]==$row['CATEGORYNAME']) ? "checked" : "").'>';
                        echo '<label for="'.$row['CATEGORYNAME'].'">'.$row['CATEGORYNAME'].'</label><br>';
                        $filters2 = oci_parse($con, "SELECT DISTINCT subCategoryName FROM category WHERE categoryName='".$row['CATEGORYNAME']."' AND subCategoryName IS NOT NULL");
                        oci_execute($filters2);
                        while($row2 = oci_fetch_array($filters2)) {
                            echo '<input type="radio" id="'.$row2['SUBCATEGORYNAME'].'" name="category" value="'.$row2['SUBCATEGORYNAME'].'" '.((isset($_GET["category"]) && $_GET["category"]==$row2['SUBCATEGORYNAME']) ? "checked" : "").'>';
                            echo '<label for="'.$row2['SUBCATEGORYNAME'].'">'.$row2['SUBCATEGORYNAME'].'</label><br>';
                        }
                    }
                ?>
                </form>
                    <hr class="solid">
                    <h2>Price</h2>
                    <form action="" id="priceform" method="get">
                    <input type="hidden" id="min" name="min">
                    <input type="hidden" id="max" name="max">
                    <?php  echo (isset($_GET['category']) ? '<input type="hidden" name="category" value="'.$_GET['category'].'">' : ""); ?>
                    <div id="slider-range"></div><br><br>
                    <div class="flex price-list">
                        <input type="text" id="text-min" maxlength="3" size="3" readonly>
                        <input type="text" id="text-max" maxlength="3" size="3" readonly>
                    </div>
                </form>
                <hr class="solid">
            </div>
            <div id="product-list">
                <?php
                $query ="SELECT * FROM VARIANTS V 
                JOIN PRODUCTS P 
                USING (productid) 
                JOIN CATEGORY C 
                USING (categoryid) 
                WHERE variantid IN ( 
                    SELECT variantID FROM 
                    ( 
                        SELECT variantID, row_number() over (partition by productid order by productid asc) rn2 FROM 
                        ( 
                            SELECT * FROM VARIANTS v 
                            JOIN PRODUCTS p 
                            USING (productid) 
                            JOIN CATEGORY c
                            USING (categoryid) 
                            JOIN INVENTORY i 
                            USING (variantid) 
                            WHERE productInventory = 'In Stock' 
                        )
                    ) WHERE rn2=1 
                )";
                if (isset($_GET['category'])) {
                    switch($_GET['category']) {
                        case 'all':
                            break;
                        case 'VEGETABLES':
                        case 'MEAT & POULTRY':
                        case 'SEAFOOD':
                        case 'FRUIT':
                            $query = $query." AND c.categoryName='".$_GET['category']."'";
                            break;
                        default:
                            $query = $query." AND c.subCategoryName='".$_GET['category']."'";
                    }
                }
                if (isset($_GET['min']) && isset($_GET['max'])) {
                    $query = $query." AND v.variantPrice BETWEEN '".$_GET['min']."' AND '".$_GET['max']."'";
                }
                //Calculate Number of Pages
                $result = oci_parse($con, $query);
                oci_execute($result);
                $row_count = oci_fetch_all($result, $res);
                $pages_count = ceil($row_count/9);
                (isset($_GET['page']) ? $page=$_GET['page'] : $page=1);
                //Display Products Limit 9
                $query = $query."))WHERE rn BETWEEN ".(($page<>1) ? (($page-1)*9)+1 : '1')." AND ".(($page<>1) ? ($page*9)-1 : '9').")";
                if (isset($_GET['sortby'])) {
                    switch($_GET['sortby']) {
                        case 'priceasc':
                            $query = $query." ORDER BY v.variantPrice asc";
                            break;
                        case 'pricedesc':
                            $query = $query." ORDER BY v.variantPrice desc";
                            break;
                        case 'nameasc':
                            $query = $query." ORDER BY p.productName asc";
                            break;
                        case 'namedesc':
                            $query = $query." ORDER BY p.productName desc";
                            break;
                    }
                }
                $query = 'SELECT * FROM VARIANTS V
                JOIN PRODUCTS P
                USING (productid)
                JOIN CATEGORY C
                USING (categoryid)
                JOIN INVENTORY I
                USING (variantid)
                WHERE variantid IN
                (
                    SELECT variantid FROM
                    (
                        SELECT variantid, row_number() over (order by variantid asc) rn FROM
                        ('.$query;
                $results = oci_parse($con, $query);
                oci_execute($results);
                $nrows = oci_fetch_all($results, $res);
                if($nrows>0) {
                    for($i=0; $i<$nrows; $i++) {
                        echo "<div class='product'>";
                            echo "<a href='product.php?id=".$res['VARIANTID'][$i]."'>";
                            echo "<div id='img-container'>";
                                echo "<img src='".$res['VARIANTIMAGE'][$i]."'>";
                                echo '<div class="overlay">';
                                    echo '<div class="text">Quick View</div>';
                                echo '</div>';
                            echo "</div>";
                            echo "<div id='text-container'>";
                                echo "<p>".$res['PRODUCTNAME'][$i]."</p>";
                                echo "<hr class='name-price'>";
                                echo "<p><b>RM".$res['VARIANTPRICE'][$i]."</b></p>";
                            echo "</div>";
                            echo "</a>";
                            echo "<form action='' method='post'>";
                            echo "<select name='id' class='variant-select'>";
                            $sql = "SELECT * FROM variants
                                    JOIN inventory
                                    USING (variantid)
                                    WHERE productID=".$res['PRODUCTID'][$i]." 
                                    AND productInventory='In Stock'";
                            $result = oci_parse($con, $sql);
                            oci_execute($result);
                            $nrows2 = oci_fetch_all($result, $res2);
                            for($j=0; $j<$nrows2; $j++) {
                                echo "<option value='".$res2['VARIANTID'][$j]."'>".$res2['VARIANTNAME'][$j]."</option>";
                            }
                            echo "</select>";
                            echo "<div id='quantity-wrapper'>";
                                echo "<input type='button' class='subs' value='&minus;'>";
                                echo "<input type='number' class='quantity' value='1' min='1' max='99' name='quantity'>";
                                echo "<input type='button' class='adds' value='&plus;'>";
                            echo "</div>";
                            echo "<input type='submit' class='addtocart' value='Add to Cart' name='add-to-cart'>";
                            echo "</form>";
                        echo "</div>";
                    }
                    echo "<div id='pagination'>";
                    $query = $_GET;
                    // replace parameter(s)
                    unset($query['page']);
                    // rebuild url
                    $query_result = http_build_query($query);
                    // new link
                    $pageURL = $_SERVER['PHP_SELF'];
                    echo ((($page-1) > 0) ? "<a href='".$pageURL."?".$query_result."?".$query_result."&page=".($page-1)."'+currentUrl>&#x276E;</a>" : "");
                    echo ((($page-2) > 1) ? "<a href='".$pageURL."?".$query_result."&page=1'>1</a>" : "");
                    echo ((($page-2) > 1) ? "<p>...</p>" : "");
                    echo ((($page-2) > 0) ? "<a href='".$pageURL."?".$query_result."&page=".($page-2)."'>".($page-2)."</a>" : "");
                    echo ((($page-1) > 0) ? "<a href='".$pageURL."?".$query_result."&page=".($page-1)."'>".($page-1)."</a>" : "");
                    echo "<p id='current'>".$page."</p>";
                    echo ((($page+1) <= $pages_count) ? "<a href='".$pageURL."?".$query_result."&page=".($page+1)."'>".($page+1)."</a>" : "");
                    echo ((($page+2) <= $pages_count) ? "<a href='".$pageURL."?".$query_result."&page=".($page+2)."'>".($page+2)."</a>" : "");
                    echo ((($page+2) < $pages_count) ? "<p>...</p>" : "");
                    echo ((($page+2) < $pages_count) ? "<a href='".$pageURL."?".$query_result."&page=".$pages_count."'+currentUrl>".$pages_count."</a>" : "");
                    echo ((($page+1) <= $pages_count) ? "<a href='".$pageURL."?".$query_result."&page=".($page+1)."'>&#x276F;</a>" : "");
                    echo "</div>";
                } else {
                    echo "<p id='no-item'>No items matched your search criteria. Try widening your search.</p>";
                }
                ?>
            </div>
        </div>
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