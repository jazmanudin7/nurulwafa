<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="table-responsive">
                    <div class="ibox-content">
                        <h3 align="center" class="m-t-none m-b">DATA SURAT IZIN</h3>
                        <div class="col-md-12">
                            <form class="form-horizontal" method="post" action="" autocomplete="off">
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <a class="input fa fa-plus-square btn-success btn"> Tambah Data</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="form-group">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                            <div class="form-line">
                                                <input type="text" value="<?php echo $nama_santri; ?>" name="nama_santri" class="form-control" placeholder="Nama Santri">
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                            <div class="form-line">
                                                <select class="form-control chosen-select" name="jk">
                                                    <option value="">~~ Semua Jenis Kelamin ~~</option>
                                                    <option <?php if($jk != ''){ echo "selected"; } ?>  value="Laki-Laki">Laki-Laki</option>
                                                    <option <?php if($jk != ''){ echo "selected"; } ?> value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                            <input type="submit" name="submit" class="btn btn-sm btn-info m-2-15 waves-effect" value="Cari Data">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form method="GET">
                                <div class="row clearfix">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <a class="delete_all fa fa-trash btn-sm btn btn-danger"> Hapus Select</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width:20px ;"><input type="checkbox" id="master"></th>
                                    <th style="width:20px ;">No</th>
                                    <th>NPS</th>
                                    <th>Nama Lengkap</th>
                                    <th>JK</th>
                                    <th>Tgl Izin</th>
                                    <th>Jml Izin</th>
                                    <th>Terlambat</th>
                                    <th>Tgl Kembali</th>
                                    <th style="width:170px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sno  = $row + 1;
                                foreach ($data as $d) {

                                    if ($d['tanggal_kembali'] != '0000-00-00') {
                                        $bgcolor = "btn-info";
                                    } else {
                                        $bgcolor = "btn-danger";
                                    }

                                    $sampai         = $d['sampai'];
                                    $TglSampai      = new DateTime($sampai);
                                    $dari           = $d['dari'];
                                    $Tgldari        = new DateTime($dari);

                                    $jumlhaIzin     = $Tgldari->diff($TglSampai)->format("%d");

                                    $sampai         = $d['sampai'];
                                    $TglSampai      = new DateTime($sampai);
                                    $kembali        = $d['tanggal_kembali'];
                                    $tglKembali     = new DateTime($kembali);

                                    $sisaIzin       = $TglSampai->diff($tglKembali)->format("%d");

                                    if ($sisaIzin != 0) {
                                        if ($d['sampai'] <= $d['tanggal_kembali']) {
                                            $bgcolors = "btn-danger";
                                        }else{
                                            $bgcolors = "btn-info";
                                        }
                                    } else {
                                        $bgcolors = "btn-info";
                                    }

                                ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="sub_chk" data-id="<?php echo $d['nps']; ?>">
                                        </td>
                                        <td><?php echo $sno++; ?></td>
                                        <td><?php echo $d['nps']; ?></td>
                                        <td><?php echo $d['nama_santri']; ?></td>
                                        <td><?php echo $d['jk']; ?></td>
                                        <td><?php echo DateToIndo($d['dari']); ?> - <?php echo DateToIndo($d['sampai']); ?></td>
                                        <td><?php echo $jumlhaIzin + 1; ?> Hari</td>
                                        <td>
                                            <button class="btn btn-sm <?php echo $bgcolors; ?>">
                                                <?php if ($d['tanggal_kembali'] != '0000-00-00') {
                                                    if ($d['sampai'] < $d['tanggal_kembali']) {
                                                        echo $sisaIzin . " Hari";
                                                    }else{
                                                        echo "Tidak Terlambat";
                                                    }
                                                } else {
                                                    echo "Belum Kembali";
                                                } ?>
                                            </button>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm <?php echo $bgcolor; ?>">
                                                <?php if ($d['tanggal_kembali'] != '0000-00-00') {
                                                    echo DateToIndo($d['tanggal_kembali']);
                                                } else {
                                                    echo "Belum Kembali";
                                                } ?>
                                            </button>
                                        </td>
                                        <td style="text-align: center;">
                                            <?php if ($d['tanggal_kembali'] == '0000-00-00') { ?>
                                                <a class="approve fa fa-check btn-info btn btn-sm" data-id="<?php echo $d['kode_absensi']; ?>"></a>
                                                <a class="detail fa fa-list btn-success btn btn-sm" data-id="<?php echo $d['kode_absensi']; ?>"></a>
                                                <a class="hapus fa fa-trash btn-danger btn btn-sm" data-id="<?php echo $d['kode_absensi']; ?>"></a>
                                                <a class="edit fa fa-edit btn-warning btn btn-sm" data-id="<?php echo $d['kode_absensi']; ?>"></a>
                                            <?php } else { ?>
                                                <a class="detail fa fa-list btn-success btn btn-sm" data-id="<?php echo $d['kode_absensi']; ?>"></a>
                                                <a class="disapprove fa fa-stop btn-danger btn btn-sm" data-id="<?php echo $d['kode_absensi']; ?>"></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div style='margin-top: 10px;'>
                            <?php echo $pagination; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modal-santri" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row" id="loadform">

                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(function() {

        $('#master').on('click', function(e) {
            if ($(this).is(':checked', true)) {
                $(".sub_chk").prop('checked', true);
            } else {
                $(".sub_chk").prop('checked', false);
            }
        });

        $('.delete_all').on('click', function(e) {
            var allVals = [];
            $(".sub_chk:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });
            if (allVals.length <= 0) {
                swal({
                    title: "Silahkan Select Checkbox Terlebih Dahulu",
                    type: "warning",
                });

            } else {

                var check = swal({
                    title: "Hapus Surat Izin",
                    text: "Yakin Akan Menghapus Data ini??",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Hapus",
                    closeOnConfirm: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                }).then((result) => {
                    if (result.value) {
                        var join_selected_values = allVals.join(",");
                        $.ajax({
                            url: "<?php echo base_url(); ?>surat_izin/delete_checkbox",
                            type: 'POST',
                            data: 'nps=' + join_selected_values,
                            success: function(data) {
                                console.log(data);
                                $(".sub_chk:checked").each(function() {
                                    $(this).parents("tr").remove();
                                });
                                swal(
                                    'Hapus',
                                    'Data Berhasil Di Hapus',
                                    'success'
                                );
                            },
                            error: function(data) {
                                alert(data.responseText);
                            }

                        });
                        $.each(allVals, function(index, value) {
                            $('table tr').filter("[data-row-id='" + value + "']").remove();
                        });
                    }
                });
            }

        });

        // Hapus Data santri
        $('.disapprove').click(function() {
            var kode = $(this).attr("data-id");
            swal({
                title: "Dibatalkan",
                text: "Yakin Akan Dibatalkan??",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Batalkan",
                closeOnConfirm: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
            }).then((result) => {
                if (result.value) {
                    swal(
                        'Approve',
                        'File Berhasil Di Dibatalkan',
                        'success'
                    );
                    $(location).attr('href', '<?php echo base_url() ?>surat_izin/disapprove/' + kode);
                }
            })

        });

        // Hapus Data santri
        $('.hapus').click(function() {
            var kode = $(this).attr("data-id");
            swal({
                title: "Hapus Surat Izin",
                text: "Yakin Akan Menghapus Data ini??",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Hapus",
                closeOnConfirm: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
            }).then((result) => {
                if (result.value) {
                    swal(
                        'Hapus',
                        'File Berhasil Di Hapus',
                        'success'
                    );
                    $(location).attr('href', '<?php echo base_url() ?>surat_izin/hapus/' + kode);
                }
            })

        });

        //Edit Data Modal
        $('.approve').click(function() {
            var kode_absensi = $(this).attr("data-id");
            $("#modal-santri").modal("show");
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>surat_izin/approve",
                data: {
                    kode_absensi: kode_absensi
                },
                cache: false,
                success: function(respond) {

                    $("#loadform").html(respond);
                }

            });

        });

        //Edit Data Modal
        $('.detail').click(function() {
            var kode_absensi = $(this).attr("data-id");
            $("#modal-santri").modal("show");
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>surat_izin/detail",
                data: {
                    kode_absensi: kode_absensi
                },
                cache: false,
                success: function(respond) {

                    $("#loadform").html(respond);
                }

            });

        });

        //Edit Data Modal
        $('.edit').click(function() {
            var kode_absensi = $(this).attr("data-id");
            $("#modal-santri").modal("show");
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>surat_izin/edit",
                data: {
                    kode_absensi: kode_absensi
                },
                cache: false,
                success: function(respond) {

                    $("#loadform").html(respond);
                }

            });

        });

        //Input Data Modal
        $('.input').click(function() {
            var kode_absensi = $(this).attr("data-id");
            $("#modal-santri").modal("show");
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>surat_izin/input",
                data: {
                    kode_absensi: kode_absensi
                },
                cache: false,
                success: function(respond) {

                    $("#loadform").html(respond);
                }

            });

        });

    });
</script>