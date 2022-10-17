<div class="col-sm-12">
    <h3 align="center" class="m-t-none m-b">INPUT DATA KITAB</h3>
    <form class="form" autocomplete="off" role="form" id="form" action="<?php echo base_url(); ?>kitab/input" novalidate method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label">
                Nama Kitab<span class="symbol "></span>
            </label>
            <input type="text" autofocus placeholder="Nama Kitab" name="nama_kitab" class="form-control">
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