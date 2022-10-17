<div class="appHeader bg-primary ">
    <div class="left">
        <a href="<?php echo base_url(); ?>Kelas" class="headerButton">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
        Edit Data Kelas
    </div>
    <div class="right">
        <a href="#" data-id="<?php echo $kelas['kode_kelas']; ?>" id="hapus" class="headerButton toggle-searchbox">
            <ion-icon name="trash-outline"></ion-icon>
        </a>
    </div>
</div>
<div class="section full mt-2 mb-2">
    <div class="wide-block pb-1 pt-2">
        <div class="col-sm-12">
            <form class="form" autocomplete="off" role="form" id="form" action="<?php echo base_url(); ?>kelas/edit" novalidate method="POST" enctype="multipart/form-data">
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Nama Kelas<span class="symbol "></span>
                        </label>
                        <input type="hidden" value="<?php echo $kelas['kode_kelas']; ?>" placeholder="ID Kelas" name="kode_kelas" class="form-control">
                        <input type="text" autofocus value="<?php echo $kelas['nama_kelas']; ?>" placeholder="Nama Kelas" name="nama_kelas" class="form-control">
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Nama Wali Kelas<span class="symbol "></span>
                        </label>
                        <input type="text" placeholder="Nama Wali Kelas" value="<?php echo $kelas['wali_kelas']; ?>" name="wali_kelas" class="form-control">
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
                title: "Hapus Kelas",
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
                    $(location).attr('href', '<?php echo base_url() ?>kelas/hapus/' + kode);
                }
            })
        });

    });
</script>