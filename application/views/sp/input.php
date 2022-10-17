<div class="col-sm-12">
    <h3 align="center" class="m-t-none m-b">INPUT DATA SURAT PERINGATAN</h3>
    <form class="form" autocomplete="off" role="form" id="form" action="<?php echo base_url(); ?>SP/input" novalidate method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label">
                Nama Santri<span class="symbol"></span>
            </label>
            <select required class="form-control chosen-select" name="nps">
                <option value="">Pilih Santri</option>
                <?php
                $santri     = $this->db->query("SELECT * FROM santri WHERE santri.status = 'Aktif' ")->result();
                foreach ($santri as $d) { ?>
                    <option value="<?php echo $d->nps; ?>"><?php echo $d->nama_santri; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">
                Tanggal <span class="symbol"></span>
            </label>
            <input type="text" name="tanggal" class="form-control datepicker" placeholder="Tanggal">
        </div>
        <div class="form-group">
            <label class="control-label">
                Keterangan <span class="symbol"></span>
            </label>
            <textarea rows="5" type="text" name="keterangan" class="form-control"></textarea>
        </div>
        <div>
            <button class="btn btn-primary btn-block" name="submit" data-style="zoom-in">Simpan</button>
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