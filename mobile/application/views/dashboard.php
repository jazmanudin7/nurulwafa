<!-- App Header -->
<div class="appHeader bg-primary">
    <div class="left">
        <a href="#" class="headerButton" data-toggle="modal" data-target="#sidebarPanel">
            <ion-icon name="menu-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">
        Nurul Wafa
    </div>
    <div class="right">
        <a href="<?php echo base_url(); ?>auth/logout" class="headerButton">
            <ion-icon name="log-out-outline"></ion-icon>
        </a>
    </div>
</div>

<div class="section mt-2">
    <div class="profile-head">
        <div class="avatar">
            <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="avatar" class="imaged w64 rounded">
        </div>
        <div class="in">
            <h3 class="name"><?php echo $this->session->userdata('nama_lengkap'); ?></h3>
            <h5 class="subtext"><?php echo $this->session->userdata('level'); ?></h5>
        </div>
    </div>
</div>
<?php

$nps                = $this->session->userdata('no_uniq');
$tahun_ajaran       = $this->session->userdata('tahun_ajaran');

$alumniSantri       = $this->db->query("SELECT * FROM santri WHERE status != 'TIDAK AKTIF' AND status != 'AKTIF' ")->num_rows();
$santriTidakAktif   = $this->db->query("SELECT * FROM santri WHERE status = 'TIDAK AKTIF' ")->num_rows();
$santriAktif        = $this->db->query("SELECT * FROM santri WHERE status = 'AKTIF' ")->num_rows();
$santriLaki2        = $this->db->query("SELECT * FROM santri WHERE status = 'AKTIF' AND jk = 'LAKI-LAKI' ")->num_rows();
$santriPerempuan    = $this->db->query("SELECT * FROM santri WHERE status = 'AKTIF' AND jk = 'PEREMPUAN' ")->num_rows();

$santri             = $this->db->query("SELECT * FROM santri INNER JOIN kelas ON kelas.kode_kelas = santri.kode_kelas INNER JOIN asrama ON asrama.kode_asrama = santri.kode_asrama WHERE santri.nps = '$nps' ")->row_array();

$kehadiranSakit     = $this->db->query("SELECT * FROM absensi_kehadiran_detail INNER JOIN absensi_kehadiran ON absensi_kehadiran.no_absensi = absensi_kehadiran_detail.no_absensi WHERE nps = '$nps' AND keterangan = 'Sakit' AND tahun_ajaran = '$tahun_ajaran' ")->num_rows();
$kehadiranIzin      = $this->db->query("SELECT * FROM absensi_kehadiran_detail INNER JOIN absensi_kehadiran ON absensi_kehadiran.no_absensi = absensi_kehadiran_detail.no_absensi WHERE nps = '$nps' AND keterangan = 'Izin' AND tahun_ajaran = '$tahun_ajaran' ")->num_rows();
$kehadiranAlfa      = $this->db->query("SELECT * FROM absensi_kehadiran_detail INNER JOIN absensi_kehadiran ON absensi_kehadiran.no_absensi = absensi_kehadiran_detail.no_absensi WHERE nps = '$nps' AND keterangan = 'Alfa' AND tahun_ajaran = '$tahun_ajaran'")->num_rows();

$mengajiSakit       = $this->db->query("SELECT * FROM absensi_mengaji_detail INNER JOIN absensi_mengaji ON absensi_mengaji.no_absensi = absensi_mengaji_detail.no_absensi WHERE nps = '$nps' AND keterangan = 'Sakit' AND tahun_ajaran = '$tahun_ajaran' ")->num_rows();
$mengajiIzin        = $this->db->query("SELECT * FROM absensi_mengaji_detail INNER JOIN absensi_mengaji ON absensi_mengaji.no_absensi = absensi_mengaji_detail.no_absensi WHERE nps = '$nps' AND keterangan = 'Izin' AND tahun_ajaran = '$tahun_ajaran'")->num_rows();
$mengajiAlfa        = $this->db->query("SELECT * FROM absensi_mengaji_detail INNER JOIN absensi_mengaji ON absensi_mengaji.no_absensi = absensi_mengaji_detail.no_absensi WHERE nps = '$nps' AND keterangan = 'Alfa' AND tahun_ajaran = '$tahun_ajaran'")->num_rows();

$berjamaahSakit     = $this->db->query("SELECT * FROM absensi_berjamaah_detail INNER JOIN absensi_berjamaah ON absensi_berjamaah.no_absensi = absensi_berjamaah_detail.no_absensi WHERE nps = '$nps' AND keterangan = 'Sakit'  AND tahun_ajaran = '$tahun_ajaran'")->num_rows();
$berjamaahIzin      = $this->db->query("SELECT * FROM absensi_berjamaah_detail INNER JOIN absensi_berjamaah ON absensi_berjamaah.no_absensi = absensi_berjamaah_detail.no_absensi WHERE nps = '$nps' AND keterangan = 'Izin'  AND tahun_ajaran = '$tahun_ajaran'")->num_rows();
$berjamaahAlfa      = $this->db->query("SELECT * FROM absensi_berjamaah_detail INNER JOIN absensi_berjamaah ON absensi_berjamaah.no_absensi = absensi_berjamaah_detail.no_absensi WHERE nps = '$nps' AND keterangan = 'Alfa'  AND tahun_ajaran = '$tahun_ajaran'")->num_rows();

