<div class="appHeader bg-primary ">
    <div class="left">
        <a href="#" class="headerButton" data-toggle="modal" data-target="#sidebarPanel">
            <ion-icon name="menu-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">
        Detail Absensi Mengaji
    </div>
</div>
<ul class="listview image-listview">
    <li>
        <form class="form" autocomplete="off" role="form" id="form" action="<?php echo base_url(); ?>absensi/detailAbsensiMengajiSantri" novalidate method="POST" enctype="multipart/form-data">
            <div class="item">
                <div class="in">
                    <select class="form-control" name="bulan">
                        <option value="">PILIH BULAN</option>
                        <option <?php if ($bulan == '01') {
                                    echo "selected";
                                } ?> value="01">JAN</option>
                        <option <?php if ($bulan == '02') {
                                    echo "selected";
                                } ?> value="02">FEB</option>
                        <option <?php if ($bulan == '03') {
                                    echo "selected";
                                } ?> value="03">MAR</option>
                        <option <?php if ($bulan == '04') {
                                    echo "selected";
                                } ?> value="04">APR</option>
                        <option <?php if ($bulan == '05') {
                                    echo "selected";
                                } ?> value="05">MEI</option>
                        <option <?php if ($bulan == '06') {
                                    echo "selected";
                                } ?> value="06">JUN</option>
                        <option <?php if ($bulan == '07') {
                                    echo "selected";
                                } ?> value="07">JUL</option>
                        <option <?php if ($bulan == '08') {
                                    echo "selected";
                                } ?> value="08">AGU</option>
                        <option <?php if ($bulan == '09') {
                                    echo "selected";
                                } ?> value="09">SEP</option>
                        <option <?php if ($bulan == '10') {
                                    echo "selected";
                                } ?> value="10">OKT</option>
                        <option <?php if ($bulan == '11') {
                                    echo "selected";
                                } ?> value="11">NOV</option>
                        <option <?php if ($bulan == '12') {
                                    echo "selected";
                                } ?> value="12">DES</option>
                    </select>
                </div>
                <div class="in">
                    <select class="form-control" name="tahun">
                        <option value="">PILIH TAHUN</option>
                        <option <?php if ($tahun == '2022') {
                                    echo "selected";
                                } ?> value="2022">2022</option>
                        <option <?php if ($tahun == '2023') {
                                    echo "selected";
                                } ?> value="2023">2023</option>
                        <option <?php if ($tahun == '2024') {
                                    echo "selected";
                                } ?> value="2024">2024</option>
                    </select>
                </div>
                <div class="in">
                    <select class="form-control" name="waktu_mengaji">
                <option value="">Semua Waktu Mengaji</option>
                        <option <?php if ($waktu_mengaji == 'Pagi') {
                                    echo "selected";
                                } ?> value="Pagi">Pagi</option>
                        <option <?php if ($waktu_mengaji == 'Malam') {
                                    echo "selected";
                                } ?> value="Malam">Malam</option>
                    </select>
                </div>
                <span class="text-muted">
                    <button class="btn btn-primary btn-block" name="submit" data-style="zoom-in">Cari</button>
                </span>
            </div>
        </form>
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
                        <?php echo $d->keterangan; ?>
                    </span>
                </div>
            </a>
        </li>
    <?php } ?>
</ul>

<script type="text/javascript">
    $(document).ready(function() {


    });
</script>