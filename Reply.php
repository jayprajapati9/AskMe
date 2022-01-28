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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="style/style.css">

    <!-- Title -->
    <title>Reply</title>
</head>

<body>

    <nav class="flex items-center justify-between bg-blue-500 py-3 px-3">
        <a href="" class="text-white flex text-[20px] items-center">
            Ask<div class="NavBubbleChat">Me</div>
        </a>
        <div class="text-white flex items-center">
            <div class="mr-2 flex items-center justify-between bg-blue-500 NAVBAR">
                <a href="" class="inline-flex items-center text-center py-2 px-3 mx-2">
                    <i class="bx bx-home-alt block sm:hidden text-xl"></i>
                    <p class="hidden sm:block">Home</p>
                </a>
                <a href="" class="inline-flex items-center text-center py-2 px-3 mx-2">
                    <i class="bx bxs-inbox block sm:hidden text-xl"></i>
                    <p class="hidden sm:block">Inbox</p>
                </a>
                <a href="" class="inline-flex items-center text-center py-2 px-3 mx-2">
                    <i class="bx bx-user block sm:hidden text-xl"></i>
                    <p class="hidden sm:block">Me</p>
                </a>
            </div>
            <a href="" class="text-2xl px-2 flex">
                <i class='bx bx-search'></i>
            </a>
            <div class="px-0.5"></div>
            <div class="relative">
                <i class='bx bx-dots-vertical-rounded text-2xl px-3 cursor-pointer'></i>
                <div
                    class="hidden absolute right-[5px] top-[40px] w-48 rounded-md shadow-md bg-white border text-gray-800 FLOATMENU">
                    <a href="" class="flex items-center px-3 py-2.5 border-b">
                        <i class='bx bxs-user'></i>
                        <p class="ml-2 text-[14px]">Profile</p>
                    </a>
                    <a href="" class="flex items-center px-3 py-2.5 border-b">
                        <i class='bx bxs-lock'></i>
                        <p class="ml-2 text-[14px]">Password</p>
                    </a>
                    <a href="" class="flex items-center px-3 py-2.5 border-b">
                        <i class='bx bxs-trash'></i>
                        <p class="ml-2 text-[14px]">Delete Account</p>
                    </a>
                    <a href="" class="flex items-center px-3 py-2.5">
                        <i class='bx bxs-log-out'></i>
                        <p class="ml-2 text-[14px]">Log out</p>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="w-full inline-flex items-center text-blue-500 text-xl py-4 px-3 border-b">
        <a href="">
            <i class="bi bi-arrow-left mr-3"></i>
        </a>
        <h1>Reply</h1>
    </div>
    <div class="sm:w-9/12 sm:max-w-4xl w-11/12 mx-auto py-4">
        <!-- <h1 class="text-[17px]">Q.</h1> -->
        <div class="flex flex-col">
            <!-- <p class="mr-2 font-medium">Question:</p> -->
            <p class="text-[16px]">What does it mean ? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem
                harum, ab delectus,
                esse labore quaerat voluptatem rem excepturi.</p>
            <p class="mt-2 text-sm">by <a href="" class="text-blue-500">@iamjayy</a></p>
        </div>
        <div class="border mt-3 rounded">
            <textarea name="" class="resize-y w-full h-[5rem] max-h-[10rem] rounded outline-none p-1"></textarea>
            <div class="flex justify-between items-center px-3 py-2 bg-zinc-100 border-t">
                <p class="text-[12px]">Share reply to get more questions from friends</p>
                <button class="bg-blue-500 text-white px-5 py-0.5 text-[14px] rounded">Post</button>
            </div>
        </div>
        <p class="text-red-400 text-[14px]">Type Something</p>
    </div>
    <script src="js/script.js"></script>
</body>

</html>