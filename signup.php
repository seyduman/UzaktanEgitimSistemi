<link rel="stylesheet" href="login tema/login.css" />
<?php include("baglanti.php"); ?>
<div class="wrapper fadeInDown">
  <div id="formContent">
    
    <h2 class="inactive underlineHover"><a href="login.php">GİRİŞ YAP </a></h2>
    <h2 class="active">KAYIT OL</h2>

    
    <div class="fadeIn first">
      
      <img src="tema/assets/images/user.png" id="icon" alt="User Icon" style="height: 90px; width: 90px;" />
    </div>

    
    <form action="" method="post">
      <input type="text" id="kullaniciAdi" class="fadeIn second" name="kullaniciAdi" placeholder="Kullanıcı Adınızı Giriniz:">
      <input type="password" id="sifre" class="fadeIn third" name="sifre" placeholder="Parolanızı Giriniz:">
      <input type="text" id="AdiSoyadi" class="fadeIn fourth" name="AdiSoyadi" placeholder="Ad ve Soyad Giriniz:">
      <select id="bolum" class="inputdrop" name="bolum">
          <option value="1">Bilgisayar Mühendisliği</option>
          <option value="2">Elektrik-Elektronik Mühendisliği</option>
          <option value="3">Makine Mühendisliği</option>
      </select>
      <input type="submit" name="Kaydol" class="fadeIn fourth" value="Kaydol">
    </form>

    <?php 
 if(isset($_POST['Kaydol'])){
                                    

	
	if(isset($_POST['kullaniciAdi']))
	{
	$kullaniciAdi=$_POST['kullaniciAdi'];
	}
	if(isset($_POST['AdiSoyadi']))
	{
	$AdiSoyadi=$_POST['AdiSoyadi'];
	}
	if(isset($_POST['sifre']))
	{
	$sifre=$_POST['sifre'];
	}
	if (isset($_POST['bolum']))
	{
	$bolum=$_POST['bolum'];
	}
		

	if ($dbh->query("insert into kullanici (kullaniciID,AdiSoyadi,kullaniciAdi,bolumID,sifre,yetki) VALUES (NULL,'$AdiSoyadi','$kullaniciAdi','$bolum','$sifre',0)" )) {
	
		  echo "New record created successfully";
	} 
	else {
		  echo "Error";
	}
		
	}
?>

  </div>
</div>