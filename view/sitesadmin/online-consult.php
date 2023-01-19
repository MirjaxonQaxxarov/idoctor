
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Konsultatsiyalar</h1>
            <h1></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><a href="/locadmin/addconsult/"><i class="fa fa-plus"></i> Yangi Konsultatsiyalar kiritish</a></li>
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
                                <th>Image</th>
                                <th>Ism</th>
                                <th>Manzil</th>
                                <th>Narx</th>
                                <th>Vaqti</th>
                            </tr>
                            </thead>
                            <tbody>

                    <?php
                    $fetch = Functions::getall("consultation");
                    $no=0;
                    foreach($fetch as $value) {

                        $no++;
                        $found = 0;
                        $fullname="";
                        $image="";
                        $fetch1=Functions::getbyid("doctor",$value['doctorid']);
                        foreach ($fetch1 as $value1){
                            $fullname=$value1['fullname'];
                            $image=$value1['doctor'];
                        }
                        $clinic="";


                        echo('
                            <tr>
                               
                                <td><img src="/files/images/doctor/' . $image . '" alt="'.$fullname.'" width="100px"></td>
                                <td>' . $fullname . '</td>
                                <td>' . $value['address'] . '</td>
                                <td>' . $value['price'] . '</td>
                                <td>' . $value['consultationtime'] . '</td>
                                
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
