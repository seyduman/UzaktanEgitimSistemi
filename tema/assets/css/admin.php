<html><?php session_start(); ?>
    <?php include("baglanti.php");?>
    <head> <?php include("head.php"); ?>
    </head>
    <body><div style="display:none;" id="preloader"></div>

<div class="inner-head overlap">
            <div style="background: url(img/parallax1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!- PARALLAX BACKGROUND IMAGE ->	
            <div class="container">
                <div class="inner-content"><br>
                        <br>
                    <center><h2>Panelinize hoşgeldiniz.. </h2></center>
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

                    
                    <center><h3><?php  $select5=mysqli_query($con,"select * from kullanici where kullaniciID=$KullaniciID ");
                         while($row6=mysqli_fetch_array($select5))
                        {
                             echo $row6['AdiSoyadi'];
                        }
                        

                        ?></h3></center>
                    <ul>
                        <br>
                        <br>
                        <li><a href="index.php" class="fa fa-home"title="">Anasayfa</a></li><br>
                        <br>
                    </ul>
                </div>
            </div>
</div>
    
    

        <section class="block">
            <div class="container agnet-prop">
                <div class="row">                    
                    

                    <div class="col-md-12 column">
                        <div class="heading4">
                            <h2>Dersler</h2> 
                        </div>
                        <style>
                        
                        #customers th {
                          padding-top: 12px;
                          padding-bottom: 12px;
                          text-align: left;
                          background-color: #4CAF50;
                          color: white;
                        }
                            
                            #customerss th {
                          padding-top: 12px;
                          padding-bottom: 12px;
                          text-align: left;
                          background-color: #ca0000;
                          color: white;
                        }
                            
                        </style>
                        
                        <div class="submit-content">
                            <table class="table table-bordered">
                                <th bgcolor="#4CAF50"><font color="#fff">Ders Adı</font></th>
                                <th bgcolor="#ca0000"><font color="#fff">İşlem</font></th>

                                 
                           <?php
                           

                        $select2=mysqli_query($con,"select bolumID from kullanici where kullaniciID=$KullaniciID ");

                        while($row2=mysqli_fetch_array($select2))
                        {
                            
                            $bolumID=$row2['bolumID'];
                        }
                                
                                
                         $select=mysqli_query($con,"select  *  from dersler where kullaniciID=$KullaniciID AND bolumID=$bolumID group by dersID ");
                         while($row=mysqli_fetch_array($select))
                         {
                             
                          ?><tr> 
                                
                                <td ><?php echo $row['dersAdi']; ?></td>
                                
                                <td>
                                    <a class="btn btn-sm btn-info fa fa-pencil-square" href="dersedit.php?id=<?php echo $row['dersID']; ?>"></a>
                                    <a class="btn btn" href="dersDetay.php?id=<?php echo $row['dersID']; ?>">Detaya Git</a>

                                </td>
                            </tr>  
                                 
                                <?php
                         } ?>
                            </table>
                                
                        </div>
                    </div>
                </div>
            </div> 
        </section>
                                
                                
</body>
</body></html>
