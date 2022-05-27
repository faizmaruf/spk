<div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">TABEL NILAI TIAP ALTERNATIF (DATA)
                                    </h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">

                                    <div class="d-flex">
                                        <table class="table text-center">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Fisik</th>
                                                    <th scope="col">Passing</th>
                                                    <th scope="col">Dribbling</th>
                                                    <th scope="col">Shooting</th>
                                                    <th scope="col">Heading</th>
                                                    <th scope="col">Koginitif</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 0 ?>
                                                <?php foreach ($tabledata as $d) : ?>
                                                <?php $i++; ?>
                                                <tr>
                                                    
                                                    <td><?= $d["nama"]; ?></td>  
                                                    <td><?= $d["fisik"]; ?></td>
                                                    <td><?= $d["passing"]; ?></td>
                                                    <td><?= $d["dribbling"]; ?></td>
                                                    <td><?= $d["shooting"]; ?></td>
                                                    <td><?= $d["heading"]; ?></td>
                                                    <td><?= $d["kognitif"]; ?></td>
                                                    
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                    </div>