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
<title>LAPORAN SURAT IZIN</title>
<div style="font-family: calibri;width:100%">
    <div class=" card">
        <div class="card-body" style="zoom:85%">
            <div class="col-lg-12">
                <h1 class="card-title" style="text-align: center; font-weight: bold;text-transform:uppercase">
                    LAPORAN SURAT IZIN <br>
                    TAHUN AJARAN <?php echo $tahun_ajaran; ?> <?php if ($semester != "") { echo "SEMESTER ".$semester; }else{ echo "SEMUA SEMESTER"; } ?><br>
                    <?php if ($jk != "") { echo "JENIS KELAMIN ".$jk; }else{ echo "SEMUA JENIS KELAMIN"; } ?><br>
                    <?php if ($dari != "") { ?>
                        PERIODE <?php echo DateToIndo($dari); ?> S/D <?php echo DateToIndo($sampai); ?>
                    <?php } ?>
                </h1>
            </div>

            <div class="col-lg-12">
                <table class="table table-hover table-striped table-sm table-bordered">
                    <thead>
                        <tr style="color:black;background-color:skyblue;text-align:center">
                            <th style="width:20px ;">No</th>
                            <th>NPS</th>
                            <th>Nama Lengkap</th>
                            <th>JK</th>
                            <th>Kelas</th>
                            <th>Asrama</th>
                            <th>Tgl Input</th>
                            <th>Tgl Izin</th>
                            <th>Jml Izin</th>
                            <th>Terlambat</th>
                            <th>Tgl Kembali</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no  = 1;
                        foreach ($data as $d) {

                            if ($d->tanggal_kembali != '0000-00-00') {
                                $bgcolor = "btn-info";
                            } else {
                                $bgcolor = "btn-danger";
                            }

                            $sampai         = $d->sampai;
                            $TglSampai      = new DateTime($sampai);
                            $dari           = $d->dari;
                            $Tgldari        = new DateTime($dari);

                            $jumlhaIzin     = $Tgldari->diff($TglSampai)->format("%d");

                            $sampai         = $d->sampai;
                            $TglSampai      = new DateTime($sampai);
                            $kembali        = $d->tanggal_kembali;
                            $tglKembali     = new DateTime($kembali);

                            $sisaIzin       = $TglSampai->diff($tglKembali)->format("%d");

            
                            if ($sisaIzin != 0) {
                                $bgcolors = "#bf0000";
                            } else {
                                $bgcolors = "#008956";
                            }

                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $d->nps; ?></td>
                                <td><?php echo $d->nama_santri; ?></td>
                                <td><?php echo $d->jk; ?></td>
                                <td><?php echo $d->nama_kelas; ?></td>
                                <td><?php echo $d->nama_asrama; ?></td>
                                <td><?php if (isset($d->tanggal)) {
                                        echo DateToIndo($d->tanggal) . " " . substr($d->tanggal, 12, 8);
                                    } ?></td>
                                <td><?php echo DateToIndo($d->dari); ?> - <?php echo DateToIndo($d->sampai); ?></td>
                                <td><?php echo $jumlhaIzin + 1; ?> Hari</td>
                                <td style="background-color: <?php echo $bgcolors; ?>;">
                                    <?php if ($d->tanggal_kembali != '0000-00-00') {
                                        echo $sisaIzin . " Hari";
                                    } else {
                                        echo "Belum Kembali";
                                    } ?>
                                </td>
                                <td style="background-color: <?php echo $bgcolors; ?>;">
                                    <?php if ($d->tanggal_kembali != '0000-00-00') {
                                        echo DateToIndo($d->tanggal_kembali);
                                    } else {
                                        echo "Belum Kembali";
                                    } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>