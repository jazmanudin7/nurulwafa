<div class="appHeader bg-primary ">
    <div class="left">
        <a href="<?php echo base_url(); ?>Kitab" class="headerButton">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
        Input Data Kitab
    </div>
</div>
<div class="section full mt-2 mb-2">
    <div class="wide-block pb-1 pt-2">
        <div class="col-sm-12">
            <form class="form" autocomplete="off" role="form" id="form" action="<?php echo base_url(); ?>kitab/input" novalidate method="POST" enctype="multipart/form-data">
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Nama Kitab<span class="symbol "></span>
                        </label>
                        <input type="text" autofocus placeholder="Nama Kitab" name="nama_kitab" class="form-control">
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


    });
</script>