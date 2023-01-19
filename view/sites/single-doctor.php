<?php
if (isset($RouteArray[4])) {
$pid=substr($RouteArray[4], 4);
$pid=strrev($pid);
$pid=substr($pid, 4);
$id=(int)(strrev($pid));
}else{
    exit();
}

$fetch = Functions::getbyid("doctor",$id);
$nom=0;
foreach($fetch as $value) {
$nom++;
$found = 0;
    $rank="";
    $fetch1=Functions::getbyid("rank",$value['rankid']);
    foreach ($fetch1 as $value1){
        $rank=$value1['name'];
    }
    $clinic="";
    $fetch2=Functions::getbyid("clinic",$value['clinicid']);
    foreach ($fetch2 as $value2){
        $clinic=$value2['name'];
    }





?>

<div class="right-bottom">
    <div class="right-body">
        <div class="body-top">
            <h2>Doctor</h2>
        </div>

        <div class="clinic-card">
            <div class="body-middle">
                <div class="middle-left">
                    <div class="image-container">
                        <?
                            $imgurl='/files/images/doctor/'.$value['doctor'];
                            if (!isset($imgurl) or strlen($value['doctor'])<1){
                                $imgurl='/assets/images/logo.png';
                            }
                        ?>
                        <img src="<?=$imgurl?>" alt="<?=$value['fullname']?>">
                    </div>
                    <div class="icons">
                        <div>
                            <svg class="svg-inline--fa fa-heart" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                <path fill="currentColor" d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"></path>
                            </svg><!-- <i class="fa-solid fa-heart"></i> Font Awesome fontawesome.com -->
                        </div>
                        <div>
                            <svg class="svg-inline--fa fa-share-nodes" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="share-nodes" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                <path fill="currentColor" d="M352 224c53 0 96-43 96-96s-43-96-96-96s-96 43-96 96c0 4 .2 8 .7 11.9l-94.1 47C145.4 170.2 121.9 160 96 160c-53 0-96 43-96 96s43 96 96 96c25.9 0 49.4-10.2 66.6-26.9l94.1 47c-.5 3.9-.7 7.8-.7 11.9c0 53 43 96 96 96s96-43 96-96s-43-96-96-96c-25.9 0-49.4 10.2-66.6 26.9l-94.1-47c.5-3.9 .7-7.8 .7-11.9s-.2-8-.7-11.9l94.1-47C302.6 213.8 326.1 224 352 224z"></path>
                            </svg><!-- <i class="fa-solid fa-share-nodes"></i> Font Awesome fontawesome.com -->
                        </div>
                    </div>
                </div>
                <div class="middle-right" style="display: flex;">
                    <div class="short-info">
                        <div class="cart-title">
                            <h2><a href="#"><?=$value['fullname']?></a></h2>
                            <p><?=$rank?></p>
                            <p>Tajriba: <?=$value['experiment']?> yil</p>

                        </div>
                        <div class="cart-btns">
                            <button> <?=$clinic?> </button>
                        </div>
                    </div>

                    <div class="contact" style="padding: 20px; margin-left: 30px">
                        <div>
                            <div>
                                <svg class="svg-inline--fa fa-location-dot" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="location-dot" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 256c-35.3 0-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64s-28.7 64-64 64z"></path>
                                </svg><!-- <i class="fa-solid fa-location-dot"></i> Font Awesome fontawesome.com -->
                                <a href="#"><?=$value['location']?></a>
                            </div>
                            <div>
                                <svg class="svg-inline--fa fa-phone" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"></path>
                                </svg><!-- <i class="fa-solid fa-phone"></i> Font Awesome fontawesome.com -->
                                <a href="tel:<?=$value['phone']?>"><?=$value['phone']?></a>
                            </div>
                        </div>
                        <div>
                            <div>
                                <svg class="svg-inline--fa fa-telegram" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="telegram" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M248,8C111.033,8,0,119.033,0,256S111.033,504,248,504,496,392.967,496,256,384.967,8,248,8ZM362.952,176.66c-3.732,39.215-19.881,134.378-28.1,178.3-3.476,18.584-10.322,24.816-16.948,25.425-14.4,1.326-25.338-9.517-39.287-18.661-21.827-14.308-34.158-23.215-55.346-37.177-24.485-16.135-8.612-25,5.342-39.5,3.652-3.793,67.107-61.51,68.335-66.746.153-.655.3-3.1-1.154-4.384s-3.59-.849-5.135-.5q-3.283.746-104.608,69.142-14.845,10.194-26.894,9.934c-8.855-.191-25.888-5.006-38.551-9.123-15.531-5.048-27.875-7.717-26.8-16.291q.84-6.7,18.45-13.7,108.446-47.248,144.628-62.3c68.872-28.647,83.183-33.623,92.511-33.789,2.052-.034,6.639.474,9.61,2.885a10.452,10.452,0,0,1,3.53,6.716A43.765,43.765,0,0,1,362.952,176.66Z"></path>
                                </svg><!-- <i class="fa-brands fa-telegram"></i> Font Awesome fontawesome.com -->
                                <a href="https://t.me/<?=$value['telegram']?>">@<?=$value['telegram']?></a>
                            </div>
                            <div>
                                <svg class="svg-inline--fa fa-envelope" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"></path>
                                </svg><!-- <i class="fa-solid fa-envelope"></i> Font Awesome fontawesome.com -->
                                <a href="mailto:<?=$value['email']?>"><?=$value['email']?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tabbar">
                <div class="tablinks">
                    <ul>
                        <li data-active="#description" class="tablink-active">Batafsil</li>
                        <li data-active="#price-table">Narxlar</li>
                        <li data-active="#comments">Fikrlar</li>
                    </ul>
                </div>
                <div class="tab-blocks">
                    <div id="description" class="tab-block tab-active">
                        <h3>Batafsil ma'lumot</h3>
                        <div class="cont">
                            <?=$value['about']?>
                        </div>
                    </div>
                    <div id="price-table" class="tab-block">
                        <h3>Xizmatlar narxi</h3>
                        <div class="cont">
                            <table class="delivery-table" style="text-align: center;">
                                <tr>
                                    <th>Xizmat nomi</th>
                                    <th>Boshlang`ich narx</th>
                                    <th>Yakuniy narxi</th>
                                </tr>
                                <tr>

                                    <td>MedFarm | Rossiya</td>
                                    <td>3000</td>
                                    <td>6000</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div id="comments" class="tab-block">
                        <h3>Izohlar</h3>
                        <div class="cont">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>

    <?php

}
if ($nom==0){
   include_once './view/sites/404.php';
}
?>