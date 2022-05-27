<div class="row">

                        <!-- Area Table -->
                        <div class="col-xl-9 col-lg-8">
                            <div class="card shadow mb-4">
                                <!-- Table Header - -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">4. MENCARI SOLUSI IDEAL POSITIF DAN
                                        NEGATIF
                                    </h6>
                                </div>
                                <!-- Table Body -->
                                <div class="card-body">
                                    <div class="d-flex">
                                        <table class="table text-center">
                                            <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Fisik</th>
                                                    <th scope="col">Passing</th>
                                                    <th scope="col">Dribbling</th>
                                                    <th scope="col">Shooting</th>
                                                    <th scope="col">Heading</th>
                                                    <th scope="col">Koginitif</th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-warning">
                                                <tr>
                                                    <th class="bg-body" scope="row">MAX</th>
                                                    <?php for($i=0; $i<count($A_plus);$i++): ?>
                                                    <td><?= round(($A_plus[$i]),6); ?></td>
                                                    <?php endfor; ?>
                                                </tr>
                                                <tr>
                                                    <th class="bg-body" scope="row">MIN</th>
                                                    <?php for($i=0; $i<count($A_minus);$i++): ?>
                                                    <td><?= round(($A_minus[$i]),6); ?></td>
                                                    <?php endfor; ?>
                                                </tr>
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
                                        <div class="m-auto h-100 w-100">
                                            <img src="<?= base_url() ?>assets/images/rumus/Aplus.png" class="w-100 mb-5" alt="">
                                            <img src="<?= base_url() ?>assets/images/rumus/Aminus.png" class="w-100" alt="">
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center small">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>