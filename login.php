<?php

include "./classes/session.class.php";
Session::start();
Session::checkLoginPage();

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

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="style/style.css">

    <!-- Title -->
    <title>Login</title>
</head>

<body>

    <?php

    include 'classes/navbar.class.php';
    NavigationBar::nonLoggedNavbar();

    ?>

    <div class="sm:w-9/12 sm:max-w-2xl w-11/12 mx-auto">
        <h1 class="text-blue-500 text-xl mb-6 mt-6">Wellcome back</h1>
        <div>
            <p class="text-gray-600">Username</p>
            <input type="text" id="usernameInput" class="w-full border border-gray-300 px-1 py-1.5 text-sm focus:border-blue-500 outline-none rounded" maxlength="16">
            <p class="text-red-400 text-[14px]" id="usernameErr"></p>
        </div>
        <div class="mt-5">
            <p class="text-gray-600">Password</p>
            <input type="password" id="passwInput" class="w-full border border-gray-300 px-1 py-1.5 text-sm focus:border-blue-500 outline-none rounded">
            <!-- <p class="text-red-400 text-[14px]">Please enter password</p> -->
        </div>
        <br>
        <p class="text-center mb-2 text-red-500" id="error_msg"></p>
        <button class="block mx-auto w-6/12 py-2 rounded bg-blue-500 text-white" id="LoginBtn">Log In</button>
    </div>

    <script type="text/javascript" src="js/loginsignup.js"></script>

    <script>
        document.getElementById("LoginBtn").addEventListener("click", function() {
            let username = document.getElementById("usernameInput").value;
            let passw = document.getElementById("passwInput").value;
            if (username != "" && passw != "") {
                if (UsernameRegex(username)) {
                    $.ajax({
                        url: "functions/loginsignup.php",
                        type: "POST",
                        cache: false,
                        data: {
                            action: "login",
                            usernameVal: username,
                            passwVal: passw
                        },
                        success: function(result) {
                            var result = JSON.parse(result);
                            if (result.message == "CORRECT INFO") {
                                $('#usernameInput').val('');
                                $('#passwInput').val('');
                                location.href = "home.php";
                            } else if (result.message == "INCORRECT INFO") {
                                ErrorMsg("#error_msg", "Username or password is incorrect ❌");
                            }
                        }
                    });
                } else {
                    ErrorMsg("#usernameErr", "Username may only contain letters, numbers, underscores ( _ )");
                }
            } else {
                ErrorMsg("#error_msg", "Please enter all details 🙄");
            }
        });
    </script>
</body>

</html>