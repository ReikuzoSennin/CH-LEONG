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
    <title>Cart | Ch Leong Enterprise Sdn Bhd</title>
    <link rel="stylesheet" href="css/cart.css">
    <link rel="icon" href="media/chleong.png">
</head>
<!-- Header -->
<?php include('header.php'); ?>
<script>
    $(function () {
        var timer;              
        var doneTypingInterval = 3000; // wait 3 seconds
        $('.adds').click(function add() {
            var $rooms = $(this).siblings(".quantity");
            var a = $rooms.val();
            if (a <= 98) {
                a++;
                $rooms.val(a);
                $(".subs").prop("disabled", !a);
                clearTimeout(timer); 
                timer = setTimeout(doStuff, doneTypingInterval)
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
                clearTimeout(timer); 
                timer = setTimeout(doStuff, doneTypingInterval)
            }
            else {
                $(".subs").prop("disabled", true);
            }
        });
        function doStuff() {
            $('#quantity-change').submit();
        }
    });
    $(function () {
        // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("checkout");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    var span2 = document.getElementsByClassName("close")[1];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    span2.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    });
</script>
<body>
    <section id="space"></section>
    <section>
        <!-- The Modal -->
        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <div class="modal-container">
                    <i class="fas fa-exclamation-circle"></i>
                    <h1>We can't accept online orders right now</h1>
                    <p>Please contact us to complete your purchase.</p>
                    <span class="close" id="gotit">Got It</span>
                </div>
            </div>
        </div>
        <div id="cart-container">
            <?php
            $results = oci_parse($con, "SELECT * FROM cart_items WHERE cartID IN (SELECT cartID FROM cart WHERE userID='".$_SESSION['user']['USERID'][0]."')");
            oci_execute($results);
            $nrows = oci_fetch_all($results, $res);
            if ($nrows <> 0) {
            echo '<div id="product-list">';
                echo "<h1>My cart</h1>";
                echo "<hr class='solid'>";
                echo "<table>";
                echo "<form action='' id='quantity-change' method='post'>";
                $totalprice = 0;
                for($i=0; $i<$nrows; $i++) {
                    $result = oci_parse($con, "SELECT * FROM variants WHERE variantID='".$res['VARIANTID'][$i]."' ");
                    oci_execute($result);
                    $product = oci_fetch_array($result);
                    echo "<tr>";
                    echo "<td width=15%;><div class='img-container'>";
                        echo "<img src='".$product['VARIANTIMAGE']."'>";
                    echo "</div></td>";
                    echo "<td width=55%;><div class='text-container'>";
                        // echo "<p>".(($product['variantName']<>"") ? $product['variantName']:$product['variantName'])."</p>";
                        echo "<p>".($product['VARIANTNAME'])."</p>";
                        echo "<p>RM".$product['VARIANTPRICE']."</p>";
                    echo "</div></td>";
                    echo "<td width=18%;><input type='button' class='subs' value='&minus;'>";
                    echo "<input type='hidden' name='id[]' value='".$product['VARIANTID']."'>";
                    echo "<input type='number' class='quantity' value='".$res['QUANTITY'][$i]."' min='1' max='99' name='quantity[]' onChange='this.form.submit()'>";
                    echo "<input type='button' class='adds' value='&plus;'></td>";
                    echo "<input type='hidden' name='quantity-change'>";
                    $productprice = $res['QUANTITY'][$i]*$product['VARIANTPRICE'];
                    $totalprice += $productprice;
                    echo "<td width=13%;><p>RM".$productprice.".00</p></td>";
                    echo "<td width=13%;><button value='".$product['VARIANTID']."' name='remove-item' class='remove-btn'>&#10005;</button></td>";
                    echo "</tr>";
                }
                echo "</form>";
                echo "</table>";
            echo '</div>';
            echo '<div id="summary">';
                echo "<h1>Order summary</h1>";
                echo "<hr class='solid'>";
                echo "<table style='width:100%;'s>";
                echo "<tr><td><p>Subtotal</p></td>";
                echo "<td><p>RM".$totalprice.".00</p></td></tr>";
                echo "<tr><td><p>Total</p></td>";
                echo "<td><p>RM".$totalprice.".00</p></td></tr>";
                echo "<tr><td colspan='2'><input type='button' id='checkout' value='Checkout'></td></tr>";
                echo "</table>";
            echo '</div>';
            } else {
                echo "<div id='empty-container'>";
                echo "<h1>My cart</h1>";
                echo "<hr class='solid'>";
                echo "<div id='mid'>";
                echo "<h2>Cart is empty</h2><br>";
                echo "<a href='index.php'>Continue Shopping</a>";
                echo "</div>";
                echo "<hr class='solid'>";
                echo "</div>";
            }
            ?>
        </div>
    </section>
</body>
<!-- Footer -->
<?php include('footer.php'); ?>
</html>