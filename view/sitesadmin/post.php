
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
                                <th>Qisqacha ma`lumot</th>
                                <th>Katta sarlavha</th>
                                <th>Batafsil ma'lumot</th>
                                <th>Vaqt</th>
                                <th>Ko`ruvchilar</th>
                                <th>Image</th>
                            </tr>
                            </thead>
                            <tbody>

                    <?php
                    $fetch = Functions::getbytable("news","type=:type",array('type'=>'post'));
                    $no=0;
                    foreach($fetch as $value) {

                        $no++;
                        $found = 0;


                        echo('
                            <tr>
                                <td>' . $value['title'] . '</td>
                                <td>' . $value['shortabout'] . '</td>
                                <td>' . $value['bigtitle'] . '</td>
                                <td>' . $value['about'] . '</td>
                                <td>' . $value['time'] . '</td>
                                <td>' . intval($value['viewers']) . '</td>
                                <td><img src="/files/images/news/' . $value['news'] . '" alt="' . $value['title'] . '" width="100px"></td>
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
