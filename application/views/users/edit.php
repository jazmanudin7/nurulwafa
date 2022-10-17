<div class="col-sm-12">
    <h3 align="center" class="m-t-none m-b">EDIT DATA USERS</h3>
    <form class="form" autocomplete="off" role="form" id="form" action="<?php echo base_url(); ?>users/edit" novalidate method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label">
                Nama Lengkap<span class="symbol"></span>
            </label>
            <input type="hidden" value="<?php echo $users['id']; ?>" placeholder="ID" name="id" class="form-control">
            <input type="text" value="<?php echo $users['nama_lengkap']; ?>" placeholder="Nama Lengkap" name="nama_lengkap" class="form-control">
        </div>
        <div class="form-group">
            <label class="control-label">
                Nama Santri<span class="symbol"></span>
            </label>
            <select required class="form-control chosen-select" name="no_uniq">
                <option value="">Pilih Santri</option>
                <?php
                $santri     = $this->db->query("SELECT * FROM santri WHERE santri.status = 'AKTIF' ")->result();
                foreach ($santri as $d) { ?>
                    <option <?php if ($users['no_uniq'] == $d->nps) {
                                echo "selected";
                            } ?> value="<?php echo $d->nps; ?>"><?php echo $d->nama_santri; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">
                Username <span class="symbol"></span>
            </label>
            <input type="text" value="<?php echo $users['username']; ?>" placeholder="Username" name="username" class="form-control">
        </div>
        <div class="form-group">
            <label class="control-label">
                Password <span class="symbol"></span>
            </label>
            <input type="password" value="<?php echo $users['password']; ?>" placeholder="Password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label class="control-label">
                Level <span class="symbol"></span>
            </label>
            <select required class="form-control chosen-select" name="level">
                <option <?php if ($users['level'] == "Wali Santri") {
                            echo "selected";
                        } ?> value="Wali Santri">Wali Santri</option>
                <option <?php if ($users['level'] == "Guru") {
                            echo "selected";
                        } ?> value="Guru">Guru</option>
                <option <?php if ($users['level'] == "Admin") {
                            echo "selected";
                        } ?> value="Admin">Admin</option>
            </select>
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