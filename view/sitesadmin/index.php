
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Klinikalar</h1>
            <h1></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><a href="/locadmin/addclinic/"><i class="fa fa-plus"></i> Yangi Klinikalar kiritish</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                            <tr>
                                <th>Nomi</th>
                                <th>Yo`nalish</th>
                                <th>Qabul</th>
                                <th>Manzil</th>
                                <th>Telegram</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Image</th>
                            </tr>
                            </thead>
                            <tbody>

                    <?php
                    $fetch = Functions::getbytable("clinic",'type=:cl',array("cl"=>"clinic"));
                    $no=0;
                    foreach($fetch as $value) {
                        $imgurl='/files/images/image/'.$value['image'];
                        if (!isset($imgurl) or strlen($value['image'])<1){
                            $imgurl='/assets/images/logo.png';
                        }
                        $no++;
                        $found = 0;

                        echo('
                            <tr>
                                <td>' . $value['name'] . '</td>
                                <td>' . $value['direction'] . '</td>
                                <td>' . $value['price'] . '</td>
                                <td>' . $value['address'] . '</td>
                                <td>' . $value['telegram'] . '</td>
                                <td>' . $value['phone'] . '</td>
                                <td>' . $value['email'] . '</td>
                                <td><img src="' . $imgurl . '" alt="' . $value['name'] . '" width="100px"></td>
                            </tr>');
                        }
                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
