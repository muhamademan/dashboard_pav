<div class="container-fluid">
    <div class="col-md-12 align-center">
        <?= $this->session->flashdata('message') ?>
        <div class="card shadow">
            <div class="card-header bg-info border-bottom-warning">
                <span class="text-light">FORM PENDAFTARAN DATA CABANG</span>
            </div>
            <div class="card-body">
                <form action="<?= base_url('form_pendaftaran/proses_addCabang') ?>" method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="DESTINASI"><small>Destination</small><span
                                        class="text-danger small">*</span></label>
                                <select name="DESTINASI" id="destinasi" class="form-control selectpicker"
                                    data-actions-box="true" data-virtual-scroll="false" data-live-search="true" required
                                    oninvalid="this.setCustomValidity('data tidak boleh kosong')"
                                    oninput="setCustomValidity('')">
                                    <option value="" selected disabled>--selected--</option>
                                    <?php foreach ($dt_dest as $dt) : ?>
                                    <option value="<?= $dt['DESTINASI']; ?>"><?= $dt['DESTINASI'] ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <!-- <div class="col-md-4">
                            <div class="form-group">
                                <label for="KODECABANG"><small>Kode Cabang</small></label>
                                <select name="KODECABANG" id="kodecabang" class="kodecabang form-control"
                                    data-actions-box="true" data-virtual-scroll="false" data-live-search="true" required
                                    oninvalid="this.setCustomValidity('data tidak boleh kosong')"
                                    oninput="setCustomValidity('')">
                                    <option value="" selected disabled>--selected--</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="REGIONAL"><small>Regional</small></label>
                                <select name="REGIONAL" id="regional" class="form-control regional"
                                    data-actions-box="true" data-virtual-scroll="false" data-live-search="true" required
                                    oninvalid="this.setCustomValidity('data tidak boleh kosong')"
                                    oninput="setCustomValidity('')">
                                    <option value="" selected disabled>--selected--</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="REGIONAL"><small>Regional</small><span
                                        class="text-danger small">*</span></label>
                                <select name="REGIONAL" id="regional" class="form-control regional"
                                    data-actions-box="true" data-virtual-scroll="false" data-live-search="true" required
                                    oninvalid="this.setCustomValidity('data tidak boleh kosong')"
                                    oninput="setCustomValidity('')">
                                    <option value="" selected disabled>--selected--</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="KODECABANG"><small>Kode Cabang</small><span
                                        class="text-danger small">*</span></label>
                                <select name="KODECABANG" id="kodecabang" class="kodecabang form-control"
                                    data-actions-box="true" data-virtual-scroll="false" data-live-search="true" required
                                    oninvalid="this.setCustomValidity('data tidak boleh kosong')"
                                    oninput="setCustomValidity('')">
                                    <option value="" selected disabled>--selected--</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="STATUS_CABANG"><small>Status Cabang Utama / Mitra (Agen)</small><span
                                        class="text-danger small">*</span></label>
                                <input name="STATUS_CABANG" type="text" class="form-control" id="STATUS_CABANG"
                                    autocomplete="off" required onkeyup="this.value = this.value.toUpperCase();">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="HPKACAB"><small>Nomor HP Kepala Cabang</small><span
                                        class="text-danger small">*</span></label>
                                <input name="HPKACAB" type="text" class="form-control" id="HPKACAB" autocomplete="off"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="NAMA_KACAB"><small>Nama Kepala Cabang</small><span
                                        class="text-danger small">*</span></label>
                                <input name="NAMA_KACAB" type="text" class="form-control" id="NAMA_KACAB"
                                    autocomplete="off" required onkeyup="this.value = this.value.toUpperCase();">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="KACAB"><small><b>User Orion</b> Kepala Cabang</small><span
                                        class="text-danger small">*</span></label>
                                <select name="KACAB" id="KACAB" class="form-control selectpicker"
                                    data-actions-box="true" data-virtual-scroll="false" data-live-search="true" required
                                    oninvalid="this.setCustomValidity('data tidak boleh kosong')"
                                    oninput="setCustomValidity('')">
                                    <option value="" selected disabled>--selected--</option>
                                    <?php foreach ($dt_picKacab2 as $kacab) { ?>
                                    <option value="<?= $kacab['USER_ID'] ?>">
                                        <?= $kacab['USER_NAME'] ?> | <?= $kacab['USER_BRANCH'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="PIC_CABANG"><small><b>User Orion</b> PIC Cabang</small><span
                                        class="text-danger small">*</span></label>
                                <select name="USER_NAME" id="PIC_CABANG" class="form-control selectpicker"
                                    data-actions-box="true" data-virtual-scroll="false" data-live-search="true" required
                                    oninvalid="this.setCustomValidity('data tidak boleh kosong')" onchange="mane()"
                                    oninput="setCustomValidity('')">
                                    <option value="" selected disabled>--selected--</option>
                                    <?php foreach ($dt_picKacab2 as $pic) { ?>
                                    <option value="<?= $pic['USER_ID'] ?>">
                                        <?= $pic['USER_NAME'] ?> | <?= $pic['USER_BRANCH'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="PASSWORD"><small>Password</small></label>
                                <input name="PASSWORD" type="text" class="form-control" id="PASSWORD2" readonly>
                            </div>
                        </div>
                        <div class="col-md-4" hidden>
                            <div class="form-group">
                                <label for="NAME_ORION"><small>Nama Lengkap Orion</small></label>
                                <input name="NAME_ORION" type="text" class="form-control" id="NAME_ORION2" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="EMAILKACAB"><small>Alamat Email Kepala Cabang</small><span
                                        class="text-danger small">*</span></label>
                                <input name="EMAILKACAB" type="text" class="form-control" id="EMAILKACAB"
                                    autocomplete="off" required onkeyup="this.value = this.value.toUpperCase();">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="NAMA_PIC_CAB"><small>Nama PIC Cabang</small><span
                                        class="text-danger small">*</span></label>
                                <input name="NAMA_PIC_CAB" type="text" class="form-control" id="NAMA_PIC_CAB"
                                    autocomplete="off" required onkeyup="this.value = this.value.toUpperCase();">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="DEPARTEMENT"><small>Departement</small><span
                                        class="text-danger small">*</span></label>
                                <input name="DEPARTEMENT" type="text" class="form-control" id="DEPARTEMENT"
                                    autocomplete="off" required onkeyup="this.value = this.value.toUpperCase();">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="HPPIC"><small>Nomor HP PIC Cabang</small><span
                                        class="text-danger small">*</span></label>
                                <input name="HPPIC" type="text" class="form-control" id="HPPIC" autocomplete="off"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="EMAILPIC"><small>Email</small><span
                                        class="text-danger small">*</span></label>
                                <input name="EMAILPIC" type="email" class="form-control" id="EMAILPIC"
                                    autocomplete="off" value="" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ROLE"><small>Privilege</small><span
                                        class="text-danger small">*</span></label>
                                <select name="ROLE" id="ROLE" class="form-control" required>
                                    <option value="" selected disabled>--selected--</option>
                                    <option value="BRANCH_OPS">BRANCH_OPS | Kepala Cabang</option>
                                    <option value="BPN_OPS3">BPN_OPS3 | User</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ALAMAT"><small>Alamat</small><span
                                        class="text-danger small">*</span></label>
                                <textarea name="ALAMAT" type="text" class="form-control" id="ALAMAT" autocomplete="off"
                                    onkeyup="this.value = this.value.toUpperCase();" required></textarea>
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
</div>


<!-- Load file library jQuery melalui CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
$("#destinasi").change(function() {
    var postForm = {
        'id': document.getElementById("destinasi").value,
        'op': 1
    };
    $.ajax({
        type: "post",
        url: "<?= base_url('/form_pendaftaran/kd_cabang') ?>",
        data: postForm,
        success: function(data) {
            $("#regional").html(data);
        }
    });
});
$("#regional").change(function() {
    var postForm = {
        'id': document.getElementById("regional").value,
        'op': 2
    };

    $.ajax({
        type: "post",
        url: "<?= base_url('/form_pendaftaran/kd_cabang') ?>",
        data: postForm,
        success: function(data) {
            $("#kodecabang").html(data);
        }
    });
});
</script>

<script>
function mane() {
    var pic = $("#PIC_CABANG").val();
    var op = 5
    var postForm = "id=" + pic + "&op=" + op;
    $.ajax({
        type: "post",
        url: "<?= base_url('/form_pendaftaran/dt_password') ?>",
        data: postForm,
        dataType: 'json',
        success: function(data) {
            // data = JSON.parse(data);
            // exit();
            $("#PASSWORD2").val(data.pass);
            $("#NAME_ORION2").val(data.name);
        },
        error: function(e) {
            console.log('error:', e);
        }
    });
}
</script>