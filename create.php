<?php
require 'config.php';

$msg = '';

if(isset($_POST['submit']))
{
    $task = $_POST['task'];

    if($task == '')
    {
        $msg = '<div class="alert alert-danger text-center">Input field are required</div>';
    }
    else
    {
        $check = $conn->prepare("SELECT * FROM todo WHERE name = :name");
        $check->bindParam(':name', $task);
        $check->execute();

        if($check->rowCount() > 0)
        {
            $msg = "<div class='alert alert-danger text-center'>$task - Already Inserted</div>";
        }
        else
        {
            $sql = $conn->prepare('INSERT INTO todo (name) VALUES (:name)');
            $sql->bindParam(':name', $task);
            $sql->execute();
    
            $msg = "<div class='alert alert-success text-center'>$task - Inserted</div>";
        }

    }
}
?>