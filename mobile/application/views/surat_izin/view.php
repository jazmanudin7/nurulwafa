<div class="appHeader bg-primary ">
    <div class="left">
        <a href="<?php echo base_url(); ?>" class="headerButton">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
        Data Surat Izin
    </div>
    <div class="right">
        <a href="#" class="headerButton toggle-searchbox">
            <ion-icon name="search-outline"></ion-icon>
        </a>
        <a href="<?php echo base_url(); ?>surat_izin/input" class="headerButton">
            <ion-icon name="add-outline"></ion-icon>
        </a>
    </div>
</div>
<div id="search" class="appHeader">
    <form class="search-form" method="post" action="" autocomplete="off">
        <div class="form-group searchbox">
            <input type="search" name="nama_santri" class="form-control" value="<?php echo $nama_santri; ?>" placeholder="Nama Santri">
            <input type="submit" hidden name="submit" class="btn btn-sm btn-info m-2-15 waves-effect" value="Cari Data">
            <i class="input-icon">
                <ion-icon name="search-outline"></ion-icon>
            </i>
            <a href="javascript:;" class="ml-1 close toggle-searchbox">
                <ion-icon name="close-circle"></ion-icon>
            </a>
        </div>
    </form>
</div>
<ul class="listview image-listview">
    <?php foreach ($data as $d) {
        if ($d['tanggal_kembali'] != '0000-00-00') {
            $bgcolor = "btn-info";
        } else {
            $bgcolor = "btn-danger";
        }

        $sampai         = $d['sampai'];
        $TglSampai      = new DateTime($sampai);
        $dari           = $d['dari'];
        $Tgldari        = new DateTime($dari);

        $jumlhaIzin     = $Tgldari->diff($TglSampai)->format("%d");

        $sampai         = $d['sampai'];
        $TglSampai      = new DateTime($sampai);
        $kembali        = $d['tanggal_kembali'];
        $tglKembali     = new DateTime($kembali);

        $sisaIzin       = $TglSampai->diff($tglKembali)->format("%d");

        if ($sisaIzin != 0) {
            $color      = "#c90404";
            $terlambat  = "Terlambat " . $sisaIzin . " Hari";
        } else {
            $color      = "";
            $terlambat  = "Tidak Terlambat";
        }
    ?>
        <li>
            <a href="<?php echo base_url(); ?>surat_izin/edit/<?php echo $d['kode_absensi']; ?>" class="item">
                <div class="in">
                    <div>
                        <header><?php echo DateToIndo($d['dari']); ?> - <?php echo DateToIndo($d['sampai']) . " ( " . $jumlhaIzin + 1; ?> Hari )</header>
                        <?php echo $d['nama_santri']; ?>
                        <footer>
                            <?php if ($d['tanggal_kembali'] != '0000-00-00') {
                                echo $terlambat;
                            } else {
                                echo "Belum Kembali";
                            } ?>
                        </footer>
                    </div>
                    <span style="color:<?php echo $color; ?>;">
                        <?php if ($d['tanggal_kembali'] != '0000-00-00') {
                            echo DateToIndo($d['tanggal_kembali']);
                        } else {
                            echo "Belum Kembali";
                        } ?>
                    </span>
                </div>
            </a>
        </li>
    <?php } ?>
</ul>
<div style='margin-top: 10px;'>
    <?php echo $pagination; ?>
</div>
<br>

<script type="text/javascript">
    $(function() {



    });
</script>