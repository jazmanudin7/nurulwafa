<div class="appHeader bg-primary ">
    <div class="left">
        <a href="<?php echo base_url(); ?>" class="headerButton">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
        Lap. Absensi Berjamaah
    </div>
</div>
<div class="section full mt-2 mb-2">
    <div class="col-sm-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <form autocomplete="off" class="formValidate" id="formValidate" method="POST" action="<?php echo base_url(); ?>laporan/cetakAbsensiBerjamaah" target="_blank">
                    <?php if ($this->session->userdata('level') != 'Wali Santri') { ?>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <select class="form form-control chosen-select" name="nps" id="nps">
                                    <option value="">~~ Semua Santri ~~</option>
                                    <?php foreach ($santri->result() as $k) { ?>
                                        <option value="<?php echo $k->nps; ?>"><?php echo $k->nama_santri; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
    
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <select required class="form form-control chosen-select" name="kode_asrama" id="kode_asrama">
                                    <option value="">~~ Semua Asrama ~~</option>
                                    <?php foreach ($asrama->result() as $k) { ?>
                                        <option value="<?php echo $k->kode_asrama; ?>"><?php echo $k->nama_asrama; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <select required class="form-control chosen-select" name="shalat">
                                <option value="">~~ Pilih Shalat ~~</option>
                                <option value="Subuh">Subuh</option>
                                <option value="Dzuhur">Dzuhur</option>
                                <option value="Ashar">Ashar</option>
                                <option value="Magrib">Magrib</option>
                                <option value="Isya">Isya</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <select required class="form form-control chosen-select" name="tahun_ajaran" id="tahun_ajaran">
                                <option value="">~~ Pilih Tahun Ajaran ~~</option>
                                <?php foreach ($tahunajaran->result() as $k) { ?>
                                    <option value="<?php echo $k->tahun_ajaran; ?>"><?php echo $k->tahun_ajaran; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <select class="form-control chosen-select" name="semester">
                                <option value="">~~ Semua Semester ~~</option>
                                <option value="Genap">Genap</option>
                                <option value="Ganjil">Ganjil</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input required type="text" placeholder="Dari" name="dari" class="form-control datepicker">
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input required type="text" placeholder="Sampai" name="sampai" class="form-control datepicker">
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