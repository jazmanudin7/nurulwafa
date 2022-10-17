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
       
        <div class="pageTitle">Input Data Santri</div>
       
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">
        <div class="section full mt-2 mb-2">
            <div class="wide-block pb-1 pt-2">
                <div class="col-sm-12">
        
                    <form action="<?php echo base_url(); ?>input/insert" method="POST" enctype="multipart/form-data">
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="control-label">
                                    NPS <span class="symbol "></span>
                                </label>
                                <input type="text" name="nps" placeholder="NPS" class="form-control">
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="control-label">
                                    Nama Santri<span class="symbol "></span>
                                </label>
                                <input type="text" autofocus placeholder="Nama Lengkap" name="nama_santri" class="form-control">
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="control-label">
                                    Kelas <span class="symbol "></span>
                                </label>
                                <select required class="form-control chosen-select" name="kode_kelas">
                                    <option value="">Pilih Kelas</option>
                                    <?php
                                    $kelas = $this->db->query("SELECT * FROM kelas")->result();
                                    foreach ($kelas as $key => $a) { ?>
                                        <option value="<?php echo $a->kode_kelas; ?>"><?php echo $a->nama_kelas; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="control-label">
                                    Asrama <span class="symbol "></span>
                                </label>
                                <select required class="form-control chosen-select" name="kode_asrama">
                                    <option value="">Pilih Asrama</option>
                                    <?php
                                    $asrama = $this->db->query("SELECT * FROM asrama")->result();
                                    foreach ($asrama as $key => $a) { ?>
                                        <option value="<?php echo $a->kode_asrama; ?>"><?php echo $a->nama_asrama; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="control-label">
                                    Tempat Lahir <span class="symbol "></span>
                                </label>
                                <input type="text" placeholder="Tempat Lahir" name="tempat_lahir" class="form-control">
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="control-label">
                                    Tanggal Lahir <span class="symbol "></span>
                                </label>
                                <input type="text" placeholder="Tanggal Lahir" name="tgl_lahir" class="form-control datepicker">
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="control-label">Jenis Kelamin <span class="symbol"></span></label>
                                <select required class="form-control chosen-select" name="jk">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Perempuan">Perempuan</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="control-label">
                                    Alamat Santri<span class="symbol "></span>
                                </label>
                                <textarea type="text" placeholder="Alamat" name="alamat" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="control-label">
                                    Kota <span class="symbol "></span>
                                </label>
                                <input type="text" placeholder="Kota" name="kota" class="form-control">
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="control-label">
                                    Konsulat <span class="symbol "></span>
                                </label>
                                <input type="text" placeholder="Konsulat" name="konsulat" class="form-control">
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="control-label">
                                    Nama Ayah <span class="symbol "></span>
                                </label>
                                <input type="text" placeholder="Nama Ayah" name="nama_ayah" class="form-control">
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="control-label">
                                    Pekerjaan Ayah <span class="symbol "></span>
                                </label>
                                <input type="text" placeholder="Pekerjaan Ayah" name="pekerjaan_ayah" class="form-control">
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="control-label">
                                    Pendidikan Ayah <span class="symbol "></span>
                                </label>
                                <input type="text" placeholder="Pendidikan Ayah" name="pendidikan_ayah" class="form-control">
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="control-label">
                                    Nama Ibu <span class="symbol "></span>
                                </label>
                                <input type="text" placeholder="Nama Ibu" name="nama_ibu" class="form-control">
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="control-label">
                                    Pekerjaan Ibu <span class="symbol "></span>
                                </label>
                                <input type="text" placeholder="Pekerjaan Ibu" name="pekerjaan_ibu" class="form-control">
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="control-label">
                                    Pendidikan Ibu <span class="symbol "></span>
                                </label>
                                <input type="text" placeholder="Pendidikan Ibu" name="pendidikan_ibu" class="form-control">
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="control-label">
                                    Alamat Ortu<span class="symbol "></span>
                                </label>
                                <textarea type="text" placeholder="Alamat Ortu" name="alamat_ortu" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="control-label">
                                    No HP <span class="symbol "></span>
                                </label>
                                <input type="text" placeholder="No HP" name="no_hp" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div>
                            <button class="btn btn-primary btn-block" name="submit" data-style="zoom-in">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- * App Capsule -->

    <!-- App Bottom Menu -->
    
    <!-- * App Bottom Menu -->

    <!-- App Sidebar -->
    <div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <!-- profile box -->

                    
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