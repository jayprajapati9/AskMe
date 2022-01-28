<?php 

if (!isset($_SESSION["authclient_username"])) {
    header("Location: Login.php");
    exit();
}

?>