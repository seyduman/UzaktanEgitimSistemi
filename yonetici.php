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
            <h2 style="font-family: Arial;">Sayın Admin Yönetici paneline hoşgeldiniz..</h2>
            
            <div class="line-dec"></div>
            <span style="font-family: Arial;"></span>

          </div>
          
                <section class="block">
            <div class="container agnet-prop">
              <h2>Kullanıcılar</h2>
            <?php $host = 'localhost';
                         $user = 'root';
                         $pass = '';
                         $con=mysqli_connect($host, $user, $pass,'phpproject');
                         mysqli_set_charset($con,"utf8"); 
                        
                                  ?>
                            
                            <h3> Toplam Kullanıcı Sayısı=  <?php 
                                
                                
                                $count = mysqli_num_rows ( mysqli_query ($con , "SELECT * FROM kullanici" )); 
 
                                echo $count-1 ;
                                
                                ?>  </h3>
                <div class="row">                    
                    

                    <div class="col-md-12 column">
                        
                  
                        <div class="submit-content">
                            
                            <table class="table table-bordered">
                                <tbody><tr><th bgcolor="#a43f49"><font color="#fff">Ad Soyad</font></th>
                                <th bgcolor="#a43f49"><font color="#fff">Kullanıcı Adı</font></th>

                                <th bgcolor="#a43f49"><font color="#fff">Şifresi</font></th>
                                <th bgcolor="#a43f49"><font color="#fff">Bölümü</font></th>
                                <th bgcolor="#a43f49"><font color="#fff">İşlem</font></th>

                                <?php
                            if(isset($_SESSION['kullaniciID']))   
                            {
                                $KullaniciID=$_SESSION['kullaniciID'];
                            }
                            
                         
                                
                                
                                
        
        
                         $select=mysqli_query($con,"select  *  from kullanici Inner join bolumler on kullanici.bolumID=bolumler.bolumID where kullaniciID!='1' ");
                         while($row=mysqli_fetch_array($select))
                         {
                            $yetki= $row['yetki'];
                          ?>
                                <tr style="background-color: #fff; color: #000;"> 
                                
                                <td ><?php echo $row['AdiSoyadi']; ?></td>
                                                                    <td ><?php echo $row['kullaniciAdi']; ?></td>

                                                                    <td ><?php echo $row['sifre']; ?></td>

                                                                    <td ><?php echo $row['adi']; ?></td>

                                                                                                <td>
                                            <a class="btn btn-sm btn-info fa fa-trash-o" href="KullaniciSil.php?id=<?php echo $row['kullaniciID']; ?>"></a>


                                <?php if($yetki=='0'){
                              ?>

                                    <a class="btn btn-primary" href="KullaniciEdit.php?id=<?php echo $row['kullaniciID']; ?>">YETKİ VER</a>
                                

                                <?php
                              
                          }
                             else{
                                 ?>
                                <a class="btn btn-success" href="KullaniciEditYetkiAl.php?id=<?php echo $row['kullaniciID']; ?>">YETKİ AL</a>
                                                                                                        
                                 </td>
                                    
                                    <?php
                             }
                             ?>
                            </tr>  
                                 
                                <?php
                         } ?>
                                    
                                                                </tbody></table>
                                                     
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
