<?php

    $con = pg_connect("host=localhost dbname=GymStore user=postgres password=aaditya");
    // Check connection
    if (!$con){
        echo "Failed to connect to PostgreSQL: " . pg_last_error();
    }
?>
