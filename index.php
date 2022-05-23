<?php
$todos = [];
if (file_exists('todo.json')) {
    $json = file_get_contents('todo.json');
    $todos = json_decode($json,true);
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>ToDoList</title>
</head>
<body>
<div class="container-sm position-relative">
    <div class="row">
    <form action="newtodo.php" method="POST" class="form-group">
        <input type="text" name="todo" class="form-control-lg" style="position:relative; top: 20px" placeholder="Things to do">
        <button type="submit" name=submit class="btn btn-primary" style="position:relative; top: 25px;display:flex" >New Todo</button>
    </form>
    <ul class="list-group">
        <br>
        <?php foreach($todos as $todoName => $todo): ?>
            <li class="list-group-item" style="position:relative; top: 30px;display:flex">
            <form action="change_status.php" method="POST">
                <input type="hidden" name="todo_name" value="<?php echo $todoName?>">
            <input class="form-check-input me-1" type="checkbox" <?php echo $todo['completed'] ? 'checked' : ''?>>
            </form>
            <?php echo $todoName ?></li>
            <div class="form-group">
            <form action="delete.php" method="POST">
            <input type="hidden" name="todo_name" value="<?php echo $todoName?>">
            <button type="submit" class="btn btn-danger" style="position:relative; float:right ; top:-10px">Delete</button>
            </form>
        </div>
        <?php endforeach;?>
    </ul>    

    </div
</div>

<script>

const checkboxes = document.querySelectorAll('input[type=checkbox]');
checkboxes.forEach(checkbox => {
    checkbox.onclick = function(){
        this.parentNode.submit();
    }
})

</script>
</body>
 
</html>


</body>
</html>