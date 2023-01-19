<?php

 $routes = [
        "" => [
            "url"=>"index.php",
            "type"=>"hide",
            "title"=>"Salom Dunyo",
            "params"=>[
                "method"=>"delete",
                "class"=>"fa-solid fa-hospital",
                "mtitle"=>"Klinikalar"
                ]
        ],
         "index" => [
             "url"=>"index.php",
             "type"=>"show",
             "title"=>"Salom Dunyo",
             "params"=>[
                 "method"=>"delete",
                 "class"=>"fa-solid fa-hospital",
                 "mtitle"=>"Klinikalar"
             ]
         ],
         "addclinic" => [
             "url"=>"addclinic.php",
             "type"=>"hide",
             "title"=>"Salom Dunyo",
             "params"=>[
                 "method"=>"delete",
                 "class"=>"fa-solid fa-plus",
                 "mtitle"=>"Klinika Qo`shish"
             ]
         ],
         "rank" => [
             "url"=>"rank.php",
             "type"=>"show",
             "title"=>"Salom Dunyo",
             "params"=>[
                 "method"=>"delete",
                 "class"=>"fa-solid fa-hospital-user",
                 "mtitle"=>"Darajalar"
             ]
         ],
         "addrank" => [
             "url"=>"addrank.php",
             "type"=>"hide",
             "title"=>"Salom Dunyo",
             "params"=>[
                 "method"=>"delete",
                 "class"=>"fa-solid fa-plus",
                 "mtitle"=>"Daraja Qo`shish"
             ]
         ],
         "doctors" => [
             "url"=>"doctors.php",
             "type"=>"show",
             "title"=>"Salom Dunyo",
             "params"=>[
                 "method"=>"delete",
                 "class"=>"fa-solid fa-user-doctor",
                 "mtitle"=>"Shifokorlar"
             ]
         ],
         "adddoctor" => [
             "url"=>"adddoctor.php",
             "type"=>"hide",
             "title"=>"Salom Dunyo",
             "params"=>[
                 "method"=>"delete",
                 "class"=>"fa-solid fa-user-doctor",
                 "mtitle"=>"Shifokorlar kiritish"
             ]
         ],
        "delivery" =>  [
            "url"=>"zayavka.php",
            "type"=>"show",
            "title"=>"Salom Dunyo",
            "params"=>[
                "method"=>"delete",
                "class"=>"fa-solid fa-truck-medical",
                "mtitle"=>"Dori yetkazib berish"
                ]
        ],
         "online-consult" =>  [
             "url"=>"online-consult.php",
             "type"=>"show",
             "title"=>"Salom Dunyo",
             "params"=>[
                 "method"=>"delete",
                 "class"=>"fa-solid fa-comment",
                 "mtitle"=>"Onlayn konsultatsiya"
                 ]
         ],

         "addconsult" => [
             "url"=>"addconsult.php",
             "type"=>"hide",
             "title"=>"Salom Dunyo",
             "params"=>[
                 "method"=>"delete",
                 "class"=>"fa-solid fa-plus",
                 "mtitle"=>"Konsultatsiya Qo`shish"
             ]
         ],
         "cooperation" => [
             "url"=>"cooperation.php",
             "type"=>"show",
             "title"=>"Salom Dunyo",
             "params"=>[
                 "method"=>"delete",
                 "class"=>"fa-solid fa-handshake",
                 "mtitle"=>"Hamkorlik"
                 ]
         ],
         "cosmetics" => [
             "url"=>"cosmetics.php",
             "type"=>"show",
             "title"=>"Salom Dunyo",
             "params"=>[
                 "method"=>"delete",
                 "class"=>"fa-solid fa-capsules",
                 "mtitle"=>"Kosmetalogiya"
             ]
         ],
         "addcosmetic" => [
             "url"=>"addcosmetic.php",
             "type"=>"hide",
             "title"=>"Salom Dunyo",
             "params"=>[
                 "method"=>"delete",
                 "class"=>"fa-solid fa-capsules",
                 "mtitle"=>"Kosmetalogiya"
             ]
         ],
         "vacancy" =>  [
             "url"=>"vacancy.php",
             "type"=>"show",
             "title"=>"Salom Dunyo",
             "params"=>[
                 "method"=>"delete",
                 "class"=>"fa-solid fa-list-check",
                 "mtitle"=>"Vakansiyalar"
                 ]
         ],
         "addvacancy" => [
             "url"=>"addvacancy.php",
             "type"=>"hide",
             "title"=>"Salom Dunyo",
             "params"=>[
                 "method"=>"delete",
                 "class"=>"fa-solid fa-plus",
                 "mtitle"=>"Vakansiya Qo`shish"
             ]
         ],
         "post" =>  [
             "url"=>'post.php',
             "type"=>"show",
             "title"=>"Salom Dunyo",
             "params"=>[
                 "method"=>"delete",
                 "class"=>"fa-solid fa-sticky-note",
                 "mtitle"=>"Postlar"
             ]
         ],
         "addpost" => [
             "url"=>"addpost.php",
             "type"=>"hide",
             "title"=>"Salom Dunyo",
             "params"=>[
                 "method"=>"delete",
                 "class"=>"fa-solid fa-plus",
                 "mtitle"=>"Post Qo`shish"
             ]
         ],
     "farm_group" =>  [
         "url"=>'form_group.php',
         "type"=>"show",
         "title"=>"Salom Dunyo",
         "params"=>[
             "method"=>"delete",
             "class"=>"fa-solid fa-list-check",
             "mtitle"=>"Dori guruhlari"
         ]
     ],
     "addfarm_group" => [
         "url"=>"addfarm_group.php",
         "type"=>"hide",
         "title"=>"Salom Dunyo",
         "params"=>[
             "method"=>"delete",
             "class"=>"fa-solid fa-plus",
             "mtitle"=>"Dori guruhi Qo`shish"
         ]
     ],
     "medicaments" =>  [
         "url"=>'medicaments.php',
         "type"=>"show",
         "title"=>"Salom Dunyo",
         "params"=>[
             "method"=>"delete",
             "class"=>"fa-solid fa-list-check",
             "mtitle"=>"Dorilar"
         ]
     ],
     "addmedicaments" => [
         "url"=>"addmedicaments.php",
         "type"=>"hide",
         "title"=>"Salom Dunyo",
         "params"=>[
             "method"=>"delete",
             "class"=>"fa-solid fa-plus",
             "mtitle"=>"Dori Qo`shish"
         ]
     ],
         "purpose" =>  [
             "url"=>'purpose.php',
             "type"=>"show",
             "title"=>"Salom Dunyo",
             "params"=>[
                 "method"=>"delete",
                 "class"=>"fa-solid fa-list-check",
                 "mtitle"=>"Dori maqsadlar"
             ]
         ],
         "addpurpose" => [
             "url"=>"addpurpose.php",
             "type"=>"hide",
             "title"=>"Salom Dunyo",
             "params"=>[
                 "method"=>"delete",
                 "class"=>"fa-solid fa-plus",
                 "mtitle"=>"Dori maqsad Qo`shish"
             ]
         ],
     "package" =>  [
         "url"=>'package.php',
         "type"=>"show",
         "title"=>"Salom Dunyo",
         "params"=>[
             "method"=>"delete",
             "class"=>"fa-solid fa-list-check",
             "mtitle"=>"Packagelar"
         ]
     ],
     "addpackage" => [
         "url"=>"addpackage.php",
         "type"=>"hide",
         "title"=>"Salom Dunyo",
         "params"=>[
             "method"=>"delete",
             "class"=>"fa-solid fa-plus",
             "mtitle"=>"Package Qo`shish"
         ]
     ],
     "warehouse_items" =>  [
         "url"=>'warehouse_items.php',
         "type"=>"show",
         "title"=>"Salom Dunyo",
         "params"=>[
             "method"=>"delete",
             "class"=>"fa-solid fa-list-check",
             "mtitle"=>"Skladdagi maxsulotlar"
         ]
     ],
     "addwarehouse_items" => [
         "url"=>"addwarehouse_items.php",
         "type"=>"hide",
         "title"=>"Salom Dunyo",
         "params"=>[
             "method"=>"delete",
             "class"=>"fa-solid fa-plus",
             "mtitle"=>"Skladdagi maxsulot Qo`shish"
         ]
     ],
         "inbox" => [
             "url"=>"inbox.php",
             "type"=>"show",
             "title"=>"Salom Dunyo",
             "params"=>[
                 "method"=>"delete",
                 "class"=>"fa-solid fa-comments",
                 "mtitle"=>"Murojatlar"
             ]
         ],
         "chat" => [
             "url"=>"chat.php",
             "type"=>"hide",
             "title"=>"Salom Dunyo",
             "params"=>[
                 "method"=>"delete",
                 "class"=>"fa-solid fa-plus",
                 "mtitle"=>"Chat"
             ]
         ],
         "about" => [
             "url"=>"about.php",
             "type"=>"show",
             "title"=>"Salom Dunyo",
             "params"=>[
                 "method"=>"delete",
                 "class"=>"fa-solid fa-address-card",
                 "mtitle"=>"Biz haqimizda"
                 ]
         ],
         "contact" => [
             "url"=>"contact.php",
             "type"=>"show",
             "title"=>"Salom Dunyo",
             "params"=>[
                 "method"=>"delete",
                 "class"=>"fa-solid fa-phone-volume",
                 "mtitle"=>"Aloqa"
                 ]
         ],
         "error" =>  [
             "url"=>"1.php",
             "type"=>"hide",
             "title"=>"Salom Dunyo",
             "params"=>[
                 "method"=>"delete",
                 "class"=>"",
                 "mtitle"=>" Error"
                 ]
         ],
];








class Check
{
    static function Route($url){
        global $routes;
        foreach ( $routes as $path => $route){
            if ($path==$url)
                return true;
        }
            return false;

    }

    static function GetRoute($url){
        global $routes;
        foreach ( $routes as $path => $route){
            if ($path==$url)
                return $routes[$url];

        }
        return ["errrors"=>"Page not found!"];

    }
}


