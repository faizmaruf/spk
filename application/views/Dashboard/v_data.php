<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
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
                        <h1 class="h3 mb-0 text-gray-800">Data Alternatif</h1>
                      
                    </div>

                    <!-- Content Row -->
                   
                <div class="row font-kecil">
                    <div class="col-xl-1 col-md-2 mb-2">
                            <div class="btn d-flex">
                                <a data-toggle="modal" data-target="#tambah"
                                 type="a" class="btn btn-outline-primary btn-sm"><i
                                            class="fs-4 bi-plus"></i>Tambah</a>
                            </div>
                    </div>
                    <div class="col-xl-1 col-md-2 mb-2">
                            <div class="btn d-flex">
                                <a href="<?= site_url('Data/form')?>" type="a" class="btn btn-success btn-sm"><i
                                            class="fs-4 bi-file-earmark-arrow-down"></i>Import</a>
                            </div>
                    </div>
                    <div class="col-xl-1 col-md-2 mb-2">
                            <div class="btn d-flex">
                                <a href="<?= site_url('Data/DeleteAll')?>" type="a" class="btn btn-danger btn-sm bg-danger"><i
                                            class="fs-4 bi-trash"></i>Reset</a>
                            </div>
                    </div>
                </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
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
                                                    <th scope="col">No</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Posisi</th>
                                                    <th scope="col">Fisik</th>
                                                    <th scope="col">Passing</th>
                                                    <th scope="col">Dribbling</th>
                                                    <th scope="col">Shooting</th>
                                                    <th scope="col">Heading</th>
                                                    <th scope="col">Koginitif</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 0 ?>
                                                <?php foreach ($data as $d) : ?>
                                                <?php $i++; ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td><?= $d["nama"]; ?></td>
                                                    <td><?= $d["posisi"]; ?></td>
                                                    <td><?= $d["fisik"]; ?></td>
                                                    <td><?= $d["passing"]; ?></td>
                                                    <td><?= $d["dribbling"]; ?></td>
                                                    <td><?= $d["shooting"]; ?></td>
                                                    <td><?= $d["heading"]; ?></td>
                                                    <td><?= $d["kognitif"]; ?></td>
                                                    <td>
                                                        <div class="d-flex justify-content-around">
                                                            <a class="text-success d-block m-auto d-flex editmodal" data-toggle="modal" id="editbtn" data-id="<?= $d['id']; ?>" data-nama="<?= $d['nama']; ?>" data-posisi="<?= $d['posisi']; ?>" data-fisik="<?= $d['fisik']; ?>" data-passing="<?= $d['passing']; ?>" data-dribbling="<?= $d['dribbling']; ?>" data-shooting="<?= $d['shooting']; ?>" data-heading="<?= $d['heading']; ?>" data-kognitif="<?= $d['kognitif']; ?>"><i
                                                                    class="fs-4 bi-pencil-square"></i>
                                                            </a>
                                                            <a href="<?php echo site_url() . 'Data/delete' ?>?id=<?= $d['id']; ?>" type="button" class="text-danger d-block m-auto d-flex"><i
                                                                    class="fs-4 bi-trash"></i>
                                                            </a>

                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

 <?= $this->session->flashdata('message'); ?>

                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
    </div>
