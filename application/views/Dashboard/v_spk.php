<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- Bootstrap CSS -->
   <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="<?= base_url();?>/assets/bootstrap-5/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url();?>/assets/style.css" />
</head>

<body class="bg-dark">

    <div class="container-fluid bg-light">
        <div class="row flex-nowrap">
           <!-- start code sidebar -->
            <?php $this->load->view('Dashboard/v_sidebar'); ?>
            <!-- finish code sidebar -->
            <div class="col py-3">
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">





                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah Pemain
                                                 <?= count($data); ?>/44 
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-secondary">  <?= round((count($data)/44),2)*100; ?>%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-secondary-bar" role="progressbar"
                                                            style="width: <?= round((count($data)/44),2)*100; ?>%" aria-valuenow="50" aria-valuemin="0"
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

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah Variable</div>
                                            <div class="h5 mb-0 font-weight-bold text-secondary">6</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">
                        <!-- Content Row -->

                        <div class="row">

                            <!-- Area Chart -->
                            <div class="col-xl-8 col-lg-7">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Tabel Perbandingan Prioritas</h6>
                                    </div>
                                    <!-- Card Body -->
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
                                                <tbody>
                                                    <?php $i = 0 ?>
                                                <?php foreach ($tblperbandingan as $d) : ?>
                                                <?php $i++; ?>
                                                <tr>
                                                    <?php switch ($i){  
                                                        case 1:
                                                            echo '<th scope="row">Fisik</th>';
                                                            break;
                                                        case 2:
                                                            echo '<th scope="row">Passing</th>';
                                                            break;
                                                        case 3:
                                                            echo '<th scope="row">Dribbling</th>';
                                                            break;
                                                        case 4:
                                                            echo '<th scope="row">Shooting</th>';
                                                            break;
                                                        case 5:
                                                            echo '<th scope="row">Heading</th>';
                                                            break;
                                                        case 6:
                                                            echo '<th scope="row">Kognititf</th>';
                                                            break;
                                                    } ?>
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

                            <!-- Pie Chart -->
                            <div class="col-xl-4 col-lg-5">
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
                                                <img src="<?= base_url() ?>assets/images/rumus/Bobot.png" class="w-75 m-auto" alt=""></div>
                                        </div>
                                        <div class="mt-4 text-center small">


                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Consistency Ratio</h6>

                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="m-auto h-100 w-100 d-flex">
                                                CR < 1 , Maka Nilai Bobot Kriteria Dapat Diterima
                                             </div>
                                        </div>
                                        <div class="mt-4 text-center small">


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- Area Table Bobot (W) -->
                    <?php $this->load->view('Dashboard/History/v_bobot',$bobot); ?>
                      

                    </div>
                    <!-- Content Row Tabel Nilai Tiap Alternatif -->
                    <?php $this->load->view('Dashboard/History/v_tabledata',$tabledata); ?>
                    
                    
                    <!-- Content Row 2. Menormalisasi Tabel -->
                    <?php $this->load->view('Dashboard/History/v_tablenormalization',$rij); ?>
                    

                    <!-- Content Row 3. Menghitung Matiks Keputusan ternormalisasi dan Terbobot -->
                    <?php $this->load->view('Dashboard/History/v_normalisasiterbobot',$y); ?>

                    <!-- Content Row 4. Mencari Solusi Ideal Positif dan Solusi Ideal Negatif -->
                    <?php $this->load->view('Dashboard/History/v_solusiidealnilai',$A_plus,$A_minus); ?>
                    

                    <!-- Content Row 5. Mencari D+ dan D- untuk Setiap Altenatif -->
                    <?php $this->load->view('Dashboard/History/v_D_nilai',$nama,$D_plus,$D_minus); ?>
                   

                    <!-- Content Row 6. Mencari Hasil Preferensi dan Perangkingan -->
                    <?php $this->load->view('Dashboard/History/v_preferensinilai',$datarangking); ?>
                   

                    <!-- Content Row 7. Mencari Nilai Akurasi -->
                    <?php $this->load->view('Dashboard/History/v_akurasinilai',$datarangking,$datapemainterpilih,$akurasi); ?>
                    




                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

</body>


</html>