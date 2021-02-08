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
            <h2>Ders Düzenleme</h2>
            <div class="line-dec"></div>
            
          </div>
          <div class="row">
            <div class="right-content">
              <div class="container">
                <form id="contact" action="" method="post">
                  <div class="row">
                    <?php    
                                        if(isset($_GET['id']))
                                        {
                                            $dersid=$_GET['id'];
                                        }
                        
                        $host = 'localhost';
                                                 $user = 'root';
                                                 $pass = '';
                                                 $con=mysqli_connect($host, $user, $pass,'phpproject');
                            ini_set('memory_limit', '-1');
                                                 mysqli_set_charset($con,"utf8");

                                                 $select=mysqli_query($con,"select  *  from dersler where dersID=$dersid  ");
                         while($row2=mysqli_fetch_array($select))
                         {?>
                    <div class="col-md-6">
                      <fieldset>
                        <label><?php echo $row2['dersAdi']?> </label>
                      </fieldset>
                    </div>
                     <?php
                             $durum=$row2['dersdurum'];
                          if($durum=='0'){
                              ?>
                        <form action="" method="post">
                    <div class="col-md-6">
                      <fieldset>
                        <button type="submit" id="form-submit" class="button">
                          Send Message
                        </button>
                      </fieldset>
                    </div>
                    </form>
                     <?php
                          }
                          else{
                              ?>
                               <form action="" method="post" enctype="multipart/form-data">

                            <div class="col-md-6">
                      <fieldset>
                        <button type="submit" id="form-submit" class="button">
                          Send Message
                        </button>
                      </fieldset>
                    </div>

                     <div class="col-md-6">
                      <fieldset>
                        <label>Derse Döküman Ekle </label>
                      </fieldset>
                    </div>
                    <br><br>
                    <div class="col-md-12">
                      <fieldset>
                        <button style="float: left; type="file" name="dosyalar" accept="application/pdf,application/vnd.ms-excel" class="button">
                          Dosya Seç
                        </button>
                      </fieldset>
                    </div>
                    <br><br>
                    <div class="col-md-12">
                     <fieldset>
                      <input type="text" placeholder="Başlığı Yazınız." name="baslik" />
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                     <fieldset>
                          <input type="text" placeholder="İçeriği Yazınız." name="icerik"  />
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        <button style="float: left; type="submit" name="dosyaekle" value="Dosyayı Ekle" type="submit" class="button">
                          Dosyayı Ekle
                        </button>
                      </fieldset>
                    </div>
                  </div>
                </form>
                <?php }
                             ?>
                        
                        
                        <?php
                         }
                        ?>
                          <?php
                        
                        if(isset($_POST['dosyaekle']))
                        {
                            
                            
                        if(isset($_FILES['dosyalar']['tmp_name']))
                        {
                            $yolu=$_FILES['dosyalar']['tmp_name'];
                        }
                        else
                        {
                             $yolu=null;
                        }
                         if(isset($_FILES['dosyalar']['name']))
                        {
                            $isim=$_FILES['dosyalar']['name'];
                        }

                        else
                        {
                             $isim=null;
                        }
                            
                            if(isset($_POST['baslik']))
                        {
                            $baslik=$_POST['baslik'];
                        }
                            if(isset($_POST['dosyaekle']))
                        {
                            $icerik=$_POST['icerik'];
                        }
                            
                            
                        $kayityeri2="dosyalar/".$isim;
                            
            copy($yolu, 'dosyalar/' .$_FILES['dosyalar']['name']);
                            
                            
                            
 
                            $host = 'localhost';
                                                 $user = 'root';
                                                 $pass = '';
                                                 $con=mysqli_connect($host, $user, $pass,'phpproject');
                            ini_set('memory_limit', '-1');
                                                 mysqli_set_charset($con,"utf8");
                            
                        $select22=mysqli_query($con,"insert into `dersicerik` (`ID`,`baslik`,`icerik`,`dersID`) values (NULL,'$baslik','$icerik', '$dersid');");
                                $select5=mysqli_query($con,"insert into `dersdosya` (`ID`,`dosya`, `dersID`) values (NULL,'$kayityeri2', '$dersid');");
                            
                            echo "Dosya eklendi.";
                        } 
