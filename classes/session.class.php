<?php 

class Session {
    
    public function __construct() {
        $this->start();
    }

    public static function start(){
        session_start();
    }

    public static function checkLoginPage() {
        if (isset($_SESSION["authclient_username"])) {
            header("Location: home.php");
            exit();
        }
    }

    public static function checkLogin() {
        if (!isset($_SESSION["authclient_username"])) {
            header("Location: login.php");
            exit();
        }
    }

    public static function isLoggedIn() {
        if (isset($_SESSION["authclient_username"])) {
            return true;
        } else {
            return false;
        }
    }

}

?>