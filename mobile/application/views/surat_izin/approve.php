<div class="appHeader bg-primary ">
    <div class="left">
        <a href="<?php echo base_url(); ?>surat_izin" class="headerButton">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
        Approval Surat Izin
    </div>
</div>
<div class="section full mt-2 mb-2">
    <div class="wide-block pb-1 pt-2">
        <div class="col-sm-12">
            <form class="form" autocomplete="off" role="form" id="form" action="<?php echo base_url(); ?>surat_izin/approve" novalidate method="POST" enctype="multipart/form-data">
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Tanggal Kembali <span class="symbol "></span>
                        </label>
                        <input type="hidden" value="<?php echo $surat_izin['kode_absensi']; ?>" placeholder="Kode Absen" name="kode_absensi" class="form-control">
                        <input type="text" id="tanggal" name="tanggal" class="form-control datepicker" placeholder="Tanggal">
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Alasan Terlambat <span class="symbol "></span>
                        </label>
                        <textarea rows="5" type="text" id="alasan_terlambat" name="alasan_terlambat" class="form-control" placeholder="Alasan Terlambat"></textarea>
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <button class="btn btn-primary btn-block" name="submit" data-style="zoom-in">Sudah Kembali</button>
                    </div>
                </div>
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

        $('#santri').autocomplete({
            serviceUrl: "<?php echo site_url(); ?>surat_izin/getSantri",
            onSelect: function(suggestion) {
                $('#nama_santri').val('' + suggestion.nama_santri);
                $('#nps').val('' + suggestion.nps);
            }
        });
    });
</script>