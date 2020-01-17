<?php
    session_start();
    $_SESSION['numArticle'] = 1;
    //unset($_SESSION);
    session_destroy();
    header('Location: index.php'); 
?>