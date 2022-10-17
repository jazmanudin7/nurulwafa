<div class="appHeader bg-primary ">
    <div class="left">
        <a href="<?php echo base_url(); ?>Kitab" class="headerButton">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
        Edit Data Kitab
    </div>
    <div class="right">
        <a href="#" data-id="<?php echo $kitab['kode_kitab']; ?>" id="hapus" class="headerButton toggle-searchbox">
            <ion-icon name="trash-outline"></ion-icon>
        </a>
    </div>
</div>
<div class="section full mt-2 mb-2">
    <div class="wide-block pb-1 pt-2">
        <div class="col-sm-12">
            <form class="form" autocomplete="off" role="form" id="form" action="<?php echo base_url(); ?>kitab/edit" novalidate method="POST" enctype="multipart/form-data">
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Nama Kitab<span class="symbol "></span>
                        </label>
                        <input type="hidden" value="<?php echo $kitab['kode_kitab']; ?>" placeholder="ID Kitab" name="kode_kitab" class="form-control">
                        <input type="text" autofocus placeholder="Nama Kitab" value="<?php echo $kitab['nama_kitab']; ?>" name="nama_kitab" class="form-control">
                    </div>
                </div>
                <div>
                    <button class="btn btn-primary btn-block" name="submit" data-style="zoom-in">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {

        $('#hapus').click(function() {
            var kode = $(this).attr("data-id");
            swal({
                title: "Hapus Kitab",
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
                    $(location).attr('href', '<?php echo base_url() ?>kitab/hapus/' + kode);
                }
            })
        });

    });
</script>