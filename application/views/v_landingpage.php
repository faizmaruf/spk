<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="<?= base_url();?>/assets/bootstrap-5/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url();?>/assets/style.css" />
</head>

<body class="bg-light">

    <div class="container">
        <?php $this->load->view('v_navbar'); ?>
        <div class="container h-75 w-100 bg-light d-flex flex-wrap mt-5">
            <div class="flex-grow-1 bg-light d-flex">
                <div class="w-100 h-75 m-auto bg-light d-flex">
                    <div class="w-75 h-75 bg-light m-auto d-flex">
                        <div class="h-75 w-100 m-auto">
                            <div class="row-cols-1">
                                <h5>Faiz Alauddin Ma'ruf</h5>
                            </div>
                            <div class="row-cols-1 mt-2">
                                <h1>Sistem Pendukung Keputusan</h1>
                            </div>
                            <div class="row-cols-lg-auto mt-4">
                                <p>Web App pendukung keputusan untuk membantu pelatih memilih pemain futsal terbaik</p>
                            </div>
                            <div class=" d-flex flex-row mt-lg-">
                                <div class="btn"><a href="<?= site_url();?>/home" class="btn btn-cta rounded-pill">Go It !!</a>
                                </div>
                                <!-- <div class="btn"><a href="#" class="btn btn-outline-primary rounded-pill">tombol 1</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-grow-1 bg-light d-flex">
                <div class="w-100 h-75 m-auto bg-light d-flex">
                    <div class="w-50 h-75 bg-gradient m-auto">
                        <img src="<?= base_url();?>/assets/images/football_player_PNG22.png" class="w-100 " alt=""></div>
                </div>
            </div>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#ffffff" fill-opacity="1"
            d="M0,224L60,224C120,224,240,224,360,197.3C480,171,600,117,720,101.3C840,85,960,107,1080,96C1200,85,1320,43,1380,21.3L1440,0L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
        </path>
    </svg>

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