<div class="col-sm-12">
    <h3 align="center" class="m-t-none m-b">EDIT DATA SANTRI</h3>
    <form class="form" autocomplete="off" role="form" id="form" action="<?php echo base_url(); ?>santri/edit" novalidate method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label">
                NPS <span class="symbol "></span>
            </label>
            <input type="text" value="<?php echo $santri['nps']; ?>" name="nps" placeholder="NPS" class="form-control">
        </div>
        <div class="form-group">
            <label class="control-label">
                Nama Santri<span class="symbol "></span>
            </label>
            <input type="text" value="<?php echo $santri['nama_santri']; ?>" autofocus placeholder="Nama Lengkap" name="nama_santri" class="form-control">
        </div>
        <div class="form-group">
            <label class="control-label">
                Kelas <span class="symbol "></span>
            </label>
            <select required class="form-control chosen-select" name="kode_kelas">
                <option value="">Pilih Kelas</option>
                <?php
                $kelas = $this->db->query("SELECT * FROM kelas")->result();
                foreach ($kelas as $key => $k) { ?>
                    <option <?php if ($santri['kode_kelas'] == $k->kode_kelas) {
                                echo "selected";
                            } ?> value="<?php echo $k->kode_kelas; ?>"><?php echo $k->nama_kelas; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">
                Asrama <span class="symbol "></span>
            </label>
            <select required class="form-control chosen-select" name="kode_asrama">
                <option value="">Pilih Asrama</option>
                <?php
                $asrama = $this->db->query("SELECT * FROM asrama")->result();
                foreach ($asrama AS $a) { ?>
                    <option <?php if ($santri['kode_asrama'] == $a->kode_asrama) {
                                echo "selected";
                            } ?> value="<?php echo $a->kode_asrama; ?>"><?php echo $a->nama_asrama; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">
                Tempat Lahir <span class="symbol "></span>
            </label>
            <input type="text" value="<?php echo $santri['tempat_lahir']; ?>" placeholder="Tempat Lahir" name="tempat_lahir" class="form-control">
        </div>
        <div class="form-group">
            <label class="control-label">
                Tanggal Lahir <span class="symbol "></span>
            </label>
            <input type="text" value="<?php echo $santri['tgl_lahir']; ?>" placeholder="Tanggal Lahir" name="tgl_lahir" class="form-control datepicker">
        </div>
        <div class="form-group">
            <label class="control-label">Jenis Kelamin <span class="symbol"></span></label>
            <select required class="form-control chosen-select" name="jk">
                <option value="">Pilih Jenis Kelamin</option>
                <option <?php if ($santri['jk'] == 'Perempuan') {
                            echo "selected";
                        } ?> value="Perempuan">Perempuan</option>
                <option <?php if ($santri['jk'] == 'Laki-Laki') {
                            echo "selected";
                        } ?> value="Laki-Laki">Laki-Laki</option>
            </select>
            </label>
        </div>
        <div class="form-group">
            <label class="control-label">
                Alamat Santri<span class="symbol "></span>
            </label>
            <textarea type="text" placeholder="Alamat" name="alamat" class="form-control"><?php echo $santri['alamat']; ?></textarea>
        </div>
        <div class="form-group">
            <label class="control-label">
                Kota <span class="symbol "></span>
            </label>
            <input type="text" value="<?php echo $santri['kota']; ?>" placeholder="Kota" name="kota" class="form-control">
        </div>
        <div class="form-group">
            <label class="control-label">
                Konsulat <span class="symbol "></span>
            </label>
            <input type="text" value="<?php echo $santri['konsulat']; ?>" placeholder="Konsulat" name="konsulat" class="form-control">
        </div>
        <div class="form-group">
            <label class="control-label">
                Nama Ayah <span class="symbol "></span>
            </label>
            <input type="text" value="<?php echo $santri['nama_ayah']; ?>" placeholder="Nama Ayah" name="nama_ayah" class="form-control">
        </div>
        <div class="form-group">
            <label class="control-label">
                Pekerjaan Ayah <span class="symbol "></span>
            </label>
            <input type="text" value="<?php echo $santri['pekerjaan_ayah']; ?>" placeholder="Pekerjaan Ayah" name="pekerjaan_ayah" class="form-control">
        </div>
        <div class="form-group">
            <label class="control-label">
                Pendidikan Ayah <span class="symbol "></span>
            </label>
            <input type="text" value="<?php echo $santri['pendidikan_ayah']; ?>" placeholder="Pendidikan Ayah" name="pendidikan_ayah" class="form-control">
        </div>
        <div class="form-group">
            <label class="control-label">
                Nama Ibu <span class="symbol "></span>
            </label>
            <input type="text" value="<?php echo $santri['nama_ibu']; ?>" placeholder="Nama Ibu" name="nama_ibu" class="form-control">
        </div>
        <div class="form-group">
            <label class="control-label">
                Pekerjaan Ibu <span class="symbol "></span>
            </label>
            <input type="text" value="<?php echo $santri['pekerjaan_ibu']; ?>" placeholder="Pekerjaan Ibu" name="pekerjaan_ibu" class="form-control">
        </div>
        <div class="form-group">
            <label class="control-label">
                Pendidikan Ibu <span class="symbol "></span>
            </label>
            <input type="text" value="<?php echo $santri['pendidikan_ibu']; ?>" placeholder="Pendidikan Ibu" name="pendidikan_ibu" class="form-control">
        </div>
        <div class="form-group">
            <label class="control-label">
                Alamat Ortu<span class="symbol "></span>
            </label>
            <textarea type="text" placeholder="Alamat Ortu" name="alamat_ortu" class="form-control"><?php echo $santri['alamat_ortu']; ?></textarea>
        </div>
        <div class="form-group">
            <label class="control-label">
                No HP <span class="symbol "></span>
            </label>
            <input type="text" value="<?php echo $santri['no_hp']; ?>" placeholder="No HP" name="no_hp" class="form-control">
        </div>
        <div class="form-group">
            <label class="control-label">Status <span class="symbol"></span></label>
            <select required class="form form-control" name="status">
                <option value="">Pilih Status</option>
                <option <?php if ($santri['status'] == 'Aktif') {
                            echo "selected";
                        } ?> value="Aktif">Aktif</option>
                <option <?php if ($santri['status'] == 'Tidak Aktif') {
                            echo "selected";
                        } ?> value="Tidak Aktif">Tidak Aktif</option>
            </select>
            </label>
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