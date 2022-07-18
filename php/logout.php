<?php
    session_start();
    session_destroy();
    echo '<script>
        sessionStorage.clear();
        window.location.href="../index.php";
        </script>';
    // header("Location:../index.php");
?>