
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Dorilar</h1>
            <h1></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><a href="/locadmin/addwarehouse_items/"><i class="fa fa-plus"></i> Yangi Dorilar kiritish</a></li>
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
                                <th>Dori</th>
                                <th>Package</th>
                                <th>Olingan narx</th>
                                <th>Sotish narx</th>
                                <th>Soni</th>
                            </tr>
                            </thead>
                            <tbody>

                    <?php
                    $fetch = Functions::getall("warehouse_items");
                    $no=0;
                    foreach($fetch as $value) {

                        $no++;
                        $found = 0;
                        $medic="";
                        $fetch2=Functions::getbyid("medicaments",$value['medicament_id']);
                        foreach ($fetch2 as $value2){
                            $medic=$value2['name'];
                        }
                        $farm_group="";
                        $fetch3=Functions::getbyid("package",$value['package_id']);
                        foreach ($fetch3 as $value2){
                            $farm_group=$value2['package_type'];
                        }

                        echo('
                            <tr>
                                <td>' . $medic . '</td>
                                <td>' . $farm_group . '</td>
                                <td>' . $value['price_in'] . '</td>
                                <td>' . $value['price_out'] . '</td>
                                <td>' . $value['count'] . '</td>
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
