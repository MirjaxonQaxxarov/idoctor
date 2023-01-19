<div class="right-bottom">
  <div class="right-body">
    <div class="body-top">
      <h2>Dori yetkazib berish</h2>
      <p class="buttons">
        <button>Bekor qilish</button>
        <button class="buybtn">Buyurtma qilish <span id="sizexs"></span></button>
      </p>
    </div>
    <div class="body-ads">
      <h2>Reklama uchun joy...</h2>
    </div>

    <div class="delivery-main">
      <div class="search-medikament">
        <div class="search-group">
          <input type="text" placeholder="Preparat nomini kiriting">
          <select name="" id="">
            <option value="null">Kategoriyani tanlang</option>
          </select>
          <button><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
      </div>
      <table class="delivery-table">
        <tr>
          <th></th>
          <th>Rasm</th>
          <th>Preparat nomi</th>
          <th>Ishlab chiqaruvchi</th>
          <th>Narxi</th>
          <th>Qo'llanilishi</th>
          <th>Retsept</th>
          <th>Farmakologik xususiyati</th>
          <th>Analogi</th>
        </tr>

<?php
$_SESSION['_csrfgroup'] = md5(time());
$_SESSION['_csrfcli'] = md5(time());

$fetch = Functions::getall("medicaments");;
$no=0;
foreach($fetch as $value) {

    $no++;
    $found = 0;
    $price='';
    $fetch1=Functions::getbytable("warehouse_items",'medicament_id=:cl',array("cl"=>$value['id']));
    foreach ($fetch1 as $value1){
        $price=$value1['price_out'];
    }
    $farm_group='';
    $farm_group_id='';
    $fetch2=Functions::getbyid("farm_group",$value['farm_group_id']);
    foreach ($fetch2 as $value2){
        $farm_group=$value2['name'];
        $farm_group_id=$value2['id'];
    }
    $purpose='';
    $fetch3=Functions::getbytable("purpose",'medicaments_id=:cl',array("cl"=>$value['id']));
    foreach ($fetch3 as $value3){
        $purpose=$value3['disease'];
    }
    echo('
        <tr>
          <td><input type="checkbox" class="product-check" data-index="'.$value['id'].'" data-value="'.$value['id'].'|'.$price.'|'.$value['name'].'"></td>
          <td><img src="/assets/images/logo.png" height="30px" alt=""></td>
          <td>'.$value['name'].'</td>
          <td>'.$value['manufacturer_country'].'</td>
          <td>'.$price.'</td>
          <td style="color: green;">'.$purpose.'</td>
          <td style="color: red;">'.$value['form_getaway'].'</td>
          <td style="color: blue;">'.$farm_group.'</td>
          <td>
            <button class=" analogs" data-index="'.$farm_group_id.'" data-analog="analgetik" data-preparat="Analgin">Ko\'rish</button>
          </td>
        </tr>');
    }
?>

      </table>
    </div>

    <div class="analog-modal">
      <div class="a-modal-body">
        <div class="a-modal-head" style="display: flex; justify-content:space-between;align-items:center; margin-bottom:15px;">
          <h2><span class="pr-name"></span> preparati analoglari</h2>
          <div class="buttons" style="text-align: right;">
            <button class="btn"  style="background-color: blue;">Tanlash</button>
            <button class="a-modal-close" style="background-color: transparent;font-size:24px;color:black"><i class="fa-solid fa-xmark"></i></button>
          </div>
        </div>
        <div class="a-modal-products" style="max-height:400px;overflow: auto;">
          <table id="formod" class="delivery-table">
            <tr>
              <th></th>
              <th>Rasm</th>
              <th>Preparat nomi</th>
              <th>Ishlab chiqaruvchi</th>
              <th>Narxi</th>
              <th>Qo'llanilishi</th>
              <th>Retsept</th>
              <th>Farmakologik xususiyati</th>
            </tr>
            <tr>
              <td><input type="checkbox"></td>
              <td><img src="/assets/images/logo.png" height="30px" alt=""></td>
              <td>Analgin</td>
              <td>MedFarm | Rossiya</td>
              <td>3000</td>
              <td style="color: green;">O'g'riq qoldiruvchi</td>
              <td style="color: red;">Talab etiladi</td>
              <td style="color: blue;">Analgetik</td>
            </tr>
          </table>
        </div>

      </div>
    </div>


    <div class="buy-modal">
      <div class="a-modal-body">
        <div class="a-modal-head" style="display: flex; justify-content:space-between;align-items:center; margin-bottom:15px;">
          <h2>Buyurtma berish oynasi</h2>
          <div class="buttons" style="text-align: right;">
            <button class="btn" id="ok1" style="background-color: blue;">Buyurtma berish</button>
            <button class="a-buy-close" style="background-color: transparent;font-size:24px;color:black"><i class="fa-solid fa-xmark"></i></button>
          </div>
        </div>
        <div class="a-modal-products" style="max-height:400px;overflow: auto;">
            <form id="form">
          <div class="client-info">
                  <h5 style="color: red" id="error"></h5>
                <input type="text" name="name" class="forchek"  placeholder="Familya Ism Sharifingiz">
                <input type="text" name="adress" class="forchek" placeholder="To'liq manzilingiz">
                <input type="tel"  name="phone" class="forchek" placeholder="Telefon raqamingiz">
                  <input type="hidden" name="_csrf" value="<?=$_SESSION['_csrfcli']?>">
                <div class="rets-block" style="display: flex; align-items:center">
                  <input hidden class="rets-file" type="file" name="orderimg" style="background-color: transparent; width:auto" id="retsept" placeholder="Retsept faylini yuklang">
                  <label for="retsept" class="retss-file" style="font-size: 18px; font-weight:800">Retsept rasmini yuklang</label>
                </div>
          </div>
          <table class="delivery-table">
            <thead>
              <tr>
                <th>Preparat nomi</th>
                <th>Narxi</th>
                <th>Soni</th>
                <th>Summasi</th>
                <th>Uskunalar</th>
              </tr>
            </thead>

            <tbody align="center" id="fororder">

            </tbody>


            <tfoot>
              <tr>
                <th colspan="3">Jami:</th>
                <th id="summasi">0</th>
                <th></th>
              </tr>
            </tfoot>

          </table>

            </form>
          <div class="shart-block">
            <input type="checkbox" id="shart" width="20px">
            <label for="shart">Buyurtma qilar ekansiz tizim shartlariga to'liq rozi bo'lishingiz talab etiladi.</label>
          </div>
        </div>

      </div>
    </div>
  </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js"></script>
    <script>

    var allitem={};

        function getall() {

            let pchek = document.querySelectorAll('.product-check');
            let mass=[];
            pchek.forEach((item) => {
                item.addEventListener('change', () => {
                    let idx=item.dataset.index;
                    let val = item.dataset.value;
                    if (item.checked) {
                        mass = val.split('|');
                        allitem[idx]={'name':mass[2],'price':mass[1]};
                    }
                    else{
                        delete allitem[idx];

                    }
                    showinfomodal();
                    let sonc = document.querySelectorAll('.xma');
                    sonc.forEach((its) => {
                        its.addEventListener('click', () => {

                            delete allitem[its.id];

                            showinfomodal();
                            allcheck();
                        })
                    })
                })
            })
        }
        getall();
    function showinfomodal(){

        var sizes = Object.keys(allitem).length;
        document.getElementById('sizexs').innerHTML=sizes;
        document.getElementById('fororder').innerHTML='';
        document.getElementById('summasi').innerHTML='0';
        for (items in allitem) {
            var summa=allitem[items]['price'];
            document.getElementById('summasi').innerHTML=parseInt(document.getElementById('summasi').innerHTML)+parseInt(summa);
            document.getElementById('fororder').innerHTML+='<tr data-order="'+items+'">'+
                '<td>'+allitem[items]['name']+'</td>'+
                '<td>'+allitem[items]['price']+'</td>'+
                '<td style="color: green;"><input  type="number" min="1"  class="soni"  value="1" data-ind="'+items+'" name="item_'+items+'"  placeholder="1"></td>'+
                '<td style="color: red;"  id="summa'+items+'">'+summa+'</td>'+ '<td style="color: blue;" id="'+items+'" class="xma"><i class="fa-solid fa-xmark"></i></td></tr>';



        }

        let sonch = document.querySelectorAll('.soni');
        sonch.forEach((itso) => {
            itso.addEventListener('change', () => {
                let idx=itso.dataset.ind;
                document.getElementById('summa'+idx).innerHTML=itso.value*allitem[idx]['price'];
                allprice();
            })

        })
    }

    function allprice() {
        var s=0;
        let sonch = document.querySelectorAll('.soni');
        sonch.forEach((its) => {
            let idx=its.dataset.ind;
            s+=its.value*allitem[idx]['price'];
        })
        document.getElementById('summasi').innerHTML=s;
    }

    function allcheck() {
        let sonch = document.querySelectorAll('.product-check');
        sonch.forEach((its) => {
            if (its.checked){
                let idx=its.dataset.index;
                if (!(allitem.hasOwnProperty(idx))){
                    its.checked = false;
                }
            }
        })
    }


    </script>


    <script>

        let analogsbtn = document.querySelectorAll('.analogs');
        analogsbtn.forEach((item)=>{
            item.addEventListener('click',()=>{
                let ind = item.dataset.index;
                $.ajax({
                    url: "/api/group/",
                    type: 'POST',
                    data: {'farm': ind,'token':'<?=$_SESSION['_csrfgroup']?>'},
                    success: function (data) {
                        document.getElementById('formod').innerHTML=data;
                        getall();
                        openm(item);
                    }
                })
            })
        })

        let submitBt = document.getElementById('ok1');
        submitBt.addEventListener("click", function submit(e) {
            e.preventDefault();
            let sonx=0;
            document.querySelectorAll('.forchek').forEach((item)=>{
                if (item.value.length<1){
                    document.getElementById('error').innerHTML='Ma`lumotlaringiz to`liq emas!';
                    sonx++;
                }
            })
            if (sonx!=0){
                return false;
            }
            if(Object.keys(allitem).length==0){
                document.getElementById('error').innerHTML='Sizda xarid mavjud emas!';
                return false;
            }
            let tek = document.getElementById('shart');
            if (tek.checked)
            $.ajax({
                url: "/api/forclient/password=<?=str_rot13("Rememberme")?>&token=<?=str_rot13("kvjdfvdfkj@dsd.fd")?><!----><?=4*$keyuser?>/<?=str_rot13('rank')?>/",
                type: 'POST',
                processData: false,
                contentType: false,
                data: new FormData($("#form")[0]),
                success: function (data) {
                    console.log(data);

                    var obj = JSON.parse(data);
                    if (obj.xatolik==0) {
                        document.getElementById('error').innerHTML="Malumotlar saqlandi";
                        setTimeout(() => {
                             location.href = "/delivery/";
                        }, 1000);
                    } else {
                        $('#_csrf').val(obj._csrf);
                        document.getElementById('error').innerHTML="Nomalum  xatolik!";
                    }
                },
                error: function () {
                    document.getElementById('error').innerHTML="Aloqa uzilib qoldi!";
                },
            });
            else{

                tek.scrollIntoView();

            }

        });

    </script>