$post               = $this->db->query("SELECT * FROM post ORDER BY tanggal DESC")->result();

if ($this->session->userdata('level') != 'Wali Santri') {
?>

    <div class="section full mt-2">
        <div class="profile-stats pl-2 pr-2">
            <a href="#" class="item">
                <strong><?php echo $santriAktif; ?></strong>Santri
            </a>
            <a href="#" class="item">
                <strong><?php echo $santriLaki2; ?></strong>Laki-laki
            </a>
            <a href="#" class="item">
                <strong><?php echo $santriPerempuan; ?></strong>Perempuan
            </a>
            <a href="#" class="item">
                <strong><?php echo $alumniSantri; ?></strong>Alumni
            </a>
        </div>
    </div>
<?php } else { ?>
    <div class="section full mt-2">
        <div class="profile-stats pl-2 pr-2">
            <a href="#" class="item">
                <strong><?php echo $kehadiranSakit; ?></strong>Sakit
            </a>
            <a href="#" class="item">
                <strong><?php echo $kehadiranIzin; ?></strong>Izin
            </a>
            <a href="#" class="item">
                <strong><?php echo $kehadiranAlfa; ?></strong>Alfa
            </a>
        </div>
    </div>
<?php } ?>
<div class="section mt-1 mb-2">
    <div class="profile-info">
        <div class="link">
            Welcome <?php echo $this->session->userdata('nama_lengkap'); ?>
        </div>
    </div>
</div>

