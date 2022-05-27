<!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">1. BOBOT TIAP KRITERIA (W)</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="d-flex">
                                        <table class="table text-center">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Kriteria</th>
                                                    <th scope="col">Fisik</th>
                                                    <th scope="col">Passing</th>
                                                    <th scope="col">Dribbling</th>
                                                    <th scope="col">Shooting</th>
                                                    <th scope="col">Heading</th>
                                                    <th scope="col">Koginitif</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="bg-success text-light">
                                                    <th scope="row" class="bg-body text-primary">Bobot</th>
                                                    <?php for($i=0; $i<count($bobot);$i++): ?>
                                                    <td><?= round(($bobot[$i]),6); ?></td>
                                                    <?php endfor; ?>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Keterangan</th>
                                                    <td>benefit</td>
                                                    <td>benefit</td>
                                                    <td>benefit</td>
                                                    <td>benefit</td>
                                                    <td>benefit</td>
                                                    <td>benefit</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>