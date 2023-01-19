<?php

$routes = [
    "" => [
        "url" => "mainpage.php",
        "type" => "hide",
        "title" => "Salom Dunyo",
        "params" => [
            "method" => "delete",
            "class" => "fa-solid fa-hospital",
            "mtitle" => "Klinikalar"
        ]
    ],
    "main" => [
        "url" => "mainpage.php",
        "type" => "show",
        "title" => "Salom Dunyo",
        "params" => [
            "method" => "delete",
            "class" => "fa-solid fa-house",
            "mtitle" => "Bosh sahifa"
        ]
    ],
    "index" => [
        "url" => "index.php",
        "type" => "show",
        "title" => "Salom Dunyo",
        "params" => [
            "method" => "delete",
            "class" => "fa-solid fa-hospital",
            "mtitle" => "Klinikalar"
        ]
    ],
    "single-clinic" => [
        "url" => "single-clinic.php",
        "type" => "hide",
        "title" => "Salom Dunyo",
        "params" => [
            "method" => "delete",
            "class" => "fa-solid fa-phone-volume",
            "mtitle" => "Klinika"
        ]
    ],
    "doctors" => [
        "url" => "doctors.php",
        "type" => "show",
        "title" => "Salom Dunyo",
        "params" => [
            "method" => "delete",
            "class" => "fa-solid fa-user-doctor",
            "mtitle" => "Shifokorlar"
        ]
    ],
    "single-doctor" => [
        "url" => "single-doctor.php",
        "type" => "hide",
        "title" => "Salom Dunyo",
        "params" => [
            "method" => "delete",
            "class" => "fa-solid fa-phone-volume",
            "mtitle" => "Shifokor"
        ]
    ],
    "delivery" =>  [
        "url" => "delivery.php",
        "type" => "show",
        "title" => "Salom Dunyo",
        "params" => [
            "method" => "delete",
            "class" => "fa-solid fa-truck-medical",
            "mtitle" => "Dori yetkazib berish"
        ]
    ],
    "online-consult" =>  [
        "url" => "online-consult.php",
        "type" => "show",
        "title" => "Salom Dunyo",
        "params" => [
            "method" => "delete",
            "class" => "fa-solid fa-comment",
            "mtitle" => "Onlayn konsultatsiya"
        ]
    ],

    "cosmetics" => [
        "url" => "cosmetics.php",
        "type" => "show",
        "title" => "Salom Dunyo",
        "params" => [
            "method" => "delete",
            "class" => "fa-solid fa-capsules",
            "mtitle" => "Kosmetalogiya"
        ]
    ],
    "single-cosmetic" => [
        "url" => "single-cosmetic.php",
        "type" => "hide",
        "title" => "Salom Dunyo",
        "params" => [
            "method" => "delete",
            "class" => "fa-solid fa-phone-volume",
            "mtitle" => "Kosmetalogiya"
        ]
    ],
    "vacancy" =>  [
        "url" => "vacancy.php",
        "type" => "show",
        "title" => "Salom Dunyo",
        "params" => [
            "method" => "delete",
            "class" => "fa-solid fa-list-check",
            "mtitle" => "Vakansiyalar"
        ]
    ],
    "about" => [
        "url" => "about.php",
        "type" => "show",
        "title" => "Salom Dunyo",
        "params" => [
            "method" => "delete",
            "class" => "fa-solid fa-address-card",
            "mtitle" => "Biz haqimizda"
        ]
    ],
    // "contact" => [
    //     "url" => "contact.php",
    //     "type" => "show",
    //     "title" => "Salom Dunyo",
    //     "params" => [
    //         "method" => "delete",
    //         "class" => "fa-solid fa-phone-volume",
    //         "mtitle" => "Aloqa"
    //     ]
    // ],
    "cooperation" => [
        "url" => "cooperation.php",
        "type" => "show",
        "title" => "Salom Dunyo",
        "params" => [
            "method" => "delete",
            "class" => "fa-solid fa-handshake",
            "mtitle" => "Hamkorlik"
        ]
    ],
    "error" =>  [
        "url" => "404.php",
        "type" => "hide",
        "title" => "Salom Dunyo",
        "params" => [
            "method" => "delete",
            "class" => "",
            "mtitle" => " Error"
        ]
    ],
];








class Check
{
    static function Route($url)
    {
        global $routes;
        foreach ($routes as $path => $route) {
            if ($path == $url)
                return true;
        }
        return false;
    }

    static function GetRoute($url)
    {
        global $routes;
        foreach ($routes as $path => $route) {
            if ($path == $url)
                return $routes[$url];
        }
        return ["errrors" => "Page not found!"];
    }
}
