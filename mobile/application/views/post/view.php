<div class="appHeader bg-primary ">
    <div class="left">
        <a href="<?php echo base_url(); ?>" class="headerButton">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
        Data Postingan
    </div>
    <div class="right">
        <a href="#" class="headerButton toggle-searchbox">
            <ion-icon name="search-outline"></ion-icon>
        </a>
        <a href="<?php echo base_url(); ?>post/input" class="headerButton">
            <ion-icon name="add-outline"></ion-icon>
        </a>
    </div>
</div>
<div id="search" class="appHeader">
    <form class="search-form" method="post" action="" autocomplete="off">
        <div class="form-group searchbox">
            <input type="search" name="judul" class="form-control" value="<?php echo $judul; ?>" placeholder="Judul">
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
<ul class="listview image-listview media">
    <?php foreach ($data as $d) {
    ?>
        <li>
            <a href="<?php echo base_url(); ?>post/edit/<?php echo $d['id']; ?>" class="item">
                <div class="imageWrapper">
                    <?php if ($d['foto'] == "") { ?>
                        <img src="<?php echo base_url(); ?>assets/img/post/logo.png" alt="image" class="imaged w64">
                    <?php } else { ?>
                        <img src="<?php echo base_url(); ?>upload/post/<?php echo $d['foto']; ?>" alt="image" class="imaged w64">
                    <?php } ?>
                </div>
                <div class="in">
                    <div>
                        <?php echo $d['judul']; ?>
                        <div class="text-muted"><?php echo DateToIndo($d['tanggal']); ?></div>
                    </div>
                </div>
            </a>
        </li>
    <?php } ?>
</ul>
<div style='margin-top: 10px;'>
    <?php echo $pagination; ?>
</div>
<br>