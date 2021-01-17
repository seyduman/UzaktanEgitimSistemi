<html>
<head>
<title>Mukemmel Sayı Bulma-2</title>
</head>
 
<body>
<?php
$sayi=$_POST['sayi'];
$toplam=0;  
$itoplam=0;
for($k=1;$k<$sayi;$k++) {
    if($sayi  % $k == 0) //Sayi, sayinin tam bölenimi
		{
			$itoplam+=$k; //Bölünenlerin toplamina ekle
		}
} 
if($itoplam==$sayi) //Bölünenlerin toplami aranan sayiya esitmi 
{
    $sonuc="Sayı Mukemmeldir";
}

else
{
	$sonuc="Sayı Mukemmel Değildir";
}
 
?>
 
<table width="250" border="2" bgcolor="#FAEBD7">
  <tr bgcolor="#DEB887">
    <td colspan="2" align="center">Mukemmel Sayı Bulma</td>
  </tr>
  <tr bgcolor="#FAEBD7">
    <td width="206">Girilen Sayı:</td>
    <td width="213"><?php echo $sayi; ?></td>
  </tr>
  <tr bgcolor="#DEB887">
    <td colspan="2">
    
<h1><?php echo $sonuc; ?>  </h1>
 
    
    </td>
  </tr>
</table>
<A HREF="javascript:javascript:history.go(-1)">Geri dön</A>
<br />
 
</body>
</html>