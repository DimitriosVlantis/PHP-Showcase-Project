<?php 

    // connect to database
    $conn = mysqli_connect('localhost', 'dimitris', '42tioler13', 'dimis_pizza');

    // check information
    if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error();
    }

?>