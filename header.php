
<div class="responsive-nav">
        <i class="fa fa-bars" id="menu-toggle"></i>
        <div id="menu" class="menu">
          <i class="fa fa-times" id="menu-close"></i>
          <div class="container">
            <div class="image">
              <a href="#"><img src="tema/assets/images/logo.png" alt=""></a>
            </div>
            <br><br>
            <nav class="main-nav" role="navigation">
              <?php include("header2.php"); ?>
              <ul class="">
                <button class="headbuton"><a href="ogrenciDersleri.php" >ÖĞRENCİ DERSLERİM</a></button>
                <button class="headbuton"><a href="dersekle.php" >DERS EKLE  </a></button>
                <button class="headbuton"><a href="logout.php">ÇIKIŞ YAP  </a></button>
              </ul>
              <?php
                                if(isset($_SESSION['kullaniciAdi'])){
                                $kullanicibak=$_SESSION['kullaniciAdi'];
                                $kullaniciID=$_SESSION['kullaniciID'];
                                
                        $host = 'localhost';
                         $user = 'root';
                         $pass = '';
                         $con=mysqli_connect($host, $user, $pass,'phpproject');
                         mysqli_set_charset($con,"utf8");

                        $select2=mysqli_query($con,"select * from kullanici where kullaniciID=$kullaniciID");

                        while($row2=mysqli_fetch_array($select2))
                        {
                            $yetki=$row2['yetki'];
                        }
                    if($yetki=='0'){
                                ?>
                  
             
          
                  <?php
                    ;}
                                    else{?>
                                        
             
            
            </li>
                  <?php
                                    }
                                }
                  ?>
            </nav>
            <div class="copyright-text">
              <p>© ŞEYMA DUMAN & MELDA ŞEN</p>
            </div>
          </div>
        </div>
      </div>

      
         
            <div class="kayitbuton">
                    <a href="login.php" target="_blank">GİRİŞ YAP</a>
                  </div>
         
        