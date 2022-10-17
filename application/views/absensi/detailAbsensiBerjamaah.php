<div class="col-lg-12">
    <h3 align="center" class="m-t-none m-b">INPUT DATA ABSENSI BERJAMAAH</h3>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th style="width:150px;">No Absensi</th>
                <th style="width:5px;">:</th>
                <td><?php echo $absensi['no_absensi']; ?></td>
                <th style="width:150px;">Shalat</th>
                <th style="width:5px;">:</th>
                <td><?php echo $absensi['shalat']; ?></td>
            </tr>
            <tr>
                <th>Tahun Ajaran</th>
                <th>:</th>
                <td><?php echo $absensi['tahun_ajaran']; ?></td>
                <th>Semester</th>
                <th>:</th>
                <td><?php echo $absensi['semester']; ?></td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <th>:</th>
                <td><?php echo DateToIndo($absensi['tanggal']); ?></td>
                <th>Asrama</th>
                <th>:</th>
                <td><?php echo $absensi['nama_asrama']; ?></td>
            </tr>
        </thead>
    </table>

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Santri</th>
                <th>Jenps Kelamin</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($detail as $key => $d) {
                if ($d->keterangan == 'Izin') {
                    $bgcolor = "#66CDAA";
                } else if ($d->keterangan == "Sakit") {
                    $bgcolor = "#FF8C00";
                } else if ($d->keterangan == "Alfa") {
                    $bgcolor = "#FF0000";
                } else {
                    $bgcolor = "";
                }

            ?>
                <tr style="background-color:<?php echo $bgcolor; ?> ;color:black">
                    <td style="width:10px ;"><?php echo $no++; ?></td>
                    <td><?php echo $d->nama_santri; ?></td>
                    <td style="width:130px;"><?php echo $d->jk; ?></td>
                    <td style="width:100px;">
                        <select required data-id="<?php echo $d->nps; ?>" data-no="<?php echo $d->no_absensi; ?>" class="form-control chosen-select keterangan" id="<?php echo $d->nps; ?>">
                            <option <?php if ($d->keterangan == 'Hadir') {
                                        echo "selected";
                                    } ?> value="Hadir">Hadir</option>
                            <option <?php if ($d->keterangan == 'Izin') {
                                        echo "selected";
                                    } ?> value="Izin">Izin</option>
                            <option <?php if ($d->keterangan == 'Sakit') {
                                        echo "selected";
                                    } ?> value="Sakit">Sakit</option>
                            <option <?php if ($d->keterangan == 'Alfa') {
                                        echo "selected";
                                    } ?> value="Alfa">Alfa</option>
                        </select>
                    </td>
                </tr>
            <?php  } ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {

        $('.keterangan').click(function() {
            var no_absensi = $(this).attr("data-no");
            var nps = $(this).attr("data-id");
            var keterangan = $("#" + nps).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>absensi/updateKeteranganAbsensiBerjamaah",
                data: {
                    keterangan: keterangan,
                    no_absensi: no_absensi,
                    nps: nps
                },
                cache: false,
                success: function(respond) {

                    // $("#loadform").html(respond);
                }

            });

        });
    });
</script>