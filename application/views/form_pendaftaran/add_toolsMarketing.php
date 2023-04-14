<div class="container-fluid">
    <div class="col-md-12 align-center">
        <?= $this->session->flashdata('message') ?>
        <div class="card shadow">
            <div class="card-header bg-info border-bottom-warning">
                <span class="text-light">FORM PENDAFTARAN DATA TOOLS & MARKETING</span>
            </div>
            <div class="card-body">
                <form action="<?= base_url('form_pendaftaran/proses_addTools') ?>" method="post">
                    <div class="row">
                        <!-- <input type="hidden" name="id" value=""> -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="NO"><small>Nomor</small><span class="text-danger small">*</span></label>
                                <input name="NO" type="number" class="form-control" id="NO" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="REGIONAL"><small>Regional</small><span
                                        class="text-danger small">*</span></label>
                                <input name="REGIONAL" type="text" class="form-control" id="REGIONAL" required
                                    onkeyup="this.value = this.value.toUpperCase();">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="CABANG"><small>Cabang</small><span
                                        class="text-danger small">*</span></label>
                                <input name="CABANG" type="text" class="form-control" id="CABANG" required
                                    onkeyup="this.value = this.value.toUpperCase();">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="UMBUL"><small>Umbul-Umbul</small><span
                                        class="text-danger small">*</span></label>
                                <input name="UMBUL" type="text" class="form-control" id="UMBUL" required
                                    onkeyup="this.value = this.value.toUpperCase();">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="BANNER"><small>X-Banner Logo JNE</small><span
                                        class="text-danger small">*</span></label>
                                <input name="BANNER" type="text" class="form-control" id="BANNER" required
                                    onkeyup="this.value = this.value.toUpperCase();">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="BADUT"><small>Badut JNE</small><span
                                        class="text-danger small">*</span></label>
                                <input name="BADUT" type="text" class="form-control" id="BADUT" required
                                    onkeyup="this.value = this.value.toUpperCase();">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="TENDA"><small>Tenda JNE</small><span
                                        class="text-danger small">*</span></label>
                                <input name="TENDA" type="text" class="form-control" id="TENDA" required
                                    onkeyup="this.value = this.value.toUpperCase();">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="BOOTH"><small>Booth Portable</small><span
                                        class="text-danger small">*</span></label>
                                <input name="BOOTH" type="text" class="form-control" id="BOOTH" required
                                    onkeyup="this.value = this.value.toUpperCase();">
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