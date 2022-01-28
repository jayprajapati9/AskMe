<nav class="flex items-center justify-between bg-blue-500 py-3 px-3">
    <a href="." class="text-white flex text-[20px] items-center">
        Ask<div class="NavBubbleChat">Me</div>
    </a>
    <div class="text-white flex items-center">
        <div class="mr-2 flex items-center justify-between bg-blue-500 NAVBAR">
            <a href="Home.php" class="inline-flex items-center text-center py-2 px-3 mx-2">
                <!-- border-b-2 border-b-white -->
                <i class="bx bx-home-alt block sm:hidden text-xl"></i>
                <p class="hidden sm:block">Home</p>
            </a>
            <a href="Inbox.php" class="inline-flex items-center text-center py-2 px-3 mx-2">
                <i class="bx bxs-inbox block sm:hidden text-xl"></i>
                <p class="hidden sm:block">Inbox</p>
            </a>
            <a href="Me.php" class="inline-flex items-center text-center py-2 px-3 mx-2">
                <i class="bx bx-user block sm:hidden text-xl"></i>
                <p class="hidden sm:block">Me</p>
            </a>
        </div>
        <a href="Search.php" class="text-2xl px-2 flex">
            <i class='bx bx-search'></i>
        </a>
        <div class="px-0.5"></div>
        <div class="relative">
            <i class='bx bx-dots-vertical-rounded text-2xl px-3 cursor-pointer'></i>
            <div class="hidden absolute right-[5px] top-[40px] w-48 rounded-md shadow-md bg-white border text-gray-800 FLOATMENU">
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
                <a href="Logout.php" class="flex items-center px-3 py-2.5">
                    <i class='bx bxs-log-out'></i>
                    <p class="ml-2 text-[14px]">Log out</p>
                </a>
            </div>
        </div>
    </div>
</nav>