<?php if ($this->session->userdata('level') == 'Wali Santri') { ?>
    <div class="section full">
        <div class="wide-block transparent p-0">
            <ul class="nav nav-tabs lined iconed" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#feed" role="tab">
                        <ion-icon name="grid-outline"></ion-icon>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#friends" role="tab">
                        <ion-icon name="people-outline"></ion-icon>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#bookmarks" role="tab">
                        <ion-icon name="bookmark-outline"></ion-icon>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#settings" role="tab">
                        <ion-icon name="warning-outline"></ion-icon>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#settingss" role="tab">
                        <ion-icon name="book-outline"></ion-icon>

                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="section full mb-2">
        <div class="tab-content">

            <div class="tab-pane fade show active" id="feed" role="tabpanel">
                <ul class="listview image-listview media">
                    <?php foreach ($post as $d) { ?>

                        <li>
                            <div class="item">
                                <div class="imageWrapper">
                                    <?php if ($d->foto == "") { ?>
                                        <a href="<?php echo base_url(); ?>post/detail/<?php echo $d->id; ?>"><img src="<?php echo base_url(); ?>assets/img/post/logo.png" alt="image" class="imaged w64"></a>
                                    <?php } else { ?>
                                        <a href="<?php echo base_url(); ?>post/detail/<?php echo $d->id; ?>"><img src="https://nurulwafa.site/upload/post/<?php echo $d->foto; ?>" alt="image" class="imaged w64"></a>
                                    <?php } ?>
                                </div>
                                <div class="in">
                                    <div>
                                        <a href="<?php echo base_url(); ?>post/detail/<?php echo $d->id; ?>"><?php echo $d->judul; ?></a>
                                        <a href="<?php echo base_url(); ?>post/detail/<?php echo $d->id; ?>">
                                            <div class="text-muted"><?php echo DateToIndo($d->tanggal); ?></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php  } ?>
                </ul>
            </div>
            <div class="tab-pane fade" id="friends" role="tabpanel">
                <ul class="listview image-listview flush transparent pt-1">
                    <li>
                        <a href="#" class="item">
                            <div class="in">
                                <div>
                                    <?php echo $santri['nps']; ?>
                                    <div class="text-muted">NPS</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <div class="in">
                                <div>
                                    <?php echo $santri['nama_santri']; ?>
                                    <div class="text-muted">Nama Santri</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <div class="in">
                                <div>
                                    <?php echo $santri['nama_asrama']; ?>
                                    <div class="text-muted">Asrama</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <div class="in">
                                <div>
                                    <?php echo $santri['rois']; ?>
                                    <div class="text-muted">Rois</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <div class="in">
                                <div>
                                    <?php echo $santri['nama_kelas']; ?>
                                    <div class="text-muted">Kelas</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <div class="in">
                                <div>
                                    <?php echo $santri['wali_kelas']; ?>
                                    <div class="text-muted">Wali Kelas</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <div class="in">
                                <div>
                                    <?php echo $santri['tempat_lahir']; ?>
                                    <div class="text-muted">Tempat Lahir</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <div class="in">
                                <div>
                                    <?php echo $santri['tgl_lahir']; ?>
                                    <div class="text-muted">Tanggal Lahir</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <div class="in">
                                <div>
                                    <?php echo $santri['jk']; ?>
                                    <div class="text-muted">Jenis Kelamin</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <div class="in">
                                <div>
                                    <?php echo $santri['alamat']; ?>
                                    <div class="text-muted">Alamat</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <div class="in">
                                <div>
                                    <?php echo $santri['kota']; ?>
                                    <div class="text-muted">Kota</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <div class="in">
                                <div>
                                    <?php echo $santri['no_hp']; ?>
                                    <div class="text-muted">No HP</div>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>


            <div class="tab-pane fade" id="bookmarks" role="tabpanel">
                <ul class="listview image-listview media flush transparent pt-1">
                    <li>
                        <div class="in item">
                            <div style="color:aquamarine">
                                Absensi Kehadiran
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>absensi/detailAbsensiKehadiranSantri" class="item">
                            <div class="in">
                                <div>
                                    Jumlah Sakit
                                </div>
                                <span class="badge badge-primary"><?php echo $kehadiranSakit; ?></span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>absensi/detailAbsensiKehadiranSantri" class="item">
                            <div class="in">
                                <div>
                                    Jumlah Izin
                                </div>
                                <span class="badge badge-warning"><?php echo $kehadiranIzin; ?></span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>absensi/detailAbsensiKehadiranSantri" class="item">
                            <div class="in">
                                <div>
                                    Jumlah Alfa
                                </div>
                                <span class="badge badge-danger"><?php echo $kehadiranAlfa; ?></span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="in item">
                            <div style="color:orange">
                                Absensi Mengaji
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>absensi/detailAbsensiMengajiSantri" class="item">
                            <div class="in">
                                <div>
                                    Jumlah Sakit
                                </div>
                                <span class="badge badge-primary"><?php echo $mengajiSakit; ?></span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>absensi/detailAbsensiMengajiSantri" class="item">
                            <div class="in">
                                <div>
                                    Jumlah Izin
                                </div>
                                <span class="badge badge-warning"><?php echo $mengajiIzin; ?></span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>absensi/detailAbsensiMengajiSantri" class="item">
                            <div class="in">
                                <div>
                                    Jumlah Alfa
                                </div>
                                <span class="badge badge-danger"><?php echo $mengajiAlfa; ?></span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="in item">
                            <div style="color:chartreuse">
                                Absensi Berjamaah
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>absensi/detailAbsensiBerjamaahSantri" class="item">
                            <div class="in">
                                <div>
                                    Jumlah Sakit
                                </div>
                                <span class="badge badge-primary"><?php echo $berjamaahSakit; ?></span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>absensi/detailAbsensiBerjamaahSantri" class="item">
                            <div class="in">
                                <div>
                                    Jumlah Izin
                                </div>
                                <span class="badge badge-warning"><?php echo $berjamaahIzin; ?></span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>absensi/detailAbsensiBerjamaahSantri" class="item">
                            <div class="in">
                                <div>
                                    Jumlah Alfa
                                </div>
                                <span class="badge badge-danger"><?php echo $berjamaahAlfa; ?></span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-pane fade" id="settings" role="tabpanel">
                <br>
                <h5 style="text-align:center">DATA SURAT PERINGATAN</h5>
                <br>
                <ul class="listview image-listview">
                    <?php
                    $data       = $this->db->query("SELECT * FROM sp 
                    INNER JOIN santri ON santri.nps = sp.nps
                    INNER JOIN asrama ON asrama.kode_asrama = santri.kode_asrama
                    INNER JOIN kelas ON kelas.kode_kelas = santri.kode_kelas
                    WHERE sp.nps = '$nps' ")->result();
                    foreach ($data as $d) { ?>
                        <li>
                            <a href="#" class="item">
                                <div class="in">
                                    <div>
                                        <header><?php echo $d->nps; ?></header>
                                        <?php echo $d->nama_santri; ?>
                                        <footer><?php echo $d->keterangan; ?> </footer>
                                    </div>
                                    <span class="text-muted"><?php echo DateToIndo($d->tanggal); ?></span>
                                </div>
                            </a>
                        </li>
                    <?php } ?>
                </ul>

            </div>
            <div class="tab-pane fade" id="settingss" role="tabpanel">
                <br>
                <h5 style="text-align:center">DATA SURAT IZIN</h5>
                <br>
                <ul class="listview image-listview">
                    <?php
                    $data       = $this->db->query("SELECT * FROM surat_izin 
                    INNER JOIN santri ON santri.nps = surat_izin.nps
                    WHERE surat_izin.nps = '$nps' ")->result();
                    foreach ($data as $d) { ?>
                        <li>
                            <a href="#" class="item">
                                <div class="in">
                                    <div>
                                        <footer> <?php if ($d->tanggal_kembali != "0000-00-00") {
                                                        echo "Kembali " . DateToIndo($d->tanggal_kembali);
                                                    } else {
                                                        echo "Belum Kembali";
                                                    } ?></footer>
                                        <?php echo $d->nama_santri; ?>
                                        <header><?php echo $d->keterangan; ?></header>
                                    </div>
                                    <span class="text-muted"><?php echo DateToIndo($d->dari); ?> s/d <?php echo DateToIndo($d->sampai); ?></span>
                                </div>
                            </a>
                        </li>
                    <?php } ?>
                </ul>

            </div>
        </div>
    </div>
<?php } ?>