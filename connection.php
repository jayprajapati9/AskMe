<?php 

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "askmedb";

    $conn = new mysqli($dbhost,$dbuser,$dbpass,$dbname) or die ("Error Not Connecting To Database");
    // echo date('M Y');

?>