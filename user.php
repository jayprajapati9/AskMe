<?php

include "classes/database.class.php";
include "classes/session.class.php";
include "classes/helper.class.php";
include "classes/user.class.php";
include "classes/follow.class.php";

Session::start();

$Helper = new Helper();
$User = new User();
$Follow = new Follow();

if (isset(($_GET["username"])) === true && empty(($_GET["username"])) === false) {
    $username = $Helper->sanitizeInput(strtolower($_GET["username"]));
} else {
    $username = $_SESSION["authclient_username"];
}

$profileData = $User->getUserData($username);

if (empty($profileData)) {
    header("Location: ./notfound.php");
    exit();
}

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

    <!-- jquery Cdn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Box Icons Cdn -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="style/style.css">

    <!-- Title -->
    <title></title>
</head>

<body>

    <?php
    include "classes/navbar.class.php";
    new NavigationBar();
    ?>

    <div class="w-full max-w-screen-md mx-auto py-6 px-3">
        <div class="flex items-start">
            <img src="<?php echo $profileData["userimg"]; ?>" alt="" class="w-20 h-20 object-cover rounded-full">
            <div class="flex flex-col items-start ml-4">
                <span class="inline-flex items-baseline">
                    <p class="text-[18px] font-medium text-slate-800"><?php echo $profileData["fullname"]; ?></p>
                    <!-- <i class='bx bxs-badge-check ml-1 text-blue-500'></i> green-500 -->
                </span>
                <p class="text-gray-500 text-[14px]">@<?php echo $profileData["username"]; ?></p>
                <p class="hidden" id="HiddenUsername"><?php echo $profileData["username"]; ?></p>
                <div id="followButton">
                    <?php
                    if (Session::isLoggedIn()) {
                        if ($username != $_SESSION["authclient_username"]) {
                            if ($Follow->isUserFollow($_SESSION["authclient_username"], $username) == 1) {
                                echo "<button class='FOLLOWING follow-btn bg-tranparent inline-flex items-center text-[14px] py-1 px-4 rounded mt-4 border border-green-500 bg-green-500 text-white' data-receiver=" . $profileData["username"] . ">Following</button>";
                            } else {
                                echo "<button class='FOLLOW follow-btn bg-tranparent inline-flex items-center text-[14px] py-1 px-4 rounded mt-4 border border-blue-500 text-blue-500' data-receiver=" . $profileData["username"] . "><i class='bx bx-plus mr-1'></i>Follow</button>";
                            }
                        } else {
                            echo "<a href='' class='bg-gray-200 inline-flex items-center text-[14px] py-1 px-4 rounded mt-4'><i class='bx bx-pencil mr-1'></i>Edit Profile</a>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-center sm:w-8/12 w-full mx-auto mt-6">
            <div class="flex flex-col items-center w-full max-w-xs">
                <p class="font-medium text-[16px]"><?php echo $profileData["following"]; ?></p>
                <p class="text-gray-500 text-[15px]">Following</p>
            </div>
            <div class="flex flex-col items-center w-full max-w-xs border-x">
                <p class="font-medium text-[16px]"><?php echo $profileData["followers"]; ?></p>
                <p class="text-gray-500 text-[15px]">Followers</p>
            </div>
            <div class="flex flex-col items-center w-full max-w-xs">
                <p class="font-medium text-[16px]"><?php echo $profileData["totalpost"]; ?></p>
                <p class="text-gray-500 text-[15px]">Posts</p>
            </div>
        </div>
        <p class="mt-6 mb-3 text-[15px] text-gray-700"></p>
        <div class="border rounded">
            <textarea name="" class="resize-y w-full h-[5rem] max-h-[10rem] outline-none p-1 rounded" id="QuestionInput"></textarea>
            <div class="flex justify-between items-center px-3 py-2 bg-zinc-100 border-t">
                <div class="flex items-center">
                    <input type="checkbox" name="" id="hideName" class="h-3.5 w-3.5">
                    <label for="hideName" class="ml-1 text-[13px]">Hide Your Name</label>
                </div>
                <button class="bg-blue-500 text-white px-5 py-0.5 text-[14px] rounded" id="SendBtn">Send</button>
            </div>
        </div>
        <!-- <hr class="my-7"> -->
        <p class="text-red-400 text-[14px]" id="inputErr"></p>
        <p class="text-green-400 text-[14px]" id="inputSuccess"></p>
        <br>
        <div class="inline-flex items-center mb-4">
            <div class="_PROFILEBUBBLECHAT"><?php echo $profileData["totalpost"]; ?></div>
            <h1 class="font-medium ml-1 text-[16px]">Replies</h1>
        </div>
        <div class="mt-3">
            <?php

            include "classes/post.class.php";

            $Post = new Post();

            foreach ($Post->getPostForProfile($username) as $post) {
                $askedBy;
                if ($post->isanonymous == "Yes") {
                    $askedBy = "<p class='ml-1'>Anonymous</p>";
                } else {
                    $askedBy = "<a href='$post->asked_by' class='text-blue-500 ml-1'>@$post->asked_by</a>";
                }
                echo "<div class='flex items-start py-4 border-t-[1px]'>
                <img src='" . $profileData["userimg"] . "' alt='' class='w-14 h-14 object-cover rounded-full'>
                <div class='flex flex-col ml-3'>
                    <h1 class='text-[17px]'>$post->question</h1>
                    <p class='text-gray-500 text-[14px]'>$post->answer</p>
                    <span class='inline-flex items-center text-gray-400 mt-3 text-[13px]'>
                        <a href='' class='text-blue-500 mr-1'>@$post->asked_to</a>
                        replied 2 days ago
                    </span>
                </div>
            </div>";
            }
            ?>
            <!-- <div class="flex items-start py-4 border-t-[1px]">
                <img src="http://qooh.me/images/mobile-default-photo.png" alt="" class="w-14 h-14 object-cover rounded-full">
                <div class="flex flex-col ml-3">
                    <h1 class="text-[17px]">Should i use pure css or framework ?</h1>
                    <p class="text-gray-500 text-[14px]">So, if you are working on some big project and you don't have a
                        skilled
                        Front-End Developer in
                        your team, then CSS Frameworks can save your day. If you don't have many UI elements and
                        pages in your app, you don't need a framework.</p>
                    <span class="inline-flex items-center text-gray-400 mt-3 text-[13px]">
                        <a href="" class="text-blue-500 mr-1">@iam_jayy</a>
                        replied 2 days ago
                    </span>
                </div>
            </div> -->

        </div>
    </div>

    <script type="text/javascript" src="js/navbar.js"></script>

    <script>
        try {
            let followBtn = document.querySelector(".follow-btn");
            followBtn.addEventListener("click", function() {
                let receiver = $(this).data("receiver");
                if (followBtn.classList.contains("FOLLOW")) {
                    $.post('functions/follow.php', {
                            action: "follow",
                            follow: receiver
                        },
                        function(result) {
                            if (result == 1) {
                                followBtn.classList.remove("FOLLOW");
                                followBtn.classList.remove("border-blue-500");
                                followBtn.classList.remove("text-blue-500");

                                followBtn.classList.add("FOLLOWING");
                                followBtn.classList.add("text-white");
                                followBtn.classList.add("bg-green-500");
                                followBtn.classList.add("border-green-500");

                                followBtn.innerText = "Following";
                                console.log("Started Following");
                            }
                        });
                } else if (followBtn.classList.contains("FOLLOWING")) {
                    $.post('functions/follow.php', {
                            action: "unfollow",
                            unfollow: receiver
                        },
                        function(result) {
                            if (result == 1) {
                                followBtn.classList.remove("FOLLOWING");
                                followBtn.classList.remove("text-white");
                                followBtn.classList.remove("bg-green-500");
                                followBtn.classList.remove("border-green-500");

                                followBtn.classList.add("FOLLOW");
                                followBtn.classList.add("border-blue-500");
                                followBtn.classList.add("text-blue-500");

                                followBtn.innerHTML = `<i class='bx bx-plus mr-1'></i>Follow`;
                                console.log("Unfollow");
                            }
                        });
                }
            });
        } catch (err) {
            console.log("");
        }

        let SendBtn = document.getElementById("SendBtn");
        SendBtn.addEventListener("click", function() {
            let isAnonymous;
            const regex = /^\s+$/;
            let QuestionInput = document.getElementById("QuestionInput").value;
            let HiddenUsername = document.getElementById("HiddenUsername").innerText;
            let hideName = document.getElementById('hideName');
            if (QuestionInput == "") {
                $("#inputErr").text("Please enter something !");
                setTimeout(() => {
                    $("#inputErr").text(null);
                }, 4000);
            } else if (regex.test(QuestionInput)) {
                $("#inputErr").text("Please enter something !");
                setTimeout(() => {
                    $("#inputErr").text(null);
                }, 4000);
            } else {
                if (hideName.checked) {
                    isAnonymous = "Yes";
                } else {
                    isAnonymous = "No";
                }
                $.ajax({
                    url: "functions/question.php",
                    type: "POST",
                    cache: false,
                    data: {
                        action: "addqn",
                        QuestionVal: QuestionInput,
                        askedtoVal: HiddenUsername,
                        anonymousVal: isAnonymous
                    },
                    success: function(result) {
                        $('#QuestionInput').val('');
                        if (result == 1) {
                            $("#inputSuccess").text("Thanks for asking question.");
                            setTimeout(() => {
                                $("#inputSuccess").text(null);
                            }, 5000);
                        } else if (result == 0) {
                            $("#inputErr").text("Something went wrong !!");
                            setTimeout(() => {
                                $("#inputErr").text(null);
                            }, 4000);
                        }
                    }
                });
            }
        });
    </script>
</body>

</html>