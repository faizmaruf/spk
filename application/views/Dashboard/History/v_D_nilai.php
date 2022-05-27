<div class="row">

                        <!-- Area Table -->
                        <div class="col-xl-9 col-lg-8">
                            <div class="card shadow mb-4">
                                <!-- Table Header - -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">5. MENCARI D+ DAN D- SETIAP ALTERNATIF
                                    </h6>
                                </div>
                                <!-- Table Body -->
                                <div class="card-body">
                                    <div class="d-flex">
                                        <table class="table text-center">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">D+</th>
                                                    <th scope="col">D-</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <?php for($i=0; $i<count($D_plus);$i++): ?>
                                                <tr>
                                                    <th scope="row"><?= ($nama[$i]['nama']); ?></th>
                                                    <td><?= round(($D_plus[$i]),6); ?></td>
                                                    <td><?= round(($D_minus[$i]),6); ?></td>
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
                                        <div class="m-auto h-100 w-100 d-flex flex-column">
                                            <img src="<?= base_url() ?>assets/images/rumus/Dplus.png" class="w-75 m-auto" alt="">
                                            <img src="<?= base_url() ?>assets/images/rumus/Dminus.png" class="w-75 m-auto pt-5" alt="">
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center small">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>