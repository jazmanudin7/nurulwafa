<div class="appHeader bg-primary ">
    <div class="left">
        <a href="<?php echo base_url(); ?>" class="headerButton">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
        Detail Postingan
    </div>
    <div class="right">
        <a href="#" class="headerButton toggle-searchbox">
            <ion-icon name="search-outline"></ion-icon>
        </a>
    </div>
</div>
<div class="blog-post">
    <div class="mb-2">
        <img src="https://nurulwafa.site/upload/post/<?php echo $post['foto']; ?>" alt="image" class="imaged square w-100">
    </div>
    <h1 class="title"><?php echo $post['judul']; ?></h1>

    <div class="post-header">
        <?php echo DateToIndo($post['tanggal']); ?>
    </div>
    <div class="post-body">
        <p>
            <?php echo $post['deskripsi']; ?>
        </p>
    </div>
</div>