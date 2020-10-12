<?php include("db.php") ?>
<?php include("includes/header.php")?>

    <div class="container">
        <div class="row">
            <div class="col-md-4">

                <?php if(isset($_SESSION['message'])) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php session_unset(); } ?>
                <div class="card card-body">
                    <form action="save_todo.php" method="POST">
                        <label for="title">ToDo Title:</label>
                        <div name="title" class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="type title" autofocus>
                        </div>      
                        <label for="description">ToDo Description:</label>
                        <div name="description"  class="form-group">
                            <textarea name="description" rows="2" class="form-control" placeholder="type description"></textarea>
                        </div>       
                        <input type="submit" class="btn btn-success btn-block" name="save_todo" value="Save ToDo">  
                    </form>
                </div>
            </div>
            <div class="col-md-8">
            
            </div>
        </div>
    </div>
<?php include("includes/footer.php")?>

