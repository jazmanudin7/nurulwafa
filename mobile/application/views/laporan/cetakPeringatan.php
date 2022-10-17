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
<title>LAPORAN SURAT PERINGATAN</title>
<div style="font-family: calibri;width:100%">
    <div class=" card">
        <div class="card-body" style="zoom:85%">
            <div class="col-lg-12">
                <h1 class="card-title" style="text-align: center; font-weight: bold;text-transform:uppercase">
                    LAPORAN SURAT PERINGATAN <br>
                    TAHUN AJARAN <?php echo $tahun_ajaran; ?> SEMESTER <?php echo $semester; ?><br>
                    <?php if ($dari != "") { ?>
                        PERIODE <?php echo DateToIndo($dari); ?> S/D <?php echo DateToIndo($sampai); ?>
                    <?php } ?>
                </h1>
            </div>

            <div class="col-lg-12">
                <table class="table table-hover table-striped table-sm table-bordered">
                    <thead>
                        <tr style="color:black;background-color:skyblue;text-align:center">
                            <th style="width:20px;">No</th>
                            <th>NPS</th>
                            <th>Nama Lengkap</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no  = 1;
                        foreach ($data as $d) {

                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $d->nps; ?></td>
                                <td><?php echo $d->nama_santri; ?></td>
                                <td><?php echo DateToIndo($d->tanggal); ?></td>
                                <td><?php echo $d->keterangan; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>