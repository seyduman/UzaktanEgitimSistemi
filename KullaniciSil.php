<?php
 
$silinecekID= $_GET['id'];

$host = 'localhost';
$user = 'root';
$pass = '';
$baglan=mysqli_connect($host, $user, $pass,'phpproject');
   ini_set('memory_limit', '-1');
mysqli_set_charset($baglan, "utf8");
 
$sonuc=mysqli_query($baglan,"DELETE from kullanici where kullaniciID=".$silinecekID);
 
if($sonuc>0){
echo "Kullanıcı başarıyla silindi, Kullanıclar sayfasına yönlendiriliyorsunuz...";
header( "refresh:2;url=yonetici.php" ); 
 }
else
echo "Bir sorun oluştu silinemedi";
 
?>