<?php
session_start();
$_SESSION['yetki']==1;
header('Location:admin.php');
?>