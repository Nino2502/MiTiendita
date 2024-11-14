<?php



    $conn = new mysqli("localhost","root","","bd_quickyfast");

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);

    }else{

        echo "Se conecto exitosamente la base de datos";
    }
    return $conn;




?>