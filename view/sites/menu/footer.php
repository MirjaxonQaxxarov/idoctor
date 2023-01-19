<div class="right-right">

    <div class="news-place">
        <h2>So'nggi postlar</h2>

<?php
if (!(isset($_SESSION['chattime'])&& time()-$_SESSION['chattime']>=5)){
    $_SESSION['_csrfchat'] =md5(time());
    $_SESSION['chattime'] =time();

}


$fetch = Functions::getbytable("news","type=:type limit 3",array('type'=>'post'));
$no=0;
foreach($fetch as $value) {

    $no++;
    $found = 0;

    echo('
<br>
        <div class="one-news">
            <div class="news-top">
                <img width="100px" src="/files/images/news/' . $value['news'] . '"  alt="' . $value['title'] . '" />
                <h3>
                    <a href="#">' . $value['title'] . '</a>
                </h3>
            </div>
            <p>
                ' . $value['shortabout'] . '
            </p>
        </div>
        ');
}
?>
    </div>
    <div class="message-area">

    </div>
</div>
</div>
</div>
</div>
</div>
<div class="mobile-nav">
    <button class="menuOpen">
        <i class="fa-solid fa-bars"></i>
    </button>
    <a href="/">
        <button class="home">
            <i class="fa-solid fa-house"></i>
        </button>
    </a>
    <button class="open-vidget-btn">
        <i class="fa-solid fa-receipt"></i>
    </button>
    <button class="chatfloat">
        <i class="fa-regular fa-comments"></i>
    </button>

</div>

<div class="chatModal" >
    <h4>Operatorga murojaat</h4>
    <div class="chatbody" id="chatbody">

        <div class="messageother">
            <p>Salom qanday yordam kerak?</p>
        </div>
    </div>
    <form class="chatfoot" id="form">
            <input type="text" id="message" name="message">
            <input type="hidden" name="token" value="<?=$_SESSION['_csrfchat']?>" id="token">
            <input type="hidden" name="ip" value="<?=getip()?>" id="ip">
            <button id="send">Yuborish</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js"></script>
<script src="/assets/scripts/scripts.js"></script>

<script>
    document.querySelector('.chatfloat').addEventListener('click', () => {
        document.querySelector('.chatModal').classList.toggle('chatToggle')
    })
</script>


<script>
    let submitBtn = document.getElementById('send');
    setInterval(getmessage, 5000);
    submitBtn.addEventListener("click", function submit(e) {
        e.preventDefault();
        var body = document.getElementById('chatbody');
        var newmessage=document.getElementById('message').value;
        if (newmessage.length>0)
        getchat(body,newmessage);
            });


    function getmessage() {
        let urls="/api/getchat/?password=<?=str_rot13("Rememberme")?>&token=<?=str_rot13("kvjdfvdfkj@dsd.fd")?><?=4*$keyuser?>/sdfsdjsdkcj/<?=str_rot13('out')?>/";
        $.ajax({
            url: urls,
            type: 'POST',
            processData: false,
            contentType: false,
            data: new FormData($("#form")[0]),
            success: function (data) {
                try {
                    var obj = data;
                    if (obj.xatolik == 0) {
                        var body = document.getElementById('chatbody');
                        body.innerHTML = obj.message;
                    } else {
                        console.log(obj);
                    }
                }catch ( e ){
                    console.log("Noma`lum  xatolik!");
                }
            },
            error: function (e) {
                console.log("Aloqa uzilib qoldi!")
            },
        });
    }
    function getchat(body,newmessage) {
        let urls="/api/getchat/?password=<?=str_rot13("Rememberme")?>&token=<?=str_rot13("kvjdfvdfkj@dsd.fd")?><?=4*$keyuser?>/jkdskjdfksdjf/<?=str_rot13('in')?>/";
        $.ajax({
            url: urls,
            type: 'POST',
            processData: false,
            contentType: false,
            data: new FormData($("#form")[0]),
            success: function (data) {
                document.getElementById('message').value='';
                 try {
                    var obj = data;
                    if (obj.xatolik == 0) {
                        body.innerHTML = body.innerHTML+'<div class="messageme"><p>'+newmessage+'</p></div>';
                        console.log("Xabar yuborildi");
                    } else {
                        console.log(obj.xabar);
                    }
                }catch ( e ){
                    console.log("Noma`lum  xatolik!");
                }
            },
            error: function () {
                console.log("Aloqa uzilib qoldi!")
            },
        });
    }
</script>
</body>

</html>