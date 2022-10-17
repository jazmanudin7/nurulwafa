<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <h5 class="card-title" align="center">LAPORAN SANTRI</h5>
                    <form class="formValidate" id="formValidate" method="POST" action="<?php echo base_url(); ?>laporan/cetakSantri" target="_blank">

                        <div class="form-group">
                            <select class=" chosen-select form-control" name="nps" id="nps">
                                <option value="">~~ Semua Santri ~~</option>
                                <?php foreach ($santri->result() as $k) { ?>
                                    <option value="<?php echo $k->nps; ?>"><?php echo $k->nama_santri; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <select class=" chosen-select form-control" name="jk" id="jk">
                                <option value="">~~ Semua Jenis Kelamin ~~</option>
                                <option value="LAKI-LAKI">LAKI-LAKI</option>
                                <option value="PEREMPUAN">PEREMPUAN</option>
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
                            <select class="form-control chosen-select" name="tahun_masuk">
                                <option value="">~~ Semua Tahun Masuk ~~</option>
                                <option value="1377">2013</option>
                                <option value="1477">2014</option>
                                <option value="1577">2015</option>
                                <option value="1677">2016</option>
                                <option value="1777">2017</option>
                                <option value="1877">2018</option>
                                <option value="1977">2019</option>
                                <option value="2077">2020</option>
                                <option value="2177">2021</option>
                                <option value="2277">2022</option>
                            </select>
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