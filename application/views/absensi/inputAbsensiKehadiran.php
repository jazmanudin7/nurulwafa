<div class="col-lg-12">
    <h3 align="center" class="m-t-none m-b">INPUT DATA ABSENSI KEHADIRAN</h3>
    <form class="form" autocomplete="off" role="form" id="form" action="<?php echo base_url(); ?>absensi/inputAbsensiKehadiran" novalidate method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label">
                No Absensi <span class="symbol "></span>
            </label>
            <input type="text" value="<?php echo $codeotomatis; ?>" required name="no_absensi" placeholder="No Absensi" class="form-control">
        </div>
        <div class="form-group" id="data_1">
            <label class="control-label">
                Tanggal <span class="symbol "></span>
            </label>
            <input type="text" required autocomplete="off" class="form-control datepicker" value="<?php echo date('Y-m-d'); ?>" name="tanggal">
        </div>
        <div class="form-group">
            <label class="control-label">Asrama <span class="symbol"></span></label>
            <select required class="form-control chosen-select" name="kode_asrama">
                <option value="">Pilih Asrama</option>
                <?php
                $asrama = $this->db->query("SELECT * FROM asrama")->result();
                foreach ($asrama as $key => $a) { ?>
                    <option value="<?php echo $a->kode_asrama; ?>"><?php echo $a->nama_asrama; ?></option>
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