
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Qo`llanilish</h1>
            <h1></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><a href="/locadmin/addpurpose/"><i class="fa fa-plus"></i> Yangi Qo`llanilish kiritish</a></li>
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
                                <th>Kasallik</th>
                                <th>Alomatlari</th>
                                <th>Dori</th>
                                <th>Protsedura</th>
                            </tr>
                            </thead>
                            <tbody>

                    <?php
                    $fetch = Functions::getall("purpose");
                    $no=0;
                    foreach($fetch as $value) {

                        $no++;
                        $found = 0;
                        $medicaments="";
                        $fetch2=Functions::getbyid("medicaments",$value['medicaments_id']);
                        foreach ($fetch2 as $value2){
                            $medicaments=$value2['name'];
                        }

                        echo('
                            <tr>
                                <td>' . $value['disease'] . '</td>
                                <td>' . $value['symptom'] . '</td>
                                <td>' . $medicaments . '</td>
                                <td>' . $value['procedur'] . '</td>
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
