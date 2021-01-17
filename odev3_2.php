<html>
<head>
<title> Asal Sayı Bulma-2</title>
</head>
 
<body>
<?php
$sayi=$_POST['sayi'];
 
$asal=0; $i=2;
 
do
{
	if ($sayi % $i == 0)
	{
		$asal = 1;
	}
	$i++;
}
while($i<$sayi);
 
if ($asal != 1)
{
	$sonuc="Asaldır";
}
else
{
	$sonuc="Asal Değildir";
}
 
?>
 
<table width="250" border="2" bgcolor="#FAEBD7">
  <tr bgcolor="	#DEB887">
    <td colspan="2" align="center">Asal Sayı Bulma</td>
  </tr>
  <tr bgcolor="#FAEBD7">
    <td width="206">Girilen Sayı:</td>
    <td width="213"><?php echo $sayi; ?></td>
  </tr>
  <tr bgcolor="	#DEB887">
    <td colspan="2">
    
<h1><?php echo $sonuc; ?>  </h1>
 
    
    </td>
  </tr>
</table>
<A HREF="javascript:javascript:history.go(-1)">Geri dön</A>
<br />
 
</body>
</html>