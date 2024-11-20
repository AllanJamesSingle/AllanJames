<?php
$host='localhost';
$user='Jeric';
$pass='';
$db='todo_list';
$table='todo_table';

try{
  $pdo=new PDO("mysql:host=$host",$user,$pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  $pdo->exec("CREATE DATABASE IF NOT EXISTS `$db`");
  $pdo->exec("USE `$db`");
  
  $sql="CREATE TABLE IF NOT EXISTS $table(id INT AUTO_INCREMENT PRIMARY KEY, task VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, date VARCHAR(255) NOT NULL)";
  $pdo->exec($sql);
  //echo "Database and Table Created successfully";
}catch(PDOException $e){
  echo "Connection failed";
}
?>