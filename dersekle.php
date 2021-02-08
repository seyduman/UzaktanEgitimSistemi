<?php
require_once("baglanti.php");  
?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
     <?php include("head.php"); ?>
  </head>

  <body>
    <div id="page-wraper">
      <?php include("header.php"); ?>

     
        <section class="section contact-me" data-section="section4">
        <div class="container">
          <div class="section-heading">
            <h2>Ders Kayıt</h2>
            <div class="line-dec"></div>
            <span>Derse ait kayıt anahtarınızı girerek ilgili derse kayıt olabilirsiniz.</span>
          </div>
          
                
                    
                    
                    <form action="" method="post">
  
    <div class="mb-3">
      <label>Bölüm Seçiniz: </label>
       <select id="bolum" class="dersekleform" name="bolum">
         <?php 
    
    
    $kullaniciID= $_SESSION['kullaniciID'];
   
  
              foreach($dbh->query("select * from kullanici inner join bolumler on kullanici.bolumID=bolumler.bolumID where kullaniciID='$kullaniciID'")as $sorgudizi)
             
              {
                  
                 ?>
                 <option value="<?php echo $sorgudizi['bolumID']; ?>"><?php echo $sorgudizi['adi']; ?></option><?php
                
              }
        
    ?>
        
      <?php
              foreach($dbh->query("select bolumID from kullanici where kullaniciID='$kullaniciID'")as $sorgudizi)
             
              {
                  $bolumID=$sorgudizi['bolumID'];                
              }
    ?>
          
      </select>
      <label>Ders Seçiniz:</label>
      <select id="ders" class="dersekleform" name="dersID">
        <?php
        
              foreach($dbh->query("select * from dersler where bolumID='$bolumID'")as $sorgudizi2)
             
              {
                  $varmi=false;
                  $derss=$sorgudizi2['dersID'];
                  foreach($dbh->query("select * from kullaniciders where kullaniciID='$kullaniciID'")as $sorgudiz)
                  {
                      $kontrol=$sorgudiz['dersID'];
                      if($kontrol==$derss){
                          $varmi=true;
                      }
                  }
                  if(!$varmi){
                 ?><option value="<?php echo $sorgudizi2['dersID']; ?>"><?php echo $sorgudizi2['dersAdi']; ?></option><?php
                  }
              }
        ?>
      </select>
       <label>Ders Kayıt Anahtarı Giriniz: </label>
      <input type="text" name="" class="form-control" placeholder="Kayıt Anahtarı Giriniz : ">

      </form>
    </div>
    <div class="anhtrbuton" name="gonder" value="Gönder">
                    <a href="login.php" target="_blank">KAYDOL</a>
                  </div>
     <?php
  //  ob_start();
    
    if(isset($_POST['gonder']))
    {

        if(isset($_POST['dersID']))
        {
            $dersID=$_POST['dersID'];
        }
        
        
        try 
        {
                
            $dbh = new PDO('mysql:host=localhost;dbname=phpproject;charset=utf8', "root", "");
        
        } 
        
        catch (PDOException $e) 
        {
            print "Hata!: " . $e->getMessage() . "<br/>";
            die();
            
        }
        if(isset($_POST['kayit']))
                    {
                        $kayit=$_POST['kayit'];
                    }
        
                    foreach($dbh->query("select * from kayitanahtarlari where dersID=$dersID")as $sorgudiz)
                    {
                            $kayitanahtari=$sorgudiz['kayitAnahtari'];
                    }
                               


        if(!strcasecmp ( $kayit , $kayitanahtari )){
                            echo $dersID;
                            echo "-";
                            echo $kullaniciID;
            if($dbh->query("INSERT INTO `kullaniciders` (`ID`, `dersID`, `kullaniciID`) VALUES (NULL, '$dersID', '$kullaniciID');")  );
            
                                    echo "Kayıt Anahtarı Başarılı, Derse Kayıt Oldunuz..";
            ?>
            <meta http-equiv="refresh" content="0;URL=ogrenciDersleri.php">
<?php
            
        }
        else{
                                    echo "Kayıt Anahtarı Başarısız, Derse Kayıt Olamadınız..";
        }
        
    }
                         
        ?>
  
        </div>
      </section>


      

      
<?php include("footer.php"); ?>
  </body>
</html>
