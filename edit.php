<?php

require 'config.php';

require 'include/header.php';

$msg = '';

if(isset($_GET['edt_id'])){

    $edt = $_GET['edt_id'];

    $sql = $conn->prepare('SELECT * FROM todo WHERE id = :id');
    $sql->bindParam(':id', $edt);
    $sql->execute();
    $row = $sql->fetch(PDO::FETCH_OBJ);

    if(!$row){
        $msg = '<div class="alert alert-danger text-center">Record not found</div>';
    }

}

if(isset($_POST['submit']))
{
    $task = $_POST['task'];
    $sql = $conn->prepare('UPDATE todo SET name = :name WHERE id = :id');
    $sql->bindParam(':name', $task);
    $sql->bindParam(':id', $edt);
    if($sql->execute())
    {
        $msg = "<div class='alert alert-success'>$task - Updated</div>";
        header("Location: index.php");
    }
    else
    {
        $msg = "<div class='alert alert-danger'>Error</div>";

    }
}

?>


<div class="container">
    <form action="" method="post">
        <h3 class="text-center text-primary my-3">Todo List</h3>
        <div>
            <?php echo $msg; ?>
        </div>
        <div class="d-flex">
            <input type="text" class="form-control cus" name="task" value="<?php echo $row->name ?>">
            <input type="submit" name="submit" value="Update" class="mx-2 btn btn-primary">
        </div>
    </form>
</div>

<?php
require 'include/footer.php';
?>