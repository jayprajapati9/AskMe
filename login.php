<?php

include "./classes/session.class.php";
Session::start();
Session::checkLoginPage();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Viewport Tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/favicon-32x32.png">

    <!-- Tailwind Css CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Font Poppins CDN -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&amp;display=swap" rel="stylesheet" />

    <!-- BoxIcons CDN -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />

    <!-- Bootstrap Icon CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <!-- Local Css -->
    <link rel="stylesheet" href="assets/style/style.css" />

    <!-- jquery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Title -->
    <title>Login | RapidLink</title>
</head>

<body>
    <div class="flex flex-row items-center justify-center h-screen">
        <div class="w-6/12 h-full hidden lg:flex flex items-center justify-center">
            <img src="assets/images/LoginPromoImg.png" alt="" class="w-8/12 mt-8" />
        </div>
        <div class="absolute top-0 lg:top-5 w-full lg:w-6/12 left-0 flex items-center justify-start lg:p-0 p-5 lg:justify-center mt-0 lg:mt-2">
            <a href="" class="text-blue-500 text-lg lg:text-xl inline-flex items-center">
                <img src="assets/images/logo512px.webp" alt="" class="h-6 w-6 lg:h-8 lg:w-8" />
                <p class="ml-1">RapidLink</p>
            </a>
        </div>
        <div class="__gradientBG lg:w-6/12 w-full h-full flex justify-center lg:items-center items-start">
            <div class="w-full max-w-lg md:max-w-md md:mx-auto m-4 text-center px-4 lg:px-0 lg:mt-0 mt-20">

                <h1 class="text-3xl font-medium lg:font-normal lg:text-3xl mt-2 lg:mt-0 mb-10 lg:mb-8 lg:text-left text-center text-slate-700 lg:text-white">
                    Welcome back
                </h1>

                <input id="username-field" class="w-full bg-[#eff0ec] lg:bg-white lg:drop-shadow-md rounded-md p-2.5 pl-4 lg:p-2.5 outline-none text-md" type="text" placeholder="Username" />
                <p id="username-err" class="text-left mb-4 text-red-300 text-sm lg:text-xs mt-1"></p>

                <div class="w-full bg-[#eff0ec] lg:bg-white flex items-center justify-between lg:drop-shadow-md rounded-md  mt-3">
                    <input id="password-field" class="w-11/12 bg-[#eff0ec] lg:bg-white p-2.5 pl-4 lg:p-2.5 outline-none text-md rounded-md" type="password" placeholder="Password" />
                    <i id="toggle-password" class="bi bi-eye-slash text-xl px-2.5 text-slate-400 cursor-pointer flex"></i>
                </div>
                <p id="passw-err" class="text-left mb-4 text-red-300 text-sm lg:text-xs mt-1"></p>

                <button id="login-btn" class="w-10/12 max-w-xs lg:w-auto bg-blue-500 text-white lg:bg-white lg:text-blue-500 px-12 py-2 text-md rounded-full lg:rounded-[4px] mt-6 lg:drop-shadow-md hover:bg-blue-600 active:bg-blue-600 lg:hover:bg-slate-100 lg:active:bg-slate-100">
                    LOGIN
                </button>

                <div class="my-6 lg:my-4"></div>

                <span class="inline-flex font-light text-sm lg:text-sm text-black lg:text-white">
                    <p>Not Have Any Account?</p>
                    <a href="signup" class="ml-1 underline text-blue-500 lg:text-white">Signup</a>
                </span>

                <!-- <div class="lg:w-6/12 w-full fixed bottom-7 flex right-0 justify-center items-center">
                    <div id="alert-toast" class="hidden w-full max-w-[290px] bg-white flex items-center border shadow border-t-4 py-1.5 px-3 pr-6 rounded">
                        <i id="toastmsg-symbol" class="bx mr-2 text-xl flex flex-col items-center"></i>
                        <p id="toast-msg" class="text-[14px]"></p>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/toasty.js"></script>
    <script type="text/javascript" src="js/signuplogin.js"></script>
    <script type="text/javascript" src="js/helper.js"></script>

    <script type="text/javascript">
        document.getElementById("login-btn").addEventListener("click", function() {

            const username = document.getElementById("username-field").value.trim();
            const passw = document.getElementById("password-field").value.trim();

            if (username != "" && passw != "") {
                if (usernameRegex(username)) {
                    $("#login-btn").attr("disabled", true)
                    $("#login-btn").html(`<svg id="loader" class=" animate-spin h-5 w-5 mr-1.5 inline-flex" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                   </svg>`)
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
                            setTimeout(function() {
                                $("#login-btn").attr("disabled", false)
                                $("#login-btn").text('LOGIN')
                                var msg = JSON.parse(result);
                                if (msg.message == "CORRECT_INFO") {
                                    // $('#usernameInput').val('')
                                    location.href = "mylinks";
                                } else if (msg.message == "INCORRECT_INFO") {
                                    $.toasty({
                                        type: "withicon",
                                        message: "Incorrect Username or Password",
                                        icon: "bx bx-error",
                                        backgroundcolor: "#FFF",
                                        color: "#ef4444",
                                        borderradius: "4px",
                                        customcss: {
                                            "border-top": "3px solid #ef4444"
                                        }
                                    })
                                }
                            }, 500)
                        }
                    })
                } else {
                    errorMsg("#username-err", "Username may only contain letters, numbers, underscores ( _ )")
                }
            } else {
                $.toasty({
                    type: "withicon",
                    message: "Please enter all details",
                    icon: "bi bi-exclamation-circle",
                    backgroundcolor: "#FFF",
                    color: "#eab308",
                    customcss: {
                        "border-top": "3px solid #eab308"
                    }
                })
            }
        })
    </script>
</body>

</html>