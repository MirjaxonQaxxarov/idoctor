<?php

?>


<!DOCTYPE html>
<html lang="en" prefix="og: https://ogp.me/ns#">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="I-Doctor was made by Khushnud Eshtemirov" />
    <meta property="og:title" content="I-Doctor App" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="/" />
    <meta property="og:image" content="images/logo.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/assets/styles/styles.css" />
    <link rel="icon" href="/assets/images/logo.png" />
    <script src="/assets/fontawesome-free-6.2.1-web/js/all.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300&family=Inter:wght@200;300;400;500;600;700&family=Montserrat:wght@400;600&family=Open+Sans:wght@300;400&family=Poppins:ital,wght@0,300;0,400;1,300;1,400&family=Roboto:wght@100;300;400&display=swap" rel="stylesheet" />
    <title>I-Doctor <?php if (isset($routes[$RouteArray['2']]["params"]["mtitle"])) echo $routes[$RouteArray['2']]["params"]["mtitle"];
                    else echo "Error"; ?></title>
</head>

<body>
    
    <div class="container">
        <div class="inner-container">
            <div class="left-side">
                <div class="left-top">
                    <img src="/assets/images/logo.png" alt="logo" />
                    <p><span>I-</span>DOCTOR</p>
                </div>
                <div class="linklar">
                    <?php
                    foreach ($routes as $path => $param) {
                        if ($param["type"] == "show") {
                            $mylin = '/'.$lang.'/'.$path;
                            $cla1 = "";
                            $cla  = $param["params"]["class"];
                            $mtitle  = $param["params"]["mtitle"];
                            if ($path == $RouteArray['2']) {
                                $mylin = '/'.$lang.'/#';
                                $cla1 = "active";
                            }
                            echo '
                            
                            <a class="' . $cla1 . '" href="' . $mylin . '"
                            ><i class="' . $cla . '"></i><span>' . $mtitle . '</span></a
                            >
                        
                            ';
                        }
                    }
                    ?>

                </div>
            </div>
            <div class="right-side">
                <div class="right-top">
                    <div>
                        <input type="text" name="search" id="search" placeholder="Qidirish uchun kalit so’zni kiriting..." />
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <div>
                        <!-- <span class="full-name">Tolipov Anvar Sodiqovich</span>
                        <img src="/assets/images/user-circle.png" alt="user-logo" /> -->
                        <div class="language">
                            <img src="/assets/images/r-flag.png" alt="flag-icon" class="ru-icon" />
                            <img src="/assets/images/flag.png" alt="flag-icon" class="uz-icon" />
                        </div>
                    </div>
                </div>