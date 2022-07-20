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
    <title>Profile | Ch Leong Enterprise Sdn Bhd</title>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="icon" href="media/chleong.png">
</head>
<!-- Header -->
<?php include('header.php'); ?>
<body>
    <section id="space"></section>
    <section class="profile">
        <div id="profile-logo">
            <div id="profile-container">
                <div id="profile-pic">
                    <form action="" method="post" enctype="multipart/form-data">
                    <label>
                    <input type="file" name="fileToUpload" style="display: none;" onchange="document.getElementById('upload-user').click();">
                    <?php
                    $file_name = $_SESSION['user']['USERID'][0];
                    $destination = "media/users/";
                    $extensions = array('.jpg', '.png', '.jpeg', '.gif');
                    $src = "media/users/default.png";
                    foreach ($extensions as $ext) {
                        if (file_exists($destination.$file_name.$ext)) {
                            $src = $destination.$file_name.$ext;
                            break;
                        } 
                    }
                    echo "<img id='pic' src='".$src."'>";
                    echo "</label>";
                    echo "<input type='hidden' name='userID' value='".$_SESSION['user']['USERID'][0]."'>";
                    ?>
                    <input type="submit" style="display: none;" id="upload-user" name="upload-user">
                    </form>
                </div>
                <?php echo "<br><p>".(isset($_SESSION['user']) ? $_SESSION['user']['USERNAME'][0] : "")."</p>" ?><br>
            </div>
        </div>
        <div id="profile-details">
            <form action="" method="post">
                <h1>Username</h1>
                <input type="text" name="username" class="profile-form" placeholder="Username" <?php echo "value='".(isset($_SESSION['user']) ? $_SESSION['user']['USERNAME'][0] : "")."'"?> >
                <?php echo "<br><p id='error'>".(isset($_SESSION['username']) ? $_SESSION['username'] : "")."</p>" ?><br>
                <input type="hidden" name="rename">
                <?php unset($_SESSION['username']); ?>
            </form>
            <hr class="solid"><br>
            <h1>Email</h1>
            <?php echo "<br><p>".(isset($_SESSION['user']) ? $_SESSION['user']['USEREMAIL'][0] : "")."</p>"?><br>
            <hr class="solid"><br>
            <form action="" method="post">
                <h1>Password</h1>
                <input type="password" name="password1" class="profile-form" placeholder="New Password">
                <?php echo "<br><p id='error'>".(isset($_SESSION['password1']) ? $_SESSION['password1'] : "")."</p>" ?><br>
                <input type="password" name="password2" class="profile-form" placeholder="Confirm New Password">
                <?php echo "<br><p id='error'>".(isset($_SESSION['password2']) ? $_SESSION['password2'] : "")."</p>" ?><br>
                <input type="submit" value="Change Password" name="pass-change" id="pass-change">
                <?php unset($_SESSION['password1'],$_SESSION['password2']); ?>
            </form>
        </div>
    </section>
</body>
<!-- Footer -->
<?php include('footer.php'); ?>
</html>
