<!doctype html>
<html>
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Ödev 4 </title>
        <link rel="stylesheet" href="index.css">
 </head>
 <body>
    <?php
       
       
        if(isset($_POST))
        {
            $paraustu=(float)$_POST['paraustu'];
        
            $birlik = $paraustu/1;
            
        if($birlik > 0){
            $paraustu%=1;
            echo '1 TL'.$birlik.'adet';
        }
            $ellikurus = $paraustu/0.5;
        if($ellikurus > 0){
            $paraustu%=1;
            echo '50 krş'.$ellikurus. 'adet ';
        }
        $ybeskurus = $paraustu/0.25;
        if($ybeskurus > 0){
            $paraustu%=1;
            echo ' 25 krş'.$ybeskurus.'adet';
        }
        $onkurus = $paraustu/0.10;
        if($onkurus > 0){
            $paraustu%=1;
            echo ' 10 krş'.$onkurus.'adet';
        }
        $beskurus = $paraustu/0.05;
        if($beskurus > 0){
            $paraustu%=1;
            echo ' 5 krş'. $beskurus.'adet';
        }
        $birkurus = $paraustu/0.01;
        if($birkurus > 0){
            $paraustu%=1;
            echo ' 1 krş'.$birkurus. 'adet';
        }
    }
    else{
        echo "Para üstü girişi yapılmadı";
    }
                
        
?>
        <form action="" method="post">
            <input type="text" name="paraustu">
            <input type="submit" name="gonder" value="Hesapla">
        </form>
 </body>
</html>