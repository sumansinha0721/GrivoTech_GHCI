<?php
    $db = mysqli_connect("localhost","root","","sihh");
    if (mysqli_connect_errno()){
        echo "server not connected" . mysqli_connect_error();
    }
?>