?>
 <?php
                        
                        if(isset($_POST['gonderkapat']))
                        {
                            $host = 'localhost';
                                                 $user = 'root';
                                                 $pass = '';
                                                 $con=mysqli_connect($host, $user, $pass,'phpproject');
                            ini_set('memory_limit', '-1');
                                                 mysqli_set_charset($con,"utf8");

                                                 $select=mysqli_query($con,"UPDATE `dersler` SET `dersdurum` = '0' WHERE dersID = '$dersid'");
                                                $select2=mysqli_query($con,"DELETE from kayitanahtarlari WHERE dersID = '$dersid'");

                            echo "ders kapandı." ;
                            echo "Kayit anahtari silindi." ;
                        }
                        if(isset($_POST['gonderac']))
    {?>
       <form action="" method="post">
   <br> <input style="width:200px;margin-right:10px;" name="kayitanahtari" min="0" value="" class="form-control btn-sm "  placeholder="Kayıt Anahtarı" type="text"/>
    
   <br> <input class="btn  btn-success" name="kaydol" value="Değiştir" type="submit"/>
    </form>
                        
                <?php
                         }
                        
                        ?>       
                        
                        <?php

                        if(isset($_POST['kaydol']))
                        {
                            if(isset($_POST['kayitanahtari']))
                            {
                                $kayitanahtari=$_POST['kayitanahtari'];
                            }
                            
                            
                            $host = 'localhost';
                                                 $user = 'root';
                                                 $pass = '';
                                                 $con=mysqli_connect($host, $user, $pass,'phpproject');
                            ini_set('memory_limit', '-1');
                                                 mysqli_set_charset($con,"utf8");

                                                 $select=mysqli_query($con,"UPDATE `dersler` SET `dersdurum` = '1' WHERE dersID = '$dersid'");
                                                 $select2=mysqli_query($con,"insert into `kayitanahtarlari` (`ID`, `dersID`, `kayitAnahtari`) values (NULL, '$dersid','$kayitanahtari');");
                        
                        /*    $sorgu=mysql_query("INSERT INTO `kullanici` (`kullaniciID`, `AdiSoyadi`, `kullaniciAdi`, `bolumID`, `sifre`,`yetki`) VALUES (NULL, '$adisoyadi', '$k_adi', '$bolum', '$sifre',0);");*/
                            
                        }
                        ?>
              </div>
            </div>
          </div>
        </div>
      </section>
