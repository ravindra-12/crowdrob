<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task</title>
</head>
<body>
    <h1>Add Task</h1>

    <!-- Add Brand Form -->
   <!-- Add Brand Form -->
   <form action="/api/add-task" method="post">
    @csrf <!-- CSRF protection -->
  
    <label for="taskText">taskText:</label>
    <input type="text" id="taskText" name="taskText" required>
    <br>
    <label for="taskToBeDone">taskToBeDone:</label>
    <input type="text" id="taskToBeDone" name="taskToBeDone" required>
    <br>
    <br>
    <button type="submit">Add Task</button>
</form>



    

    <!-- Update Brand Form -->
</body>
</html>
