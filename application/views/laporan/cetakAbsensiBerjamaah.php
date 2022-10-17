<style>
    @page {
        size: A4
    }

    h1 {
        font-weight: bold;
        font-size: 20pt;
        text-align: center;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    .table th {
        padding: 8px 8px;
        border: 1px solid #000000;
        text-align: center;
    }

    .table td {
        padding: 3px 3px;
        border: 1px solid #000000;
    }

    .text-center {
        text-align: center;
    }

    .table-hover tbody tr:hover td,
    .table-hover tbody tr:hover th {
        background-color: #b8ffb6;
    }
</style>
<?php
$sampais        = $sampai;
$TglSampai      = new DateTime($sampais);
$daris          = $dari;
$Tgldari        = new DateTime($daris);

$jumlahhariini  = $Tgldari->diff($TglSampai)->format("%d");

$asrama         = $this->db->query("SELECT * FROM asrama WHERE kode_asrama = '$kode_asrama' ")->row_array();
?>
<title>LAPORAN ABSENSI BERJAMAAH</title>
<div style="font-family: calibri;width:
<?php if ($jumlahhariini < 11) {
    echo "80%";
} else if ($jumlahhariini < 23) {
    echo "100%";
} else {
    echo "100%";
} ?>">
    <div class=" card">
        <div class="card-body" style="zoom:85%">
            <div class="col-lg-12">
                <h1 class="card-title" style="text-align: center; font-weight: bold;text-transform:uppercase">
                    LAPORAN ABSENSI BERJAMAAH <?php echo $shalat; ?><br>
                    TAHUN AJARAN <?php echo $tahun_ajaran; ?> 
                    <?php if ($semester != '') { ?> 
                        SEMESTER <?php echo $semester; ?><br>
                    <?php } else { ?>
                        SEMUA SEMESTER<br>
                    <?php } ?>
                    <?php if ($kode_asrama != '') { ?>
                        ASRAMA <?php echo $asrama['nama_asrama']; ?><br>
                    <?php } else { ?>
                        SEMUA ASRAMA<br>
                    <?php } ?>
                    PERIODE <?php echo DateToIndo($dari); ?> S/D <?php echo DateToIndo($sampai); ?>
                </h1>
            </div>

            <div class="col-lg-12">
                <table class="table table-hover table-striped table-sm table-bordered">
                    <thead>
                        <tr style="color:black">
                            <th style="background-color:skyblue;width:0.5%;text-align:center" rowspan="2">No</th>
                            <th colspan="2" style="background-color:skyblue;text-align:center">Data Santri</th>
                            <th colspan="<?php echo $jumlahhariini + 1; ?>" style="background-color:skyblue;text-align:center">Tanggal</th>
                            <th colspan="4" style="background-color:skyblue;text-align:center;width:5%">Jumlah</th>
                        </tr>
                        <tr style="color:black;background-color:skyblue;text-align:center">
                            <th style="width:8%">Nama Santri</th>
                            <th style="width:3%">NPS</th>
                            <?php
                            while (strtotime($dari) <= strtotime($sampai)) {
                                $tanggal        = explode("-", $dari)[2];
                            ?>
                                <th style="width:0.1% ;"><?php echo $tanggal; ?></th>
                            <?php
                                $dari = date("Y-m-d", strtotime("+1 day", strtotime($dari)));
                            }
                            ?>
                            <th style="width:0.1%">Sakit</th>
                            <th style="width:0.1%">Izin</th>
                            <th style="width:0.1%">Alfa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data as $key => $d) {
                            $dari           = $daris;
                            $sampai         = $sampais;
                            $shalat         = $shalat;
                            $tahun_ajaran   = $tahun_ajaran;
                        ?>
                            <tr>
                                <td align="center"><?php echo $no++; ?></td>
                                <td><?php echo $d->nama_santri; ?></td>
                                <td align="center"><?php echo $d->nps; ?></td>
                                <?php
                                $jumlahalfa     = 0;
                                $jumlahizin     = 0;
                                $jumlahsakit    = 0;
                                while (strtotime($dari) <= strtotime($sampai)) {
                                    
                                    $absen = $this->db->query("SELECT 
                                    santri.nama_santri,
                                    santri.nps,
                                    MAX(IF (absensi_berjamaah.tanggal = '$dari' , keterangan , '')) AS keterangan,
                                    COUNT(CASE WHEN keterangan = 'Alfa' AND absensi_berjamaah.tanggal = '$dari'  THEN '' END) AS alfa,
                                    COUNT(CASE WHEN keterangan = 'Izin' AND absensi_berjamaah.tanggal = '$dari'  THEN '' END) AS izin,
                                    COUNT(CASE WHEN keterangan = 'Hadir' AND absensi_berjamaah.tanggal = '$dari'  THEN '' END) AS hadir,
                                    COUNT(CASE WHEN keterangan = 'Sakit' AND absensi_berjamaah.tanggal = '$dari'  THEN '' END) AS sakit
                                    FROM santri
                                    LEFT JOIN absensi_berjamaah_detail ON absensi_berjamaah_detail.nps = santri.nps 
                                    LEFT JOIN absensi_berjamaah ON absensi_berjamaah.no_absensi = absensi_berjamaah_detail.no_absensi 
                                    WHERE absensi_berjamaah_detail.nps = '$d->nps' AND absensi_berjamaah.shalat = '$shalat' AND absensi_berjamaah.tahun_ajaran = '$tahun_ajaran' 
                                    ORDER BY nama_santri ASC
                                    ")->row_array();

                                    if ($absen['keterangan'] == 'Sakit') {
                                        $bgcolor        = "#ffc107";
                                        $keterangan     = "S";
                                    } else  if ($absen['keterangan'] == 'Izin') {
                                        $bgcolor        = "#4caf50";
                                        $keterangan     = "I";
                                    } else  if ($absen['keterangan'] == 'Alfa') {
                                        $bgcolor        = "#ff5722";
                                        $keterangan     = "A";
                                    } else  if ($absen['keterangan'] == 'Hadir') {
                                        $bgcolor        = "";
                                        $keterangan     = "H";
                                    } else {
                                        $bgcolor        = "";
                                        $keterangan     = "";
                                    }
                                ?>
                                    <td bgcolor="<?php echo $bgcolor; ?>" align="center"><?php echo $keterangan; ?></td>
                                <?php
                                    $jumlahalfa     = $jumlahalfa + $absen['alfa'];
                                    $jumlahsakit    = $jumlahsakit + $absen['sakit'];
                                    $jumlahizin     = $jumlahizin + $absen['izin'];
                                    $dari = date("Y-m-d", strtotime("+1 day", strtotime($dari)));
                                }
                                ?>
                                <td align="center"><?php echo $jumlahsakit; ?></td>
                                <td align="center"><?php echo $jumlahizin; ?></td>
                                <td align="center"><?php echo $jumlahalfa; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>