<style>
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
$asrama         = $this->db->query("SELECT * FROM asrama WHERE kode_asrama = '$kode_asrama' ")->row_array();
$kelas          = $this->db->query("SELECT * FROM kelas WHERE kode_kelas = '$kode_kelas' ")->row_array();

?>
<title>LAPORAN SANTRI</title>
<div style="font-family: calibri;width:200%">
    <div class="card">
        <div class="card-body" style="zoom:85%">
            <h1 class="card-title" style="text-align: center; font-weight: bold;text-transform:uppercase">
                LAPORAN SANTRI NURUL WAFA<br>
                <?php if ($kode_asrama != "") { ?>
                    ASRAMA <?php echo $asrama['nama_asrama']; ?><br>
                <?php } else { ?>
                    SEMUA ASRAMA<br>
                <?php } ?>
                <?php if ($kode_kelas != "") { ?>
                    KELAS <?php echo $kelas['nama_kelas']; ?><br>
                <?php } else { ?>
                    SEMUA KELAS<br>
                <?php } ?>
            </h1>
            <?php
            $no = 1;
            ?>
            <div class="col-lg-12">
                <table class="table table-hover table-striped table-sm table-bordered">
                    <thead>
                        <tr style="color:black;background-color:skyblue;text-align:left">
                            <th rowspan="2">No</th>
                            <th rowspan="2">NPS</th>
                            <th rowspan="2">Nama Karyawan</th>
                            <th rowspan="2">Kelas</th>
                            <th rowspan="2">Asrama</th>
                            <th rowspan="2">Jenis Kelamin</th>
                            <th rowspan="2">Tempat Lahir</th>
                            <th rowspan="2">Tgl Lahir</th>
                            <th rowspan="2">Alamat</th>
                            <th rowspan="2">Kota</th>
                            <th rowspan="2">Konsulat</th>
                            <th colspan="3">Ayah</th>
                            <th colspan="3">Ibu</th>
                            <th rowspan="2">Alamat Ortu</th>
                            <th rowspan="2">No HP</th>
                        </tr>
                        <tr style="color:black;background-color:grey;text-align:left">
                            <th>Nama Ayah</th>
                            <th>Pekerjaan Ayah</th>
                            <th>Pendidikan Ayah</th>
                            <th>Nama Ibu</th>
                            <th>Pekerjaan Ibu</th>
                            <th>Pendidikan Ibu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data as $d) {

                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $d->nps; ?></td>
                                <td><?php echo $d->nama_santri; ?></td>
                                <td><?php echo $d->nama_kelas; ?></td>
                                <td><?php echo $d->nama_asrama; ?></td>
                                <td><?php echo $d->jk; ?></td>
                                <td><?php echo $d->tempat_lahir; ?></td>
                                <td><?php echo DateToIndo($d->tgl_lahir); ?></td>
                                <td><?php echo $d->alamat; ?></td>
                                <td><?php echo $d->kota; ?></td>
                                <td><?php echo $d->konsulat; ?></td>
                                <td><?php echo $d->nama_ayah; ?></td>
                                <td><?php echo $d->pekerjaan_ayah; ?></td>
                                <td><?php echo $d->pendidikan_ayah; ?></td>
                                <td><?php echo $d->nama_ibu; ?></td>
                                <td><?php echo $d->pekerjaan_ibu; ?></td>
                                <td><?php echo $d->pendidikan_ibu; ?></td>
                                <td><?php echo $d->alamat_ortu; ?></td>
                                <td><?php echo $d->no_hp; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>