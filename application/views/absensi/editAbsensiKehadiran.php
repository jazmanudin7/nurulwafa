<div class="col-lg-12">
    <h3 align="center" class="m-t-none m-b">EDIT DATA ABSENSI BERJAMAAH</h3>
    <form class="form" autocomplete="off" role="form" id="form" action="<?php echo base_url(); ?>absensi/editAbsensiBerjamaah" novalidate method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label">
                No Absensi <span class="symbol "></span>
            </label>
            <input type="text" value="<?php echo $absensi['no_absensi']; ?>" required name="no_absensi" placeholder="No Absensi" class="form-control">
        </div>
        <div class="form-group" id="data_1">
            <label class="control-label">
                Tanggal <span class="symbol "></span>
            </label>
            <input type="text" value="<?php echo $absensi['tanggal']; ?>" class="form-control datepicker" name="tanggal">
        </div>
        <div class="form-group">
            <label class="control-label">Shalat <span class="symbol"></span></label>
            <select required class="form-control chosen-select" name="shalat">
                <option value="">Pilih Shalat</option>
                <option <?php if ($absensi['shalat'] == "Subuh") {
                            echo "selected";
                        } ?> value="Subuh">Subuh</option>
                <option <?php if ($absensi['shalat'] == "Dzuhur") {
                            echo "selected";
                        } ?> value="Dzuhur">Dzuhur</option>
                <option <?php if ($absensi['shalat'] == "Ashar") {
                            echo "selected";
                        } ?> value="Ashar">Ashar</option>
                <option <?php if ($absensi['shalat'] == "Magrib") {
                            echo "selected";
                        } ?> value="Magrib">Magrib</option>
                <option <?php if ($absensi['shalat'] == "Isya") {
                            echo "selected";
                        } ?> value="Isya">Isya</option>
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">Asrama <span class="symbol"></span></label>
            <select required class="form-control chosen-select" name="kode_asrama">
                <option value="">Pilih Asrama</option>
                <?php
                $asrama = $this->db->query("SELECT * FROM asrama")->result();
                foreach ($asrama as $key => $a) { ?>
                    <option <?php if ($absensi['kode_asrama'] == $a->kode_asrama) {
                                echo "selected";
                            } ?> value="<?php echo $a->kode_asrama; ?>"><?php echo $a->nama_asrama; ?></option>
                <?php } ?>
            </select>
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-block simpan" name="submit" data-style="zoom-in">Simpan</button>
        </div>
    </form>
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