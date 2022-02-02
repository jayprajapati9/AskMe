<?php

include "classes/session.class.php";
Session::start();
Session::checkLogin();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Viewport -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind Css -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- jquery Cdn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap Icons Cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <!-- Box Icons Cdn -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="style/style.css">

    <!-- Title -->
    <title>Home</title>
</head>

<body>

    <?php 
    
    include "classes/navbar.class.php"; 
    NavigationBar::loggedNavbar();

    ?>

    <div class="w-full mx-auto">
        <h1 class="text-blue-500 text-xl py-4 px-3">Home</h1>
        <div class="InboxWrap">
            <!-- <div class="flex items-start py-4 px-4 border-t-[1px]">
                <img src="http://qooh.me/images/mobile-default-photo.png" alt="" class="w-14 h-14 object-cover rounded-full">
                <div class="flex flex-col ml-3">
                    <h1 class="text-[16px] mb-0.5">Should i use pure css or framework ?</h1>
                    <p class="text-[15px] text-gray-500">So, if you are working on some big project and you don't have a
                        skilled
                        Front-End Developer in
                        your team, then CSS Frameworks can save your day. If you don't have many UI elements and
                        pages in your app, you don't need a framework.</p>
                    <span class="inline-flex items-center text-gray-400 mt-3 text-[13px]">
                        <a href="" class="text-blue-500 mr-1">@iam_jayy</a>
                        replied 8 hours ago
                    </span>
                </div>
            </div>-->
        </div>
    </div>

    <script type="text/javascript" src="js/navbar.js"></script>

</body>

</html>