<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>HONORKU</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href={{ url('assets/css/landing.css') }} rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-light bg-light static-top">
            <div class="container-fluid sm-flex" style="margin-right: 5px">
                <div class="container" style="display: block">
                    <img src="{{ url('assets/img/logo.png') }}" alt="logo" style="max-width: 5%">
                    <a class="navbar-brand" href="/" style="font-weight: bold; color: blue; font-family: sans-serif">HONORKU</a>
                </div>               
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 10px">
                      LOGIN
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="/login">Mahasiswa</a></li>
                      <li><a class="dropdown-item" href="/login">Dosen</a></li>
                      <li><a class="dropdown-item" href="/login">PAA</a></li>
                      <li><a class="dropdown-item" href="/login">KPS</a></li>
                      <li><a class="dropdown-item" href="/login">KADEP</a></li>
                      <li><a class="dropdown-item" href="/login">WADEK II</a></li>
                    </ul>
                  </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead" style="background-image: url({{asset('assets/img/bglanding.jpg')}})">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="text-center text-white">
                            <!-- Page heading-->
                            <h1 class="mb-5">HONORKU</h1>
                            <h2 class="mb-5">Urus Honor Sidang PKL Magang Gak Pake Ribet!</h2>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Footer-->
        <footer class="footer bg-light">
            <div class="container mb-0">
                    <p class="text-muted small mb-4 mb-lg-0" style="text-align: center">&copy; HONORKU 2021. All Rights Reserved.</p>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
