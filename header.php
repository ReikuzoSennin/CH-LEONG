<head>
    <script src="https://kit.fontawesome.com/0c2638ec91.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js" integrity="sha256-hlKLmzaRlE8SCJC1Kw8zoUbU8BxA+8kR3gseuKfMjxA=" crossorigin="anonymous"></script>
    <link href="https://code.jquery.com/ui/1.13.0/themes/smoothness/jquery-ui.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css">
</head>
<script type="text/javascript">  
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}
$(document).ready(function () {
    $('.nav').find('a.active').removeClass('active');

    var sPath = window.location.pathname;
    var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
    $('.nav').find('a[href="' + sPage + '"]').addClass('active');
});
</script>
<header>
    <img id="logo" src="media/chleong.png" alt="">
    <ul class="nav">
        <li class="page"><a href="home.php">Home</a></li>
        <li class="page"><a href="about.php">About Us</a></li>
        <li class="page"><a href="team.php">Our Team</a></li>
        <li class="page"><a href="shop.php">Shop</a></li>
        <li class="page"><a href="feedback.php">Feedback</a></li>
        <li class="page"><a href="contact.php">Contact</a></li>
        <li id="cart"><a href="cart.php"><i class="fas fa-shopping-bag fa-2x"></i></a></li>
        <?php
        if(isset($_SESSION['user'])) {
            echo '<li id="login" onclick="myFunction()" class="dropbtn"><i class="fas fa-user-circle"></i><span id="username">&nbsp;'.$_SESSION['user']['USERNAME'][0].'</span>'.' <i class="fas fa-chevron-down fa-sm"></i>';
                echo '<ul id="myDropdown" class="dropdown-content">';
                    echo '<li><a href="profile.php">Account</a></li>';
                    echo '<li><a href="php/logout.php" class="logout">Logout</a></li>';
                echo "</ul>";
            echo '</li>';
        } else { echo '<li id="login"><a href="login.php"><i class="fas fa-user-circle"></i><span>&nbsp;Log In</span></a></li>'; }
        ?>
    </ul>
    <div id="search">
        <i class="fas fa-search"></i>
        <form action="search.php" method="get">
            <input type="search" id="search" name="search" placeholder="Search" required>
        </form>
    </div>
</header>