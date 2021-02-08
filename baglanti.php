<?php

        
try 
{
        
    $dbh = new PDO('mysql:host=localhost;dbname=phpproject;charset=utf8', "root", "");

} 

catch (PDOException $e) 
{
    print "Hata!: " . $e->getMessage() . "<br/>";
    die();
    
}