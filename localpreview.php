<?php

include "classes/session.class.php";
include "classes/user.class.php";
include "classes/block.class.php";
include "classes/design.class.php";

Session::start();
Session::checkLogin();

$User = new User();
$Block = new Block();
$Design = new Design();

$userData = $User->getUserData(Session::getSessionUser());

if ($userData["iscustom"] == "yes") {
    $Design->loadCustomCss(Session::getSessionUser());
}

if (empty($userData["usertitle"])) {
    $profiletitle = $userData["username"];
} else if (!empty($userData["usertitle"])) {
    $profiletitle = $userData["usertitle"];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/favicon-32x32.png">

    <!-- Title -->
    <title><?php echo $userData["username"]; ?> | RapidLink</title>

    <!-- General Css -->
    <link rel="stylesheet" href="themes/localgeneral.css">

    <?php
    if ($userData["iscustom"] != "yes") {
        $theme = $userData["usertheme"];
        echo "<link rel='stylesheet' href='themes/" . $theme . ".css'>";
    } else {
        echo "<link rel='stylesheet' href='themes/customdesign.css'>";
    }
    ?>

    <!-- Google Font Poppins CDN -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&amp;display=swap" rel="stylesheet" />

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body class="font-family main-bg-color">
    <div class="main-container">
        <?php
        if ($userData["userimg"] == null) {
            echo "<div class='default-avatar'>
                    <span>".strtoupper(substr($userData['username'], 0, 1))."</span>
                  </div>";
        } else {
            echo "<img src='assets/images/".$userData['userimg']."' class='profile-img' alt=''>";
        }
        ?>
        <h1 class="profile-title font-color"> <span style="font-family: sans-serif; margin-right: 3px;">@</span><?php echo $profiletitle; ?></h1>
        <p class="profile-bio font-color"><?php echo $userData["userbio"]; ?></p>
        <div class="blocks-container">
          <?php
            foreach ($Block->getBlocks($userData['username'], "userview") as $link) {
                if ($link->blocktype == "linkblock") {
                    echo "<a href='$link->linkurl' class='link-block btn-corners btn-bg-color btn-txt-color' target='_blank' rel='noopener noreferrer'>$link->linktitle</a>";
                } else if ($link->blocktype == "headerblock") {
                    echo "<h4 class='header-block font-color'>$link->header</h4>";
                }
            }
            ?>
        </div>
    </div>
</body>

</html>