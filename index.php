<?php
require 'include/header.php';
require 'create.php';

$data = $conn->query('SELECT * FROM todo');

?>




<div class="container">
    <form action="" method="post">
        <h3 class="text-center text-primary my-3">Todo List</h3>
        <div>
            <?php echo $msg; ?>
        </div>
        <div class="d-flex">
            <input type="text" class="form-control cus" name="task">
            <input type="submit" name="submit" class="mx-2 btn btn-primary">
        </div>
    </form>
</div>

<div class="container my-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Created At</th>
                <th scope="col" colspan="2" class="text-center">Operation</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $data->fetch(PDO::FETCH_OBJ)):
            ?>
            <tr>
                <td><?php echo $row->id; ?></td>
                <td><?php echo $row->name; ?></td>
                <td><?php echo $row->created_at; ?></td>
                <td class="text-center">
                    <a href="edit.php?edt_id=<?php echo $row->id ?>"><input type="submit" value="Edit" class="btn btn-primary mx-1 px-4"></a>
                    <a href="delete.php?dlt_id=<?php echo $row->id ?>"><button class="btn btn-danger mx-1 px-3">Delete</button></a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>



<?php
require 'include/footer.php';
?>