<section class="block">
            <div class="container agnet-prop">
                <div class="row">                    
                    

                    <div class="col-md-12 column">
                        
                  
                        <div class="submit-content">
                            
                            <table class="table table-bordered">
                                <tbody><tr><th bgcolor="#a43f49"><font color="#fff">Öğrenci Ad Soyad</font></th>
                                <th bgcolor="#a43f49"><font color="#fff">İşlem</font></th>


                             <?php
                          /*  if(isset($_SESSION['kullaniciID']))   
                            {
                                $KullaniciID=$_SESSION['kullaniciID'];
                            }
                            */
                         $host = 'localhost';
                         $user = 'root';
                         $pass = '';
                         $con=mysqli_connect($host, $user, $pass,'phpproject');
                         mysqli_set_charset($con,"utf8");

                                
                        $select6=mysqli_query($con,"select * from kullaniciders where dersID=$dersid group by kullaniciID");

                        while($row2=mysqli_fetch_array($select6))
                        {
                            $kullaniciIDogrenci=$row2['kullaniciID'];
                            
                            $select7=mysqli_query($con,"select  *  from kullanici where kullaniciID=$kullaniciIDogrenci");
                            
                                while($row3=mysqli_fetch_array($select7))
                            {?>
                                <tr style="background-color: #fff; color: #000;"> 
                                
                                <td ><?php echo $row3['AdiSoyadi']; ?></td>
                                
                                <td>
                                    <a class="btn btn-sm btn-info fa fa-remove" href="OgrenciSil.php?id=<?php echo $row3['kullaniciID']; ?>"onclick="return uyari();"></a>
                                </td>
                                    
                            </tr>
                                <?php
                            }
                        }
                                
                                
                        ?>
                                    
                                                                </tbody></table>
                                                                 <script language="JavaScript">
                            function uyari() {

                            if (confirm("Bu Öğrenciyi silmek istediğinize emin misiniz?"))
                               return true;
                            else 
                               return false;
                            }
                            </script>
                                     <form action="" method="post">

                            <input class="btn btn-primary" name="ekle" value="DERSE ÖĞRENCİ EKLE" type="submit"/>
                                                    </form>                 
                        </div>
                    </div>
                </div>
            </div> 
            
        </section>
 <?php
                        
                        if(isset($_POST['ekle']))
                        { 
                            ?>
                                <form action="" method="post">

                <div class="container agnet-prop">

                            <div class="col-md-3">
                            <div class="form-group s-prop-status">
                                                    <label>Öğrenci Listesi</label>
                                                    <div class="dropdown label-select">
                                                        <div class="label-select">
                                                         
                                                            <select onchange="fetch_select(this.value)" class="form-control" id="ogrenci" name="ogrenci">
                                                                 <option>Öğrenci Seçiniz.</option>
                                                                <?php
                                                                
                                                              $host = 'localhost';
                                                              $user = 'root';
                                                              $pass = '';
                                                              $con=mysqli_connect($host, $user, $pass,'phpproject');
                                                              mysqli_set_charset($con,"utf8");
                            
 
     $select8=mysqli_query($con,"select bolumID from dersler where dersID=$dersid group by bolumID");

                        while($row2=mysqli_fetch_array($select8))
                        {
                            
                                $bolumID=$row2['bolumID'];

                         //   $kullaniciIDogrenci=$row2['kullaniciID'];
                            
                            $select9=mysqli_query($con,"select  *  from kullanici where bolumID=$bolumID AND yetki=0 ");
                            
                                while($row3=mysqli_fetch_array($select9))
                            {
                                    $varmi=false;
                                    $kulID=$row3['kullaniciID'];
                                    
                            $select10=mysqli_query($con,"select  *  from kullaniciders where kullaniciID=$kulID");
                                    while($row5=mysqli_fetch_array($select10))
                                    {
                                        $temp=$row5['dersID'];
                                        if($temp==$dersid){
                                            $varmi=true;
                                        }
                                    }
                                    if($varmi!=true){
                                                                        echo "<option value=".$row3['kullaniciID'].">".$row3['AdiSoyadi']."</option>";

                                        
                                    }
                                                                
                               }
                        }
                            
                        ?>
                                  
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>                                                
                    </div>
                                    <div class="col-md-3">
                                        <input name="kaydet" type="submit" class="btn  btn-success" id="" value="Öğrenciyi Ekle">
                                        
                                    </div>
                                    </div>
                                    
                                    
                                                    </form>


<?php  }
    ?>
    
    <?php 
                            if(isset($_POST['kaydet']))
                            {
                                
                                if(isset($_POST['ogrenci']))
                                {
                                $ogrenci=$_POST['ogrenci'];
                                   
                                }
                                else
                                {
                                    $ogrenci=null;
                                }
                                
                                
                                
                                 $host = 'localhost';
                                                 $user = 'root';
                                                 $pass = '';
                                                 $con=mysqli_connect($host, $user, $pass,'phpproject');
                            ini_set('memory_limit', '-1');
                                                 mysqli_set_charset($con,"utf8");

                                                 $select20=mysqli_query($con,"insert into `kullaniciders` (`ID`, `dersID`, `kullaniciID`) values (NULL, '$dersid','$ogrenci');");
                                
                                echo "Derse Öğrenci Başarıyla Eklendi..";
                            }
    ?>
    <?php include("footer.php"); ?>
  </body>
</html>