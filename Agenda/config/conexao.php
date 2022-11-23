<?php 
$host= "localhost";
$dbname="agenda";
$user="root";
$pass="erlan123";

try{
    $conn= new PDO("mysql:host=$host; dbname=$dbname", $user, $pass);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    $erro = $e->getMessage();
    echo $erro;
}
?>