<!-- The Modal Tambah -->
    <div class="modal" id="tambah">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Data Pemain</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Tambah Data
                    <!-- coding disini -->
                    <form action="<?= site_url('Data/Add'); ?>" method="post" enctype="multipart/form-data">
                        <div>
                            <label for="nama"></label>
                            <input class="form-control" name="xname" placeholder="Nama Lengkap" id="nama" required>
                        </div>
                        <div>
                            <label for="posisi"></label>
                            <div class="form-control form-check">
                                <input type="radio" class="form-check-label" name="xposisi" id="posisi" value="Flank" required> Flank
                                <input type="radio" class="form-check-label" name="xposisi" id="posisi" value="Pivot" required> Pivot
                                <input type="radio" class="form-check-label" name="xposisi" id="posisi" value="Anchor" required> Anchor
                            </div>
                        </div>
                        <div>
                            <label for="fisik"></label>
                            <input type="number" class="form-control" name="xfisik" placeholder="Fisik" id="fisik" required min="1" max="10" >
                        </div>
                        <div>
                            <label for="passing"></label>
                            <input type="number" class="form-control" name="xpassing" placeholder="Passing" id="passing" required min="1" max="10">
                        </div>

                        <div>
                            <label for="dribbling"></label>
                            <input type="number" class="form-control" name="xdribbling" placeholder="Dribbling" id="dribbling" required min="1" max="10">
                        </div>

                        <div>
                            <label for="shooting"></label>
                            <input type="number" class="form-control" name="xshooting" placeholder="Shooting" id="shooting" required min="1" max="10">
                        </div>

                        <div>
                            <label for="heading"></label>
                            <input type="number" class="form-control" name="xheading" placeholder="Heading" id="heading" required min="1" max="10">
                        </div>

                        <div>
                            <label for="kognitif"></label>
                            <input type="number" class="form-control" name="xkognitif" placeholder="Kognitif" id="kognitif" required  min="1" max="10">
                        </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- The Modal edit -->
    <div class="modal" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Data Pemain</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Edit Data
                    <!-- coding disini -->
                    <form action="<?= site_url('Data/Update'); ?>" method="post" enctype="multipart/form-data">
                        <div>
                            <label for="nama"></label>
                            <input class="form-control nama" name="xname" placeholder="Nama Lengkap" id="nama" required>
                            <input class="id" type="hidden" name="xid" id="id">
                        </div>
                        <div>
                            <label for="posisi"></label>
                            <div class="form-control posisi form-check">
                                <input type="radio" class="form-check-label" class="posisi" name="xposisi" id="posisi" value="Flank" required> Flank
                                <input type="radio" class="form-check-label" class="posisi" name="xposisi" id="posisi" value="Pivot" required> Pivot
                                <input type="radio" class="form-check-label" class="posisi" name="xposisi" id="posisi" value="Anchor" required> Anchor
                            </div>
                        </div>
                        <div>
                            <label for="fisik"></label>
                            <input type="number" class="form-control fisik" name="xfisik" placeholder="Fisik" id="fisik" required min="0" max="10">
                        </div>
                        <div>
                            <label for="passing"></label>
                            <input type="number" class="form-control passing" name="xpassing" placeholder="Passing" id="passing" required min="0" max="10">
                        </div>

                        <div>
                            <label for="dribbling"></label>
                            <input type="number" class="form-control dribbling" name="xdribbling" placeholder="Dribbling" id="dribbling" required min="0" max="10">
                        </div>

                        <div>
                            <label for="shooting"></label>
                            <input type="number" class="form-control shooting" name="xshooting" placeholder="Shooting" id="shooting" required min="0" max="10">
                        </div>

                        <div>
                            <label for="heading"></label>
                            <input type="number" class="form-control heading" name="xheading" placeholder="Heading" id="heading" required min="0" max="10">
                        </div>

                        <div>
                            <label for="kognitif"></label>
                            <input type="number" class="form-control kognitif" name="xkognitif" placeholder="Kognitif" id="kognitif" required min="0" max="10">
                        </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
<script>
        $(document).ready(function() {
            $('.editmodal').on('click', function() {
                //get data from button edit
                const id = $(this).data('id');
                const nama = $(this).data('nama');
                const posisi = $(this).data('posisi');
                const fisik = $(this).data('fisik');
                const passing = $(this).data('passing');
                const dribbling = $(this).data('dribbling');
                const shooting = $(this).data('shooting');
                const heading = $(this).data('heading');
                const kognitif = $(this).data('kognitif');
                // // set data form edit
                $('.id').val(id);
                $('.nama').val(nama);
                // $('.posisi').val(posisi).trigger('change');
                // $('.posisi' + posisi).prop('checked', true);
                // $('.posisi').val(posisi).prop('checked', posisi);
                // $('.posisi').val(posisi).prop('checked', true);
                // $('.posisi').val(posisi).attr('checked', true);
                // $('.posisi').val(posisi).prop('checked', posisi);
                // $('.posisi').prop('checked');
                // $('.posisi').val(posisi).click();
                // $(input[xposisi][posisi]).prop('checked', true);
                $('.fisik').val(fisik);
                $('.passing').val(passing);
                $('.dribbling').val(dribbling);
                $('.shooting').val(shooting);
                $('.heading').val(heading);
                $('.kognitif').val(kognitif);
                // call modal edit
                console.log(fisik);
                $('#editModal').modal("show");
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
   
    
</body>


</html>