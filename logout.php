<?php
session_start();
$_SESSION['kullaniciAdi']=null;
header('Location:index.php');
?>