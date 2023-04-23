<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Viewport Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Settings</title>

    <!-- Tailwind Css CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Font Poppins CDN -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&amp;display=swap" rel="stylesheet" type='text/css' />

    <!-- Local Css -->
    <link rel="stylesheet" href="assets/style/style.css" />
    <link rel="stylesheet" href="assets/style/navbar.css">

    <!-- jquery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Bootstap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />
</head>
<body>
    <!-- Navbar -->
    <nav class="w-full bg-transparent">
        <div class="navbar-container bg-transparent">
            <div class="flex items-center">
                <img src="assets/images/logo512px.webp" alt="" class="w-8 sm:w-8" />
                <div class="ml-8 hidden sm:block">
                    <a href="" class="nav-link">My Links</a>
                    <a href="" class="nav-link">Design</a>
                    <a href="" class="nav-link">Analytics</a>
                    <a href="" class="nav-link nav-link-active">Settings</a>
                </div>
            </div>
            <div class="flex items-center text-xl">
                <div class="relative flex items-center">
                    <i class="bi bi-bell bell-icon" id="notify__btn"></i>
                    <button class="relative" id="user__avatar">
                        <img src="assets/images/user_avatar.webp" alt="User Img" class="w-9 sm:w-9 rounded-full shadow-md" />
                    </button>
                    <div class="popup-menu" id="hidden__popup">
                        <a href="" class="popup-option"><i class='bi bi-person'></i> Profile</a>
                        <a href="" class="popup-option block sm:hidden"><i class='bi bi-link-45deg'></i> My Links</a>
                        <a href="" class="popup-option block sm:hidden"><i class='bi bi-palette2'></i> Design</a>
                        <a href="" class="popup-option block sm:hidden"><i class='bi bi-bar-chart'></i> Analytics</a>
                        <a href="" class="popup-option block sm:hidden"><i class='bi bi-gear'></i> Settings</a>
                        <a href="" class="popup-option logout-option"><i class='bi bi-box-arrow-left'></i> Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Bg Blob -->
    <img class="bg-scene-blob" src="assets/images/blob-scene-haikei8.png" alt="BG"></img>

    <!-- Edit Social Icon Modal -->
    <div class="hidden fixed top-0 insert-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full px-4" id="modal">
        <div class="max-w-[500px] relative top-24 mx-auto px-6 py-5 shadow-lg rounded-lg bg-white">
            <div class="w-full flex flex-row justify-between">
                <h1 class="text-[17px]">Edit Amazon</h1>
                <button class="rounded-full hover:bg-gray-200">
                    <i class="bi bi-x text-gray-500 hover:bg-gray-100 focus:bg-gray-100 rounded-full text-[26px] grid place-items-center cursor-pointer"></i>
                </button>
            </div>
            <input type="text" class="w-full bg-gray-200/50 mt-4 px-4 py-2 rounded-md focus:outline-none focus:outline-offset-0 focus:outline-gray-300 hover:outline-none hover:outline-offset-0 hover:outline-gray-300" placeholder="URL">
            <div class="grid grid-cols-3 gap-x-4 mt-5">
                <button class="col-span-2 bg-blue-500 text-white py-2.5 rounded-md  hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">Save</button>
                <button class="border-[1.5px] text-gray-600 border-gray-300 hover:bg-gray-100/100 rounded-md"><i class="bi bi-trash3"></i></button>
            </div>
        </div>
    </div>

    <!-- Add Icon List Modal -->
    <div id="addicon-modal" class="hidden fixed top-0 insert-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full px-4" id="modal">
        <div class="max-w-[500px] relative top-20 mx-auto px-6 py-5 shadow-lg rounded-lg bg-white">
            <div class="w-full flex flex-row justify-between">
                <h1 class="text-[17px]">Add Icon</h1>
                <button id="close-addiconmodal-btn" class="rounded-full hover:bg-gray-200">
                    <i class="bi bi-x text-gray-500 hover:bg-gray-100 focus:bg-gray-100 rounded-full text-[26px] grid place-items-center cursor-pointer"></i>
                </button>
            </div>
            <div class="grid grid-cols-4 gap-x-3 gap-y-3 text-xl mt-5 mb-1 px-3">
                <button class="bg-gray-100 p-2 rounded-md text-gray-600 hover:bg-gray-200"><i class="bi bi-whatsapp"></i></button>
                <button class="bg-gray-100 p-2 rounded-md text-gray-600 hover:bg-gray-200"><i class="bi bi-instagram"></i></button>
                <button class="bg-gray-100 p-2 rounded-md text-gray-600 hover:bg-gray-200"><i class="bi bi-facebook"></i></button>
                <button class="bg-gray-100 p-2 rounded-md text-gray-600 hover:bg-gray-200"><i class="bi bi-twitter"></i></button>
                <button class="bg-gray-100 p-2 rounded-md text-gray-600 hover:bg-gray-200"><i class="bi bi-tiktok"></i></button>
                <button class="bg-gray-100 p-2 rounded-md text-gray-600 hover:bg-gray-200"><i class="bi bi-discord"></i></button>
                <button class="bg-gray-100 p-2 rounded-md text-gray-600 hover:bg-gray-200"><i class="bi bi-medium"></i></button>
                <button class="bg-gray-100 p-2 rounded-md text-gray-600 hover:bg-gray-200"><i class="bi bi-linkedin"></i></button>
                <button class="bg-gray-100 p-2 rounded-md text-gray-600 hover:bg-gray-200"><i class="bi bi-reddit"></i></button>
                <button class="bg-gray-100 p-2 rounded-md text-gray-600 hover:bg-gray-200"><i class="bi bi-spotify"></i></button>
                <button class="bg-gray-100 p-2 rounded-md text-gray-600 hover:bg-gray-200"><i class="bi bi-youtube"></i></button>
                <button class="bg-gray-100 p-2 rounded-md text-gray-600 hover:bg-gray-200"><i class="bi bi-google-play"></i></button>
                <button class="bg-gray-100 p-2 rounded-md text-gray-600 hover:bg-gray-200"><i class="bi bi-apple"></i></button>
                <button class="bg-gray-100 p-2 rounded-md text-gray-600 hover:bg-gray-200"><i class="bi bi-pinterest"></i></button>
                <button class="bg-gray-100 p-2 rounded-md text-gray-600 hover:bg-gray-200"><i class="bi bi-signal"></i></button>
                <button class="bg-gray-100 p-2 rounded-md text-gray-600 hover:bg-gray-200"><i class="bi bi-telegram"></i></button>
            </div>
        </div>
    </div>

    <div class="mx-3">
        <div class="w-full max-w-5xl p-1 mx-auto pt-5">
            <h1 class="text-slate-700 text-[22px]">Settings</h1>
            <p class="text-[15px] text-gray-400">Manage your linktree settings.</p>

            <div class="mb-3"></div>

            <!-- Social Icons -->
            <div class="bg-white rounded-lg shadow-sm mb-5 py-5 px-6">
                <h1 class="text-lg text-gray-700 mb-px font-normal">Social Icons</h1>
                <p class="text-[14px] text-gray-400">Add icons linking to your social media profiles, email and more</p>
                <div class="w-full mx-auto flex items-center mt-6">
                    <button id="show-addiconmodal-btn" class="w-full max-w-2xl mx-auto text-blue-500 cursor-pointer border border-blue-500 rounded-full py-2 focus:bg-blue-100/50 hover:bg-blue-100/50">+ Add Icon</button>
                </div>
                <div class="w-full max-w-2xl mx-auto flex items-center flex-col gap-y-3 mt-5">
                    <button class="w-full cursor-pointer border border-gray-200 rounded-full flex flex-row justify-between gap-x-10 hover:bg-gray-100/50 focus:bg-gray-100/50 py-2.5 px-5">
                        <div class="w-full text-gray-600 font-normal text-left text-[16px]"><i class="bi bi-whatsapp mr-3"></i> Whatsapp</div>
                        <i class="bi bi-pen"></i>
                    </button>
                    <button class="w-full cursor-pointer border border-gray-200 rounded-full flex flex-row justify-between gap-x-10 hover:bg-gray-100/50 focus:bg-gray-100/50 py-2.5 px-5">
                        <div class="w-full text-gray-600 font-normal text-left text-[16px]"><i class="bi bi-instagram mr-3"></i> Instagram</div>
                        <i class="bi bi-pen"></i>
                    </button>
                    <button class="w-full cursor-pointer border border-gray-200 rounded-full flex flex-row justify-between gap-x-10 hover:bg-gray-100/50 focus:bg-gray-100/50 py-2.5 px-5">
                        <div class="w-full text-gray-600 font-normal text-left text-[16px]"><i class="bi bi-facebook mr-3"></i> Facebook</div>
                        <i class="bi bi-pen"></i>
                    </button>
                </div>
            </div>

            <!-- Sensitive Content -->
            <div class="bg-white py-4 px-6 rounded-lg shadow-sm mb-5">
                <h1 class="text-lg text-gray-700 mb-px font-normal">Sensitive Content</h1>
                <p class="text-[14px] text-gray-400">Enable a sensitive content warning to show visitors a confirmation screen before being shown your content.</p>
                <!-- <p>Visitors will see a message about sensitive content before being able to view your profile.</p> -->
            </div>

            <!-- Branding -->
            <div class="bg-white py-4 px-6 rounded-lg shadow-sm">
                <h1 class="text-lg text-gray-700 mb-px font-normal">Branding</h1>
                <h3 class="mt-4">Favicon</h3>
                <div class="mt-3 flex items-center gap-x-4">
                    <img src="assets/images/favicon-32x32.png" class="w-24" alt="Choras Favicon baju ma upload button and butn niche aa text |">
                    <div class="flex flex-col items-start gap-y-2">
                        <button><i class="bi bi-cloud-arrow-up"></i> Upload</button>
                        <p class="text-[13px] text-gray-400">Your favicon is displayed next to the URL of your site in a web browser. upload any image, and we will help you generate a 32x32 favicon.</p>
                    </div>
                </div>
                <hr class="my-5">
                <h3 class="mb-2">Site Title and Description</h3>
                <p class="text-[14px] text-gray-400 mb-4">Also known as meta SEO, your site Title & Description are shown when visitors find your page through a search engine. Your site Title is also the title of the browser tab for your page. Try to keep your Title under 60 characters and your Description under 155 characters.</p>
                <div class="flex flex-col justify-center mb-3">
                    <input type="text" class="w-full placeholder:font-light border-[1.5px] border-gray-300 rounded-md px-4 py-2" placeholder="Meta Title">
                    <span class="text-[12px] text-gray-500 font-extralight ml-2 mt-1">0/60</span>
                </div>
                <div class="flex flex-col justify-center mb-3">
                    <input type="text" class="w-full placeholder:font-light border-[1.5px] border-gray-300 rounded-md px-4 py-2" placeholder="Meta Description">
                    <span class="text-[12px] text-gray-500 font-extralight ml-2 mt-1">0/150</span>
                </div>
            </div>
        </div>
    </div>
    <br>
    <script type="text/javascript">
        $(document).ready(function () {
            // <-------- Navbar Popup Menu -------->
            let userAvatarBtn = document.getElementById("user__avatar")
            let hiddenPopup = document.getElementById("hidden__popup")

            userAvatarBtn.addEventListener("click", () => {
                hiddenPopup.classList.toggle("show-popup")
            })


            $("#show-addiconmodal-btn").click(() => {
                $("#addicon-modal").toggleClass("hidden")
            })
            $("#close-addiconmodal-btn").click(() => {
                $("#addicon-modal").toggleClass("hidden")
            })
        })
    </script>
</body>
</html>