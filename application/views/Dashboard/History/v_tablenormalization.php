<div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-9 col-lg-8">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">2. MENORMALISASI TABEL
                                    </h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="d-flex">
                                        <table class="table text-center">
                                            <thead>
                                                <tr>
                                                    
                                                    <th scope="col">Fisik</th>
                                                    <th scope="col">Passing</th>
                                                    <th scope="col">Dribbling</th>
                                                    <th scope="col">Shooting</th>
                                                    <th scope="col">Heading</th>
                                                    <th scope="col">Koginitif</th>
                                                </tr>
                                            </thead>
                                           <tbody>  
                                                    <?php $row=(count($rij));$col=(count($rij[0])); ?>
                                                     <?php for($i=0; $i<$row;$i++): ?>
                                                        <tr>
                                                        <?php for($j=0; $j<$col;$j++): ?>
                                                            
                                                            <td><?= round(($rij[$i][$j]),6); ?></td>
                                                        <?php endfor; ?>
                                                        </tr>
                                                    <?php endfor; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
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
                                            <img src="<?= base_url() ?>assets/images/rumus/normalisasitabeltopsis.png" class="w-75 m-auto"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center small">


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>