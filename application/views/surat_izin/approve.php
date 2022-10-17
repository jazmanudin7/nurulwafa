<div class="col-sm-12">
    <h3 align="center" class="m-t-none m-b">APPROVE SURAT IZIN</h3>
    <form class="form" autocomplete="off" role="form" id="form" action="<?php echo base_url(); ?>surat_izin/approve" novalidate method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label">
                Tanggal Kembali <span class="symbol "></span>
            </label>
            <input type="hidden" value="<?php echo $surat_izin['kode_absensi']; ?>" placeholder="Kode Absen" name="kode_absensi" class="form-control">
            <input type="text" id="tanggal" name="tanggal" class="form-control datepicker" placeholder="Tanggal">
        </div>
        <div class="form-group">
            <label class="control-label">
                Alasan Terlambat <span class="symbol "></span>
            </label>
            <textarea rows="5" type="text" id="alasan_terlambat" name="alasan_terlambat" class="form-control" placeholder="Alasan Terlambat"></textarea>
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

        $('#santri').autocomplete({
            serviceUrl: "<?php echo site_url(); ?>surat_izin/getSantri",
            onSelect: function(suggestion) {
                $('#nama_santri').val('' + suggestion.nama_santri);
                $('#nps').val('' + suggestion.nps);
            }
        });
    });
</script>