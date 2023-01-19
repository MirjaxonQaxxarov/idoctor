
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Package</h1>
            <h1></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><a href="/locadmin/addpackage/"><i class="fa fa-plus"></i> Yangi Package kiritish</a></li>
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
                                <th>Id</th>
                                <th>Name</th>
                            </tr>
                            </thead>
                            <tbody>

                    <?php
                    $fetch = Functions::getall("package");
                    $no=0;
                    foreach($fetch as $value) {

                        $no++;
                        $found = 0;
                        $package="";

                        echo('
                            <tr>
                                <td>' . $value['id'] . '</td>
                                <td>' . $value['package_type'] . '</td>
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
