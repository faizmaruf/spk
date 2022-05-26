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
            <div class="h-75 w-75 bg-light m-auto">
                <div class="w-100 h-100 d-flex flex-column">
                    <div class="flex-lg-grow-1 bg-light d-flex flex-column">
                        <div class="mx-auto">
                            <img src="<?= base_url(); ?>/assets/images/faiz.png" alt="faiz" class="img-profile"></div>
                        <div>
                            <div class="m-auto d-flex flex-column">
                                <div class="w-100 h-100 m-auto d-flex">
                                    <div class="mx-auto">
                                        <h1>@faizmaruf_</h1>
                                    </div>
                                </div>
                                <div class="w-50 h-100 m-auto">
                                    <p class="text-center">I'm a Coder</p>
                                </div>
                                <div class="w-50 h-100 m-auto d-flex flex-row pt-lg-3 justify-content-around">
                                    <div class="my-2"><i class="fs-4 bi-instagram"></i></div>
                                    <div class="my-2"><i class="fs-4 bi-twitter"></i></div>
                                    <div class="my-2"><i class="fs-4 bi-github"></i></div>
                                    <div class="my-2"><i class="fs-4 bi-facebook"></i></div>
                                    <div class="my-2"><i class="fs-4 bi-linkedin"></i></div>
                                </div>
                                <div class="w-100 h-100 m-auto d-flex pt-3 ">
                                    <div class="btn m-auto"><a href="#" class="btn btn-cta rounded-pill">hire me</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <ul class="circles">
            <li>console.log()</li>
            <li>print_r()</li>
            <li>hello world</li>
            <li><i class="fs-4 bi-code-slash"></i></li>
            <li><i class="fs-4 bi-github"></i></li>
            <li><i class="fs-4 bi-apple"></i></li>
            <li><i class="fs-4 bi-git"></i></li>
            <li><i class="fs-4 bi-code-slash"></i></li>
            <li><i class="fs-4 bi-behance"></i></li>
            <li><i class="fs-4 bi-google"></i></li>
            <li><i class="fs-4 bi-nintendo-switch"></i></li>

        </ul>

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