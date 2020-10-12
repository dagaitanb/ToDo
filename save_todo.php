<?php 

    include('db.php');

    if(isset($_POST['save_todo'])){
        $title = $_POST['title'];
        $description = $_POST['description'];
        
        $query = "INSERT INTO todo(title, description) VALUES ('$title', '$description')";
        
        try {
            $result = mysqli_query($con, $query);
            if(!$result) {
                throw new Exception('error');
            }

            $_SESSION['message'] = 'ToDo saved succesfully'
            $_SESSION['message_type'] = 'saved'

            header("Location: index.php")
        } catch (Exception $e) {
            header("HTTP/1.1 500 Internal Server Error");
            var_dump($e->getMessage());
        }
    }
?>