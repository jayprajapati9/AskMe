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
    <title>Signup | RapidLink</title>
</head>

<body>
    <div class="flex flex-row items-center justify-center h-screen">
        <div class="w-6/12 h-full hidden lg:flex flex items-center justify-center">
            <img src="assets/images/SignUpPromoImg.png" alt="" class="w-9/12 mt-8" />
        </div>
        <div class="absolute top-0 lg:top-5 w-full lg:w-6/12 left-0 flex items-center justify-start lg:p-0 p-5 lg:justify-center mt-0 lg:mt-2">
            <a href="" class="text-blue-500 text-lg lg:text-xl inline-flex items-center">
                <img src="assets/images/logo512px.webp" alt="" class="h-6 w-6 lg:h-8 lg:w-8" />
                <p class="ml-1">RapidLink</p>
            </a>
        </div>
        <div class="__gradientBG lg:w-6/12 w-full h-full flex justify-center lg:items-center items-start">
            <div class="w-full max-w-lg md:max-w-md md:mx-auto m-4 text-center px-4 lg:px-0 lg:mt-0 mt-20">

                <h1 class="text-3xl font-medium lg:font-normal lg:text-3xl mt-2 lg:mt-0 lg:text-left text-center text-slate-700 lg:text-white">Create account for free </h1>
                <h2 class="text-gray-500 lg:text-white lg:text-left mt-1 text-md mb-10 lg:mb-8">Free forever. No payment needed.</h2>

                <input id="username-field" class="w-full bg-[#eff0ec] lg:bg-white lg:drop-shadow-md rounded-md p-2.5 lg:p-2.5 outline-none text-md focus:ring-1 focus:ring-gray-200" type="text" placeholder="Username" />
                <p id="username-err" class="text-left mb-4 text-red-300 text-sm lg:text-xs mt-1"></p>

                <input id="email-field" class="w-full bg-[#eff0ec] lg:bg-white lg:drop-shadow-md rounded-md p-2.5 lg:p-2.5 outline-none text-md focus:ring-1 focus:ring-gray-200" type="email" placeholder="Email" />
                <p id="email-err" class="text-left mb-4 text-red-300 text-sm lg:text-xs mt-1"></p>

                <div class="w-full relative bg-[#eff0ec] lg:bg-white flex items-center justify-between lg:drop-shadow-md rounded-md  mt-3">
                    <div id="passw-reqrmnts" class="hidden absolute left-0 bottom-16 rounded-lg flex flex-col items-start bg-white shadow-lg px-3 py-2 after:content-[''] after:absolute after:left-[20px] after:bottom-[-12px] after:border-t-[14px] after:border-t-white after:border-l-[14px] after:border-r-[14px] after:border-l-transparent after:border-r-transparent after:drop-shadow-lg">
                        <span id="passw-lowercase" class="flex items-center gap-x-2 text-red-400"><i class='bx bx-x-circle'></i> Lowercase</span>
                        <span id="passw-uppercase" class="flex items-center gap-x-2 text-red-400"><i class='bx bx-x-circle'></i> Uppercase</span>
                        <span id="passw-number" class="flex items-center gap-x-2 text-red-400"><i class='bx bx-x-circle'></i> Number</span>
                        <span id="passw-specialchar" class="flex items-center gap-x-2 text-red-400"><i class='bx bx-x-circle'></i> Special Character</span>
                        <span id="passw-8char" class="flex items-center gap-x-2 text-red-400"><i class='bx bx-x-circle'></i> 8 Character Long</span>
                        <!-- <span class="absolute left-[20px] bottom-[-10px] drop-shadow-md border-solid border-t-white border-t-[10px] border-x-transparent border-x-[10px] border-b-0"></span>-->
                    </div>
                    <input id="password-field" class="w-11/12 bg-[#eff0ec] lg:bg-white p-2.5 lg:p-2.5 outline-none text-md rounded-md focus:ring-1 focus:ring-gray-200" type="password" placeholder="Password" />
                    <i id="toggle-password" class="bi bi-eye-slash text-xl px-2.5 text-slate-400 cursor-pointer flex"></i>
                </div>
                <p id="passw-err" class="text-left mb-4 text-red-300 text-sm lg:text-xs mt-1"></p>

                <button id="signup-btn" class="w-10/12 max-w-xs lg:w-auto bg-blue-500 text-white lg:bg-white lg:text-blue-500 px-12 py-2 text-md rounded-full lg:rounded-[4px] mt-6 lg:drop-shadow-md hover:bg-blue-600 active:bg-blue-600 lg:hover:bg-slate-100 lg:active:bg-slate-100">
                    SIGN ME UP
                </button>

                <div class="my-6 lg:my-4"></div>

                <span class="inline-flex font-light text-sm lg:text-sm text-black lg:text-white">
                    <p>Already Have Any Account?</p>
                    <a href="login.php" class="ml-1 underline text-blue-500 lg:text-white">Login</a>
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
    <!--  -->
    <script type="text/javascript" src="js/toasty.js"></script>
    <script type="text/javascript" src="js/signuplogin.js"></script>
    <script type="text/javascript" src="js/helper.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $("#password-field").focus(function() {
                $('#passw-reqrmnts').fadeIn('low')
                $('#passw-reqrmnts').toggleClass('hidden')
            })

            $("#password-field").blur(function() {
                $('#passw-reqrmnts').fadeOut('low')
                $('#passw-reqrmnts').toggleClass('hidden')
            })

            function changeToValid(id) {
                $(id).find("i").removeClass("bx-x-circle")
                $(id).find("i").addClass("bx-check-circle")
                $(id).removeClass("text-red-400")
                $(id).addClass("text-green-500")
            }

            function changeToInvalid(id) {
                $(id).find("i").removeClass("bx-check-circle")
                $(id).find("i").addClass("bx-x-circle")
                $(id).removeClass("text-green-500")
                $(id).addClass("text-red-400")
            }

            $("#password-field").keyup(function(e) {

                let passw = $(this).val()

                // validate length
                if (passw.length < 8) {
                    changeToInvalid("#passw-8char")
                } else {
                    changeToValid("#passw-8char")
                }
                // validate lowercase
                if (passw.match(/[a-z]/)) {
                    changeToValid("#passw-lowercase")
                } else {
                    changeToInvalid("#passw-lowercase")
                }
                // validate uppercase
                if (passw.match(/[A-Z]/)) {
                    changeToValid("#passw-uppercase")
                } else {
                    changeToInvalid("#passw-uppercase")
                }
                // validate number
                if (passw.match(/\d/)) {
                    changeToValid("#passw-number")
                } else {
                    changeToInvalid("#passw-number")
                }
                // validate symbol 
                // /[-!$%^@&*()_+|~=`{}\[\]:";'<>?,.\/]/ OR ^.*[-+_!@#$%^&*.,?].*$
                if (passw.match(/[-!$%^@&*()_+|~=`{}\[\]:";'<>?,.\/]/)) {
                    changeToValid("#passw-specialchar")
                } else {
                    changeToInvalid("#passw-specialchar")
                }

                // Remove Whitespace Live
                this.value = this.value.replace(/\s/g, "");
            })

            $("#signup-btn").click(() => {
                let username = $("#username-field").val().trim()
                let email = $("#email-field").val().trim()
                let password = $("#password-field").val().trim()

                if (username != "" && email != "" && password != "") {
                    if (emailRegex(email)) {
                        if (usernameRegex(username)) {
                            if (/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[-+_!@#$%^&*.,?]).{7,}$/.test(password)) {
                                $("#signup-btn").attr("disabled", true)
                                $("#signup-btn").html(`<svg id="loader" class=" animate-spin h-5 w-5 mr-1.5 inline-flex" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                   </svg>`)
                                $.ajax({
                                    url: "functions/loginsignup.php",
                                    type: "POST",
                                    cache: false,
                                    data: {
                                        action: "signup",
                                        usernameVal: username,
                                        emailVal: email,
                                        passwVal: password
                                    },
                                    success: function(result) {
                                        setTimeout(function() {
                                            $("#signup-btn").attr("disabled", false)
                                            $("#signup-btn").text('SIGN ME UP')
                                            var response = JSON.parse(result)
                                            if (response.message == "ACC_ERROR") {
                                                $.toasty({
                                                    type: "withicon",
                                                    message: "Oops, Something went wrong !!",
                                                    icon: "bx bx-error",
                                                    backgroundcolor: "#FFF",
                                                    color: "#ef4444",
                                                    customcss: {
                                                        "border-top": "3px solid #ef4444"
                                                    }
                                                })
                                            } else if (response.message == "ACC_CREATED") {
                                                $.toasty({
                                                    type: "withicon",
                                                    message: "Account Created",
                                                    icon: "bx bxs-check-circle",
                                                    backgroundcolor: "#FFF",
                                                    color: "#22c55e",
                                                    customcss: {
                                                        "border-top": "3px solid #22c55e"
                                                    }
                                                })
                                            } else if (response.message == "USERNAME_IS_TAKEN") {
                                                errorMsg("#username-err", "Username already taken 🙄")
                                            } else if (response.message == "EMAIL_IS_TAKEN") {
                                                errorMsg("#email-err", "Email already taken 📧")
                                            }
                                        }, 500)
                                    }
                                })
                            } else {
                                $("#password-field").focus()
                            }
                        } else {
                            errorMsg("#username-err", "Username may only contain letters, numbers, underscores ( _ )")
                        }
                    } else {
                        errorMsg("#email-err", "Please Enter Valid Email 📧")
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

            // $("#butsave").attr("disabled", "disabled");

        })
    </script>

</body>

</html>