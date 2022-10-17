<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="table-responsive">
                    <div class="ibox-content">
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
                                                <input type="text" value="<?php echo $nama_lengkap; ?>" id="nama_lengkap" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-8 col-xs-7">
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
                                    <th>Nama Lengkap</th>
                                    <th>Nama Santri</th>
                                    <th>Usersname</th>
                                    <th>Password</th>
                                    <th style="width:100px ;">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sno  = $row + 1;
                                foreach ($data as $d) { ?>
                                    <tr id="">
                                        <td><?php echo $sno++; ?></td>
                                        <td><?php echo $d['nama_lengkap']; ?></td>
                                        <td><?php echo $d['nama_santri']; ?></td>
                                        <td><?php echo $d['username']; ?></td>
                                        <td><?php echo $d['password']; ?></td>
                                        <td>
                                            <div class="text-center">
                                                <a class="hapus fa fa-trash btn-danger btn btn-sm" data-id="<?php echo $d['id']; ?>"></a>
                                                <a class="edit fa fa-edit btn-warning btn btn-sm" data-id="<?php echo $d['id']; ?>"></a>
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

<div id="modal-users" class="modal fade" aria-hidden="true">
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


        // Hapus Data users
        $('.hapus').click(function() {
            var kode = $(this).attr("data-id");
            swal({
                title: "Hapus Users",
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
                    $(location).attr('href', '<?php echo base_url() ?>users/hapus/' + kode);
                }
            })

        });

        //Edit Data Modal
        $('.edit').click(function() {
            var id = $(this).attr("data-id");
            $("#modal-users").modal("show");
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>users/edit",
                data: {
                    id: id
                },
                cache: false,
                success: function(respond) {

                    $("#loadform").html(respond);
                }

            });

        });

        //Input Data Modal
        $('.input').click(function() {
            var id = $(this).attr("data-id");
            $("#modal-users").modal("show");
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>users/input",
                data: {
                    id: id
                },
                cache: false,
                success: function(respond) {

                    $("#loadform").html(respond);
                }

            });

        });

    });
</script>