<?php

include "classes/session.class.php";
include "classes/user.class.php";

Session::start();
Session::checkLogin();

$User = new User();

$userData = $User->getUserData(Session::getSessionUser());

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Viewport Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>My Links</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/favicon-32x32.png">

    <!-- Tailwind Css CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Font Poppins CDN -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&amp;display=swap" rel="stylesheet" type='text/css' />

    <!-- Local CSS -->
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="stylesheet" href="assets/style/navbar.css">
    <link rel="stylesheet" href="assets/style/mylinks.css">
    <link rel="stylesheet" href="assets/style/CTA-animations.css">

    <!-- jquery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js" integrity="sha512-0bEtK0USNd96MnO4XhH8jhv3nyRF0eK87pJke6pkYf3cM0uDIhNJy9ltuzqgypoIFXw3JSuiy04tVk4AjpZdZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Bootstap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />

    <!-- Chart Js CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
</head>

<body>
    <!-- Navbar -->
    <nav class="w-full bg-transparent">
        <div class="navbar-container bg-transparent">
            <div class="flex items-center">
                <img src="assets/images/logo512px.webp" class="w-8 sm:w-8" />
                <div class="hidden sm:block ml-8">
                    <a href="mylinks" class="nav-link nav-link-active">My Links</a>
                    <a href="design" class="nav-link">Design</a>
                    <a href="" class="nav-link">Analytics</a>
                    <a href="settings" class="nav-link">Settings</a>
                </div>
            </div>
            <div class="flex items-center text-xl">
                <div class="relative flex items-center">
                    <i class="bi bi-bell bell-icon" id="notify__btn"></i>
                    <button class="relative" id="user__avatar">
                        <?php
                        if ($userData["userimg"] == null) {
                            echo "<div class='w-8 h-9 sm:h-9 sm:w-9 rounded-full bg-gray-300 grid place-items-center'>
                                        <span>" . strtoupper(substr($userData['username'], 0, 1));
                            ".</span>
                                      </div>";
                        } else {
                            echo "<img src='assets/images/user_avatar.webp' alt='' class='w-8 sm:w-9 rounded-full shadow-md' />";
                        }
                        ?>
                    </button>
                    <div class="popup-menu" id="hidden__popup">
                        <a href="" class="popup-option"><i class='bi bi-person'></i> Profile</a>
                        <a href="mylinks" class="popup-option block sm:hidden"><i class='bi bi-link-45deg'></i> My Links</a>
                        <a href="design" class="popup-option block sm:hidden"><i class='bi bi-palette2'></i> Design</a>
                        <a href="" class="popup-option block sm:hidden"><i class='bi bi-bar-chart'></i> Analytics</a>
                        <a href="settings" class="popup-option block sm:hidden"><i class='bi bi-gear'></i> Settings</a>
                        <a href="logout" class="popup-option logout-option"><i class='bi bi-box-arrow-left'></i> Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Add New Link Modal -->
    <div id="addnewlink-modal" class="hidden h-screen w-screen flex items-center justify-center fixed top-0 left-0 bg-gray-900 bg-opacity-60 z-10">
        <div class="w-full max-w-lg bg-white rounded-xl shadow-lg z-20 mx-5 mb-28 p-6">
            <div class="w-full flex justify-between items-center">
                <h1 class="text-lg opacity-80 font-medium sm:font-semibold">Add Link</h1>
                <i id="close-addnewlink-modal-btn" class='bi bi-x grid place-items-center text-gray-500 text-[26px] hover:bg-gray-100 focus:bg-gray-100 rounded-full cursor-pointer'></i>
            </div>
            <hr class="my-4">
            <div class="w-full mx-auto mb-5">
                <div class="w-full flex flex-col items-start justify-center">
                    <p class="text-[15px] mb-px">Link Title</p>
                    <input type="text" id="linktitle-field" class="w-full border border-gray-300 text-md rounded-md px-4 py-1.5 focus:border-blue-500 focus:outline-none placeholder:text-gray-400 placeholder:font-light" placeholder="Visit My Store">
                    <p id="linktitle-err" class="text-[13px] text-red-400 font-light mt"></p>
                </div>
                <div class="w-full flex flex-col items-start justify-center mt-4">
                    <p class="text-[15px] mb-px">Link URL</p>
                    <input type="text" id="linkurl-field" class="w-full border border-gray-300 text-md rounded-md px-4 py-1.5 focus:border-blue-500 focus:outline-none placeholder:text-gray-400 placeholder:font-light" placeholder="www.xyzfashion.com">
                    <p id="linkurl-err" class="text-[13px] text-red-400 font-light mt"></p>
                </div>
            </div>
            <button id="savelink-btn" class="block mx-auto bg-blue-500 text-white font-bold rounded-md shadow-md py-2 px-10 hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">SAVE</button>
        </div>
    </div>

    <!-- Add New Header Modal -->
    <div id="addnewheader-modal" class="hidden h-screen w-screen flex items-center justify-center fixed top-0 left-0 bg-gray-900 bg-opacity-60 z-10">
        <div class="w-full max-w-lg bg-white rounded-xl shadow-lg z-20 mx-5 mb-28 p-6">
            <div class="w-full flex justify-between items-center">
                <h1 class="text-lg opacity-80 font-medium sm:font-semibold">Add Header</h1>
                <i id="close-addnewheader-modal-btn" class='bi bi-x grid place-items-center text-gray-500 text-[26px] hover:bg-gray-100 focus:bg-gray-100 rounded-full cursor-pointer'></i>
            </div>
            <hr class="my-4">
            <div class="w-full mx-auto mb-5">
                <div class="w-full flex flex-col items-start justify-center">
                    <p class="text-[15px] mb-px">Header</p>
                    <input type="text" id="header-field" class="w-full border border-gray-300 text-md rounded-md px-4 py-1.5 focus:border-blue-500 focus:outline-none placeholder:text-gray-400 placeholder:font-light" placeholder="Exclusive Deals">
                    <p id="header-err" class="text-[13px] text-red-400 font-light mt"></p>
                </div>
            </div>
            <button id="saveheader-btn" class="block mx-auto bg-blue-500 text-white font-bold rounded-md shadow-md py-2 px-10 hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">SAVE</button>
        </div>
    </div>

    <!-- Share Link Modal -->
    <div id="sharelink-modal" class="hidden h-screen w-screen flex items-start justify-center fixed top-0 left-0 bg-gray-900 bg-opacity-60 z-10 px-3">
        <div class="w-full max-w-md bg-white rounded-xl shadow-lg z-20 mx-4 mt-16 px-5 sm:px-8 py-4 sm:pb-6 sm:pt-4">
            <div class="flex justify-end">
                <i id="close-sharelink-modal-btn" class='bi bi-x text-gray-500 hover:bg-gray-100 focus:bg-gray-100 rounded-full text-3xl grid place-items-center cursor-pointer'></i>
            </div>
            <h1 class="text-2xl">🔗</h1>
            <h1 class="text-xl opacity-80 font-medium sm:font-semibold mb-2">Share your rapidlink</h1>
            <p class="text-[13px] sm:text-[14px] leading-snug text-slate-600 font-light mb-5">Highlight your achievements and get the most eyes on your rapidlink page by promoting it on the internet!</p>
            <button class="w-full bg-gray-200 hover:bg-opacity-60 focus:bg-opacity-60 bg-opacity-40 flex items-center justify-start py-2.5 px-2.5 rounded-md">
                <i class="bi bi-box-arrow-up-right bg-blue-400 text-lg text-white rounded px-2.5 py-1"></i>
                <div class="w-full text-left ml-2">
                    <h1 class="text-[13px] text-gray-900 font-semibold ">Post to your followers</h1>
                    <p class="text-[10px] font-normal text-gray-800">By way of post, social media update, or message</p>
                </div>
                <i class="bi bi-chevron-right mr-1"></i>
            </button>
            <button class="w-full bg-gray-200 bg-opacity-40 hover:bg-opacity-60 focus:bg-opacity-60 flex items-center justify-start py-2.5 px-2.5 mt-2.5 rounded-md">
                <i class="bi bi-qr-code bg-blue-400 text-lg text-white rounded px-2.5 py-1"></i>
                <div class="w-full text-left ml-2">
                    <h1 class="text-[13px] text-gray-900 font-semibold ">Share QR code</h1>
                    <p class="text-[10px] font-normal text-gray-800">A unique QR code to share anywhere</p>
                </div>
                <i class="bi bi-chevron-right mr-1"></i>
            </button>
            <hr class="my-3">
            <button class="w-full flex items-center justify-start bg-gray-200 bg-opacity-40 hover:bg-opacity-60 focus:bg-opacity-60 gap-x-2 py-2.5 px-2 rounded-md">
                <i class="bi bi-link-45deg text-xl grid place-items-center"></i>
                <p class="w-full text-[14px] truncate text-left font-normal">rapidlink.com/user1234</p>
                <i class="bi bi-files grid place-items-center -scale-x-100"></i>
            </button>
        </div>
    </div>

    <!-- Delete Link Modal -->
    <div id="delete-modal" class="hidden h-screen w-screen flex items-center justify-center fixed top-0 left-0 bg-gray-900 bg-opacity-60 z-10">
        <div class="w-full max-w-md bg-white rounded-md shadow-lg z-20 mx-4 mb-20 px-5 py-5">
            <div class="flex justify-between items-center pb-3">
                <h1 class="text-lg opacity-80 font-medium sm:font-semibold">Are you sure you want to delete link ?</h1>
            </div>
            <div class="border-b"></div>
            <p class="text-[15px] text-slate-700 sm:text-black font-light mt-3">This action cannot be undone. All analytics associated with this link will also be deleted.</p>
            <div class="flex items-center mt-5 gap-x-3">
                <button class="w-6/12 text-sm rounded-md border text-gray-600 border-gray-300 py-3 font-semibold hover:text-gray-500 focus:text-gray-500 focus:bg-gray-50 hover:bg-gray-50">Cancel</button>
                <button id="deleteblock-btn" class="w-6/12 text-white text-sm rounded-md py-3 font-semibold bg-red-600 hover:bg-red-500 focus:bg-red-500">Delete</button>
            </div>
        </div>
    </div>

    <!-- Priority Link Modal -->
    <div class="hidden h-screen w-screen flex items-center justify-center fixed top-0 left-0 bg-gray-900 bg-opacity-60 z-10">
        <div class="w-full max-w-lg bg-white rounded-md shadow-lg z-20 mx-4 mb-20 px-5 py-5">
            <div class="flex justify-between items-center pb-4">
                <h1 class="text-lg opacity-80 font-medium sm:font-semibold">Priority Link</h1>
                <i class="bi bi-x text-gray-500 hover:bg-gray-100 focus:bg-gray-100 rounded-full text-3xl grid place-items-center cursor-pointer"></i>
            </div>
            <div class="border-b"></div>
            <p class="text-[15px] text-black font-light mt-4">Grab attention of visitors by cool effect.</p>
            <div class="flex flex-wrap items-center justify-center mt-3 gap-y-3 gap-x-2">
                <div class="priority-input">
                    <input id="pulse-animate" type="radio" name="radio" class="priority-radio-btn">
                    <label for="pulse-animate" class="radio-btn-body">
                        <div class="sample-animate pulse-animate"></div>
                    </label>
                    <p>Pulse</p>
                </div>
                <div class="priority-input">
                    <input id="tada-animate" type="radio" name="radio" class="priority-radio-btn">
                    <label for="tada-animate" class="radio-btn-body">
                        <div class="sample-animate tada-animate"></div>
                    </label>
                    <p>Tada</p>
                </div>
                <div class="priority-input">
                    <input id="bounce-animate" type="radio" name="radio" class="priority-radio-btn">
                    <label for="bounce-animate" class="radio-btn-body">
                        <div class="sample-animate bounce-animate"></div>
                    </label>
                    <p>Bounce</p>
                </div>
                <div class="priority-input">
                    <input id="wobble-animate" type="radio" name="radio" class="priority-radio-btn">
                    <label for="wobble-animate" class="radio-btn-body">
                        <div class="sample-animate wobble-animate"></div>
                    </label>
                    <p>Wobble</p>
                </div>
                <div class="priority-input">
                    <input id="jello-animate" type="radio" name="radio" class="priority-radio-btn">
                    <label for="jello-animate" class="radio-btn-body">
                        <div class="sample-animate jello-animate"></div>
                    </label>
                    <p>Jello</p>
                </div>
                <div class="priority-input">
                    <input id="shake-animate" type="radio" name="radio" class="priority-radio-btn">
                    <label for="shake-animate" class="radio-btn-body">
                        <div class="sample-animate shake-animate"></div>
                    </label>
                    <p>Shake</p>
                </div>
            </div>
            <div class="w-full flex justify-center flex-row gap-x-3 mt-3">
                <button class="text-gray-300 border rounded-md px-4 py-2"><i class="bi bi-trash3"></i></button>
                <button class="text-sm text-gray-500 bg-gray-200/100 rounded-md px-7 py-2">Save Animation</button>
            </div>
        </div>
    </div>

    <!-- Bg Blob -->
    <img class="bg-scene-blob" src="assets/images/blob-scene-haikei8.png" alt=""></img>

    <div class="main-container">
        <div class="left-wrap">

            <!-- Analytics -->
            <div class="w-full max-w-2xl mx-auto">
                <!-- border-[#d3e3ea] -->
                <h1 class="text-slate-800 mb-1.5 sm:mb-3.5 text-lg sm:text-xl">Analytics</h1>
                <div class="analytics-shadow rounded-lg bg-white border border-slate-100 p-4">
                    <div class="relative flex items-center justify-around pr-5 sm:pr-0">
                        <div class="flex flex-row items-center">
                            <span class="w-[10px] h-[10px] bg-blue-400 opacity-90 rounded-full mr-2.5 sm:mr-3.5"></span>
                            <div>
                                <p class="text-gray-700 text-[15px] sm:text-sm">Views</p>
                                <h3 class="text-slate-700 text-base sm:text-xl">00</h3>
                            </div>
                        </div>
                        <div class="flex flex-row items-center">
                            <span class="w-[10px] h-[10px] bg-sky-400 opacity-90 rounded-full mr-2.5 sm:mr-3.5"></span>
                            <div>
                                <p class="text-gray-700 text-[15px] sm:text-sm">Clicks</p>
                                <h3 class="text-slate-700 text-base sm:text-xl">00</h3>
                            </div>
                        </div>
                        <div class="flex flex-row items-center">
                            <span class="w-[10px] h-[10px] bg-violet-400 opacity-90 rounded-full mr-2.5 sm:mr-3.5"></span>
                            <div>
                                <p class="text-gray-700 text-[15px] sm:text-sm">CTR</p>
                                <h3 class="text-slate-700 text-base sm:text-xl">00%</h3>
                            </div>
                        </div>
                        <button id="toggle-chart-btn" class="absolute right-0 bottom-0 top-0">
                            <i class="bi bi-chevron-down"></i>
                        </button>
                    </div>
                    <div id="analytic-chart-wrap" class="analytics-chart">
                        <canvas></canvas>
                    </div>
                </div>
            </div>

            <div class="my-7"></div>

            <!-- + Add Link Btn & Preview Btn -->
            <div class="w-full max-w-[300px] mx-auto flex items-center gap-x-3">
                <button id="addlink-btn" class="w-full bg-blue-500 text-white text-sm sm:text-base rounded-full py-1.5 px-3 sm:px-3 shadow-md hover:bg-blue-600 hover:shadow-lg focus:bg-blue-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-700 active:shadow-lg transition duration-150 ease-in-out">+ Add Link</button>
                <button id="preview-btn" class="preview-btn min-[800px]:hidden block flex items-center justify-center gap-y-2 border shadow-md border-blue-500 text-blue-500 text-sm sm:text-base rounded-full py-1.5 px-4 sm:px-4 hover:bg-blue-400 hover:bg-opacity-10 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 transition duration-150 ease-in-out"><i class="bi bi-eye mr-1.5"></i> Preview</button>
            </div>

            <!-- Add To Link Card -->
            <div id="addlink-card" class="hide-addtolink-card w-full max-w-2xl mx-auto bg-white rounded-lg">
                <div class="w-full flex justify-between items-center mb-3 pt-3 px-1">
                    <div></div>
                    <h1 class="text-slate-900 text-[18px] text-center">Add To Rapidlink</h1>
                    <i id="close-addlink-card-btn" class='bi bi-x text-gray-500 hover:bg-gray-100 focus:bg-gray-100 rounded-full text-2xl grid place-items-center cursor-pointer p-1'></i>
                </div>
                <div class="w-full flex flex-wrap items-center justify-center gap-4 pb-5">
                    <button id="addnewlink-btn" class="w-[80px] h-auto flex items-center justify-center flex-col gap-y-1.5 pt-1.5 rounded">
                        <i class="bi bi-link-45deg bg-blue-400 px-3 py-1 rounded-md text-white text-[26px]"></i>
                        <p class="text-[15px] text-gray-700">Link</p>
                    </button>
                    <button id="addnewheader-btn" class="w-[80px] h-auto flex items-center justify-center flex-col gap-y-1.5 pt-1.5 rounded">
                        <i class="bi bi-fonts bg-purple-400 px-3 py-1 rounded-md text-white text-[26px]"></i>
                        <p class="text-[15px] text-gray-700">Header</p>
                    </button>
                    <button class="w-[80px] h-auto flex items-center justify-center flex-col gap-y-1.5 pt-1.5 rounded">
                        <i class="bi bi-card-heading bg-lime-500 px-3 py-1 rounded-md text-white text-[26px]"></i>
                        <p class="text-[15px] text-gray-700">Card</p>
                    </button>
                    <button class="w-[80px] h-auto flex items-center justify-center flex-col gap-y-1.5 pt-1.5 rounded">
                        <i class="bi bi-distribute-vertical bg-gray-400 px-3 py-1 rounded-md text-white text-[26px]"></i>
                        <p class="text-[15px] text-gray-700">Divider</p>
                    </button>
                    <button class="w-[80px] h-auto flex items-center justify-center flex-col gap-y-1.5 pt-1.5 rounded">
                        <i class="bi bi-spotify bg-gray-800 px-3 py-1 rounded-md text-green-500 text-[26px]"></i>
                        <p class="text-[15px] text-gray-700">Spotify</p>
                    </button>
                    <button class="w-[80px] h-auto flex items-center justify-center flex-col gap-y-1.5 pt-1.5 rounded">
                        <i class="bi bi-youtube bg-red-400 px-3 py-1 rounded-md text-white text-[26px]"></i>
                        <p class="text-[15px] text-gray-700">Youtube</p>
                    </button>
                </div>
            </div>

            <div class="my-5"></div>

            <!-- My Link Header -->
            <div class="w-full max-w-2xl flex justify-between items-center mx-auto">
                <h1 class="text-slate-800 text-lg sm:text-xl">My Links</h1>
            </div>

            <div class="my-3"></div>

            <!-- Links Container -->
            <div id="link-container" class="link-container w-full max-w-2xl mx-auto">
                <div class="w-full flex justify-center items-center flex-col pt-10">
                    <svg id="loader" class="animate-spin h-7 w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
                <!-- <div class="link-card">
                    <div class="link-card-wrap">
                        <button class="grip-btn">
                            <i class="bi bi-grip-vertical"></i>
                        </button>
                        <div class="link-card-content">
                            <div class="link-title-input">
                                <i class="bi bi-pen"></i>
                                <input type="text" value="Title">
                            </div>
                            <div class="link-url-input">
                                <i class="bi bi-link-45deg"></i>
                                <input type="url" value="Url">
                            </div>
                            <div class="link-controls">
                                <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                                <i class="bi bi-star icon-btn priority-icon-btn"></i>
                                <i class="bi bi-bar-chart icon-btn"></i>
                                <i class="bi bi-trash3 icon-btn deletelink-icon-btn"></i>
                            </div>
                        </div>
                    </div>
                    <div class="linkstats-content">
                        <h1>Link Statistics</h1>
                        <span>
                            <p>Lifetime Total: <b>0 Clicks</b></p>
                            <p>Past 7 Days: <b>0 Clicks</b></p>
                        </span>
                        <canvas id="linkstat-chart"></canvas>
                    </div>
                </div>
                <div class="link-card">
                    <div class="link-card-wrap">
                        <button class="grip-btn">
                            <i class="bi bi-grip-vertical"></i>
                        </button>
                        <div class="link-card-content">
                            <div class="link-header-input">
                                <i class="bi bi-fonts"></i>
                                <input type="text" value="header">
                            </div>
                            <div class="link-controls">
                                <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                                <i class="bi bi-trash3 icon-btn deletelink-icon-btn"></i>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>

        </div>

        <!-- <div class="fixed bottom-0 left-0 right-0 mb-10 flex items-center justify-center">
            <div class="popup-msg bg-slate-700 text-white rounded-md px-4 py-2 shadow-lg  transition-opacity duration-300 ease-in-out opacity-0">
                <p class="text-sm">Under Developent 🚧</p>
            </div>
        </div> -->

        <div class="right-wrap">
            <!-- Share Link Header -->
            <h1 class="w-full max-w-2xl mx-auto text-slate-800 mb-1.5 sm:mb-3.5 text-lg sm:text-xl">My Rapidlink</h1>

            <!-- Share link -->
            <div class="w-full max-w-2xl flex items-center justify-between bg-white mx-auto px-4 py-[18px] card-shadow rounded-lg border border-slate-100">
                <a href="" class="truncate text-base hover:underline focus:underline text-blue-400 ml-2 mr-2">rapidlink.com/<?php echo $userData["username"] ?></a>
                <button id="sharelink-btn" class="rounded-full text-sm py-1 px-3.5 border border-blue-500 shadow-md text-blue-500 hover:bg-blue-400 hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">Share</button>
            </div>

            <!-- Preview Frame -->
            <div class="preview-frame">
                <i id="close-preview-btn" class="bi bi-x min-[800px]:hidden block absolute top-0 right-0 text-gray-500 hover:bg-gray-100 focus:bg-gray-100 text-[28px] mr-6 mt-8 sm:mr-10 sm:mt-10 cursor-pointer rounded-full grid place-itmes-center p-1"></i>
                <img src="assets/images/iphone_mockup.webp"/>
                <iframe id="preview-iframe" scrolling="no" src="localpreview" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <script src="js/helper.js" type="text/javascript"></script>
    <script src="js/toasty.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            (function($) {
                $.fn.addSpinner = function() {
                    // this.empty()
                    let svg = `<svg class="animate-spin h-5 w-5 mr-1.5 inline-flex" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                    </svg>`
                    this.html(svg);
                    this.css({
                        'cursor': 'not-allowed'
                    });
                    this.prop('disabled', true);
                };

                $.fn.removeSpinner = function(newText) {
                    this.html(newText);
                    this.css({
                        'cursor': 'pointer'
                    });
                    this.prop('disabled', false);
                };
            })(jQuery);

            function reloadIframe() {
                let iframe = document.getElementById("preview-iframe");
                iframe.src = iframe.src;
            }

            // <-------- Navbar Popup Menu -------->
            let userAvatarBtn = document.getElementById("user__avatar");
            let hiddenPopup = document.getElementById("hidden__popup");
            userAvatarBtn.addEventListener("click", () => {
                hiddenPopup.classList.toggle("show-popup")
            })


            // <-------- Add Link Btn -------->
            $("#addlink-btn").click(function() {
                $("#addlink-card").toggleClass("show-addtolink-card")
            })
            $("#close-addlink-card-btn").click(function() {
                $("#addlink-card").removeClass("show-addtolink-card")
            })


            // <-------- Toggle Chart -------->
            $("#toggle-chart-btn").click(() => {
                $.toasty({
                    type: "simple",
                    message: 'Under Developent 🚧',
                    duration: 3000,
                    backgroundColor: '#333333',
                    textcolor: '#fff',
                    fontsize: '14px',
                    padding: '6px 13px',
                    borderradius: '8px'
                })
                // $("#toggle-chart-btn").find('i').toggleClass("bi-chevron-up")
                // $("#analytic-chart-wrap").toggleClass("show-analytics-chart")
            })


            // <-------- Preview Btn -------->
            $("#preview-btn").click(() => {
                $(".preview-frame").toggleClass("active-preview")
            })
            $("#close-preview-btn").click(() => {
                $(".preview-frame").toggleClass("active-preview")
            })


            // <-------- Share Link Dialog -------->
            $("#sharelink-btn").click(function() {
                $("#sharelink-modal").toggleClass("hidden")
            })
            $("#close-sharelink-modal-btn").click(function() {
                $("#sharelink-modal").toggleClass("hidden")
            })


            // <--------- New link block --------->
            $("#addnewlink-btn").click(function() {
                $("#addnewlink-modal").toggleClass("hidden")
            })
            $("#close-addnewlink-modal-btn").click(() => {
                $("#addnewlink-modal").toggleClass("hidden")
            })


            // Object template for storing data of block(link,header etc)
            let myBlock = {
                link: {
                    type: "link",
                    linkTitle: "",
                    linkUrl: "",
                },
                header: {
                    type: "header",
                    headertxt: "",
                }
            }

            $("#savelink-btn").click(function() {
                let linktitle = $("#linktitle-field").val().trim()
                let linkurl = $("#linkurl-field").val().trim()

                if (linktitle == "" || linktitle == null) {
                    errorMsg("#linktitle-err", "Please Enter Title")
                } else if (linkurl == "" || linkurl == null) {
                    errorMsg("#linkurl-err", "Please Enter URL 🔗")
                } else {
                    if (validateUrl(linkurl)) {
                        myBlock.link.linkTitle = linktitle
                        myBlock.link.linkUrl = linkurl
                        sendBlock("link", function(result) {
                            if (result) {
                                $("#addnewlink-modal").toggleClass("hidden")
                                $("#addlink-card").toggleClass("show-addtolink-card")
                                reloadIframe()
                                console.log("It Works")
                            } else {
                                console.log("IT Not Works")
                            }
                        })
                    } else {
                        errorMsg("#linkurl-err", "Please Enter Valid URL 🔗")
                    }
                }
            })


            // <--------- New header block --------->
            $("#addnewheader-btn").click(function() {
                $("#addnewheader-modal").toggleClass("hidden")
            })
            $("#close-addnewheader-modal-btn").click(() => {
                $("#addnewheader-modal").toggleClass("hidden")
            })
            $("#saveheader-btn").click(function() {
                let header = $("#header-field").val().trim()
                if (header == "" || header == null) {
                    errorMsg("#header-err", "Please Enter Something")
                } else {
                    $("#saveheader-btn").prop("disabled", true);
                    myBlock.header.headertxt = header
                    sendBlock("header", function(result) {
                        if (result) {
                            $("#saveheader-btn").removeAttr("disabled");
                            $("#addlink-card").toggleClass("show-addtolink-card")
                            $("#addnewheader-modal").toggleClass("hidden")
                            reloadIframe()
                            console.log("It Works")
                        } else {
                            console.log("IT Not Works")
                        }
                    })
                }
            })


            $('.link-container').sortable({
                connectWith: ".link-container",
                containment: ".link-container",
                handle: ".grip-btn",
                stop: function() {
                    let linkidArr = []
                    $('.grip-btn').each(function() {
                        linkidArr.push($(this).parent().parent().attr('id'))
                        //var id = $(this).parent().parent().attr('id')
                        //reorderIdArr.push(id)
                    })
                    $.ajax({
                        type: "POST",
                        url: "functions/linksfun.php",
                        data: {
                            action: "reorderblock",
                            linkidarr: linkidArr
                        },
                        success: function(res) {
                            reloadIframe()
                        }
                    })
                }
            })

            // Function for rendering block from database
            function getBlocks() {
                $.post("functions/linksfun.php", {
                    action: "getblocks"
                }, function(result) {
                    // Create an empty variable to hold the generated HTML code
                    var allBlocks = ''
                    $("#link-container").empty()

                    // Loop through the result array and generate HTML code for each block
                    for (let i = 0; i < result.length; i++) {
                        if (result[i].blocktype === "linkblock") {
                            var linkBlock = `<div class="link-card" id="${result[i].blockid}">
                                        <div class="link-card-wrap">
                                            <div class="grip-btn">
                                                <i class="bi bi-grip-vertical"></i>
                                            </div>
                                        <div class="link-card-content">
                                            <div class="link-title-input">
                                                <i class="bi bi-pen"></i>
                                                <input type="text" class="block-input" data-type="linktitle" value="${result[i].linktitle}">
                                            </div>
                                            <div class="link-url-input">
                                                <i class="bi bi-link-45deg"></i>
                                                <input type="url" class="block-input" data-type="linkurl" value="${result[i].linkurl}">
                                            </div>
                                        <div class="link-controls">
                                            <label class="switch">
                                                <input type="checkbox" class="block-switch" ${result[i].blockenabled == 'yes' ? 'checked' : ''}>
                                                <span class="slider round"></span>
                                            </label>
                                            <i class="bi bi-star icon-btn priority-icon-btn"></i>
                                            <i class="bi bi-bar-chart icon-btn"></i>
                                            <i class="bi bi-trash3 icon-btn deletelink-icon-btn"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>`

                            allBlocks += linkBlock

                        } else if (result[i].blocktype === "headerblock") {
                            var headerBlock = `<div class="link-card" id="${result[i].blockid}">
                                                    <div class="link-card-wrap">
                                                        <div class="grip-btn">
                                                            <i class="bi bi-grip-vertical"></i>
                                                        </div>
                                                        <div class="link-card-content">
                                                            <div class="link-header-input">
                                                                <i class="bi bi-fonts"></i>
                                                                <input type="text" class="block-input" data-type="header" value="${result[i].header}">
                                                            </div>
                                                        <div class="link-controls">
                                                            <label class="switch">
                                                                <input type="checkbox" class="block-switch" ${result[i].blockenabled == 'yes' ? 'checked' : ''}>
                                                                <span class="slider round"></span>
                                                            </label>
                                                            <i class="bi bi-trash3 icon-btn deletelink-icon-btn"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>`

                            allBlocks += headerBlock
                        }
                    }
                    $("#link-container").append(allBlocks)
                    blockInputEvent()
                });
            }

            // Function for storing block to database
            function sendBlock(blocktype, callback) {
                let myData
                if (myBlock.link.type == blocktype) {
                    myData = {
                        action: "linkblock",
                        linktitle: myBlock.link.linkTitle,
                        linkurl: myBlock.link.linkUrl
                    }
                } else if (myBlock.header.type == blocktype) {
                    myData = {
                        action: "headerblock",
                        header: myBlock.header.headertxt
                    }
                }
                $.ajax({
                    url: "functions/linksfun.php",
                    type: "POST",
                    cache: false,
                    data: {
                        myData
                    },
                    success: function(res) {
                        let result = JSON.parse(res)
                        if (result.status == "success") {
                            callback(true)
                        } else {
                            callback(false)
                        }
                        getBlocks()
                    }
                })
            }

            function blockInputEvent() {
                $(".block-input").keyup(function() {

                    if ($(this).val().trim() != "") {

                        $(this).closest('.link-card').find('.block-switch').prop('checked', true)
                        $(this).parent().css("border-color", "#ebf0f3")

                        let blocktype = $(this).data("type")
                        let blockvalue = $(this).val()
                        let blockid = $(this).closest('.link-card').attr('id')
                        let myUpdatedData
                        $.ajax({
                            url: "functions/linksfun.php",
                            type: "POST",
                            cache: false,
                            data: {
                                action: "blockenabledisable",
                                isenabled: "yes",
                                blockid: blockid
                            },
                            success: function() {
                                reloadIfraFme()
                            }
                        })
                        if (blocktype == "linktitle") {
                            myUpdatedData = {
                                action: "updatelinktitle",
                                type: "linktitle",
                                linktitle: blockvalue,
                                blockid: blockid
                            }
                        } else if (blocktype == "linkurl") {
                            myUpdatedData = {
                                action: "updatelinkurl",
                                type: "linkurl",
                                linkurl: blockvalue,
                                blockid: blockid
                            }
                        } else if (blocktype == "header") {
                            myUpdatedData = {
                                action: "updateheader",
                                type: "header",
                                header: blockvalue,
                                blockid: blockid
                            }
                        }
                        sendUpdatedBlock(myUpdatedData)
                    } else {
                        $(this).parent().css("border-color", "#FF0000")
                        $(this).closest('.link-card').find('.block-switch').prop('checked', false)
                        let blockid = $(this).closest('.link-card').attr('id')
                        $.ajax({
                            url: "functions/linksfun.php",
                            type: "POST",
                            cache: false,
                            data: {
                                action: "blockenabledisable",
                                isenabled: "no",
                                blockid: blockid
                            },
                            success: function() {
                                reloadIfraFme()
                            }
                        })
                    }
                })

                $(".deletelink-icon-btn").click(function() {

                    let blockid = $(this).closest('.link-card').attr('id');
                    $("#delete-modal").removeClass("hidden")
                    let currentNode = $(this)

                    $("#deleteblock-btn").click(function() {
                        $("#deleteblock-btn").addSpinner()
                        setTimeout(function() {
                            $.ajax({
                                url: "functions/linksfun.php",
                                type: "POST",
                                cache: false,
                                data: {
                                    action: "deleteblock",
                                    blockid: blockid
                                },
                                success: function(result) {
                                    let res = JSON.parse(result)
                                    if (res.message == "success") {                                        
                                        reloadIframe()
                                        currentNode.closest(".link-card").remove()
                                        $("#deleteblock-btn").removeSpinner('Delete')
                                        $("#delete-modal").addClass("hidden")
                                    } else if (res.message == "failed") {
                                        $("#delete-modal").addClass("hidden")
                                        console.log("Something Went Wrong")
                                    }
                                }
                            })
                        }, 1000)
                    })
                })

                const blockSwitch = document.querySelectorAll(".block-switch")
                for (let i = 0; i < blockSwitch.length; i++) {
                    blockSwitch[i].addEventListener("change", function() {
                        let blockid = $(this).closest('.link-card').attr('id')
                        let isChecked
                        if (this.checked) {
                            isChecked = "yes"
                        } else {
                            isChecked = "no"
                        }
                        console.log(isChecked)
                        $.ajax({
                            url: "functions/linksfun.php",
                            type: "POST",
                            cache: false,
                            data: {
                                action: "blockenabledisable",
                                isenabled: isChecked,
                                blockid: blockid
                            },
                            success: function(res) {
                                let result = JSON.parse(res)
                                if (result.status == "success") {
                                    reloadIframe()
                                } else {
                                    reloadIframe()
                                }
                            }
                        })
                    })
                }
            }

            // Function for storing updated block to database
            function sendUpdatedBlock(dataobj) {
                setTimeout(function() {
                    $.ajax({
                        url: "functions/linksfun.php",
                        type: "POST",
                        cache: false,
                        data: dataobj,
                        success: function(params) {
                            reloadIframe()
                            console.log(params)
                        }
                    })
                }, 1500)
            }

            getBlocks()
            blockInputEvent()
        })
    </script>
</body>

</html>