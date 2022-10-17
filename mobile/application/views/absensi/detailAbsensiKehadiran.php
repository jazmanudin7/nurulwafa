<div class="appHeader bg-primary ">
    <div class="left">
        <a href="<?php echo base_url(); ?>absensi/viewAbsensiKehadiran" class="headerButton">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
        Detail Absensi Kehadiran
    </div>
    <div class="right">
        <a href="<?php echo base_url(); ?>absensi/editAbsensiKehadiran/<?php echo $absensi['no_absensi']; ?>" class="headerButton">
            <ion-icon name="pencil-outline"></ion-icon>
        </a>
        <a href="#" data-id="<?php echo $absensi['no_absensi']; ?>" id="hapus" class="headerButton">
            <ion-icon name="trash-outline"></ion-icon>
        </a>
    </div>
</div>
<ul class="listview image-listview">
    <li>
        <div class="item">
            <div class="in">
                <div>
                    <header><?php echo $absensi['tahun_ajaran']; ?></header>
                    <?php echo $absensi['nama_asrama']; ?>
                    <footer><?php echo $absensi['semester']; ?></footer>
                </div>
                <span class="text-muted"><?php echo DateToIndo($absensi['tanggal']); ?></span>
            </div>
        </div>
    </li>
</ul>
<ul class="listview image-listview">
    <?php
    foreach ($detail as $d) {
        if ($d->keterangan == 'Izin') {
            $bgcolor    = "#66CDAA";
            $color      = "white";
        } else if ($d->keterangan == "Sakit") {
            $bgcolor    = "#FF8C00";
            $color      = "white";
        } else if ($d->keterangan == "Alfa") {
            $bgcolor    = "#FF0000";
            $color      = "white";
        } else {
            $bgcolor    = "";
            $color      = "black";
        }
    ?>
        <li>
            <a href="#" class="item">
                <div class="in">
                    <div>
                        <header><?php echo $d->nps; ?></header>
                        <?php echo $d->nama_santri; ?>
                        <footer><?php echo $d->jk; ?></footer>
                    </div>
                    <span class="text-muted">
                        <select style="background-color:<?php echo $bgcolor; ?>;color:<?php echo $color; ?>" required data-id="<?php echo $d->nps; ?>" data-no="<?php echo $d->no_absensi; ?>" class="form-control keterangan" id="<?php echo $d->nps; ?>">
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
                    </span>
                </div>
            </a>
        </li>
    <?php } ?>
</ul>

<script type="text/javascript">
    $(document).ready(function() {

        $('.keterangan').click(function() {
            var no_absensi = $(this).attr("data-no");
            var nps = $(this).attr("data-id");
            var keterangan = $("#" + nps).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>absensi/updateKeteranganAbsensiKehadiran",
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

        $('#hapus').click(function() {
            var kode = $(this).attr("data-id");
            swal({
                title: "Hapus Absensi Kehadiran",
                text: "Yakin Akan Menghapus Data ini??",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Hapus",
                closeOnConfirm: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
            }).then((result) => {
                if (result.value) {
                    swal(
                        'Hapus',
                        'File Berhasil Di Hapus',
                        'success'
                    );
                    $(location).attr('href', '<?php echo base_url() ?>absensi/hapusAbsensiKehadiran/' + kode);
                }
            })
        });
    });
</script>