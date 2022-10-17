<div class="appHeader bg-primary ">
    <div class="left">
        <a href="<?php echo base_url(); ?>SP" class="headerButton">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
        Edit Data Surat Peringatan
    </div>
    <div class="right">
        <a href="#" data-id="<?php echo $sp['kode_sp']; ?>" id="hapus" class="headerButton toggle-searchbox">
            <ion-icon name="trash-outline"></ion-icon>
        </a>
    </div>
</div>
<div class="section full mt-2 mb-2">
    <div class="wide-block pb-1 pt-2">
        <div class="col-sm-12">
            <form class="form" autocomplete="off" role="form" id="form" action="<?php echo base_url(); ?>sp/edit" novalidate method="POST" enctype="multipart/form-data">
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Nama Santri<span class="symbol"></span>
                        </label>
                        <input type="hidden" value="<?php echo $sp['kode_sp']; ?>" placeholder="Kode SP" name="kode_sp" class="form-control">
                        <input type="text" value="<?php echo $sp['nama_santri']; ?>" id="santri" name="nama_santri" autofocus placeholder="Nama Lengkap" class="form-control">
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            NPS <span class="symbol"></span>
                        </label>
                        <input type="text" value="<?php echo $sp['nps']; ?>" id="nps" name="nps" placeholder="NPS" class="form-control">
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Tanggal <span class="symbol"></span>
                        </label>
                        <div class="form-line">
                            <input type="text" value="<?php echo $sp['tanggal']; ?>" name="tanggal" class="form-control datepicker" placeholder="Tanggal">
                        </div>
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Keterangan <span class="symbol"></span>
                        </label>
                        <div class="form-line">
                            <textarea type="text" name="keterangan" class="form-control"><?php echo $sp['keterangan']; ?></textarea>
                        </div>
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
                title: "Hapus Surat Peringatan",
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
                    $(location).attr('href', '<?php echo base_url() ?>SP/hapus/' + kode);
                }
            })

        });
    });
</script>