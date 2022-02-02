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
    <title>Inbox</title>
</head>

<body>
    <?php

    include "classes/navbar.class.php";
    NavigationBar::loggedNavbar();

    ?>

    <div class="w-full mx-auto">
        <h1 class="text-blue-500 text-xl py-4 px-3">Inbox</h1>
        <hr>
        <div>
            <?php

            include "classes/database.class.php";
            include "classes/post.class.php";

            $Post = new Post();
            $username = strtolower($_SESSION["authclient_username"]);

            foreach ($Post->getPostForInbox($username) as $post) {
                $askedBy;
                if ($post->isanonymous == "Yes") {
                    $askedBy = "<p class='ml-1'>Anonymous</p>";
                } else {
                    $askedBy = "<a href='$post->asked_by' class='text-blue-500 ml-1'>@$post->asked_by</a>";
                }
                echo "<div class='px-3 py-3.5 border-b-[1px]'>
                <h2 class='text-[16px]'>$post->question</h2>
                <span class='inline-flex items-center text-gray-400 text-[14px]'>1 hour ago by $askedBy</span>
                <div class='flex items-center justify-end mt-3.5'>
                    <a href='reply.php?qnid=$post->qnid' class='text-blue-500 inline-flex items-center px-4 border-r'>
                        <i class='bi bi-reply-fill mr-1'></i>Reply
                    </a>
                    <a href='' class='text-blue-500 inline-flex items-center px-4'>
                        <i class='bi bi-trash-fill mr-1 text-sm'></i>Delete
                    </a>
                </div>
            </div>";
            }
            ?>
            <!-- <div class="px-3 py-3.5 border-b-[1px]">
                <h2 class="text-[16px]">What does it mean?</h2>
                <span class="inline-flex items-center text-gray-400 text-[14px]">
                    1 hour ago by
                    <a href="" class="text-blue-500 ml-1">@iam_jayy</a>
                </span>
                <div class="flex items-center justify-end mt-3.5">
                    <a href="" class="text-blue-500 inline-flex items-center px-4 border-r">
                        <i class="bi bi-reply-fill mr-1"></i>
                        Reply
                    </a>
                    <a href="" class="text-blue-500 inline-flex items-center px-4">
                        <i class="bi bi-trash-fill mr-1 text-sm"></i>
                        Delete
                    </a>
                </div>
            </div> -->
        </div>
    </div>

    <script type="text/javascript" src="js/navbar.js"></script>

</body>

</html>