<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Login | Aplikasi Panen TBS Kelapa Sawit</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo base_url(); ?>assets/login/img/iconptpn7.png" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Modal -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet">
    <!-- Sweetalert2 CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/sweetalert2/sweetalert2.min.css'); ?>">
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/select2/select2.min.css'); ?>">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url(); ?>assets/login/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/login/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/login/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/login/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/login/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/login/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url(); ?>assets/login/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: BizLand - v3.6.0
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-search d-flex align-items-center"><a href="https://www.ptpn7.com/" target="_blank">ptpn7.com</a></i>
                <i class="bi bi-clock d-flex align-items-center ms-4"><span>
                        <div id="clock"></div>
                    </span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="https://www.instagram.com/op1ptpn7.official/" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
            </div>
        </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <!-- <h1 class="logo"><a href="#">s<span></span></a></h1>
                Uncomment below if you prefer to use an image logo -->
            <a href="index.html" class="logo"><img src="<?php echo base_url(); ?>assets/login/img/holding.png" alt="icon" height="70px"> <img src="<?php echo base_url(); ?>assets/login/img/iconptpn7.png" alt="icon" height="70px"></a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
                    <!-- <li><a class="nav-link scrollto " href="#portfolio">Unit</a></li> -->
                    <li><a class="nav-link scrollto" href="#tentang">Tentang</a></li>
                    <!-- <li><a class="nav-link scrollto" href="#contact">Kontak</a></li> -->
                </ul>

                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->


    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1>Selamat Datang Di <span>Aplikasi Panen TBS Kelapa Sawit</span></h1>
            <h2>PT. PERKEBUNAN NUSANTARA VII</h2>
            <div class="d-flex">
                <a class="btn-get-started scrollto modal-button">Login</a>
                <!-- <a href="https://youtu.be/_pg_cKK1oaM" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Lihat Video Profil Penus Disini</span></a> -->
            </div>
        </div>
    </section><!-- End Hero -->


    <main id="main">
        <!-- ======= Portfolio Section ======= -->


        <!-- ======= Contact Section ======= -->
        <section id="tentang" class="contact">
            <div class="container" data-aos="fade-up">



                <div class="section-title">
                    <h2>Tentang</h2>
                    <h3><span>Tentang Kami</span></h3>
                    <p>PTPN VII mengelola 3 unit usaha komoditas kelapa sawit pada wilayah kerja Provinsi Lampung, yaitu: Unit Rejosari Pematang Kiwah, Unit Bekri dan Unit Padang Ratu</p>
                </div>
                <div class="row mb-4">
                    <div class="col-md">
                        <div class="card">
                            <img src="<?php echo base_url() ?>assets/login/img/tentang/resa.jpg" width="266px" height="200px" class="card-img-top zoom" alt="card">
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="card">
                            <img src="<?php echo base_url() ?>assets/login/img/tentang/bekri.jpg" width="266px" height="200px" class="card-img-top zoom" alt="card">
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="card">
                            <img src="<?php echo base_url() ?>assets/login/img/tentang/patu.jpg" width="266px" height="200px" class="card-img-top zoom" alt="card">
                        </div>
                    </div>
                    <!-- <div class="col-md">
                        <div class="card">
                            <img src="<?php echo base_url() ?>/assets/img/portfolio/portofolio-4.jpg" width="200px" height="200px" class="card-img-top" alt="card">
                        </div>
                    </div> -->
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-6">
                        <div class="info-box mb-4">
                            <i class="bx bx-map"></i>
                            <h3>Alamat</h3>
                            <p>Kantor Direksi : Jalan Teuku Umar No.300 Bandar Lampung - 35141</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="bx bx-envelope"></i>
                            <h3>Email Kami</h3>
                            <p>sekretariat@ptpn7.com</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="bx bx-phone-call"></i>
                            <h3>Hubungi Kami</h3>
                            <p>0721-702233</p>
                        </div>
                    </div>

                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1DTqHM8xDjakfX8GgP6WhhTqzyNuI2zs&ehbc=2E312F" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="600" height="450" style="border:0;"></iframe>
                </div>
            </div>

        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="container py-4">
            <div class="copyright">
                <strong>Copyright &copy; <?= date('Y'); ?> Pajar Padillah</strong>
            </div>

        </div>
    </footer><!-- End Footer -->

    <div class="modal">
        <div class="modal-container">
            <div class="modal-left">
                <h1 class="modal-title"><i class="fa-sharp fa-solid fa-right-to-bracket"></i> Login</h1>
                <p class="modal-desc">Silahkan login dengan akun anda untuk masuk ke aplikasi!</p>
                <form method="post">
                    <div class="input-block">
                        <label for="username" class="input-label"><i class="fa-sharp fa-solid fa-user"></i> Username</label>
                        <input required type="username" autocomplete="off" name="username" id="username" placeholder="Username" autofocus>
                    </div>
                    <div class="input-block">
                        <label for="password" class="input-label"><i class="fa-sharp fa-solid fa-lock"></i> Password</label>
                        <input required class="form-password" type="password" name="password" id="password" placeholder="Password">
                    </div>
                    <input type="checkbox" class="form-checkbox"> Show password
                    <div class="modal-buttons"><br><br>
                        <!--  <a href="" class="">Forgot your password?</a> -->
                        <br><button type="submit" name="login" class="input-button">Login</button>
                    </div>
                </form>

                <!--  <p class="sign-up">Don't have an account? <a href="#">Sign up now</a></p> -->
            </div>
            <div class="modal-right">
                <img src="<?php echo base_url() ?>assets/login/img/kelapa.jpg" alt="">
            </div>
            <button class="icon-button close-button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
                    <path d="M 25 3 C 12.86158 3 3 12.86158 3 25 C 3 37.13842 12.86158 47 25 47 C 37.13842 47 47 37.13842 47 25 C 47 12.86158 37.13842 3 25 3 z M 25 5 C 36.05754 5 45 13.94246 45 25 C 45 36.05754 36.05754 45 25 45 C 13.94246 45 5 36.05754 5 25 C 5 13.94246 13.94246 5 25 5 z M 16.990234 15.990234 A 1.0001 1.0001 0 0 0 16.292969 17.707031 L 23.585938 25 L 16.292969 32.292969 A 1.0001 1.0001 0 1 0 17.707031 33.707031 L 25 26.414062 L 32.292969 33.707031 A 1.0001 1.0001 0 1 0 33.707031 32.292969 L 26.414062 25 L 33.707031 17.707031 A 1.0001 1.0001 0 0 0 32.980469 15.990234 A 1.0001 1.0001 0 0 0 32.292969 16.292969 L 25 23.585938 L 17.707031 16.292969 A 1.0001 1.0001 0 0 0 16.990234 15.990234 z"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Sweet Alert 2 -->
    <div class="flashdata" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <div class="flashdata-success" data-flashdata="<?= $this->session->flashdata('message-success'); ?>"></div>
    <div class="flashdata-failed" data-flashdata="<?= $this->session->flashdata('message-failed'); ?>"></div>
    <!-- ./Sweet Alert 2 -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url('assets/vendor/jquery/jquery-3.4.1.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/jquery/popper.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/sweetalert2/sweetalert2.all.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/select2/select2.min.js'); ?>"></script>

    <!-- Config JavaScript -->
    <script src="<?= base_url('assets/js/config-fancybox.js'); ?>"></script>
    <script src="<?= base_url('assets/js/config-sweetalert2.js'); ?>"></script>
    <script src="<?= base_url('assets/js/config-sidebar.js'); ?>"></script>
    <script src="<?= base_url('assets/js/config-select2.js'); ?>"></script>


    <!-- Vendor JS Files -->
    <script src="<?php echo base_url(); ?>assets/login/vendor/aos/aos.js"></script>
    <script src="<?php echo base_url(); ?>assets/login/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/login/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/login/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/login/vendor/php-email-form/validate.js"></script>
    <script src="<?php echo base_url(); ?>assets/login/vendor/purecounter/purecounter.js"></script>
    <script src="<?php echo base_url(); ?>assets/login/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/login/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <!-- Template Main JS File -->
    <script src="<?php echo base_url(); ?>assets/login/js/main.js"></script>
    <script src="<?php echo base_url(); ?>assets/login/js/modal.js"></script>
    <script>
        $(document).ready(function() {
            $('.zoom').hover(function() {
                $(this).addClass('transisi');
            }, function() {
                $(this).removeClass('transisi');
            });
        });
    </script>
    <script>
        setInterval(() => {
            let date = new Date()
            let clock = document.getElementById('clock')
            clock.innerHTML =
                date.getHours() + ":" +
                date.getMinutes() + ":" +
                date.getSeconds()
        }, 1000);
    </script>
    <!-- <script>
    $('#alert').modal('show'); 
</script> -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('.form-checkbox').click(function() {
                if ($(this).is(':checked')) {
                    $('.form-password').attr('type', 'text');
                } else {
                    $('.form-password').attr('type', 'password');
                }
            });
        });
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- Toastr -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Add Records -->
    <script>
        $(document).on("click", "#login", function(e) {
            e.preventDefault();

            var username = $("#username").val();
            var password = $("#password").val();

            if (username == "" || password == "") {
                alert("Both field is required");
            } else {
                $.ajax({
                    url: "<?php echo base_url(); ?>insert",
                    type: "post",
                    dataType: "json",
                    data: {
                        username: username,
                        password: password
                    },
                    success: function(data) {
                        if (data.responce == "success") {
                            $('#records').DataTable().destroy();
                            fetch();
                            $('#exampleModal').modal('hide');
                            toastr["success"](data.message);
                        } else {
                            toastr["error"](data.message);
                        }

                    }
                });

                $("#form")[0].reset();

            }

        });
    </script>

</body>

</html>