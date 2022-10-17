<div class="appHeader bg-primary ">
    <div class="left">
        <a href="<?php echo base_url(); ?>" class="headerButton">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
        View Absensi Mengaji
    </div>
    <div class="right">
        <a href="<?php echo base_url(); ?>absensi/inputAbsensiMengaji" class="headerButton">
            <ion-icon name="add-outline"></ion-icon>
        </a>
    </div>
</div>
<ul class="listview image-listview">
    <li>
        <div class="item">
            <div class="in">
                <span class="text-muted">
                    <div class="extraHeader">
                        <form class="search-form" method="post" action="" autocomplete="off">
                            <div class="form-group searchbox">
                                <input type="text" value="<?php echo $tanggal; ?>" id="tanggal" name="tanggal" class="form-control datepicker" placeholder="Tanggal">
                                <i class="input-icon">
                                    <ion-icon name="search-outline"></ion-icon>
                                </i>
                                <input type="submit" name="submit" class="btn btn-sm btn-info m-2-15 waves-effect" value="Cari">
                            </div>
                        </form>
                    </div>
                </span>
            </div>
        </div>
    </li>
</ul>
<ul class="listview image-listview">
    <?php foreach ($data as $d) { ?>
        <li>
            <a href="<?php echo base_url(); ?>absensi/detailAbsensiMengaji/<?php echo $d['no_absensi']; ?>" class="item">
                <div class="in">
                    <div>
                        <header><?php echo $d['tahun_ajaran']; ?> - <?php echo $d['semester']; ?></header>
                        <?php echo $d['nama_kelas']; ?>
                        <footer><?php echo $d['nama_kitab']; ?></footer>
                    </div>
                    <span class="text-muted"><?php echo DateToIndo($d['tanggal']); ?></span>
                </div>
            </a>
        </li>
    <?php } ?>
</ul>
<div style='margin-top: 10px;'>
    <?php echo $pagination; ?>
</div>
<br>