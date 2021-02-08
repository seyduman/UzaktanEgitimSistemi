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
            <h2 style="font-family: Arial;">Derslerim sayfasına hoşgeldiniz..</h2>
             
            <div class="line-dec"></div>
            <span style="font-family: Arial;"></span>
          </div>
          
                <section class="block">
            <div class="container agnet-prop">
                <div class="row">                    
                    

                    <div class="col-md-12 column">
                        
                  
                        <div class="submit-content">
                            
                            <table class="table table-bordered">
                                <tbody><tr><th bgcolor="#a43f49"><font color="#fff">Derslerim</font></th>
                                
                                <th bgcolor="#a43f49"><font color="#fff">İşlem</font></th>

                                 <?php
                            if(isset($_SESSION['kullaniciID']))   
                            {
                                $KullaniciID=$_SESSION['kullaniciID'];
                            }
                            
                         $host = 'localhost';
                         $user = 'root';
                         $pass = '';
                         $con=mysqli_connect($host, $user, $pass,'phpproject');
                         mysqli_set_charset($con,"utf8");

                                
                        $select25=mysqli_query($con,"select * from kullaniciders where kullaniciID=$KullaniciID ");

                        while($row2=mysqli_fetch_array($select25))
                        {
                            $degisken=$row2['dersID'];
                            
                            $select26=mysqli_query($con,"select  *  from dersler where dersID=$degisken");
                            
                                while($row3=mysqli_fetch_array($select26))
                            {?>
                                                          
                                </tr><tr style="background-color: #fff; color: #000;"> 
                                    <td><?php echo $row3['dersAdi']; ?></td>
                                   
                                
                                <td>
                                    <form action="" method="post">

                                <a class="btn btn-primary" href="dersDetay.php?id=<?php echo $row3['dersID']; ?>">DERS İÇERİĞİNİ GÖR</a>

                                                    </form>
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
      </section>


    <?php include("footer.php"); ?>
  </body>
</html>
