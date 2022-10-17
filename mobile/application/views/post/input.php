<div class="appHeader bg-primary ">
    <div class="left">
        <a href="<?php echo base_url(); ?>post" class="headerButton">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
        Input Postingan
    </div>
</div>
<div class="section full mt-2 mb-2">
    <div class="wide-block pb-1 pt-2">
        <div class="col-sm-12">
            <form action="<?php echo base_url(); ?>post/input" method="post" enctype="multipart/form-data">
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Judul <span class="symbol"></span>
                        </label>
                        <input type="text" name="judul" class="form-control" placeholder="Judul">
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Tanggal <span class="symbol"></span>
                        </label>
                        <input type="text" name="tanggal" class="form-control datepicker" placeholder="Tanggal">
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Deskripsi <span class="symbol"></span>
                        </label>
                        <textarea rows="5" type="text" name="deskripsi" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Foto <span class="symbol"></span>
                        </label>
                        <input type="file" name="foto" id="foto" class="form-control" placeholder="Foto">
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
    });
</script>