<?php

include "classes/session.class.php";
Session::start();
Session::checkLogin();

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
    <title>Search</title>
</head>

<body>

    <?php

    include "classes/navbar.class.php";
    NavigationBar::loggedNavbar();

    ?>

    <div class="w-full inline-flex items-center text-blue-500 text-xl py-4 px-3 border-b">
        <a href="Home.php">
            <i class="bi bi-arrow-left mr-3"></i>
        </a>
        <h1>Search People</h1>
    </div>
    <!-- <div class="sm:w-9/12 sm:max-w-4xl w-11/12 mx-auto py-4"></div> -->
    <div class="p-1"></div>
    <div class="w-10/12 mx-auto py-3.5">
        <div class="w-full max-w-2xl mx-auto flex items-center py-1 px-1 border-[1.5px] rounded">
            <input type="text" class="w-full outline-none font-normal text-sm" placeholder="Type Username..." id="UserNameInput">
            <i class="bi bi-search text-blue-500 px-3 cursor-pointer"></i>
        </div>
    </div>
    <p class="text-blue-500 text-[20px] px-5 py-2.5 border-b" id="totalfound">0 found</p>
    <div class="SearchWrap" id="SearchResult">
        <!-- <div class="flex justify-between items-center px-4 py-4 border-b">
            <a href="" class="flex items-start">
                <img src="http://qooh.me/images/mobile-default-photo.png" alt="" class="w-14 h-14 object-cover rounded-full">
                <div class="flex flex-col ml-3">
                    <h1 class="text-[16px]">Jay Prajapati</h1>
                    <p class="text-gray-500 text-[14px]">@jayyy</p>
                </div>
            </a>
            <a href="" class="border border-blue-500 px-2 text-[20px] rounded">
                <i class="bi bi-plus text-blue-500"></i>
            </a>
        </div> -->
    </div>
    <div class="h-10"></div>

    <script type="text/javascript" src="js/navbar.js"></script>

    <script>
        function EmptySearchWrap() {
            $("#totalfound").text("0 found");
            $("#SearchResult").empty();
        }

        function SearchUser(param) {
            $.ajax({
                url: "functions/searchuser.php",
                type: "POST",
                cache: false,
                data: {
                    action: "searchuser",
                    searchedUsername: param,
                },
                success: function(dataResult) {
                    EmptySearchWrap();
                    if (dataResult.status == "failed") {
                        $("#totalfound").text("0 found");
                        EmptySearchWrap();
                    } else {
                        let len = dataResult.searchresult;
                        let totalfound = dataResult.totalresult;
                        $("#totalfound").text(totalfound + " found");
                        for (var i = 0; i < len.length; i++) {
                            let htm = `<div class="flex justify-between items-center px-4 py-4 border-b">
                                            <a href="${dataResult.searchresult[i].username}" class="flex items-start">
                                                <img src="${dataResult.searchresult[i].userimg}" alt="" class="w-14 h-14 object-cover rounded-full">
                                                <div class="flex flex-col ml-3">
                                                    <h1 class="text-[16px]">${dataResult.searchresult[i].fullname}</h1>
                                                    <p class="text-gray-500 text-[14px]">@${dataResult.searchresult[i].username}</p>
                                                </div>
                                            </a>
                                            <a href="" class="border border-blue-500 px-2 text-[20px] rounded">
                                                <i class="bi bi-plus text-blue-500"></i>
                                            </a>
                                        </div>`;
                            $("#SearchResult").append(htm);
                        }
                    }
                }
            });
        }

        document.getElementById("UserNameInput").addEventListener("keyup", function() {
            let query = this.value;
            const regex = /^\s+$/;

            if (query == "") {
                EmptySearchWrap();
            } else if (regex.test(query)) {
                EmptySearchWrap();
            } else {
                SearchUser(query);
            }

        });
    </script>
</body>

</html>