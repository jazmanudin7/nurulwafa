<div class="col-lg-12">
    <h3 align="center" class="m-t-none m-b">EDIT DATA ABSENSI MENGAJI</h3>
    <form class="form" autocomplete="off" role="form" id="form" action="<?php echo base_url(); ?>absensi/editAbsensiMengaji" novalidate method="POST" enctype="multipart/form-data">
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
            <label class="control-label">Kitab <span class="symbol"></span></label>
            <select required class="form-control chosen-select" name="kode_kitab">
                <option value="">Pilih Kitab</option>
                <?php
                $kitab = $this->db->query("SELECT * FROM kitab")->result();
                foreach ($kitab as $key => $a) { ?>
                    <option <?php if ($absensi['kode_kitab'] == $a->kode_kitab) {
                                echo "selected";
                            } ?> value="<?php echo $a->kode_kitab; ?>"><?php echo $a->nama_kitab; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">Kelas <span class="symbol"></span></label>
            <select required class="form-control chosen-select" name="kode_kelas">
                <option value="">Pilih Kelas</option>
                <?php
                $kelas = $this->db->query("SELECT * FROM kelas")->result();
                foreach ($kelas as $key => $a) { ?>
                    <option <?php if ($absensi['kode_kelas'] == $a->kode_kelas) {
                                echo "selected";
                            } ?> value="<?php echo $a->kode_kelas; ?>"><?php echo $a->nama_kelas; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">Waktu Mengaji <span class="symbol"></span></label>
            <select required class="form-control chosen-select" name="waktu_mengaji">
                <option value="">Pilih Waktu Mengaji</option>
                <option <?php if ($absensi['waktu_mengaji'] == "Pagi") {
                                echo "selected";
                            } ?> value="Pagi">Pagi</option>
                <option <?php if ($absensi['waktu_mengaji'] == "Malam") {
                                echo "selected";
                            } ?> value="Malam">Malam</option>
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