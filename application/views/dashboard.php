<?php

$alumniSantri       = $this->db->query("SELECT * FROM santri WHERE status != 'Aktif' ")->num_rows();
$santriTidakAktif   = $this->db->query("SELECT * FROM santri WHERE status = 'Tidak Aktif' ")->num_rows();
$santriAKtif        = $this->db->query("SELECT * FROM santri WHERE status = 'Aktif' ")->num_rows();
$santriLaki2        = $this->db->query("SELECT * FROM santri WHERE status = 'Aktif' AND jk = 'LAKI-LAKI' ")->num_rows();
$santriPerempuan    = $this->db->query("SELECT * FROM santri WHERE status = 'Aktif' AND jk = 'PEREMPUAN' ")->num_rows();

$kelasBoy              = $this->db->query("SELECT * FROM kelas WHERE nama_kelas LIKE '%BOY%' ORDER BY nama_kelas ASC")->result();
$kelasGirl              = $this->db->query("SELECT * FROM kelas WHERE nama_kelas LIKE '%GIRL%' ORDER BY nama_kelas ASC")->result();

?>

<div class="row">
    <div class="col-lg-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Santri Aktif</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"><?php echo number_format($santriAKtif); ?></h1>
                <small>Santri</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Santri Tidak Aktif</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"><?php echo number_format($santriTidakAktif); ?></h1>
                <small>Santri</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Santri Laki-Laki</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"><?php echo number_format($santriLaki2); ?></h1>
                <small>Santri</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Santri Perempuan</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"><?php echo number_format($santriPerempuan); ?></h1>
                <small>Santri</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Alumni Santri</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"><?php echo number_format($alumniSantri); ?></h1>
                <small>Santri</small>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <h2 style="text-align:center">DATA KELAS LAKI-LAKI</h2>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nama Kelas</th>
                            <th>Wali Kelas</th>
                            <th>Jumlah Santri</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $TotjumlahSantri  = 0;
                        foreach ($kelasBoy as $k) {
                            $jumlahSantri              = $this->db->query("SELECT * FROM santri WHERE kode_kelas = '$k->kode_kelas' ")->num_rows();
                            $TotjumlahSantri            += $jumlahSantri;
                        ?>
                            <tr>
                                <td><?php echo $k->nama_kelas; ?></td>
                                <td><?php echo $k->wali_kelas; ?></td>
                                <th><?php echo $jumlahSantri; ?></th>
                            </tr>
                        <?php } ?>
                        <tr>
                            <th colspan='2'>TOTAL</th>
                            <th><?php echo $TotjumlahSantri; ?></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <h2 style="text-align:center">DATA KELAS PEREMPUAN</h2>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nama Kelas</th>
                            <th>Wali Kelas</th>
                            <th>Jumlah Santri</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $TotjumlahSantri  = 0;
                        foreach ($kelasGirl as $k) {
                            $jumlahSantri               = $this->db->query("SELECT * FROM santri WHERE kode_kelas = '$k->kode_kelas' ")->num_rows();
                            $TotjumlahSantri            += $jumlahSantri;
                        ?>
                            <tr>
                                <td><?php echo $k->nama_kelas; ?></td>
                                <td><?php echo $k->wali_kelas; ?></td>
                                <th><?php echo $jumlahSantri; ?></th>
                            </tr>
                        <?php } ?>
                        <tr>
                            <th colspan='2'>TOTAL</th>
                            <th><?php echo $TotjumlahSantri; ?></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>