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
            <h2 style="font-family: Arial;">Panelinize hoşgeldiniz.. </h2>
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
    
    ?>                          
            <div class="line-dec"></div>
            <span style="font-family: Arial;"><?php  $select5=mysqli_query($con,"select * from kullanici where kullaniciID=$KullaniciID ");
                         while($row6=mysqli_fetch_array($select5))
                        {
                             echo $row6['AdiSoyadi'];
                        }
                        

                        ?></span>
          </div>
          
                <section class="block">
            <div class="container agnet-prop">
                <div class="row">                    
                    

                    <div class="col-md-12 column">
                        
                  <div class="heading4">
                            <h2>Dersler</h2> 
                        </div>
                        <div class="submit-content">
                            
                            <table class="table table-bordered">
                                <tbody><tr><th bgcolor="#a43f49"><font color="#fff">Ders Adı</font></th>
                                
                                <th bgcolor="#a43f49"><font color="#fff">İşlem</font></th>

                                <?php
                           

                        $select2=mysqli_query($con,"select bolumID from kullanici where kullaniciID=$KullaniciID ");

                        while($row2=mysqli_fetch_array($select2))
                        {
                            
                            $bolumID=$row2['bolumID'];
                        }
                                
                                
                         $select=mysqli_query($con,"select  *  from dersler where kullaniciID=$KullaniciID AND bolumID=$bolumID group by dersID ");
                         while($row=mysqli_fetch_array($select))
                         {
                             
                          ?>
                                                          
                                </tr><tr style="background-color: #fff; color: #000;"> 
                                    <td><?php echo $row['dersAdi']; ?></td>
                                   
                                
                                <td>
                                    <form action="" method="post">
                                <a class="btn btn-sm btn-info fa fa-pencil-square" href="dersedit.php?id=<?php echo $row['dersID']; ?>"></a>
                                <a class="btn btn-primary" href="dersDetay.php?id=<?php echo $row['dersID']; ?>">Detaya Git</a>

                                                    </form>
                                </td>
                                    
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
