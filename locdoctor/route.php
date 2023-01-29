<?php

$routes = [
    "" => [
        "url" => "../../404.php",
        "type" => "hide",
        "title" => "Salom Dunyo",
        "params" => [
            "method" => "delete",
            "class" => "fa-solid fa-hospital",
            "mtitle" => "Klinikalar"
        ]
    ],
    "getchat" => [
        "url" => "chat.php",
        "type" => "hide",
        "title" => "Salom Dunyo",
        "params" => [
            "method" => "delete",
            "class" => "fa-solid fa-hospital",
            "mtitle" => "Klinikalar"
        ]
    ],
    "group" => [
        "url" => "getgroup.php",
        "type" => "hide",
        "title" => "Salom Dunyo",
        "params" => [
            "method" => "delete",
            "class" => "fa-solid fa-hospital",
            "mtitle" => "Klinikalar"
        ]
    ],
    "forclient" => [
        "url" => "forclient.php",
        "type" => "hide",
        "title" => "Salom Dunyo",
        "params" => [
            "method" => "delete",
            "class" => "fa-solid fa-hospital",
            "mtitle" => "Klinikalar"
        ]
    ],
    "zayavka" => [
        "url" => "zayavka.php",
        "type" => "hide",
        "title" => "Salom Dunyo",
        "params" => [
            "method" => "delete",
            "class" => "fa-solid fa-hospital",
            "mtitle" => "Klinikalar"
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
