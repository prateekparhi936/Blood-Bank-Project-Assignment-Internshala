<?php
session_start();
session_destroy();
unset($_SESSION['userrole']);
unset($_SESSION['useremail']);
header("Location:index.php");
?>