<?php 
include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "UPDATE todo SET status = 0, modification_date = NOW() WHERE id = $id";

    try {
        $result = mysqli_query($con, $query);
        if(!$result) {
            throw new Exception('error on delete todo');
        }

        $_SESSION['message'] = 'ToDo deleted succesfully';
        $_SESSION['message_type'] = 'danger';

        header("Location: index.php");
    } catch (Exception $e) {
        header("HTTP/1.1 500 Internal Server Error");
        var_dump($e->getMessage());
    }
}
?>