<div class="col-sm-12">
    <h3 align="center" class="m-t-none m-b">EDIT DATA ASRAMA</h3>
    <form class="form" autocomplete="off" role="form" id="form" action="<?php echo base_url(); ?>asrama/edit" novalidate method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label">
                Nama Asrama<span class="symbol "></span>
            </label>
            <input type="hidden" value="<?php echo $asrama['kode_asrama']; ?>" placeholder="ID Kelas" name="kode_asrama" class="form-control">
            <input type="text" autofocus placeholder="Nama Asrama" value="<?php echo $asrama['nama_asrama']; ?>" name="nama_asrama" class="form-control">
        </div>
        <div class="form-group">
            <label class="control-label">
                Nama Rois<span class="symbol "></span>
            </label>
            <input type="text" autofocus placeholder="Nama Rois" value="<?php echo $asrama['rois']; ?>" name="rois" class="form-control">
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