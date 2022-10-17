<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PESANTREN NURUL WAFA</title>

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

    <!-- DataTables -->
    <link href="<?php echo base_url(); ?>assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <!-- DatePicker -->
    <link href="<?php echo base_url(); ?>assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <!-- Chosen -->
    <link href="<?php echo base_url(); ?>assets/css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">

    <!-- Sweet Alert -->
    <link href="<?php echo base_url(); ?>assets/sweetalert/sweetalert2.min.css" rel="stylesheet">

    <!-- Ladda style -->
    <link href="<?php echo base_url(); ?>assets/css/plugins/ladda/ladda-themeless.min.css" rel="stylesheet">

    <!-- FooTable -->
    <link href="<?php echo base_url(); ?>assets/css/plugins/footable/footable.core.css" rel="stylesheet">

    <!-- AutoComplete -->
    <link href="<?php echo base_url(); ?>assets/jquery.autocomplete.css" rel="stylesheet" />

    <!-- Mainly scripts -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- AutoComplete -->
    <script src="<?php echo base_url(); ?>assets/jquery.autocomplete.js"></script>

    <!-- DataTables -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/dataTables/datatables.min.js"></script>

    <!-- Data picker -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url(); ?>assets/js/inspinia.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/pace/pace.min.js"></script>

    <!-- Sweet Alert -->
    <script src="<?php echo base_url(); ?>assets/sweetalert/sweetalert2.min.js"></script>

    <!-- Chosen -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/chosen/chosen.jquery.js"></script>

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

            // Select Data Pelanggan
            $('.chosen-select').chosen({
                width: "100%"
            });
        });
    </script>

</head>

<body style="zoom:90%">
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                                <img alt="image" class="img-circle" src="<?php echo base_url(); ?>assets/img/profile_small.jpg" />
                            </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $this->session->userdata('nama_lengkap'); ?></strong>
                                    </span> <span class="text-muted text-xs block"><?php echo $this->session->userdata('level'); ?><b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="#">Profile</a></li>
                                <li><a href="#">Contacts</a></li>
                                <li><a href="#">Mailbox</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url(); ?>auth/logout">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                        </div>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> </a>

                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Data Master</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="<?php echo base_url(); ?>santri">Data Santri</a></li>
                            <li><a href="<?php echo base_url(); ?>kelas">Data Kelas</a></li>
                            <li><a href="<?php echo base_url(); ?>asrama">Data Asrama</a></li>
                            <li><a href="<?php echo base_url(); ?>kitab">Data Kitab</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Absensi</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="<?php echo base_url(); ?>absensi/viewAbsensiBerjamaah">Absensi Berjamaah</a></li>
                            <li><a href="<?php echo base_url(); ?>absensi/viewAbsensiKehadiran">Absensi Kehadiran</a></li>
                            <li><a href="<?php echo base_url(); ?>absensi/viewAbsensiMengaji">Absensi Mengaji</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>surat_izin"><i class="fa fa-envelope"></i> <span class="nav-label">Surat Izin</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-book"></i> <span class="nav-label">Laporan</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="<?php echo base_url(); ?>laporan/laporanSantri">Lap. Santri</a></li>
                            <li><a href="<?php echo base_url(); ?>laporan/laporanAbsensiBerjamaah">Lap. Absensi Berjamaah</a></li>
                            <li><a href="<?php echo base_url(); ?>laporan/laporanAbsensiKehadiran">Lap. Absensi Kehadiran</a></li>
                            <li><a href="<?php echo base_url(); ?>laporan/laporanAbsensiMengaji">Lap. Absensi Mengaji</a></li>
                            <li><a href="<?php echo base_url(); ?>laporan/laporanSuratIzin">Lap. Perizinan</a></li>
                            <li><a href="<?php echo base_url(); ?>laporan/laporanPeringatan">Lap. Surat Peringatan</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>SP"><i class="fa fa-laptop"></i> <span class="nav-label">Surat Peringatan</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>post"><i class="fa fa-pencil"></i> <span class="nav-label">Postingan</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cogs"></i> <span class="nav-label">Settings</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="<?php echo base_url(); ?>users">Users</a></li>
                            <!-- <li><a href="<?php echo base_url(); ?>profile">Profile</a></li> -->
                        </ul>
                    </li>
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" action="search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Welcome <?php echo $this->session->userdata('nama_lengkap'); ?></span>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-envelope"></i> <span class="label label-warning">1</span>
                            </a>
                            <ul class="dropdown-menu dropdown-messages">
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a href="profile.html" class="pull-left">
                                            <img alt="image" class="img-circle" src="<?php echo base_url(); ?>assets/img/profile.jpg">
                                        </a>
                                        <div>
                                            <small class="pull-right">23h ago</small>
                                            <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                            <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="mailbox.html">
                                            <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i> <span class="label label-primary">8</span>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a href="mailbox.html">
                                        <div>
                                            <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                            <span class="pull-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="notifications.html">
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>auth/logout">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>

                </nav>
                <div class="wrapper wrapper-content" style="min-height:668px">
                    <?php echo $contents; ?>
                </div>
                <div class="footer">
                    <div class="pull-right">
                        Develover By <b>Jazmanudin</b>
                    </div>
                    <div>
                        <strong>Copyright</strong> 2022
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>