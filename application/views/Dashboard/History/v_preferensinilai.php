 <div class="row">

                        <!-- Area Table -->
                        <div class="col-xl-9 col-lg-8">
                            <div class="card shadow mb-4">
                                <!-- Table Header - -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">6. MENCARI HASIL PREFERENSI DAN
                                        PERANGKINGAN
                                    </h6>
                                </div>
                                <!-- Table Body -->
                                <div class="card-body">
                                    <div class="d-flex">
                                        <table class="table text-center">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Preferensi</th>
                                                    <th scope="col">Rangking</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <?php $row=(count($datarangking));$j=0; ?>
                                                    <?php for($i=0; $i<$row;$i++): ?>
                                                    <?php $j++;?>
                                                        <tr>
                                                            <td><?= ($datarangking[$i]['nama']); ?></td>
                                                            <td><?= round(($datarangking[$i]['preferensi']),6); ?></td>                                                       
                                                            <td><?= $j ?></td>
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
                                    <h6 class="m-0 font-weight-bold text-primary">Rumus</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="m-auto h-100 w-100 d-flex">
                                            <img src="<?= base_url() ?>assets/images/rumus/Preferensi.png" class="w-75 m-auto" alt=""></div>
                                    </div>
                                    <div class="mt-4 text-center small">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>