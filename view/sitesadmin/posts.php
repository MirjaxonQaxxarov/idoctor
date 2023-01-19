
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Postlar</h1>
            <h1></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><a href="/locadmin/addpost/"><i class="fa fa-plus"></i> Yangi Postlar kiritish</a></li>
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
                                <th>Sarlavha</th>
                                <th>Katta sarlavha</th>
                                <th>Batafsil ma'lumot</th>
                                <th>Vaqt</th>
                                <th>Ko`ruvchilar</th>
                                <th>Image</th>
                            </tr>
                            </thead>
                            <tbody>

                    <?php
                    $fetch = Functions::getall("post");
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
                        $fetch2=Functions::getbyid("clinic",$value['clinicid']);
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
                                <td><img src="/files/images/news/' . $value['news'] . '" alt="' . $value['fullname'] . '" width="100px"></td>
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
