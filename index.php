<?php include("db.php") ?>
<?php include("includes/header.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <?php if(isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset(); } ?>
            <div class="card card-body">
                <form action="save_todo.php" method="POST">
                    <label for="title">Title:</label>
                    <div name="title" class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="type the ToDo title" autofocus>
                    </div>      
                    <label for="description">Description:</label>
                    <div name="description"  class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="type the ToDo description"></textarea>
                    </div>       
                    <input type="submit" class="btn btn-success btn-block" name="save_todo" value="Save">  
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered inner" style="text-align:center"> 
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Creation Date</th>
                        <th>Actions</th>
                    </tr>
                    <tbody>
                        <?php 
                        $query = "SELECT id, title, description, creation_date, modification_date, status FROM todo WHERE status = 1";
                        $result_todo = mysqli_query($con, $query);

                        while($row = mysqli_fetch_array($result_todo)) { ?>
                            <tr>
                                <td><?php echo $row['title'] ?></td>
                                <td><?php echo $row['description'] ?></td>
                                <td><?php echo $row['creation_date'] ?></td>
                                <td>
                                    <a href="edit_todo.php?id=<?php echo $row['id']?>" class="btn btn-info">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a href="delete_todo.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </thead>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php")?>