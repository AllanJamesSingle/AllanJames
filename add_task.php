<?php
include('db.php');

if($_SERVER["REQUEST_METHOD"]=="POST"){
  $task=$_POST['task'];
  $location=$_POST['location'];
  $date=$_POST['date'];
  
  $stmt=$pdo->prepare("INSERT INTO $table(task, location, date) VALUES (?, ?, ?)");
  $stmt->execute([$task, $location, $date]);
  
  header("Location: index.php");
  exit;
}
?>