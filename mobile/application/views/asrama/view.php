<div class="appHeader bg-primary ">
    <div class="left">
        <a href="<?php echo base_url(); ?>" class="headerButton">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
        Data Asrama
    </div>
    <div class="right">
        <a href="#" class="headerButton toggle-searchbox">
            <ion-icon name="search-outline"></ion-icon>
        </a>
        <a href="<?php echo base_url(); ?>Asrama/input" class="headerButton">
            <ion-icon name="add-outline"></ion-icon>
        </a>
    </div>
</div>
<div id="search" class="appHeader">
    <form class="search-form" method="post" action="" autocomplete="off">
        <div class="form-group searchbox">
            <input type="search" name="nama_asrama" class="form-control" value="<?php echo $nama_asrama; ?>" placeholder="Nama Asrama">
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
    <?php foreach ($data as $d) { ?>
        <li>
            <a href="<?php echo base_url(); ?>asrama/edit/<?php echo $d['kode_asrama']; ?>" class="item">
                <div class="in">
                    <div>
                        <?php echo $d['nama_asrama']; ?>
                        <footer><?php echo $d['rois']; ?></footer>
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