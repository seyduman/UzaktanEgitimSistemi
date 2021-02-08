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
            <h2 style="font-family: Arial;">Ders Düzenleme</h2>
             
            <div class="line-dec"></div>
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
           <div class="heading4">
                                
                            <h3><?php echo $row2['dersAdi']?></h3> 
                                </div>
          </div>
           <?php
                             $durum=$row2['dersdurum'];
                          if($durum=='0'){
                              ?>
<form action="" method="post">

                            <input class="headbuton" name="gonderac" value="Dersi Aç" type="submit"/>
                                                    </form>
                        
                              <?php
                          }
                          else{
                              ?>
                              <form action="" method="post" enctype="multipart/form-data">

                            <input class="headbuton" name="gonderkapat" value="Dersi Kapat" type="submit"/>
         <br>
                                  <br>
                                  
                                   <div class="control-group">
                                    <div class="group-title">Derse Döküman Ekle</div>
                                       <br>
                                       
                                    <div class="group-container row">
                                        <div class="col-md-12">
                                            <div id="upload-container">
                                                <div id="aaiu-upload-container">
                                                    <div class="moxie-shim moxie-shim-html5">
                                                        
                                                        <input type="file" name="dosyalar" type="file" accept="application/pdf,application/vnd.ms-excel" />
                                                        <br>
                                                        <input type="text" placeholder="Başlığı Yazınız." name="baslik" />
                                                        <br>
                                                        <br>
                                                        <input type="text" placeholder="İçeriği Yazınız." name="icerik"  />

                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  
                                  <br>
                                  
                                            <input class="headbuton" name="dosyaekle" value="Dosyayı Ekle" type="submit"/>

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
                        <br>
                        <br>
                        <br>
                        <br>
                        
                       
                       
          
                <section class="block">
            <div class="container agnet-prop">
                <div class="row">                    
                    

                    <div class="col-md-12 column">
                        
                  
                        <div class="submit-content">
                             <div class="heading4">
                            <h2>Dersin Öğrencileri</h2> 
                        </div>
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
                                                      
                            
                            
                           
                                                                            
                        </div>
                    </div>
                </div>
            </div> 
            
        </section>

    
    
    
    
                        </div>
                    </div>
                </div>
            </div> 
            
        </section>
                    
        
        </div>
      </section>


    <?php include("footer.php"); ?>
  </body>
</html>
