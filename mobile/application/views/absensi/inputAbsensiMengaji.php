<div class="section full mt-2 mb-2">
    <div class="wide-block pb-1 pt-2">
        <div class="col-sm-12">
            <h3 align="center" class="m-t-none m-b">INPUT DATA ABSENSI BERJAMAAH</h3>
            <form class="form" autocomplete="off" role="form" id="form" action="<?php echo base_url(); ?>absensi/inputAbsensiMengaji" novalidate method="POST" enctype="multipart/form-data">
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            No Absensi <span class="symbol "></span>
                        </label>
                        <input type="text" value="<?php echo $codeotomatis; ?>" required name="no_absensi" placeholder="No Absensi" class="form-control">
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Tanggal <span class="symbol "></span>
                        </label>
                        <input type="text" required autocomplete="off" class="form-control datepicker" value="<?php echo date('Y-m-d'); ?>" name="tanggal">
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">Kitab <span class="symbol"></span></label>
                        <select required class="form-control chosen-select" name="kode_kitab">
                            <option value="">Pilih Kitab</option>
                            <?php
                            $kitab = $this->db->query("SELECT * FROM kitab")->result();
                            foreach ($kitab as $key => $k) { ?>
                                <option value="<?php echo $k->kode_kitab; ?>"><?php echo $k->nama_kitab; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">Kelas <span class="symbol"></span></label>
                        <select required class="form-control chosen-select" name="kode_kelas">
                            <option value="">Pilih Kelas</option>
                            <?php
                            $kelas = $this->db->query("SELECT * FROM kelas")->result();
                            foreach ($kelas as $key => $a) { ?>
                                <option value="<?php echo $a->kode_kelas; ?>"><?php echo $a->nama_kelas; ?></option>
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