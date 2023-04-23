<?php

include "classes/session.class.php";
include "classes/user.class.php";
include "classes/design.class.php";

Session::start();
Session::checkLogin();
$User = new User();
$Design = new Design();

$userData = $User->getUserData(Session::getSessionUser());
$user_theme = $userData["usertheme"];

if ($userData["iscustom"] == "yes") {
    $designData = $Design->getDesign(Session::getSessionUser());
}

function checkTheme($themeIn)
{
    global $user_theme;
    if ($user_theme == $themeIn) {
        echo "checked";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Viewport Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Lorem">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/favicon-32x32.png">

    <!-- Tailwind Css CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Local Css -->
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="stylesheet" href="assets/style/navbar.css">
    <link rel="stylesheet" href="assets/style/design.css">

    <!-- Google Font Poppins CDN -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&amp;display=swap" rel="stylesheet" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- jquery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Open+Sans:wght@300;400;500;600;700;800&family=Oswald:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- https://fonts.google.com/share?selection.family=Montserrat:wght@300;400;500;600;700;800%7COpen%20Sans:wght@300;400;500;600;700;800%7COswald:wght@300;400;500;600;700%7CPlayfair%20Display:wght@400;500;600;700;800%7CPoppins:wght@300;400;500;600;700;800%7CRoboto:wght@300;400;500;700 -->

    <!-- Title -->
    <title>Design</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="w-full bg-transparent">
        <div class="navbar-container bg-transparent">
            <div class="flex items-center">
                <img src="assets/images/logo512px.webp" alt="" class="w-8 sm:w-8" />
                <div class="ml-8 hidden sm:block">
                    <a href="mylinks" class="nav-link">My Links</a>
                    <a href="design" class="nav-link nav-link-active">Design</a>
                    <a href="analytics" class="nav-link">Analytics</a>
                    <a href="settings" class="nav-link">Settings</a>
                </div>
            </div>
            <div class="flex items-center text-xl">
                <div class="relative flex items-center">
                    <i class="bi bi-bell bell-icon" id="notify__btn"></i>
                    <button class="relative" id="user__avatar">
                        <img src="assets/images/user_avatar.webp" alt="User Img" class="w-9 sm:w-9 rounded-full shadow-md" />
                    </button>
                    <div class="popup-menu" id="hidden__popup">
                        <a href="profile" class="popup-option"><i class='bi bi-person'></i> Profile</a>
                        <a href="mylinks" class="popup-option block sm:hidden"><i class='bi bi-link-45deg'></i> My Links</a>
                        <a href="design" class="popup-option block sm:hidden"><i class='bi bi-palette2'></i> Design</a>
                        <a href="analytics" class="popup-option block sm:hidden"><i class='bi bi-bar-chart'></i> Analytics</a>
                        <a href="settings" class="popup-option block sm:hidden"><i class='bi bi-gear'></i> Settings</a>
                        <a href="logout" class="popup-option logout-option"><i class='bi bi-box-arrow-left'></i> Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Bg Blob -->
    <img class="bg-scene-blob" src="assets/images/blob-scene-haikei8.png" alt="BG"></img>

    <!-- Font Family Dialog -->
    <div class="hidden h-screen w-screen flex items-start justify-center fixed top-0 left-0 bg-gray-800 bg-opacity-50 z-10">
        <div class="w-full max-w-2xl bg-white rounded-lg shadow-lg z-20 mx-4 mt-16">
            <div class="w-full flex justify-between items-center text-lg px-6 py-3.5 rounded-t-lg">
                <h1>Select Font Family</h1>
                <i class='bi bi-x text-2xl cursor-pointer rounded-full px-1 hover:bg-gray-200 focus:bg-gray-200'></i>
            </div>
            <div class="border-b"></div>
            <div class="px-5 py-4">
                <input type="text" class="w-full bg-gray-100 text-black placeholder:text-gray-500 rounded px-3 py-2.5" name="" id="" placeholder="Search by font name">
            </div>
            <div class="h-56 overflow-y-auto px-4">
                <ul>
                    <li class="rounded-full cursor-pointer py-2 px-4 mb-2 focus:bg-gray-100 hover:bg-gray-100 font-sans">Sans</li>
                    <li class="rounded-full cursor-pointer py-2 px-4 mb-2 focus:bg-gray-100 hover:bg-gray-100 font-opensans">Open Sans</li>
                    <li class="rounded-full cursor-pointer py-2 px-4 mb-2 focus:bg-gray-100 hover:bg-gray-100 font-serif">Serif</li>
                    <li class="rounded-full cursor-pointer py-2 px-4 mb-2 focus:bg-gray-100 hover:bg-gray-100 font-mono">Mono</li>
                    <li class="rounded-full cursor-pointer py-2 px-4 mb-2 focus:bg-gray-100 hover:bg-gray-100 font-montserrat">Montserrat</li>
                    <li class="rounded-full cursor-pointer py-2 px-4 mb-2 focus:bg-gray-100 hover:bg-gray-100 font-oswald">Oswald</li>
                    <li class="rounded-full cursor-pointer py-2 px-4 mb-2 focus:bg-gray-100 hover:bg-gray-100 font-playfairdisplay">Playfair Display</li>
                    <li class="rounded-full cursor-pointer py-2 px-4 mb-2 focus:bg-gray-100 hover:bg-gray-100 font-poppins">Poppins</li>
                    <li class="rounded-full cursor-pointer py-2 px-4 mb-2 focus:bg-gray-100 hover:bg-gray-100 font-roboto">Roboto</li>
                </ul>
            </div>
            <div class="text-center border-t py-4">
                <button class="bg-gray-200 text-gray-800 px-6 py-1 rounded-full">Save</button>
            </div>
        </div>
    </div>

    <!-- File Upload Dialog -->
    <div id="uploadimg-modal" class="hidden h-screen w-screen flex items-start justify-center fixed top-0 left-0 bg-gray-800 bg-opacity-50 z-10">
        <div class="w-full max-w-lg bg-white rounded-lg shadow-lg z-20 mx-4 mt-16">
            <div class="w-full flex justify-between items-center text-lg px-6 py-3 rounded-t-lg">
                <h1>Upload Image</h1>
                <i id="close-uploadimgmodal-btn" class='bi bi-x text-2xl cursor-pointer rounded-full px-1 hover:bg-gray-200 focus:bg-gray-200'></i>
            </div>
            <div class="error hidden w-full bg-red-300 py-1.5 px-3">
                <p class="text-red-800 text-sm font-semibold">File Must Be Less Than 2kb</p>
            </div>
            <div class="py-4">
                <div id="dragdrop-zone" class="relative w-11/12 sm:w-10/12 h-[200px] flex items-center justify-center flex-col text-center mx-auto border-[3px] border-dashed">
                    <input type="file" accept="image/*" id="imgupload-input">
                    <i class="bi bi-image text-6xl text-blue-400"></i>
                    <span class="inline-flex text-[16px] sm:text-lg font-semibold">
                        <p class="text-slate-800">Drop your image here, or</p>
                        <label for="imgupload-input" class="text-blue-500 ml-2 cursor-pointer z-10">Browse</label>
                    </span>
                    <p class="text-gray-500 text-[13px] mt-1.5">Supports: jpg png jpeg with size 100x100</p>
                </div>
                <div class="flex justify-center">
                    <img src="" id="preview-img" class="hidden w-[140px] h-[140px] border rounded-full shadow-md object-cover" alt="">
                </div>
            </div>
            <div class="text-center py-4">
                <button id="saveimg-btn" disabled="true" class="w-full max-w-[130px] bg-gray-200 text-gray-800 px-4 py-1.5 rounded-full">Save</button>
            </div>
        </div>
    </div>


    <div class="main-container">
        <div class="design-controls-wrap">
            <!-- Profile -->
            <h1 class="card-title">Profile</h1>
            <div class="card-wrap">
                <div class="w-full flex justify-center items-center flex-col sm:flex-row gap-x-4 gap-y-4 mt-3">
                    <?php
                    if ($userData["userimg"] == null) {
                        echo "<div class='w-full h-[95px] max-h-[95px] max-w-[95px] rounded-full bg-gray-200 grid place-items-center'>
                                <span class='text-[40px] text-gray-600'>" . strtoupper(substr($userData['username'], 0, 1)) . "</span>
                              </div>";
                    } else {
                        echo "<img src='assets/images/" . $userData['userimg'] . "' class='w-full max-w-[95px] shadow-md rounded-full' alt=''>";
                    }
                    ?>
                    <div class="w-10/12 sm:w-full sm:max-w-[190px] text-[15px] flex justify-center flex-col gap-y-3">
                        <button id="show-uploadimgmodal-btn" class="w-full bg-blue-500 rounded-full text-white px-4 py-1.5">Change Image</button>
                        <button disabled class="w-full border-2 border-gray-200 rounded-full text-slate-500 px-4 py-1.5 hover:bg-gray-50 focus:bg-gray-50">Remove</button>
                    </div>
                </div>
                <input type="text" class="w-11/12 bg-gray-100 rounded-md py-2.5 px-4 text-[15px] mb-3 mt-6 outline-none border-transparent border-2 focus:border-gray-300" placeholder="Profile Title" name="" id="">
                <textarea class="w-11/12 bg-gray-100 rounded-md py-2.5 px-4 text-[15px] resize-none outline-none border-transparent border-2 focus:border-gray-300" placeholder="Profile Bio" maxlength="80" name="" id="input-bio" cols="30" rows="3"><?php echo $userData["userbio"] ?></textarea>
                <div class="w-11/12 mx-auto text-right text-slate-500 text-xs mt-2 mb-4">
                    <p id="bio-max-limit"><?php echo strlen($userData["userbio"]); ?>/80</p>
                </div>
            </div>

            <!-- Themes -->
            <h1 class="card-title">Themes</h1>
            <div class="card-wrap">
                <div class="theme-input">
                    <input class="radio-btn" id="theme7" value="arctic" type="radio" name="radio" <?php checkTheme("arctic") ?>>
                    <label for="theme7" class="radio-btn-body">
                        <img src="assets/images/FrameTheme1.webp" alt="">
                    </label>
                </div>
                <div class="theme-input">
                    <input class="radio-btn" id="theme8" value="fuchsia" type="radio" name="radio" <?php checkTheme("fuchsia") ?>>
                    <label for="theme8" class="radio-btn-body">
                        <img src="assets/images/FrameTheme2.webp" alt="">
                    </label>
                </div>
                <div class="theme-input">
                    <input class="radio-btn" id="theme9" value="obsidian" type="radio" name="radio" <?php checkTheme("obsidian") ?>>
                    <label for="theme9" class="radio-btn-body">
                        <img src="assets/images/FrameTheme3.webp" alt="">
                    </label>
                </div>
                <div class="theme-input custom-theme-input">
                    <input class="radio-btn" value="custom-theme" id="custom-theme" type="radio" name="radio" <?php checkTheme("") ?>>
                    <label for="custom-theme" class="radio-btn-body">
                        <div class="flex flex-col items-center  justify-center px-2">
                            <i class="bi bi-palette text-gray-700"></i>
                            <span class="text-xs text-center text-gray-700">Customize Theme</span>
                        </div>
                    </label>
                </div>
            </div>

            <h1 id="custom-look" class="text-slate-900 text-xl mt-14 mb-1.5">Customizable look</h1>
            <!-- Customize your Linktree profile with various options. Change background with colors, images, and gradients. Select button style and modify typography. -->
            <p class="text-slate-400 font-light text-[16px] mb-6">Personalize your rapidlink profile to your liking. Alter background with colors, gradient, and pictures. Pick a button design, switch font and more.</p>

            <!-- Background -->
            <h1 class="card-title">Background</h1>
            <div class="card-shadow w-full flex items-center flex-col bg-white rounded-[10px] p-[10px] mb-[25px]">
                <div class="flex items-center flex-wrap justify-center gap-x-3 py-6 gap-y-5">
                    <div class="flex items-center flex-col">
                        <button class="flex p-1 rounded-lg">
                            <div id="flat-color-sample" class="w-[90px] h-[125px] border rounded-lg" style="background-color:<?php echo empty($designData['bgflatcolor']) ? '#bfdbfe' :  '#' . $designData['bgflatcolor']; ?>"></div>
                        </button>
                        <p class="text-sm text-gray-500 mt-1">Flat Color</p>
                    </div>
                    <div class="flex items-center flex-col">
                        <button class="flex p-1 rounded-lg">
                            <div class="w-[90px] h-[125px] bg-gradient-to-b from-blue-400 to-blue-600 rounded-lg"></div>
                        </button>
                        <p class="text-sm text-gray-500 mt-1">Gradient</p>
                    </div>
                    <div class="flex items-center flex-col">
                        <button class="flex p-1 rounded-lg">
                            <div class="w-[90px] h-[125px] relative">
                                <p class="absolute text-[9px] bg-gray-600 text-white top-2 right-2 px-2 rounded-sm">Coming Soon</p>
                                <img src="https://cdn.shopify.com/s/files/1/0588/5306/4899/t/14/assets/product-placeholder.jpg" class="w-[90px] h-[125px] rounded-lg object-cover" alt="">
                            </div>
                        </button>
                        <p class="text-sm text-gray-500 mt-1">Image</p>
                    </div>
                    <div class="flex items-center flex-col">
                        <button class="flex p-1 rounded-lg">
                            <div class="w-[90px] h-[125px] relative bg-[#ebebeb] grid place-items-center rounded-lg">
                                <p class="absolute text-[9px] bg-gray-600 text-white top-2 right-2 rounded-sm px-2">Coming Soon</p>
                                <img src="assets/images/pattern.webp" class="w-[40px]" alt="">
                            </div>
                        </button>
                        <p class="text-sm text-gray-500 mt-1">Pattern</p>
                    </div>
                </div>

                <div class="flex items-center">
                    <input type="color" class="flat-color-input" id="flat-color-input" name="flat-color-input" value="<?php echo empty($designData['bgflatcolor']) ? '#000000' :  '#' . $designData['bgflatcolor']; ?>" />
                    <div class="w-full max-w-[170px] flex flex-row items-center bg-gray-100 rounded-lg ml-2 px-5 py-2.5">
                        <p class="text-sm text-gray-500 mr-4">Hex#</p>
                        <input type="text" name="" id="flat-color-txtinput" class="w-full text-slate-700 bg-gray-100 focus:outline-none" maxlength="6" spellcheck="false" pattern="^[a-fA-F0-9]{6}$" value="<?php echo empty($designData['bgflatcolor']) ? '000000' :  $designData['bgflatcolor']; ?>" />
                    </div>
                </div>
                <br>
            </div>

            <!-- Buttton -->
            <h1 class="card-title">Button</h1>
            <div class="card-wrap gap-x-4 pb-6">
                <p class="mr-auto w-full mb-3 mt-1 ml-3">Button Style</p>
                <div class="w-full flex items-center justify-center flex-wrap gap-x-4">
                    <div class="w-full max-w-[120px] sm:max-w-[160px] flex flex-col items-center justify-center">
                        <button class="fill-btn btn-style <?php if ($designData['btnstyle'] === "fill") echo "selected-button-style"; ?>" id="fill">
                            <div></div>
                        </button>
                        <p class="text-sm text-gray-500 mt-1.5">Fill</p>
                    </div>
                    <div class="w-full max-w-[120px] sm:max-w-[160px]  flex flex-col items-center justify-center">
                        <button class="outline-btn btn-style <?php if ($designData['btnstyle'] === "outline") echo "selected-button-style"; ?>" id="outline">
                            <div></div>
                        </button>
                        <p class="text-sm text-gray-500 mt-1.5">Outline</p>
                    </div>
                    <div class="w-full max-w-[120px] sm:max-w-[160px]  flex flex-col items-center justify-center">
                        <button class="softshadow-btn btn-style <?php if ($designData['btnstyle'] === "softshadow") echo "selected-button-style"; ?>" id="softshadow">
                            <div></div>
                        </button>
                        <p class="text-sm text-gray-500 mt-1.5">Soft Shadow</p>
                    </div>
                </div>
                <br>
                <div class="w-full <?php if ($designData["btnstyle"] == "softshadow" || $designData["btnstyle"] == "outline") echo "hidden" ?>" id="btnbg-color-wrap">
                    <p class="mr-auto w-full mb-3 mt-1 ml-3">Button Background Color</p>
                    <div class="flex items-center justify-center">
                        <input type="color" class="btnbg-color-input" id="btnbg-color-input" value="<?php echo '#' . $designData["btnbgcolor"]; ?>" name="btnbg-color-input" />
                        <div class="w-full max-w-[170px] flex flex-row items-center bg-gray-100 rounded-lg ml-2 px-5 py-2.5">
                            <p class="text-sm text-gray-500 mr-4">Hex#</p>
                            <input type="text" name="" id="btnbg-color-txtinput" class="w-full text-slate-700 bg-gray-100 focus:outline-none" value="<?php echo $designData["btnbgcolor"]; ?>" maxlength="6" spellcheck="false" pattern="^[a-fA-F0-9]{6}$" />
                        </div>
                    </div>
                </div>

                <p class=" mr-auto w-full mb-3 mt-8 ml-3">Round Corners</p>
                <div class="w-full max-w-[120px] sm:max-w-[160px]  flex flex-col items-center justify-center mb-4">
                    <button class="square-corner-btn btn-corner <?php if ($designData['btncornersname'] === "square") echo "selected-button-corners"; ?>" id="square">
                        <div></div>
                    </button>
                    <p class="text-sm text-gray-500">Square</p>
                </div>
                <div class="w-full max-w-[120px] sm:max-w-[160px]  flex flex-col items-center justify-center mb-4">
                    <button class="slightly-rounded-btn btn-corner <?php if ($designData['btncornersname'] === "slightlyrounded") echo "selected-button-corners"; ?>" id="slightlyrounded">
                        <div></div>
                    </button>
                    <p class="text-sm text-gray-500 text-center">Slightly Rounded</p>
                </div>
                <div class="w-full max-w-[120px] sm:max-w-[160px]  flex flex-col items-center justify-center mb-4">
                    <button class="rounded-btn btn-corner <?php if ($designData['btncornersname'] === "rounded") echo "selected-button-corners"; ?>" id="rounded">
                        <div></div>
                    </button>
                    <p class="text-sm text-gray-500 ">Rounded</p>
                </div>
                <div class="w-full max-w-[120px] sm:max-w-[160px]  flex flex-col items-center justify-center mb-4">
                    <button class="circular-btn btn-corner <?php if ($designData['btncornersname'] === "circular") echo "selected-button-corners"; ?>" id="circular">
                        <div></div>
                    </button>
                    <p class="text-sm text-gray-500">Circular</p>
                </div>

                <div class="w-full flex flex-wrap items-center justify-evenly flex-row px-3">
                    <p class="mr-auto w-full mb-2 mt-6">Button Text Color</p>
                    <div class="flex items-center">
                        <input type="color" class="btntxt-color-input" id="btntxt-color-input" name="btntxt-color-input" value="#FFFFFF" />
                        <div class="w-full max-w-[170px] flex flex-row items-center bg-gray-100 rounded-lg ml-2 px-5 py-2.5">
                            <p class="text-sm text-gray-500 mr-4">Hex#</p>
                            <input type="text" name="" id="btntxt-color-txtinput" class="w-full text-slate-700 bg-gray-100 focus:outline-none" value="<?php echo $designData["btntxtcolor"]; ?>" maxlength="6" spellcheck="false" pattern="^[a-fA-F0-9]{6}$" />
                        </div>
                    </div>
                </div>

            </div>

            <!-- Font -->
            <h1 class="card-title">Fonts</h1>
            <div class="card-wrap gap-x-4 pb-5">
                <p class="mr-auto w-full mb-3 mt-1 ml-3">Font Family</p>
                <button class="fontfamily-input w-full max-w-lg flex items-center px-4 py-2.5 border rounded-lg shadow-sm hover:bg-gray-100 focus:bg-gray-100 mx-3 sm:mx-5">
                    <span class="bg-gray-100 rounded-md mr-4 p-3">Aa</span>
                    <h2 class="text-[20px]">Poppins</h2>
                </button>

                <p class="mr-auto w-full mb-3 mt-6 ml-3">Font Weight</p>
                <div class="w-full flex flex-row items-center justify-center gap-x-5 gap-y-4 flex-wrap">
                    <button class="w-[70px] py-2 flex flex-col border-2 rounded-xl items-center hover:border-gray-500 focus:border-gray-500">
                        <h2 class="font-light text-2xl">Aa</h2>
                        <p class="text-xs text-gray-700">Light</p>
                    </button>
                    <button class="w-[70px] py-2 flex flex-col border-2 rounded-xl items-center hover:border-gray-500 focus:border-gray-500">
                        <h2 class="font-normal text-2xl">Aa</h2>
                        <p class="text-xs text-gray-700">Regular</p>
                    </button>
                    <button class="w-[70px] py-2 flex flex-col border-2 rounded-xl items-center hover:border-gray-500 focus:border-gray-500">
                        <h2 class="font-medium text-2xl">Aa</h2>
                        <p class="text-xs text-gray-700">Medium</p>
                    </button>
                    <button class=" w-[70px] py-2 flex flex-col border-2 rounded-xl items-center hover:border-gray-500 focus:border-gray-500">
                        <h2 class="font-semibold text-2xl">Aa</h2>
                        <p class="text-xs text-gray-700">Semibold</p>
                    </button>
                    <button class="w-[70px] py-2 flex flex-col border-2 rounded-xl items-center hover:border-gray-500 focus:border-gray-500">
                        <h2 class="font-bold text-2xl">Aa</h2>
                        <p class="text-xs text-gray-700">Bold</p>
                    </button>
                    <button class=" w-[70px] py-2 flex flex-col border-2 rounded-xl items-center hover:border-gray-500 focus:border-gray-500">
                        <h2 class="font-extrabold text-2xl">Aa</h2>
                        <p class="text-xs text-gray-700">Extrabold</p>
                    </button>
                </div>

                <p class="mr-auto w-full mb-3 mt-6 ml-3">Font Color</p>
                <div class="flex items-center">
                    <input type="color" class="font-color-input" id="font-color-input" value="<?php echo '#' . $designData["fontcolor"]; ?>" name="btnbg-color-input" />
                    <div class="w-full max-w-[170px] flex flex-row items-center bg-gray-100 rounded-lg ml-2 px-5 py-2.5">
                        <p class="text-sm text-gray-500 mr-4">Hex#</p>
                        <input type="text" name="" id="font-color-txtinput" class="w-full text-slate-700 bg-gray-100 focus:outline-none" value="<?php echo $designData["fontcolor"]; ?>" maxlength="6" spellcheck="false" pattern="^[a-fA-F0-9]{6}$" />
                    </div>
                </div>
            </div>
        </div>

        <div class="preview-wrap">
            <div class="preview-frame">
                <img src="assets/images/iphone_mockup.webp" />
                <iframe scrolling="no" id="preview-iframe" src="localpreview" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

    </div>

    <script type="text/javascript">
        $(document).ready(function() {

            function reloadIframe() {
                let iframe = document.getElementById("preview-iframe");
                iframe.src = iframe.src;
            }

            // <-------- Navbar Popup Menu -------->
            let userAvatarBtn = document.getElementById("user__avatar")
            let hiddenPopup = document.getElementById("hidden__popup")
            userAvatarBtn.addEventListener("click", () => {
                hiddenPopup.classList.toggle("show-popup")
            })


            // Function for sending updated prop to db
            function sendUpdatedProp(designobj) {
                return $.ajax({
                    url: "functions/designfun.php",
                    cache: false,
                    type: "POST",
                    data: {
                        designobj
                    },
                    success: function(res) {
                        return true
                    }
                })
            }


            // <-------- Bg Flat Color Input -------->
            let timerbgflatcolor
            $("#flat-color-input").on("input", function() {
                let flatcolor = $(this).val()
                $("#flat-color-txtinput").val(flatcolor.substr(1))
                $("#flat-color-sample").css("background-color", flatcolor)
                let designobj = {
                    "action": "updateprop",
                    "prop": "bgflatcolor",
                    "value": flatcolor.substr(1)
                }
                // Debounce Function
                clearTimeout(timerbgflatcolor)
                timerbgflatcolor = setTimeout(() => {
                    sendUpdatedProp(designobj).done((res) => {
                        reloadIframe()
                    })
                }, 800);
            })

            // <-------- Btn Bg Color Input -------->
            let timerbtnbgcolor
            $("#btnbg-color-input").on("input", function() {
                let bgbtncolor = $(this).val()
                $("#btnbg-color-txtinput").val(bgbtncolor.substr(1))
                let designobj = {
                    "action": "updateprop",
                    "prop": "btnbgcolor",
                    "value": bgbtncolor.substr(1)
                }
                clearTimeout(timerbtnbgcolor)
                timerbtnbgcolor = setTimeout(() => {
                    sendUpdatedProp(designobj).done((res) => {
                        reloadIframe()
                    })
                }, 800);
            })

            // <-------- Btn Txt Color Input -------->
            let timerbtntxtcolor
            $("#btntxt-color-input").on("input", function() {
                let btntxtcolor = $(this).val()
                $("#btntxt-color-txtinput").val(btntxtcolor.substr(1))
                let designobj = {
                    "action": "updateprop",
                    "prop": "btntxtcolor",
                    "value": btntxtcolor.substr(1)
                }
                clearTimeout(timerbtntxtcolor)
                timerbtntxtcolor = setTimeout(() => {
                    sendUpdatedProp(designobj).done((res) => {
                        reloadIframe()
                    })
                }, 800);
            })

            // <-------- Font Color Input -------->
            let timerfontcolor
            $("#font-color-input").on("input", function() {
                let fontcolor = $(this).val()
                $("#font-color-txtinput").val(fontcolor.substr(1))
                let designobj = {
                    "action": "updateprop",
                    "prop": "fontcolor",
                    "value": fontcolor.substr(1)
                }
                clearTimeout(timerfontcolor)
                timerfontcolor = setTimeout(() => {
                    sendUpdatedProp(designobj).done((res) => {
                        reloadIframe()
                    })
                }, 800);
            })

            // <-------- Button Style Input -------->
            $(".btn-style").click(function() {
                $(".btn-style").each(function() {
                    if ($(this).hasClass("selected-button-style")) {
                        $(this).removeClass("selected-button-style")
                    }
                })
                $(this).addClass("selected-button-style")
                let btnstyle = $(this).attr("id")
                if (btnstyle === "fill") {
                    $("#btnbg-color-wrap").removeClass("hidden")
                }
                if (btnstyle == "outline") {
                    $("#btnbg-color-wrap").addClass("hidden")
                }
                if (btnstyle == "softshadow") {
                    $("#btnbg-color-wrap").addClass("hidden")
                }
                let designobj = {
                    "action": "updateprop",
                    "prop": "btnstyle",
                    "value": btnstyle
                }
                sendUpdatedProp(designobj).done((res) => {
                    console.log(res);
                    reloadIframe()
                })
            })

            // <-------- Button Style Input -------->
            $(".btn-corner").click(function() {
                $(".btn-corner").each(function() {
                    if ($(this).hasClass("selected-button-corners")) {
                        $(this).removeClass("selected-button-corners")
                    }
                })
                $(this).addClass("selected-button-corners")
                let btncorners = $(this).attr("id")
                let designobj = {
                    "action": "updateprop",
                    "prop": "btncorners",
                    "value": btncorners
                }
                sendUpdatedProp(designobj).done((res) => {
                    console.log(res);
                    reloadIframe()
                })
            })

            // <-------- Input Bio -------->
            let limit = 80
            let timerbioinput
            $("#input-bio").keydown(function(e) {
                if (e.keyCode === 13 && !e.shiftKey) {
                    e.preventDefault()
                } else {
                    let textLength = $(this).val().length
                    $("#bio-max-limit").html(null)
                    $("#bio-max-limit").html(textLength + "/" + limit)
                    /*  if (textLength > limit) {
                      console.log("Limit")
                    } else {
                      console.log("All Good")
                    } */
                    clearTimeout(timerbioinput)
                    timerbioinput = setTimeout(() => {
                        $.ajax({
                            url: "functions/userfun.php",
                            cache: false,
                            type: "POST",
                            data: {
                                "action": "updatebio",
                                "biotxt": $(this).val()
                            },
                            success: function(res) {
                                reloadIframe()
                            }
                        })
                    }, 800);
                }
            })

            $(".custom-theme-input").change(function() {
                document.getElementById("custom-look").scrollIntoView({
                    behavior: 'smooth'
                })
            })

            let themeobj
            let themeinput = document.querySelectorAll(".radio-btn")
            themeinput.forEach(radioButton => {
                radioButton.addEventListener('click', event => {
                    const selectedValue = event.target.value
                    if (selectedValue == "custom-theme") {
                        themeobj = {
                            action: "updatetheme",
                            iscustom: "yes",
                            themename: ""
                        }
                    } else {
                        themeobj = {
                            action: "updatetheme",
                            iscustom: "no",
                            themename: selectedValue
                        }
                    }
                    $.ajax({
                        url: "functions/designfun.php",
                        cache: false,
                        type: "POST",
                        data: {
                            themeobj
                        },
                        success: function(res) {
                            reloadIframe()
                            console.log(res)
                        }
                    })
                })
            })
            /*themeinput.forEach(radioButton => {
                if (radioButton.checked) {
                    selectedValue = radioButton.value;
                }
            })*/


            $("#show-uploadimgmodal-btn").click(() => {
                $("#uploadimg-modal").toggleClass("hidden")
            })
            $("#close-uploadimgmodal-btn").click(() => {
                $("#uploadimg-modal").toggleClass("hidden")
            })
            // <----------- Image Upload -----------> 
            let imgUploadInput = document.getElementById("imgupload-input")
            let previewImg = document.getElementById("preview-img")
            let dragdropZone = document.getElementById("dragdrop-zone")
            let saveImgBtn = document.getElementById("saveimg-btn")

            // Profile Image Function
            imgUploadInput.addEventListener("change", (e) => {
                // get selected files
                const imageFiles = e.target.files
                // Get the image path.
                const imageSrc = URL.createObjectURL(imageFiles[0])
                // Assign the path to the image preview element.
                previewImg.src = imageSrc
                dragdropZone.classList.toggle("hidden")
                previewImg.classList.toggle("hidden")
                saveImgBtn.classList.remove("bg-gray-200", "text-gray-800")
                saveImgBtn.classList.add("bg-blue-400", "text-white")
                saveImgBtn.disabled = true
            })

            // imgUploadInput.addEventListener("dragover", (e) => {
            //     dragdropZone.classList.add("scale-[1.01]")
            //     dragover MUK k Lya
            //     drop ha bas em muki devanu
            // })


            // const disableButton = () => {
            //     button1.disabled = true;
            // };  
        })
    </script>
</body>

</html>