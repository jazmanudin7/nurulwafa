<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="table-responsive">
                    <div class="ibox-content">
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
                                        <div class="col-lg-3 col-md-3 col-sm-8 col-xs-7">
                                            <div class="form-line">
                                                <input type="text" value="<?php echo $nama_kitab; ?>" id="nama_kitab" name="nama_kitab" class="form-control" placeholder="Nama kitab">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-8 col-xs-7">
                                            <input type="submit" name="submit" class="btn btn-sm btn-info m-2-15 waves-effect" value="Cari Data">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width:20px;">No</th>
                                    <th>Nama Kitab</th>
                                    <th style="width:100px ;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sno  = $row + 1;
                                foreach ($data as $d) { ?>
                                    <tr id="">
                                        <td><?php echo $sno++; ?></td>
                                        <td><?php echo $d['nama_kitab']; ?></td>
                                        <td>
                                            <div class="text-center">
                                                <a class="hapus fa fa-trash btn-danger btn btn-sm" data-id="<?php echo $d['kode_kitab']; ?>"></a>
                                                <a class="edit fa fa-edit btn-warning btn btn-sm" data-id="<?php echo $d['kode_kitab']; ?>"></a>
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

<div id="modal-kitab" class="modal fade" aria-hidden="true">
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

        $('.hapus').click(function() {
            var kode = $(this).attr("data-id");
            swal({
                title: "Hapus kitab",
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
                    $(location).attr('href', '<?php echo base_url() ?>kitab/hapus/' + kode);
                }
            })

        });

        //Edit Data Modal
        $('.edit').click(function() {
            var kode_kitab = $(this).attr("data-id");
            $("#modal-kitab").modal("show");
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>kitab/edit",
                data: {
                    kode_kitab: kode_kitab
                },
                cache: false,
                success: function(respond) {

                    $("#loadform").html(respond);
                }

            });

        });

        //Input Data Modal
        $('.input').click(function() {
            var kode_kitab = $(this).attr("data-id");
            $("#modal-kitab").modal("show");
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>kitab/input",
                data: {
                    kode_kitab: kode_kitab
                },
                cache: false,
                success: function(respond) {

                    $("#loadform").html(respond);
                }

            });

        });

    });
</script>