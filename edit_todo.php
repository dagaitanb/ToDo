<?php 
include("db.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT id, title, description, creation_date, modification_date, status FROM todo WHERE id = $id";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description = $row['description'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $query = "UPDATE todo SET title = '$title', description = '$description', modification_date = NOW() WHERE id = $id";

    try {
        mysqli_query($con, $query);

        $_SESSION['message'] = 'ToDo updated succesfully';
        $_SESSION['message_type'] = 'info';

        header("Location: index.php");
    } catch (Exception $e) {
        header("HTTP/1.1 500 Internal Server Error");
        var_dump($e->getMessage());
    }
}
?>

<?php include("includes/header.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_todo.php?id=<?php echo $_GET['id']; ?>" method="POST" style="text-align:center">
                    <div class="form-group">
                        <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="Update title">
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="Update description"><?php echo $description; ?></textarea>
                    </div>
                    <button class="btn btn-success" name="update">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php")?>