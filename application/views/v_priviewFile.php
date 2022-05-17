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
    <div class="container">

        <!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
        <form method="post" action="<?php echo base_url("Home/form"); ?>" enctype="multipart/form-data">
            <!--
		-- Buat sebuah input type file
		-- class pull-left berfungsi agar file input berada di sebelah kiri
		-->
            <input type="file" name="file" value="Pilih File">

            <!--
		-- BUat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import
		-->
            <br>
            <input type="submit" name="preview" value="Preview" class="btn btn-warning">
        </form>

        <?php
        if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form
            if (isset($upload_error)) { // Jika proses upload gagal
                echo "<div style='color: red;'>" . $upload_error . "</div>"; // Muncul pesan error upload
                die; // stop skrip
            }

            // Buat sebuah tag form untuk proses import data ke database
            echo "<form method='post' action='" . base_url("Home/import") . "'>";

            // Buat sebuah div untuk alert validasi kosong
            echo "<div style='color: red;' id='kosong'>
		Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum terisi semua.
		</div>";

            echo "<table border='1' cellpadding='8'>
		<tr>
			<th colspan='5'>Preview Data</th>
		</tr>
		<tr>
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
                </tr>
		</tr>";
            $nomor=0;
            $numrow = 1;
            $kosong = 0;

            // Lakukan perulangan dari data yang ada di csv
            // $sheet adalah variabel yang dikirim dari controller
            foreach ($sheet as $row) {
                // START -->
                // Skrip untuk mengambil value nya
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set

                $get = array(); // Valuenya akan di simpan kedalam array,dimulai dari index ke 0
                foreach ($cellIterator as $cell) {
                    array_push($get, $cell->getValue()); // Menambahkan value ke variabel array $get
                }
                // <-- END

                // Ambil data value yang telah di ambil dan dimasukkan ke variabel $get
                $no = $nomor; 
                $nama = $get[0]; 
                $posisi = $get[1]; 
                $fisik = $get[2]; 
                $passing = $get[3]; 
                $dribbling = $get[4]; 
                $shooting = $get[5];
                $heading = $get[6]; 
                $kognitif = $get[7]; 
                

                // Cek jika semua data tidak diisi
                if ($nama == "" && $posisi == "" && $fisik == ""&& $passing == ""&& $dribbling == ""&& $shotting == ""&& $heading == ""&& $kognitif == "")
                    continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

                // Cek $numrow apakah lebih dari 1
                // Artinya karena baris pertama adalah nama-nama kolom
                // Jadi dilewat saja, tidak usah diimport
                if ($numrow > 1) {
                    // Validasi apakah semua data telah diisi
                   
                    $nama_td = (!empty($nama)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                    $posisi_td = (!empty($posisi)) ? "" : " style='background: #E07171;'"; // Jika posisi kosong, beri warna merah
                    $fisik_td = (!empty($fisik)) ? "" : " style='background: #E07171;'"; // Jika fisik, beri warna merah
                    $passing_td = (!empty($passing)) ? "" : " style='background: #E07171;'"; // Jika passing, beri warna merah
                    $dribbling_td = (!empty($dribbling)) ? "" : " style='background: #E07171;'"; // Jika dribbling, beri warna merah
                    $shooting_td = (!empty($shooting)) ? "" : " style='background: #E07171;'"; // Jika shooting, beri warna merah
                    $heading_td = (!empty($heading)) ? "" : " style='background: #E07171;'"; // Jika heading, beri warna merah
                    $kognitif_td = (!empty($kognitif)) ? "" : " style='background: #E07171;'"; // Jika kognitif, beri warna merah

                    // Jika salah satu data ada yang kosong
                    if ( $nama == "" && $posisi == "" && $fisik == ""&& $passing == ""&& $dribbling == ""&& $shotting == ""&& $heading == ""&& $kognitif == "") {
                        $kosong++; // Tambah 1 variabel $kosong
                    }

                    echo "<tr>";
                    echo "<td> " . $no . "</td>";
                    echo "<td" . $nama_td . ">" . $nama . "</td>";
                    echo "<td" . $posisi_td . ">" . $posisi . "</td>";
                    echo "<td" . $fisik_td . ">" . $fisik . "</td>";
                    echo "<td" . $passing_td . ">" . $passing . "</td>";
                    echo "<td" . $dribbling_td . ">" . $dribbling . "</td>";
                    echo "<td" . $shooting_td . ">" . $shooting . "</td>";
                    echo "<td" . $heading_td . ">" . $heading . "</td>";
                    echo "<td" . $kognitif_td . ">" . $kognitif . "</td>";
                    echo "</tr>";
                }

                $numrow++; // Tambah 1 setiap kali looping
                $nomor++; // Tambah 1 setiap kali looping
            }

            echo "</table>";

            // Cek apakah variabel kosong lebih dari 1
            // Jika lebih dari 1, berarti ada data yang masih kosong
            if ($kosong > 1) {
        ?>
                <script>
                    $(document).ready(function() {
                        // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
                        $("#jumlah_kosong").html('<?php echo $kosong; ?>');

                        $("#kosong").show(); // Munculkan alert validasi kosong
                    });
                </script>
        <?php

            } else { // Jika semua data sudah diisi
                echo "<hr>";

                // Buat sebuah tombol untuk mengimport data ke database
                echo "<button type='submit' name='import' class='btn btn-primary'>Import</button> ";
                echo "<a href='" . base_url("Home") . "' class='btn btn-danger'>Cancel</a>";
            }

            echo "</form>";
        }
        ?>


    </div>

</body>

</html>