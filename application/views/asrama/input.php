<div class="col-sm-12">
    <h3 align="center" class="m-t-none m-b">INPUT DATA ASRAMA</h3>
    <form class="form" autocomplete="off" role="form" id="form" action="<?php echo base_url(); ?>asrama/input" novalidate method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label">
                Nama Asrama<span class="symbol "></span>
            </label>
            <input type="text" autofocus placeholder="Nama Asrama" name="nama_asrama" class="form-control">
        </div>
        <div class="form-group">
            <label class="control-label">
                Nama Rois<span class="symbol "></span>
            </label>
            <input type="text" autofocus placeholder="Nama Rois" name="rois" class="form-control">
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