
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Shifokorlar</h1>
            <h1></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><a href="/locadmin/adddoctor/"><i class="fa fa-plus"></i> Yangi Shifokorlar kiritish</a></li>
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
                                <th>Ismi</th>
                                <th>Daraja</th>
                                <th>Klinika</th>
                                <th>Tajriba</th>
                                <th>Haqida</th>
                                <th>Phone</th>
                                <th>Telegram</th>
                                <th>Email</th>
                                <th>Manzil</th>
                                <th>Image</th>
                            </tr>
                            </thead>
                            <tbody>

                    <?php
                    $fetch = Functions::getall("doctor");
                    $no=0;
                    foreach($fetch as $value) {

                        $no++;
                        $found = 0;
                        $rank="";
                        $fetch1=Functions::getbyid("rank",$value['rankid']);
                        foreach ($fetch1 as $value1){
                            $rank=$value1['name'];
                        }
                        $clinic="";
                        $fetch2=Functions::getbyid("clinic",$value['rankid']);
                        foreach ($fetch2 as $value2){
                            $clinic=$value2['name'];
                        }

                        echo('
                            <tr>
                                <td>' . $value['fullname'] . '</td>
                                <td>' . $rank . '</td>
                                <td>' . $clinic . '</td>
                                <td>' . $value['experiment'] . '</td>
                                <td>' . $value['about'] . '</td>
                                <td>' . $value['phone'] . '</td>
                                <td>' . $value['telegram'] . '</td>
                                <td>' . $value['email'] . '</td>
                                <td>' . $value['location'] . '</td>
                                <td><img src="/files/images/doctor/' . $value['image'] . '" alt="' . $value['fullname'] . '" width="100px"></td>
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
