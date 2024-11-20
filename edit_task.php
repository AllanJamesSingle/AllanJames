<?php
include('db.php');

$id=$_GET['id'];

$stmt=$pdo->prepare("SELECT * FROM $table WHERE id = ?");
$stmt->execute([$id]);
$updates=$stmt->fetch(PDO::FETCH_ASSOC);

if($_SERVER["REQUEST_METHOD"]=="POST"){
  $task=$_POST['task'];
  $location=$_POST['location'];
  $date=$_POST['date'];
  
  $stmtupdate=$pdo->prepare("UPDATE $table SET task=?, location=?, date=? WHERE id=?");
  $stmtupdate->execute([$task, $location, $date, $id]);
  
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <style>
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      color: white;
      font-family: 'Poppins', sans-serif;
    }
    body{
      width: 100%;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      flex-direction: column;
      align-items: flex-start;
      background-color: black;
      gap: 3px;
    }
    form{
      border: 2px solid white;
      border-radius: 10px;
      padding: 26px;
    }
    form h2{
      margin-bottom: 18px;
      text-align: center;
    }
    label{
      width: 120px;
      margin-bottom: 14px;
      font-size: 15.5px;
    }
    .input-group{
      display: flex;
      gap: 30px;
    }
    input{
      border: none;
      outline: none;
      border-bottom: 1px solid white;
      background: none;
      width: 200px;
      margin-bottom: 14px;
    }
    button{
      display: flex;
      margin-top: 18px;
      width: 100px;
      height: 36px;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: transparent;
      color: white;
      border: 1px solid white;
      border-radius: 8px;
    }
  </style>
  <title>Todolist Application</title>
</head>
<body>
  <form method="post">
    <div class="container">
      
      <h2>Update Task</h2>
      
      <div class="input-group">
        <label for="task">Create Tasks</label>
        <input type="text" name="task" value="<?php echo htmlspecialchars($updates['task']?? ''); ?>">
      </div>
      
      <div class="input-group">
        <label for="loc">Where</label>
        <input type="text" name="location" value="<?php echo htmlspecialchars($updates['location']?? ''); ?>">
      </div>
      
      <div class="input-group">
        <label for="date">When</label>
        <input type="date" name="date" value="<?php echo htmlspecialchars($updates['date']?? ''); ?>">
      </div>
      
      <button type="submit">Update task</button>
      
    </div>
  </form>