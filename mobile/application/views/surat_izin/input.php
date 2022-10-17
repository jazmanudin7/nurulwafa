<div class="appHeader bg-primary ">
    <div class="left">
        <a href="<?php echo base_url(); ?>surat_izin" class="headerButton">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
        Input Surat Izin
    </div>
</div>
<div class="section full mt-2 mb-2">
    <div class="wide-block pb-1 pt-2">
        <div class="col-sm-12">
            <form class="form" autocomplete="off" role="form" id="form" action="<?php echo base_url(); ?>surat_izin/input" novalidate method="POST" enctype="multipart/form-data">
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Nama Santri<span class="symbol"></span>
                        </label>
                        <select required class="form-control chosen-select" name="nps">
                            <option value="">Pilih Santri</option>
                            <?php
                            $santri     = $this->db->query("SELECT * FROM santri WHERE santri.status = 'AKTIF' ")->result();
                            foreach ($santri as $d) { ?>
                                <option value="<?php echo $d->nps; ?>"><?php echo $d->nama_santri; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Dari <span class="symbol "></span>
                        </label>
                        <input type="text" id="dari" name="dari" class="form-control datepicker" placeholder="Dari">
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Sampai <span class="symbol "></span>
                        </label>
                        <input type="text" id="sampai" name="sampai" class="form-control datepicker" placeholder="Sampai">
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Alasan Izin <span class="symbol "></span>
                        </label>
                        <textarea rows="5" type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Alasan Izin"></textarea>
                    </div>
                </div>
                <br>
                <div>
                    <button class="btn btn-primary btn-block" name="submit" data-style="zoom-in">Simpan</button>
                </div>
                <br>
            </form>
        </div>
    </div>
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