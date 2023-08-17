<?php 
    ob_start();
    session_start();
    header('Location:loginstudent.php');
    session_destroy();
?>