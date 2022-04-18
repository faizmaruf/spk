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
    <style>
        * {
            border: 1px yellowgreen solid;
        }
    </style>
</head>

<body>
    <div class="container ">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">tambah</button>
        <div class="d-flex w-100 h-100">

            <table class="table tbl">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Posisi</th>
                    <th>Fisik</th>
                    <th>Passing</th>
                    <th>Dribbling</th>
                    <th>Shotting</th>
                    <th>Heading</th>
                    <th>Kognitif</th>
                    <th>Aksi</th>
                </tr>
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


                            <a href="#" class="btn btn-info editmodal" data-toggle="modal" id="editbtn" data-id="<?= $d['id']; ?>" data-nama="<?= $d['nama']; ?>" data-posisi="<?= $d['posisi']; ?>" data-fisik="<?= $d['fisik']; ?>" data-passing="<?= $d['passing']; ?>" data-dribbling="<?= $d['dribbling']; ?>" data-shooting="<?= $d['shooting']; ?>" data-heading="<?= $d['heading']; ?>" data-kognitif="<?= $d['kognitif']; ?>">edit</a>
                            <a href="<?php echo site_url() . 'Home/delete' ?>?id=<?= $d['id']; ?>" type="button" class="btn btn-danger">hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <!-- The Modal Tambah -->
    <div class="modal" id="tambah">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Modal body..
                    <!-- coding disini -->
                    <form action="<?= site_url('Home/Add'); ?>" method="post" enctype="multipart/form-data">
                        <div>
                            <label for="nama"></label>
                            <input class="form-control" name="xname" placeholder="Nama Lengkap" id="nama" required>
                        </div>
                        <div>
                            <label for="posisi"></label>
                            <div class="form-control">
                                <input type="radio" name="xposisi" id="posisi" value="Flank" required>Flank
                                <input type="radio" name="xposisi" id="posisi" value="Pivot" required>Pivot
                                <input type="radio" name="xposisi" id="posisi" value="Anchor" required>Anchor
                            </div>
                        </div>
                        <div>
                            <label for="fisik"></label>
                            <input class="form-control" name="xfisik" placeholder="Fisik" id="fisik" required>
                        </div>
                        <div>
                            <label for="passing"></label>
                            <input class="form-control" name="xpassing" placeholder="Passing" id="passing" required>
                        </div>

                        <div>
                            <label for="dribbling"></label>
                            <input class="form-control" name="xdribbling" placeholder="Dribbling" id="dribbling" required>
                        </div>

                        <div>
                            <label for="shooting"></label>
                            <input class="form-control" name="xshooting" placeholder="Shooting" id="shooting" required>
                        </div>

                        <div>
                            <label for="heading"></label>
                            <input class="form-control" name="xheading" placeholder="Heading" id="heading" required>
                        </div>

                        <div>
                            <label for="kognitif"></label>
                            <input class="form-control" name="xkognitif" placeholder="Kognitif" id="kognitif" required>
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
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Modal body..
                    <!-- coding disini -->
                    <form action="<?= site_url('Home/Update'); ?>" method="post" enctype="multipart/form-data">
                        <div>
                            <label for="nama"></label>
                            <input class="form-control nama" name="xname" placeholder="Nama Lengkap" id="nama" required>
                        </div>
                        <div>
                            <label for="posisi"></label>
                            <div class="form-control posisi">
                                <input type="radio" class="posisi" name="xposisi" id="posisi" value="Flank" required>Flank
                                <input type="radio" class="posisi" name="xposisi" id="posisi" value="Pivot" required>Pivot
                                <input type="radio" class="posisi" name="xposisi" id="posisi" value="Anchor" required>Anchor
                            </div>
                        </div>
                        <div>
                            <label for="fisik"></label>
                            <input class="form-control fisik" name="xfisik" placeholder="Fisik" id="fisik" required>
                        </div>
                        <div>
                            <label for="passing"></label>
                            <input class="form-control passing" name="xpassing" placeholder="Passing" id="passing" required>
                        </div>

                        <div>
                            <label for="dribbling"></label>
                            <input class="form-control dribbling" name="xdribbling" placeholder="Dribbling" id="dribbling" required>
                        </div>

                        <div>
                            <label for="shooting"></label>
                            <input class="form-control shooting" name="xshooting" placeholder="Shooting" id="shooting" required>
                        </div>

                        <div>
                            <label for="heading"></label>
                            <input class="form-control heading" name="xheading" placeholder="Heading" id="heading" required>
                        </div>

                        <div>
                            <label for="kognitif"></label>
                            <input class="form-control kognitif" name="xkognitif" placeholder="Kognitif" id="kognitif" required>
                        </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <input class="id" type="hidden" name="xid" id="id">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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

</body>

</html>