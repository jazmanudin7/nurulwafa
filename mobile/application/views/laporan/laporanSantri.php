<div class="appHeader bg-primary ">
    <div class="left">
        <a href="<?php echo base_url(); ?>" class="headerButton">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
        Lap. Santri
    </div>
</div>
<div class="section full mt-2 mb-2">
    <div class="col-sm-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <form class="formValidate" id="formValidate" method="POST" action="<?php echo base_url(); ?>laporan/cetakSantri" target="_blank">

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <select class=" chosen-select form-control" name="nps" id="nps">
                                <option value="">~~ Semua Santri ~~</option>
                                <?php foreach ($santri->result() as $k) { ?>
                                    <option value="<?php echo $k->nps; ?>"><?php echo $k->nama_santri; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <select class=" chosen-select form-control" name="jk" id="jk">
                                <option value="">~~ Semua Jenis Kelamin ~~</option>
                                <option value="LAKI-LAKI">LAKI-LAKI</option>
                                <option value="PEREMPUAN">PEREMPUAN</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <select class=" chosen-select form-control" name="kode_kelas" id="kode_kelas">
                                <option value="">~~ Semua Kelas ~~</option>
                                <?php foreach ($kelas->result() as $k) { ?>
                                    <option value="<?php echo $k->kode_kelas; ?>"><?php echo $k->nama_kelas; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <select class=" chosen-select form-control" name="kode_asrama" id="kode_asrama">
                                <option value="">~~ Semua Asrama ~~</option>
                                <?php foreach ($asrama->result() as $k) { ?>
                                    <option value="<?php echo $k->kode_asrama; ?>"><?php echo $k->nama_asrama; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <button type="submit" name="cetak" class="btn btn-primary btn-block">
                                <i class="fa fa-print mr-2"></i>
                                CETAK
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {


    });
</script>