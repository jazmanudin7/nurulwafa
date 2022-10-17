<div class="col-sm-12">
    <h3 align="center" class="m-t-none m-b">EDIT DATA KELAS</h3>
    <form class="form" autocomplete="off" role="form" id="form" action="<?php echo base_url(); ?>kelas/edit" novalidate method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label">
                Nama Kelas<span class="symbol "></span>
            </label>
            <input type="hidden" value="<?php echo $kelas['kode_kelas']; ?>" placeholder="ID Kelas" name="kode_kelas" class="form-control">
            <input type="text" autofocus value="<?php echo $kelas['nama_kelas']; ?>" placeholder="Nama Kelas" name="nama_kelas" class="form-control">
        </div>
        <div class="form-group">
            <label class="control-label">
                Nama Wali Kelas<span class="symbol "></span>
            </label>
            <input type="text" placeholder="Nama Wali Kelas" value="<?php echo $kelas['wali_kelas']; ?>" name="wali_kelas" class="form-control">
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