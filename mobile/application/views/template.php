<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>Nurul Wafa</title>
    <meta name="description" content="Mobilekit HTML Mobile UI Kit">
    <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>assets/img/icon/192x192.png">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <link rel="<?php echo base_url(); ?>manifest" href="__manifest.json">


    <link href="<?php echo base_url(); ?>assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/sweetalert/sweetalert2.min.css" rel="stylesheet">

    <script src="<?php echo base_url(); ?>assets/js/lib/jquery-3.4.1.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url(); ?>assets/sweetalert/sweetalert2.min.js"></script>

    <!-- Bootstrap-->
    <script src="<?php echo base_url(); ?>assets/js/lib/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/lib/bootstrap.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
    <!-- Owl Carousel -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>
    <!-- jQuery Circle Progress -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/jquery-circle-progress/circle-progress.min.js"></script>
    <!-- Base Js File -->
    <script>
        $(document).ready(function() {

            $('.datepicker').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format: "yyyy-mm-dd"
            });


        });
    </script>
</head>

<body class="bg-white dark-mode-active">

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="javascript:;" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">Profile</div>
        <div class="right">
            <a href="javascript:;" class="headerButton">
                <ion-icon name="mail-outline"></ion-icon>
            </a>
            <a href="javascript:;" class="headerButton">
                <ion-icon name="person-add-outline"></ion-icon>
            </a>
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <?php echo $contents; ?>

    </div>
    <!-- * App Capsule -->

    <!-- App Bottom Menu -->
    <div class="appBottomMenu">
        <a href="<?php echo base_url(); ?>" class="item">
            <div class="col">
                <ion-icon name="home-outline"></ion-icon>
            </div>
        </a>

        <a href="javascript:;" class="item" data-toggle="modal" data-target="#sidebarPanel">
            <div class="col">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
        </a>
    </div>
    <!-- * App Bottom Menu -->

    <!-- App Sidebar -->
    <div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <!-- profile box -->
                    <div class="profileBox">
                        <div class="image-wrapper">
                            <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="image" class="imaged rounded">
                        </div>
                        <div class="in">
                            <strong><?php echo $this->session->userdata('nama_lengkap'); ?></strong>
                            <div class="text-muted">
                                <?php echo $this->session->userdata('level'); ?>
                            </div>
                        </div>
                        <a href="javascript:;" class="close-sidebar-button" data-dismiss="modal">
                            <ion-icon name="close"></ion-icon>
                        </a>
                    </div>

                    <ul class="listview flush transparent no-line image-listview mt-2">
                        <li>
                            <a href="<?php echo base_url(); ?>dashboard" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="home-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Home
                                </div>
                            </a>
                        </li>
                    </ul>


                    <?php if ($this->session->userdata('level') == 'Wali Santri') { ?>
                        <div class="listview-title mt-2 mb-1">
                            <span>Absensi</span>
                        </div>
                        <ul class="listview image-listview flush transparent no-line">
                            <li>
                                <a href="<?php echo base_url(); ?>absensi/detailAbsensiKehadiranSantri" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="book-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        <div>Absensi Kehadiran</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>absensi/detailAbsensiMengajiSantri" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="book-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        <div>Absensi Mengaji</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>absensi/detailAbsensiBerjamaahSantri" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="book-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        <div>Absensi Berjamaah</div>
                                    </div>
                                </a>
                            </li>
                        </ul>

                    <?php } ?>

                    <?php if ($this->session->userdata('level') != 'Wali Santri') { ?>
                        <div class="listview-title mt-2 mb-1">
                            <span>Data Master</span>
                        </div>
                        <ul class="listview image-listview flush transparent no-line">
                            <li>
                                <a href="<?php echo base_url(); ?>Santri" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="cube-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        <div>Data Santri</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Kelas" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="cube-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        <div>Data Kelas</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Asrama" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="cube-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        <div>Data Asrama</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Kitab" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="cube-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        <div>Data Kitab</div>
                                    </div>
                                </a>
                            </li>
                        </ul>

                        <div class="listview-title mt-2 mb-1">
                            <span>Absensi</span>
                        </div>
                        <ul class="listview image-listview flush transparent no-line">
                            <li>
                                <a href="<?php echo base_url(); ?>absensi/viewAbsensiBerjamaah" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="layers-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        <div>Absensi Berjamaah</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>absensi/viewAbsensiKehadiran" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="layers-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        <div>Absensi Kehadiran</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>absensi/viewAbsensiMengaji" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="layers-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        <div>Absensi Mengaji</div>
                                    </div>
                                </a>
                                <a href="<?php echo base_url(); ?>surat_izin" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="mail-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        Surat Izin
                                    </div>
                                </a>
                                <a href="<?php echo base_url(); ?>SP" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="warning-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        Surat Peringatan
                                    </div>
                                </a>
                            </li>
                        </ul>

                        <div class="listview-title mt-2 mb-1">
                            <span>Laporan</span>
                        </div>
                        <ul class="listview image-listview flush transparent no-line">
                            <li>
                                <a href="<?php echo base_url(); ?>laporan/laporanAbsensiBerjamaah" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="book-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        <div>Lap. Absensi Berjamaah</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>laporan/laporanAbsensiKehadiran" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="book-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        <div>Lap. Absensi Kehadiran</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>laporan/laporanAbsensiMengaji" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="book-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        <div>Lap. Absensi Mengaji</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>laporan/laporanSantri" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="book-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        <div>Lap. Santri</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>laporan/laporanSuratIzin" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="book-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        <div>Lap. Surat Izin</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>laporan/laporanPeringatan" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="book-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        <div>Lap. Surat Peringatan</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    <?php } ?>
                </div>

                <!-- sidebar buttons -->
                <div class="sidebar-buttons">
                    <a href="javascript:;" class="button">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </a>
                </div>
                <!-- * sidebar buttons -->
            </div>
        </div>
    </div>
    <!-- * App Sidebar -->

    <!-- ///////////// Js Files ////////////////////  -->
    <!-- Jquery -->
    <script src="<?php echo base_url(); ?>assets/js/base.js"></script>


</body>

</html>