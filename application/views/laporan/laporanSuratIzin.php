<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <h5 class="card-title" align="center">LAPORAN PERIZINAN</h5>
                    <form autocomplete="off" class="formValidate" id="formValidate" method="POST" action="<?php echo base_url(); ?>laporan/cetakSuratIzin" target="_blank">

                        <div class="form-group">
                            <select class="form form-control chosen-select" name="nps" id="nps">
                                <option value="">~~ Pilih Santri ~~</option>
                                <?php foreach ($santri->result() as $k) { ?>
                                    <option value="<?php echo $k->nps; ?>"><?php echo $k->nama_santri; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-control chosen-select" name="jk">
                                <option value="">~~ Semua Jenis Kelamin ~~</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <select class=" chosen-select form-control" name="kode_kelas" id="kode_kelas">
                                <option value="">~~ Semua Kelas ~~</option>
                                <?php foreach ($kelas->result() as $k) { ?>
                                    <option value="<?php echo $k->kode_kelas; ?>"><?php echo $k->nama_kelas; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <select class=" chosen-select form-control" name="kode_asrama" id="kode_asrama">
                                <option value="">~~ Semua Asrama ~~</option>
                                <?php foreach ($asrama->result() as $k) { ?>
                                    <option value="<?php echo $k->kode_asrama; ?>"><?php echo $k->nama_asrama; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <select required class="form form-control chosen-select" name="tahun_ajaran" id="tahun_ajaran">
                                <option value="">~~ Pilih Tahun Ajaran ~~</option>
                                <?php foreach ($tahunajaran->result() as $k) { ?>
                                    <option value="<?php echo $k->tahun_ajaran; ?>"><?php echo $k->tahun_ajaran; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <select class="form-control chosen-select" name="semester">
                                <option value="">~~ Semua Semester ~~</option>
                                <option value="Genap">Genap</option>
                                <option value="Ganjil">Ganjil</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" placeholder="Dari" name="dari" class="form-control datepicker">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Sampai" name="sampai" class="form-control datepicker">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" name="cetak" class="btn btn-primary btn-block">
                                        <i class="fa fa-print mr-2"></i>
                                        CETAK
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" name="export" class="btn btn-success btn-block">
                                        <i class="fa fa-download mr-2"></i>
                                        <span>EXCEL</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {


    });
</script>