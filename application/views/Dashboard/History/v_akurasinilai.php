<div class="row bg-success">

                        <!-- Area Table -->
                        <div class="col-xl-6 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Table Header - -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">MENCARI NILAI AKURASI DARI METODE AHP
                                        DAN TOPSIS
                                    </h6>
                                </div>
                                <!-- Table Body -->
                                <div class="card-body">
                                    <div class="d-flex">
                                        <table class="table text-center">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Nama</th>

                                                    <th scope="col">Rangking</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $row=(count($datarangking));$j=0; ?>
                                                    <?php for($i=0; $i<$row;$i++): ?>
                                                    <?php $j++;?>
                                                        <tr><?php $class= "bg-success";?>
                                                            <td><?= ($datarangking[$i]['nama']); ?></td>                                                       
                                                            <td <?php if ($j<=14) {
                                                            echo "class=".$class."";
                                                        } ?>><?= $j ?></td>
                                                        </tr>
                                                    <?php endfor; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Area Table -->
                        <div class="col-xl-3 col-lg-3">
                            <div class="card shadow mb-4">
                                <!-- Table Header - -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">DATA DARI PAKAR
                                    </h6>
                                </div>
                                <!-- Table Body -->
                                <div class="card-body bg-warning ">
                                    <div class="d-flex">
                                        <table class="table text-center">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Nama</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $row=(count($datapemainterpilih));?>
                                                    <?php for($i=0; $i<$row;$i++): ?>
                                                    <?php $j++;?>
                                                        <tr>
                                                            <td><?= ($datapemainterpilih[$i]['nama']); ?></td>                                                       
                                                        </tr>
                                                    <?php endfor; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- rumus card -->
                        <div class="col-xl-3 col-lg-4">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Rumus dan Hasil</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="m-auto h-100 w-100">
                                            akurasi = (v/n)*100</div>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div
                                                        class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                        Jumlah
                                                        Akurasi
                                                    </div>
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col-auto">
                                                            <div class="h5 mb-0 mr-3 font-weight-bold text-secondary">
                                                                <?= round(($akurasi),6); ?> %</div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="progress progress-sm mr-2">
                                                                <div class="progress-bar bg-secondary-bar"
                                                                    role="progressbar" style="width: 69%"
                                                                    aria-valuenow="50" aria-valuemin="0"
                                                                    aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>