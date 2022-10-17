<div class="col-sm-12">
    <h3 align="center" class="m-t-none m-b">EDIT DATA KITAB</h3>
    <form class="form" autocomplete="off" role="form" id="form" action="<?php echo base_url(); ?>kitab/edit" novalidate method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label">
                Nama Kitab<span class="symbol "></span>
            </label>
            <input type="hidden" value="<?php echo $kitab['kode_kitab']; ?>" placeholder="ID Kitab" name="kode_kitab" class="form-control">
            <input type="text" autofocus placeholder="Nama Kitab" value="<?php echo $kitab['nama_kitab']; ?>" name="nama_kitab" class="form-control">
        </div>
        <div>
            <button class="btn btn-primary btn-block" name="submit" data-style="zoom-in">Simpan</button>
        </div>
    </form>
</div>


<script>
    $(document).ready(function() {


    });
</script>