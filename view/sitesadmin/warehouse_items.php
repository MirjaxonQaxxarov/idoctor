
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Dorilar</h1>
            <h1></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><a href="/locadmin/addmedicaments/"><i class="fa fa-plus"></i> Yangi Dorilar kiritish</a></li>
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
                                <th>Guruhi</th>
                                <th>Nojuya tasiri</th>
                                <th>Qo'llanma</th>
                                <th>Retsept bilan</th>
                                <th>Ishlab chiqaruvchi</th>
                                <th>Mamlakat</th>
                                <th>Image</th>
                            </tr>
                            </thead>
                            <tbody>

                    <?php
                    $fetch = Functions::getall("medicaments");
                    $no=0;
                    foreach($fetch as $value) {

                        $no++;
                        $found = 0;
                        $farm_group="";
                        $fetch2=Functions::getbyid("farm_group",$value['farm_group_id']);
                        foreach ($fetch2 as $value2){
                            $farm_group=$value2['name'];
                        }

                        echo('
                            <tr>
                                <td>' . $value['name'] . '</td>
                                <td>' . $farm_group . '</td>
                                <td>' . $value['contraindication'] . '</td>
                                <td>' . $value['instruction'] . '</td>
                                <td>' . $value['form_getaway'] . '</td>
                                <td>' . $value['manufacturer'] . '</td>
                                <td>' . $value['manufacturer_country'] . '</td>
                                <td><img src="/files/images/medicaments/' . $value['medicaments'] . '" alt="' . $value['name'] . '" width="100px"></td>
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
