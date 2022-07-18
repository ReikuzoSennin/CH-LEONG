<?php include('php/authenticate.php') ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Ch Leong Enterprise Sdn Bhd</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" href="media/chleong.png">
</head>
<body>
    <section id="login">
        <div id="exit">
            <a href="index.php">&#10005;</a>
        </div>
        <div id="form">
            <div id="title">
                <h1>Sign Up</h1>
                <p>Already a member?<a href="login.php"> Log In</a></p>
            </div>
            <form action="" method="post">
                <label for="email">Email</label><br>
                <input type="email" name="email" id="email">
                <?php echo "<br><p id='error'>".(isset($_SESSION['email']) ? $_SESSION['email'] : "")."</p>" ?><br>
                <label for="password">Password</label><br>
                <input type="password" name="password" id="password">
                <?php echo "<br><p id='error'>".(isset($_SESSION['password']) ? $_SESSION['password'] : "")."</p>" ?><br>
                <input type="submit" name="register" value="Log In" id="btn">
                <?php unset($_SESSION['email'],$_SESSION['password']); ?>
            </form>
        </div>
    </section>
</body>
</html>