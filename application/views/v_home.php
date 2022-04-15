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
</head>

<body>
    <div class="container ">
        <div class="d-flex w-100 h-100">

            <table class="table tbl">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Posisi</th>
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
                        <td><?= $d["passing"]; ?></td>
                        <td><?= $d["dribbling"]; ?></td>
                        <td><?= $d["shooting"]; ?></td>
                        <td><?= $d["heading"]; ?></td>
                        <td><?= $d["kognitif"]; ?></td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">tambah</button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit">edit</button>
                            <a href="<?php echo site_url() . 'Home/delete' ?>?id=<?= $d['id'] ?>" type="button" class="btn btn-danger">hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <?= $e = $data;
            var_dump($e);
            die; ?>
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
                                <input type="radio" name="xposisi" id="flank" value="Flank" required>Flank
                                <input type="radio" name="xposisi" id="pivot" value="Pivot" required>Pivot
                                <input type="radio" name="xposisi" id="anchor" value="Anchor" required>Anchor
                            </div>
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
    <!-- The Modal Edit -->
    <div class="modal" id="edit">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Modal body.. <?= $data["nama"]; ?>
                    <!-- coding disini -->
                    <form action="<?= site_url('Home/Add'); ?>" method="post" enctype="multipart/form-data">
                        <div>
                            <label for="nama"></label>
                            <input class="form-control" name="xname" placeholder="Nama Lengkap" id="nama" value="<?= $data['nama']; ?> required>
                        </div>
                        <div>
                            <label for=" posisi"></label>
                            <div class="form-control">
                                <input type="radio" name="xposisi" id="flank" value="Flank" required>Flank
                                <input type="radio" name="xposisi" id="pivot" value="Pivot" required>Pivot
                                <input type="radio" name="xposisi" id="anchor" value="Anchor" required>Anchor
                            </div>
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
</body>

</html>