<?php

include 'functions.php';
include 'checksession.php';

$stmt = $conn->prepare("SELECT `username`, `fullname`, `followers`, `following`, `totalpost`, `userimg`, `userbio` FROM `users` WHERE username = ?");
$stmt->bind_param("s", $_SESSION["authclient_username"]);  // Bind "$username" to parameter.
$stmt->execute();    // Execute the prepared query.
$stmt->store_result();
if ($stmt->num_rows > 0) {
    $stmt->bind_result($user_username, $user_fullname, $user_followers, $user_following, $user_totalpost, $user_userimg, $user_userbio);
    $stmt->fetch();
}
$stmt->close();

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

    <!-- Box Icons Cdn -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="style/style.css">

    <!-- Title -->
    <title>Me</title>
</head>

<body>

    <?php include 'navbar.php'; ?>

    <div class="w-full max-w-screen-md mx-auto py-6 px-3">
        <div class="flex items-start">
            <img src="<?php echo $user_userimg; ?>" alt="" class="w-20 h-20 object-cover rounded-full">
            <div class="flex flex-col items-start ml-4">
                <span class="inline-flex items-baseline">
                    <p class="text-[18px] font-medium text-slate-800"><?php echo $user_fullname; ?></p>
                    <!-- <i class='bx bxs-badge-check ml-1 text-blue-500'></i> -->
                </span>
                <p class="text-gray-500 text-[14px]">@<?php echo $user_username ?></p>
                <a href="" class="bg-gray-200 inline-flex items-center text-[14px] py-1 px-4 rounded mt-4">
                    <i class='bx bx-pencil mr-1'></i>
                    Edit Profile</a>
            </div>
        </div>
        <div class="flex items-center justify-center sm:w-8/12 w-full mx-auto mt-6">
            <div class="flex flex-col items-center w-full max-w-xs">
                <p class="font-medium text-[16px]"><?php echo $user_following ?></p>
                <p class="text-gray-500 text-[15px]">Following</p>
            </div>
            <div class="flex flex-col items-center w-full max-w-xs border-x">
                <p class="font-medium text-[16px]"><?php echo $user_followers ?></p>
                <p class="text-gray-500 text-[15px]">Followers</p>
            </div>
            <div class="flex flex-col items-center w-full max-w-xs">
                <p class="font-medium text-[16px]"><?php echo $user_totalpost ?></p>
                <p class="text-gray-500 text-[15px]">Posts</p>
            </div>
        </div>
        <p class="mt-6 mb-3 text-[15px] text-gray-700"><?php echo $user_userbio; ?></p>
        <div class="border rounded">
            <textarea name="" class="resize-y w-full h-[5rem] max-h-[10rem] outline-none p-1 rounded"></textarea>
            <div class="flex justify-between items-center px-3 py-2 bg-zinc-100 border-t">
                <div class="flex items-center">
                    <input type="checkbox" name="" id="hideName" class="h-3.5 w-3.5">
                    <label for="hideName" class="ml-1 text-[13px]">Hide Your Name</label>
                </div>
                <button class="bg-blue-500 text-white px-5 py-0.5 text-[14px] rounded">Send</button>
            </div>
        </div>
        <!-- <hr class="my-7"> -->
        <br>
        <div class="inline-flex items-center mb-4">
            <div class="P_BubbleChat"><?php echo $user_totalpost ?></div>
            <h1 class="font-medium ml-1 text-[16px]">Replies</h1>
        </div>
        <div class="mt-3">
            <!-- <div class="flex items-start py-4 border-t-[1px]">
                <img src="http://qooh.me/images/mobile-default-photo.png" alt="" class="w-14 h-14 object-cover rounded-full">
                <div class="flex flex-col ml-3">
                    <h1 class="text-[17px]">Should i use pure css or framework ?</h1>
                    <p class="text-gray-500 text-[14px]">So, if you are working on some big project and you don't have a
                        skilled
                        Front-End Developer in
                        your team, then CSS Frameworks can save your day. If you don't have many UI elements and
                        pages in your app, you don't need a framework.</p>
                    <span class="inline-flex items-center text-gray-400 mt-3 text-[13px]">
                        <a href="" class="text-blue-500 mr-1">@iam_jayy</a>
                        replied 2 days ago
                    </span>
                </div>
            </div> -->
        </div>
    </div>
    <script src="js/script.js"></script>
</body>

</html>