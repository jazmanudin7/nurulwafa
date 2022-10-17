<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="table-responsive">
                    <div class="ibox-content">
                        <h3 align="center" class="m-t-none m-b">DATA SURAT PERINGATAN</h3>
                        <div class="col-md-12">
                            <form class="form-horizontal" method="post" action="" autocomplete="off">
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <a class="input fa fa-plus-square btn-success btn"> Tambah Data</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="form-group">
                                        <div class="col-lg-4 col-md-4 col-sm-8 col-xs-7">
                                            <div class="form-line">
                                                <input type="text" value="<?php echo $nama_santri; ?>" name="nama_santri" class="form-control" placeholder="Nama Santri">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-8 col-xs-7">
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
                                    <th style="width:20px;"><input type="checkbox" id="master"></th>
                                    <th style="width:20px;">No</th>
                                    <th>NPS</th>
                                    <th>Nama Lengkap</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th style="width:140px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sno  = $row + 1;
                                foreach ($data as $d) {

                                    if ($d['tanggal'] != '0000-00-00') {
                                        $bgcolor = "btn-info";
                                    } else {
                                        $bgcolor = "btn-danger";
                                    }
                                ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="sub_chk" data-id="<?php echo $d['nps']; ?>">
                                        </td>
                                        <td><?php echo $sno++; ?></td>
                                        <td><?php echo $d['nps']; ?></td>
                                        <td><?php echo $d['nama_santri']; ?></td>
                                        <td>
                                            <?php if (isset($d['tanggal'])) {
                                                echo DateToIndo($d['tanggal']);
                                            } ?>
                                        </td>
                                        <td><?php echo $d['keterangan']; ?></td>
                                        <td style="text-align: right;">
                                            <div class="text-center">
                                                <a class="hapus fa fa-trash btn-danger btn btn-sm" data-id="<?php echo $d['kode_sp']; ?>"></a>
                                                <a class="edit fa fa-edit btn-warning btn btn-sm" data-id="<?php echo $d['kode_sp']; ?>"></a>
                                            </div>
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
                    title: "Hapus Surat Peringatan",
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
                            url: "<?php echo base_url(); ?>SP/delete_checkbox",
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
        $('.hapus').click(function() {
            var kode = $(this).attr("data-id");
            swal({
                title: "Hapus Surat Peringatan",
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
                    $(location).attr('href', '<?php echo base_url() ?>SP/hapus/' + kode);
                }
            })

        });

        //Edit Data Modal
        $('.edit').click(function() {
            var kode_sp = $(this).attr("data-id");
            $("#modal-santri").modal("show");
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>SP/edit",
                data: {
                    kode_sp: kode_sp
                },
                cache: false,
                success: function(respond) {

                    $("#loadform").html(respond);
                }

            });

        });

        //Input Data Modal
        $('.input').click(function() {
            var kode_sp = $(this).attr("data-id");
            $("#modal-santri").modal("show");
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>SP/input",
                data: {
                    kode_sp: kode_sp
                },
                cache: false,
                success: function(respond) {

                    $("#loadform").html(respond);
                }
            });
        });

    });
</script>