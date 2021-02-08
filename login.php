<link rel="stylesheet" href="login tema/login.css" />
<?php include("baglanti.php"); ?>
<div class="wrapper fadeInDown">
  <div id="formContent">
    
    <h2 class="active"> GİRİŞ YAP </h2>
    <h2 class="inactive underlineHover"><a href="signup.php">KAYIT OL</a></h2>

    
    <div class="fadeIn first">
      
      <img src="tema/assets/images/user.png" id="icon" alt="User Icon" style="height: 90px; width: 90px;" />
    </div>

    
    <form action="" method="post">
    <input type="text" name="kullaniciAdi" placeholder="Kullanıcı Adı" required="">
					<input type="password" name="sifre" class="lock" placeholder="Şifre">
      <input type="submit" name="sign"class="fadeIn fourth" value="Giriş">
    </form>

    <?php 
              
               session_start();
              if(isset($_POST['kullaniciAdi']))
              {
                  $kullaniciAdi=$_POST['kullaniciAdi'];
                  
              }
              else
              {
                  
              }
              if(isset($_POST['sifre']))
              {
                  $sifre=$_POST['sifre'];
              }
              else
              {
                  $sifre=null;
              }
            
			  if(isset($_POST['sign']))
			  {
				foreach($dbh->query("select * from kullanici where kullaniciAdi='$kullaniciAdi' and sifre='$sifre'") as $row)   
				{
				$_SESSION['kullaniciAdi']=$row['kullaniciAdi'];
				$_SESSION['kullaniciID']=$row['kullaniciID'];
				  header("Location:index.php");
				}
              }
              ?>
    <div id="formFooter">
      <a class="underlineHover" href="#">Parolamı Unuttum?</a>
    </div>

  </div>
</div>

<div class="copyrights" style="text-align: center; font-family: Arial;">
            <p>© ŞEYMA DUMAN & MELDA ŞEN </p>
          
          </div>