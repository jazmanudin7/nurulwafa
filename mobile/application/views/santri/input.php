<div class="appHeader bg-primary ">
    <div class="left">
        <a href="<?php echo base_url(); ?>Santri" class="headerButton">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
        Input Data Santri
    </div>
</div>
<div class="section full mt-2 mb-2">
    <div class="wide-block pb-1 pt-2">
        <div class="col-sm-12">

            <form class="form" autocomplete="off" role="form" id="form" action="<?php echo base_url(); ?>santri/input" novalidate method="POST" enctype="multipart/form-data">
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            NPS <span class="symbol "></span>
                        </label>
                        <input type="text" name="nps" placeholder="NPS" class="form-control">
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Nama Santri<span class="symbol "></span>
                        </label>
                        <input type="text" autofocus placeholder="Nama Lengkap" name="nama_santri" class="form-control">
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Kelas <span class="symbol "></span>
                        </label>
                        <select required class="form-control chosen-select" name="kode_kelas">
                            <option value="">Pilih Kelas</option>
                            <?php
                            $kelas = $this->db->query("SELECT * FROM kelas")->result();
                            foreach ($kelas as $key => $a) { ?>
                                <option value="<?php echo $a->kode_kelas; ?>"><?php echo $a->nama_kelas; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Asrama <span class="symbol "></span>
                        </label>
                        <select required class="form-control chosen-select" name="kode_asrama">
                            <option value="">Pilih Asrama</option>
                            <?php
                            $asrama = $this->db->query("SELECT * FROM asrama")->result();
                            foreach ($asrama as $key => $a) { ?>
                                <option value="<?php echo $a->kode_asrama; ?>"><?php echo $a->nama_asrama; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Tempat Lahir <span class="symbol "></span>
                        </label>
                        <input type="text" placeholder="Tempat Lahir" name="tempat_lahir" class="form-control">
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Tanggal Lahir <span class="symbol "></span>
                        </label>
                        <input type="text" placeholder="Tanggal Lahir" name="tgl_lahir" class="form-control datepicker">
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">Jenis Kelamin <span class="symbol"></span></label>
                        <select required class="form-control chosen-select" name="jk">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Perempuan">Perempuan</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                        </select>
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Alamat Santri<span class="symbol "></span>
                        </label>
                        <textarea type="text" placeholder="Alamat" name="alamat" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Kota <span class="symbol "></span>
                        </label>
                        <input type="text" placeholder="Kota" name="kota" class="form-control">
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Konsulat <span class="symbol "></span>
                        </label>
                        <input type="text" placeholder="Konsulat" name="konsulat" class="form-control">
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Nama Ayah <span class="symbol "></span>
                        </label>
                        <input type="text" placeholder="Nama Ayah" name="nama_ayah" class="form-control">
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Pekerjaan Ayah <span class="symbol "></span>
                        </label>
                        <input type="text" placeholder="Pekerjaan Ayah" name="pekerjaan_ayah" class="form-control">
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Pendidikan Ayah <span class="symbol "></span>
                        </label>
                        <input type="text" placeholder="Pendidikan Ayah" name="pendidikan_ayah" class="form-control">
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Nama Ibu <span class="symbol "></span>
                        </label>
                        <input type="text" placeholder="Nama Ibu" name="nama_ibu" class="form-control">
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Pekerjaan Ibu <span class="symbol "></span>
                        </label>
                        <input type="text" placeholder="Pekerjaan Ibu" name="pekerjaan_ibu" class="form-control">
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Pendidikan Ibu <span class="symbol "></span>
                        </label>
                        <input type="text" placeholder="Pendidikan Ibu" name="pendidikan_ibu" class="form-control">
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            Alamat Ortu<span class="symbol "></span>
                        </label>
                        <textarea type="text" placeholder="Alamat Ortu" name="alamat_ortu" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">
                            No HP <span class="symbol "></span>
                        </label>
                        <input type="text" placeholder="No HP" name="no_hp" class="form-control">
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="control-label">Status <span class="symbol"></span></label>
                        <select required class="form form-control" name="status">
                            <option value="">Pilih Status</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <br>
                <div>
                    <button class="btn btn-primary btn-block" name="submit" data-style="zoom-in">Simpan</button>
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

        // Select Data Pelanggan
        $('.chosen-select').chosen({
            width: "100%"
        });
    });
</script>