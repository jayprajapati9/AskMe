<?php

include "classes/database.class.php";
include "classes/session.class.php";
include "classes/helper.class.php";
include "classes/post.class.php";

Session::start();
Session::checkLogin();

$Helper = new Helper();
$Post = new Post();

if (empty($_GET['qnid']) || $_GET['qnid'] == "" || $_GET['qnid'] == Null) {
    header('Location: notfound.php');
} else if ($_GET['qnid'] == 0) {
    header('Location: notfound.php');
} else if ($_GET['qnid'] < 0) {
    header('Location: notfound.php');
} else if (is_numeric($_GET['qnid'])) {
    $QuestionId = $Helper->sanitizeInput($_GET['qnid']);
    $askedto = $Helper->sanitizeInput($_SESSION['authclient_username']);
    if ($Post->getQuestionById($QuestionId, $askedto) === false) {
        header('Location: notfound.php');
    } else {
        $questionData = $Post->getQuestionById($QuestionId, $askedto);
    }
} else {
    header('Location: notfound.php');
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
    <title>Reply</title>
</head>

<body>

    <?php

    include "classes/navbar.class.php";
    NavigationBar::loggedNavbar();

    ?>
    <div class="w-full inline-flex items-center text-blue-500 text-xl py-4 px-3 border-b">
        <a href="inbox.php">
            <i class="bi bi-arrow-left mr-3"></i>
        </a>
        <h1>Reply</h1>
    </div>
    <div class="sm:w-9/12 sm:max-w-4xl w-11/12 mx-auto py-4">
        <!-- <h1 class="text-[17px]">Q.</h1> -->
        <div class="flex flex-col">
            <!-- <p class="mr-2 font-medium">Question:</p> -->
            <p class="text-[16px]"><?php echo $questionData["Question"] ?></p>
            <span class="inline-flex items-center mt-2 text-sm">by
                <?php
                if ($questionData["Isanonymous"] == "Yes") {
                    echo "<p class='mx-1'>Aanonymous</p>";
                } else if ($questionData["Isanonymous"] == "No") {
                    echo "<a href=" . $questionData['Asked_by'] . " class='mx-1 text-blue-500'>@" . $questionData['Asked_by'] . "</a>";
                }
                ?>
            </span>
        </div>
        <div class="border mt-3 rounded">
            <textarea name="" class="resize-y w-full h-[5rem] max-h-[10rem] rounded outline-none p-1" id="AnswerInput"></textarea>
            <div class="flex justify-between items-center px-3 py-2 bg-zinc-100 border-t">
                <p class="text-[12px]">Share reply to get more questions from friends</p>
                <button class="bg-blue-500 text-white px-5 py-0.5 text-[14px] rounded" id="PostBtn" data-qnid="<?php echo $questionData["QnId"] ?>">Post</button>
            </div>
        </div>
        <p class="text-red-400 text-[14px]" id="inputErr"></p>
        <p class="text-green-400 text-[14px]" id="inputSuccess"></p>
    </div>

    <script type="text/javascript" src="js/navbar.js"></script>
    <script>
        let PostBtn = document.getElementById("PostBtn");
        PostBtn.addEventListener("click", function() {
            const regex = /^\s+$/;
            let AnswerInput = document.getElementById("AnswerInput").value;
            let QnId = $(this).data("qnid");
            if (AnswerInput == "") {
                $("#inputErr").text("Please enter something !");
                setTimeout(() => {
                    $("#inputErr").text(null);
                }, 4000);
            } else if (regex.test(AnswerInput)) {
                $("#inputErr").text("Please enter something !");
                setTimeout(() => {
                    $("#inputErr").text(null);
                }, 4000);
            } else {
                $.ajax({
                    url: "functions/question.php",
                    type: "POST",
                    cache: false,
                    data: {
                        action: "answer",
                        AnswerVal: AnswerInput,
                        QnidVal: QnId
                    },
                    success: function(result) {
                        $('#AnswerInput').val('');
                        if (result == 1) {
                            $("#inputSuccess").text("Thanks for submiting answer.");
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