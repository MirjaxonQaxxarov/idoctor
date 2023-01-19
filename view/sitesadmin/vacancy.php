
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Vakansiya</h1>
            <h1></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><a href="/locadmin/addvacancy/"><i class="fa fa-plus"></i> Yangi Vakansiya kiritish</a></li>
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
                                <th>Viloyat</th>
                                <th>Talablar</th>
                                <th>Ish vaqti</th>
                                <th>Maosh</th>
                                <th>Aloqa</th>
                            </tr>
                            </thead>
                            <tbody>

                    <?php
                    $fetch = Functions::getall("vacancy");
                    $no=0;
                    foreach($fetch as $value) {

                        $no++;
                        $found = 0;

                        $vilo="";
                        $fetch1=Functions::getbyid("viloyat",$value['countryid']);
                        foreach ($fetch1 as $value1){
                            $vilo=$value1['name'];
                        }
                        echo('
                            <tr>
                                <td>' . $value['title'] . '</td>
                                <td>' . $vilo . '</td>
                                <td>' . $value['requirements'] . '</td>
                                <td>' . $value['worktime'] . '</td>
                                <td>' . $value['salary'] . '</td>
                                <td>' . $value['contact'] . '</td>
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
