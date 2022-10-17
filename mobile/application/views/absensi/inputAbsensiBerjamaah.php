<div class="section full mt-2 mb-2">
    <div class="wide-block pb-1 pt-2">
        <div class="col-sm-12">
            <h3 align="center" class="m-t-none m-b">INPUT DATA ABSENSI BERJAMAAH</h3>
            <form class="form" autocomplete="off" role="form" id="form" action="<?php echo base_url(); ?>absensi/inputAbsensiBerjamaah" novalidate method="POST" enctype="multipart/form-data">
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            No Absensi <span class="symbol"></span>
                        </label>
                        <input type="text" value="<?php echo $codeotomatis; ?>" required name="no_absensi" placeholder="No Absensi" class="form-control">
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Tanggal <span class="symbol"></span>
                        </label>
                        <input type="text" required autocomplete="off" class="form-control" value="<?php echo date('Y-m-d'); ?>" name="tanggal">
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">Shalat <span class="symbol"></span></label>
                        <select required class="form-control chosen-select" name="shalat">
                            <option value="">Pilih Shalat</option>
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
                        <label class="control-label">Asrama <span class="symbol"></span></label>
                        <select required class="form-control" name="kode_asrama">
                            <option value="">Pilih Asrama</option>
                            <?php
                            $asrama = $this->db->query("SELECT * FROM asrama")->result();
                            foreach ($asrama as $key => $a) { ?>
                                <option value="<?php echo $a->kode_asrama; ?>"><?php echo $a->nama_asrama; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary btn-block simpan" name="submit" data-style="zoom-in">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>