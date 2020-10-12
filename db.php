<?php

    session_start();
    
    $con = mysqli_connect(
        'localhost',
        'root',
        '',
        'todo'
    );

    // if (isset($con)) {   
    //     echo 'Database connected!';
    // }
?>