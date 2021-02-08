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
            <h2 style="font-family: Arial;">Ders İçeriği</h2>
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
            <div class="line-dec"></div>
            <span style="font-family: Arial;"><?php echo $row2['dersAdi'];}?></span>
          </div>
          
                <section class="block">
            <div class="container agnet-prop">
                <div class="row">                    
                    

                    <div class="col-md-12 column">
                        
                  
                        <div class="submit-content">
                            
                            <table class="table table-bordered">
                                <tbody><tr><th bgcolor="#a43f49"><font color="#fff">Başlık</font></th>
                                <th bgcolor="#a43f49"><font color="#fff">İçerik</font></th>

                                <th bgcolor="#a43f49"><font color="#fff">Döküman</font></th>
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
  //  $sorgu=mysql_query("select * from kullanici inner join bolumler on kullanici.bolumID=bolumler.bolumID where kullaniciID='$kullaniciID'");

                                
                          /*  $select8=mysqli_query($con,"select * from dersdosya inner join dersicerik on dersdosya.dersID=dersicerik.dersID where dersdosya.dersID=$dersid GROUP BY dersicerik.ID");*/
                                
                                $select8=mysqli_query($con,"select * from dersicerik where dersID=$dersid");
                                $select9=mysqli_query($con,"select * from dersdosya where dersID=$dersid");

                                
                                while($row5=mysqli_fetch_array($select8) and $row4=mysqli_fetch_array($select9))
                                {
                                    $dosya=$row4['dosya'];
                                    $dosya=substr($dosya, 9);
                                    ?>
                                                          
                                </tr><tr style="background-color: #fff; color: #000;"> 
                                    <td><?php echo $row5['baslik']; ?></td>
                                    <td><?php echo $row5['icerik']; ?></td>

                                <td><?php echo $dosya;?></td>
                                
                                <td>
                                    <a href="<?php echo $row4['dosya']; ?>" download="<?php echo $dosya; ?>">Doküman İndir</a>
                                </td>
                                    
                            </tr>
                                 <?php
                                }
                            
                                 ?>
                                    
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
