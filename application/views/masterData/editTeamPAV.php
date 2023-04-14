<div class="container-fluid">
    <div class="col-md-12 align-center">
        <?= $this->session->flashdata('message') ?>
        <div class="card shadow">
            <div class="card-header bg-info border-bottom-warning">
                <span class="text-light">FORM MASTER DATA TEAM PAV</span>
            </div>
            <div class="card-body">
                <form action="<?= base_url('master_data/proses_editPAV') ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="row">
                        <!-- <input type="hidden" name="id" value=""> -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="KODEPAV">Kode PAV</label>
                                <input name="KODEPAV" type="text" class="form-control font-italic" id="KODEPAV"
                                    value="<?= $edit_pav['KODEPAV'] ?>" readonly>
                            </div>
                        </div>
                        <!-- <div class="col-md-4">
                            <div class="form-group">
                                <label for="TGL_PENDAFTARAN_PAV"><small>Tgl Pendaftaran</small><span
                                        class="text-danger small">*</span></label>
                                <input name="TGL_PENDAFTARAN_PAV" type="date" class="form-control"
                                    id="TGL_PENDAFTARAN_PAV" required>
                            </div>
                        </div> -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="NIP_PAV"><small>NIP</small><span class="text-danger small">*</span></label>
                                <input name="NIP_PAV" type="text" class="form-control" id="NIP_PAV" required
                                    value="<?= $edit_pav['NIP_PAV'] ?>"
                                    onKeyUp="this.value = this.value.toUpperCase();">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="NAMA_PAV"><small>Nama Lengkap</small><span
                                        class="text-danger small">*</span></label>
                                <input name="NAMA_PAV" type="text" class="form-control" id="NAMA_PAV" required
                                    value="<?= $edit_pav['NAMA_PAV'] ?>"
                                    onKeyUp="this.value = this.value.toUpperCase();">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="POSITION_PAV"><small>Position</small><span
                                        class="text-danger small">*</span></label>
                                <input name="POSITION_PAV" type="text" class="form-control" id="POSITION_PAV" required
                                    value="<?= $edit_pav['POSITION_PAV'] ?>"
                                    onKeyUp="this.value = this.value.toUpperCase();">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="TGL_LAHIR_PAV"><small>Tanggal Lahir</small><span
                                        class="text-danger small">*</span></label>
                                <input name="TGL_LAHIR_PAV" type="date" class="form-control" id="TGL_LAHIR_PAV"
                                    value="<?= $edit_pav['TGL_LAHIR_PAV'] ?>" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="NO_HP_PAV"><small>Nomor Handphone</small><span
                                        class="text-danger small">*</span></label>
                                <input name="NO_HP_PAV" type="text" class="form-control" id="NO_HP_PAV" required
                                    value="<?= $edit_pav['NO_HP_PAV'] ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="EMAIL_PAV"><small>Email</small><span
                                        class="text-danger small">*</span></label>
                                <input name="EMAIL_PAV" type="text" class="form-control" id="EMAIL_PAV" required
                                    value="<?= $edit_pav['EMAIL_PAV'] ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="NO_TELP_KEL_PAV"><small>Nomor Telepon Keluarga</small><span
                                        class="text-danger small">*</span></label>
                                <input name="NO_TELP_KEL_PAV" type="text" class="form-control" id="NO_TELP_KEL_PAV"
                                    value="<?= $edit_pav['NO_TELP_KEL_PAV'] ?>" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="TGL_MASUK_KERJA_PAV"><small>Tanggal Masuk Kerja</small><span
                                        class="text-danger small">*</span></label>
                                <input name="TGL_MASUK_KERJA_PAV" type="date" class="form-control"
                                    value="<?= $edit_pav['TGL_MASUK_KERJA_PAV'] ?>" id="TGL_MASUK_KERJA_PAV" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="GOLDAR_PAV"><small>Golongan Darah</small><span
                                        class="text-danger small">*</span></label>
                                <input name="GOLDAR_PAV" type="text" class="form-control" id="GOLDAR_PAV"
                                    onKeyUp="this.value = this.value.toUpperCase();" required
                                    value="<?= $edit_pav['GOLDAR_PAV'] ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="USER_NAME"><small><b>User Orion / Username</b></small><span
                                        class="text-danger small">*</span></label>
                                <select name="USER_NAME" id="USER_NAME_PAV" class="form-control selectpicker"
                                    data-actions-box="true" data-virtual-scroll="false" data-live-search="true" required
                                    oninvalid="this.setCustomValidity('data tidak boleh kosong')" onchange="mane()"
                                    oninput="setCustomValidity('')">
                                    <!-- <option value="" selected disabled>--selected--</option> -->
                                    <?php if ($edit_pav['USER_NAME']) { ?>
                                    <option value="<?= $edit_pav['USER_NAME'] ?>"><?= $edit_pav['USER_NAME'] ?></option>
                                    <?php } ?>
                                    <?php foreach ($dt_orion as $pic) { ?>
                                    <option value="<?= $pic['USER_ID'] ?>">
                                        <?= $pic['USER_ID'] ?> | <?= $pic['USER_BRANCH'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="PASSWORD"><small>Password</small></label>
                                <input name="PASSWORD" type="text" class="form-control" id="PASSWORD" readonly
                                    value="<?= $edit_pav['PASSWORD'] ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ROLE"><small>Privilege</small></label>
                                <input name="ROLE" type="text" class="form-control" id="ROLE" value="SUPER_USER"
                                    value="<?= $edit_pav['ROLE'] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="">Foto <small class="text-muted">(Max 2MB)</small></label>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="<?= base_url('./uploads/data_pav/') . $edit_pav['FOTO']; ?>"
                                                class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <input type="file" class="form-control" id="image" name="FOTO" size="20"
                                                    value="<?= $edit_pav['FOTO']; ?>">
                                                <!-- <label class="" for="image">Pilih file</label> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ALAMAT_PAV"><small>Alamat</small><span
                                        class="text-danger small">*</span></label>
                                <textarea name="ALAMAT_PAV" type="text" class="form-control" id="ALAMAT_PAV" required
                                    onKeyUp="this.value = this.value.toUpperCase();"><?= $edit_pav['ALAMAT_PAV'] ?></textarea>
                            </div>
                        </div>
                    </div>

                    <hr class="sidebar-divider">
                    <div class="mt-3 text-center">
                        <button type="submit" class="btn btn-block btn-lg btn-outline-success"><i
                                class="fa fa-floppy-o mx-3"></i>Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function mane() {
    var pic = $("#USER_NAME_PAV").val();
    var op = 1
    var postForm = "id=" + pic + "&op=" + op;
    $.ajax({
        type: "post",
        url: "<?= base_url('/master_data/dt_passwordpav') ?>",
        data: postForm,
        dataType: 'json',
        success: function(data) {
            // data = JSON.parse(data);
            // exit();
            $("#PASSWORD").val(data.pass);
        },
        error: function(e) {
            console.log('error:', e);
        }
    });
}
</script>