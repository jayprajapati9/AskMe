<?php 

class NavigationBar {

    public static function nonLoggedNavbar(){
        include ('./include/nonloggednavbar.php');
    }

    public static function loggedNavbar(){
        include ('./include/loggednavbar.php');
    }

    public function __construct(){
        if (isset($_SESSION["authclient_username"])) {
            self::loggedNavbar();
        } else {
            self::nonLoggedNavbar();
        }
    }

}

?>