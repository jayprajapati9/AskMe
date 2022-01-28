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
    <title>Signup</title>
</head>

<body>
    <nav class="flex items-center justify-between bg-blue-500 py-4 px-3">
        <a href="." class="text-white flex text-[20px] items-center">
            Ask<div class="NavBubbleChat">Me</div>
        </a>
        <div class="inline-flex text-white">
            <a href="Login.php" class="px-3">LOGIN</a>
            <div class="border-r mx-0.5"></div>
            <a href="Signup.php" class="px-3">JOIN</a>
        </div>
    </nav>
    <div class="sm:w-9/12 sm:max-w-2xl w-11/12 mx-auto">
        <h1 class="text-blue-500 text-xl mb-6 mt-6">Create your account</h1>
        <div>
            <p class="text-gray-600">Username</p>
            <input type="text" id="usernameInput" class="w-full border text-sm border-gray-300 px-1 py-1.5 focus:border-blue-500 outline-none rounded" maxlength="16">
            <p class="text-red-400 text-[14px]" id="usernameErr"></p>
        </div>
        <div class="mt-5">
            <p class="text-gray-600">Name</p>
            <input type="text" id="fullnameInput" class="w-full border text-sm border-gray-300 px-1 py-1.5 focus:border-blue-500 outline-none rounded" maxlength="20">
        </div>
        <div class="mt-5">
            <p class="text-gray-600">Email Address</p>
            <input type="email" id="emailInput" class="w-full border text-sm border-gray-300 px-1 py-1.5 focus:border-blue-500 outline-none rounded">
            <p class="text-red-400 text-[14px]" id="emailErr"></p>
        </div>
        <div class="mt-5">
            <p class="text-gray-600">Password</p>
            <input type="password" id="passwInput" class="w-full border text-sm border-gray-300 px-1 py-1.5 focus:border-blue-500 outline-none rounded">
        </div>
        <div class="inline-flex items-center mt-5 mb-4">
            <input type="radio" name="radioBtn" class="mr-1.5" id="maleRd" value="Male">
            <label class="text-gray-600" for="maleRd">Male</label>
            <div class="px-3"></div>
            <input type="radio" name="radioBtn" class="mr-1.5" id="femaleRd" value="Female">
            <label class="text-gray-600" for="femaleRd">Female</label>
        </div>
        <br>
        <p class="text-center mb-2 text-red-500" id="error_msg"></p>
        <p class="text-center mb-2 text-green-500" id="success_msg"></p>
        <button class="block mx-auto w-6/12 py-2 rounded bg-blue-500 text-white" id="SignUpBtn">Sign me up</button>
    </div>

    <script type="text/javascript" src="js/loginsignup.js"></script>

    <script>
        document.getElementById("SignUpBtn").addEventListener("click", function() {
            let username = document.getElementById("usernameInput").value;
            let fullname = document.getElementById("fullnameInput").value;
            let email = document.getElementById("emailInput").value;
            let passw = document.getElementById("passwInput").value;
            let gender = document.querySelector('input[name = "radioBtn"]:checked');

            if (username != "" && fullname != "" && email != "" && passw != "" && gender != null) {
                if (EmailRegex(email)) {
                    if (UsernameRegex(username)) {
                        $.ajax({
                            url: "functions.php",
                            type: "POST",
                            cache: false,
                            data: {
                                type: "signup",
                                usernameVal: username,
                                fullnameVal: fullname,
                                emailVal: email,
                                passwVal: passw,
                                genderVal: gender.value,
                            },
                            success: function(result) {
                                var result = JSON.parse(result);
                                if (result.message == "oopserror") {
                                    ErrorMsg("#error_msg", "Oops, Something went wrong !!");
                                } else if (result.message == "accountcreated") {
                                    $('#usernameInput').val('');
                                    $('#fullnameInput').val('');
                                    $('#emailInput').val('');
                                    $('#passwInput').val('');
                                    gender.checked = false;
                                    SuccessMsg("#success_msg", "Account created now you can login 😃");
                                } else if (result.message == "alreadytaken") {
                                    ErrorMsg("#error_msg", "Username or Email Already Taken 🙄");
                                }
                            }
                        });
                    } else {
                        ErrorMsg("#usernameErr", "Username may only contain letters, numbers, underscores ( _ )");
                    }
                } else {
                    ErrorMsg("#emailErr", "Please enter a valid email address 📧");
                }
            } else {
                ErrorMsg("#error_msg", "Please enter all details 🙄");
            }
        });
    </script>
</body>

</html>