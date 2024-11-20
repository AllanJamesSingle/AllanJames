<?php
include('db.php');

$stmt=$pdo->query("SELECT * FROM $table");
$reads=$stmt->fetchAll(PDO::FETCH_ASSOC);

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
    .list-method{
      border: 2px solid white;
      border-right-color: 10px;
      padding: 20px;
      width: 354px;
      display: flex;
      justify-content: center;
      align-items: flex-start;
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
    span{
      display: flex;
      gap: 8px;
      color: cyan;
      font-size: 16.5px;
    }
    .list-group h2{
      text-align: center;
    }
    .okay{
     display: flex;
     flex-direction: column;
    }
    .list{
      margin-top: 12px;
      display: flex;
      gap: 26px;
      margin-right: 120px;
      font-size: 15.5px;
    }
  </style>
  <title>Todolist Application</title>
</head>
<body>
  <form action="add_task.php" method="post">
    <div class="container">
      
      <h2>To-Do List Application</h2>
      
      <div class="input-group">
        <label for="task">Create Tasks</label>
        <input type="text" name="task" required>
      </div>
      
      <div class="input-group">
        <label for="loc">Where</label>
        <input type="text" name="location" required>
      </div>
      
      <div class="input-group">
        <label for="date">When</label>
        <input type="date" name="date" required>
      </div>
      
      <button type="submit">Add task</button>
      
    </div>
  </form>
  
  <form>
    <div class="list-group">
      <h2>My Task List</h2>
      
      <div class="list-method">
        <ul>
          <?php foreach ($reads as $read): ?>
        <li>
          
          <div class="okay">
          
          <div class="list">
            <span>Tasks:</span>
            <?php echo htmlspecialchars($read['task']?? ''); ?>
          </div>
          
          <div class="list">
            <span>Where:</span>
            <?php echo htmlspecialchars($read['location']?? ''); ?>
          </div>
          
          <div class="list">
            <span>When:</span>
            <?php echo htmlspecialchars($read['date']?? ''); ?>
          </div>
          </div>
        </li>
      <?php endforeach; ?>
        </ul>
      </div>
      
    </div>
  </form>
  
  
</body>
</html>