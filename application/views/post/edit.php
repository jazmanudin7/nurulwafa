<div class="col-sm-12">
    <h3 align="center" class="m-t-none m-b">EDIT DATA KELAS</h3>
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

    });
</script>