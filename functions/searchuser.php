<?php 

include "../classes/database.class.php";
include "../classes/helper.class.php";
include "../classes/user.class.php";

$Helper = new Helper();
$User =  new User();

if (isset($_POST['action'])) {
    if ($_POST['action'] == "searchuser") {
        $return_arr = array();
        if (!empty($_POST['searchedUsername'])) {
            $username = $Helper->sanitizeInput($_POST['searchedUsername']);   
            $totalfound = $User->totalFound($username);
            if ($totalfound > 0) {
                foreach($User->searchUser($username) as $users){
                    $return_arr[] = array(
                        "username" => $users->username,
                        "fullname" => $users->fullname,
                        "userimg"  => $users->userimg
                    );
                }
            header('Content-type: application/json');
            echo json_encode(array("totalresult" => $totalfound, "searchresult" => $return_arr)); 
        } else {
            header('Content-type: application/json');
            echo json_encode(array("status" => "failed", "message" => "not-found"));
        }
    } else {
            header('Content-type: application/json');
            echo json_encode(array("status" => "failed", "message" => "not-found"));
        }
    }
}

?>