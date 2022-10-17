<div class="appHeader bg-primary ">
    <div class="left">
        <a href="<?php echo base_url(); ?>post" class="headerButton">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
        Edit Postingan
    </div>
    <div class="right">
        <a href="#" data-id="<?php echo $post['id']; ?>" id="hapus" class="headerButton toggle-searchbox">
            <ion-icon name="trash-outline"></ion-icon>
        </a>
    </div>
</div>
<div class="section full mt-2 mb-2">
    <div class="wide-block pb-1 pt-2">
        <div class="col-sm-12">
            <form class="form" autocomplete="off" role="form" id="form" action="<?php echo base_url(); ?>post/edit" novalidate method="POST" enctype="multipart/form-data">
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Judul <span class="symbol"></span>
                        </label>
                        <input type="hidden" name="id" value="<?php echo $post['id']; ?>" class="form-control" placeholder="ID">
                        <input type="text" name="judul" value="<?php echo $post['judul']; ?>" class="form-control" placeholder="Judul">
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Tanggal <span class="symbol"></span>
                        </label>
                        <input type="text" name="tanggal" value="<?php echo $post['tanggal']; ?>" class="form-control datepicker" placeholder="Tanggal">
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Deskripsi <span class="symbol"></span>
                        </label>
                        <textarea rows="5" type="text" name="deskripsi" class="form-control"><?php echo $post['deskripsi']; ?></textarea>
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Foto <span class="symbol"></span>
                        </label>
                        <input type="hidden" value="<?php echo $post['foto']; ?>" name="foto_old" lass="form-control" placeholder="Foto">
                        <input type="file" name="foto" lass="form-control" placeholder="Foto">
                    </div>
                </div>
                <br>
                <div>
                    <button class="btn btn-primary btn-block" name="submit" data-style="zoom-in">Simpan</button>
                </div>
                <br>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $('.datepicker').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true,
            format: "yyyy-mm-dd"
        });

        // Select Data Pelanggan
        $('.chosen-select').chosen({
            width: "100%"
        });


        $('#hapus').click(function() {
            var kode = $(this).attr("data-id");
            swal({
                title: "Hapus Postingan",
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
                    $(location).attr('href', '<?php echo base_url() ?>post/hapus/' + kode);
                }
            })

        });
    });
</script>