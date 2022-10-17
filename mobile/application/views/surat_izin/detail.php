<div class="col-lg-12">
    <h3 align="center" class="m-t-none m-b">DETAIL SURAT IZIN</h3>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th style="width:150px;">NPS</th>
                <th style="width:5px;">:</th>
                <td><?php echo $surat_izin['nps']; ?></td>
            </tr>
            <tr>
                <th style="width:150px;">Nama Santri</th>
                <th style="width:5px;">:</th>
                <td><?php echo $surat_izin['nama_santri']; ?></td>
            </tr>
            <tr>
                <th>Tgl Input</th>
                <th>:</th>
                <td><?php echo DateToIndo($surat_izin['tanggal']); ?></td>
            </tr>
            <tr>
                <th>Tgl Izin</th>
                <th>:</th>
                <td><?php echo DateToIndo($surat_izin['dari']); ?> - <?php echo DateToIndo($surat_izin['sampai']); ?></td>

            </tr>
            <tr>
                <th>Keterangan Izin</th>
                <th>:</th>
                <td><?php echo $surat_izin['keterangan']; ?></td>
            </tr>
            <tr>
                <th>Alasan Terlambat</th>
                <th>:</th>
                <td><?php echo $surat_izin['alasan_terlambat']; ?></td>
            </tr>
        </thead>
    </table>
</div>