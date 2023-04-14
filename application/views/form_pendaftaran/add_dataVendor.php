<div class="container-fluid">
    <div class="col-md-12 align-center">
        <?= $this->session->flashdata('message') ?>
        <div class="card shadow">
            <div class="card-header bg-info border-bottom-warning">
                <span class="text-light">FORM PENDAFTARAN DATA VENDOR</span>
            </div>
            <div class="card-body">
                <form action="<?= base_url('form_pendaftaran/proses_addVendor') ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="row">
                        <input type="hidden" name="id" value="">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="KODEVENDOR"><small>Kode Vendor</small></label>
                                <input name="KODEVENDOR" type="text" class="form-control font-italic" id="KODEVENDOR"
                                    value="V<?= sprintf("%03s", $kd_vendor) ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="JenisArmada"><small>Nama</small><span
                                        class="text-danger small">*</span></label>
                                <input name="NAMA" type="text" class="form-control" id="NAMA" required
                                    onkeyup="this.value = this.value.toUpperCase();">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="TipeArmada"><small>Telephone</small><span
                                        class="text-danger small">*</span></label>
                                <input name="TLP" type="text" class="form-control" id="TLP" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="FAX"><small>Fax</small><span class="text-danger small">*</span></label>
                                <input name="FAX" type="text" class="form-control" id="FAX" required
                                    onkeyup="this.value = this.value.toUpperCase();">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="CURRENCY"><small>Currency</small><span
                                        class="text-danger small">*</span></label>
                                <select name="CURRENCY" id="CURRENCY" class="form-control selectpicker"
                                    data-actions-box="true" data-virtual-scroll="false" data-live-search="true" required
                                    oninvalid="this.setCustomValidity('data tidak boleh kosong')"
                                    oninput="setCustomValidity('')">
                                    <option value="" selected disabled>--selected--</option>
                                    <option value="IDR">IDR</option>
                                    <option value="USD">USD</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="MPEMBAYARAN"><small>Metode Pembayaran</small><span
                                        class="text-danger small">*</span></label>
                                <select name="MPEMBAYARAN" id="MPEMBAYARAN" class="form-control selectpicker"
                                    data-actions-box="true" data-virtual-scroll="false" data-live-search="true" required
                                    oninvalid="this.setCustomValidity('data tidak boleh kosong')"
                                    oninput="setCustomValidity('')">
                                    <option value="" selected disabled>--selected--</option>
                                    <option value="TRANSFER">TRANSFER</option>
                                    <option value="CASH">CASH</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ALAMATVENDOR"><small>Alamat Vendor</small><span
                                        class="text-danger small">*</span></label>
                                <input name="ALAMATVENDOR" type="text" class="form-control" id="ALAMATVENDOR" required
                                    onkeyup="this.value = this.value.toUpperCase();">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="NAMANPWP"><small>Nama NPWP</small><span
                                        class="text-danger small">*</span></label>
                                <input name="NAMANPWP" type="text" class="form-control" id="NAMANPWP" required
                                    onkeyup="this.value = this.value.toUpperCase();">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ALAMATNPWP"><small>Alamat NPWP</small><span
                                        class="text-danger small">*</span></label>
                                <input name="ALAMATNPWP" type="text" class="form-control" id="ALAMATNPWP" required
                                    onkeyup="this.value = this.value.toUpperCase();">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="NOMORNPWP"><small>Nomor NPWP</small><span
                                        class="text-danger small">*</span></label>
                                <input name="NOMORNPWP" type="text" class="form-control" id="NOMORNPWP" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="TOP"><small>Terms Of Payment</small><span
                                        class="text-danger small">*</span></label>
                                <input name="TOP" type="text" class="form-control" id="TOP" required
                                    onkeyup="this.value = this.value.toUpperCase();">
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="MPEMBAYARAN"><small>Metode Pembayaran</small><span
                                        class="text-danger small">*</span></label>
                                <input name="MPEMBAYARAN" type="text" class="form-control" id="MPEMBAYARAN" required>
                            </div>
                        </div> -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="NOREK"><small>No Rekening</small><span
                                        class="text-danger small">*</span></label>
                                <input name="NOREK" type="number" class="form-control" id="NOREK" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="NAMABANK"><small>Nama Bank</small><span
                                        class="text-danger small">*</span></label>
                                <input name="NAMABANK" type="text" class="form-control" id="NAMABANK" required
                                    onkeyup="this.value = this.value.toUpperCase();">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="NAMAREKENING"><small>Nama Penerima Rekening</small><span
                                        class="text-danger small">*</span></label>
                                <input name="NAMAREKENING" type="text" class="form-control" id="NAMAREKENING" required
                                    onkeyup="this.value = this.value.toUpperCase();">
                            </div>
                        </div>
                    </div>
                    <!-- Divider -->
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

<!-- script format nomor NPWP -->
<script type="text/javascript">
var txtNPWP = document.getElementById("NOMORNPWP");

txtNPWP.addEventListener('keyup', function(e) {

    var cursorStart = txtNPWP.selectionStart,
        cursorEnd = txtNPWP.selectionEnd,
        target = e.target,
        chars = target.value.replace(/\D/g, ''),
        new_chars;


    if (cursorStart == "3" || cursorStart == "7" || cursorStart == "11" || cursorStart == "13" || cursorStart ==
        "17") {
        cursorStart = txtNPWP.selectionStart + 1;
        cursorEnd = txtNPWP.selectionEnd + 1;
    }

    var char = e.target.value.replace(/\D/g, '').match(
        /(\d{0,2})(\d{0,3})(\d{0,3})(\d{0,1})(\d{0,3})(\d{0,3})/);
    e.target.value = char[1] + (char[2] ? '.' + char[2] : '') + (char[3] ? '.' + char[3] : '') + (char[4] ?
        '.' + char[4] : '') + (char[5] ? '-' + char[5] : '') + (char[6] ? '.' + char[6] : '');

    txtNPWP.setSelectionRange(cursorStart, cursorEnd);

}, false);
</script>
<!-- end script nomor NPWP -->