<div class="container-fluid">
    <div class="col-md-10 align-center">
        <?= $this->session->flashdata('message') ?>
        <div class="card shadow">
            <div class="card-header bg-info border-bottom-warning">
                <div class="row">
                    <div class="col">
                        <span class="text-light font-weight-bold">UPDATE STATUS AWB POD</span>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="GET">
                    <!-- <form action="<?= base_url('update_status_pod/status_pod_spsm') ?>" method="GET"> -->
                    <div class="col-md-7 mb-4">
                        <div class="form-group">
                            <label for="Nopol"><small>Nomor SPSM</small></label>
                            <select name="SPSM" class="form-control selectpicker SPSM" data-live-search="true" required
                                oninvalid="this.setCusotomValidity('data tidak boleh kosong')"
                                oninput="setCustomValidity('')" onchange="test()">
                                <option value="" selected disabled>--selected--</option>
                                <?php
                                $query = $this->db->query("SELECT DISTINCT(NO_SPSM) NO_SPSM FROM PAV_APPROVAL_MERCHAN GROUP BY NO_SPSM ORDER BY NO_SPSM")->result_array();
                                foreach ($query as $data) {
                                ?>
                                <option value="<?= $data['NO_SPSM'] ?>"><?= $data['NO_SPSM'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <input type="submit" value="Pilih" class="btn btn-primary btn-sm mr-3">
                        <a href="<?= base_url('update_status_pod/status_pod_spsm') ?>" class="text-success">Refresh</a>
                    </div>
                </form>

                <form action="<?= base_url('update_status_pod/insertDataPod') ?>" method="post"
                    enctype="multipart/form-data">
                    <!-- <div class="row"> -->
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="TGLKIRIM"><small>Tanggal Kirim Merchandise</small></label>
                            <input name="TGLKIRIM" type="date" class="form-control" id="TGLKIRIM">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="AWB"><small>Nomor Connote</small></label>
                            <input name="AWB" type="text" class="form-control" id="AWB" autocomplete="off">
                        </div>
                    </div>
                    <?php
                    if (isset($_GET['SPSM'])) {

                        $id = $_GET['SPSM'];
                        $CNOTE = $this->db->query("SELECT DISTINCT(KODE_APPROVAL) KODE_APPROVAL FROM PAV_APPROVAL_MERCHAN WHERE NO_SPSM = '$id'")->result_array();
                        $no = 0;
                        foreach ($CNOTE as $awb) {
                            $no++;
                    ?>
                    <div class="col-md-7" hidden>
                        <div class="form-group">
                            <label for="KODE_APPROVAL"><small>Kode Approval</small></label>
                            <input name="KODE_APPROVAL" type="text" class="form-control" id="KODE_APPROVAL"
                                value="<?= $awb['KODE_APPROVAL'] ?>" readonly>
                        </div>
                    </div>
                    <?php }
                    } ?>
                    <!-- draf table -->
                    <div class="col-md-12 mt-5">
                        <p class="text-primary"><i>Detail merchandise yang dikirimkan</i></p>
                    </div>
                    <div class="col-md-12 table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr class="text-center" style="font-size: 12px; color: black;">
                                    <th class="text-center">No</th>
                                    <th class="text-center">SPSM</th>
                                    <th class="text-center">Kode Barang</th>
                                    <th class="text-center">Nama <br>Merchandise</th>
                                    <th class="text-center">Harga Satuan</th>
                                    <!-- <th class="text-center">Foto & Ukuran</th> -->
                                </tr>
                            </thead>
                            <?php
                            if (isset($_GET['SPSM'])) {

                                $id = $_GET['SPSM'];
                                $kdBarang = $this->db->query("SELECT NO_SPSM, KODE_BARANG, NAMA_MERCHANDISE, HARGA, KODE_APPROVAL FROM PAV_APPROVAL_MERCHAN WHERE NO_SPSM = '$id' AND STATUS = 0 ORDER BY KODE_BARANG desc")->result_array();
                                $no = 0;
                                foreach ($kdBarang as $vt) {
                                    $no++;
                            ?>
                            <tbody>
                                <tr class="text-left text-dark text-small">
                                    <td class="text-center"><small><?= $no; ?></small></td>
                                    <td>
                                        <!-- NO SPSM -->
                                        <small><input type="text" name="SPSM[]" id="SPSM" class="form-control SPSM"
                                                value="<?= $vt['NO_SPSM'] ?>" readonly></small>
                                    </td>
                                    <td>
                                        <!-- kode barang -->
                                        <small><input type="text" name="KODEBARANG[]" id="KODE_BARANG"
                                                class="form-control KODE_BARANG" value="<?= $vt['KODE_BARANG'] ?>"
                                                readonly></small>
                                    </td>
                                    <td>
                                        <!-- nama barang -->
                                        <small><input type="text" name="NAMABARANG[]"
                                                class="form-control NAMA_MERCHANDISE" id="NAMA_MERCHANDISE"
                                                value="<?= $vt['NAMA_MERCHANDISE'] ?>" readonly></small>
                                    </td>
                                    <td>
                                        <!-- Harga Satuan -->
                                        <small><input type="text" class="form-control HARGA" name="HARGA[]" id="HARGA"
                                                value="<?= $vt['HARGA'] ?>" readonly></small>
                                    </td>
                                    <!-- <td>
                                        <small><input type="text" class="form-control" name="KODE_APPROVAL"
                                                id="KODE_APPROVAL" value="<?= $vt['KODE_APPROVAL'] ?>" readonly></small>
                                    </td> -->
                                    <!-- Foto dan Ukuran -->
                                    <!-- <td>
                                        <small><input type="file" class="form-inline" name="FOTOUKURAN" id="FOTOUKURAN"
                                                value="foto" required></small>
                                    </td> -->
                                </tr>
                                <?php }
                            }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- end draf table -->
                    <!-- </div> -->

                    <hr class="sidebar-divider">
                    <div class="mt-3 text-center">
                        <button type="submit"
                            class="btn btn-block btn-lg btn-outline-success font-weight-bold">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<!-- <script>
function test() {
    var kodebarang = $("#SPSM").val();
    var op = 1
    var postForm = "id=" + kodebarang + "&op=" + op;
    $.ajax({
        type: "post",
        url: "<?= base_url('/update_status_pod/kode_barang') ?>",
        data: postForm,
        dataType: 'json',
        success: function(data) {
            $(".KODE_BARANG").val(data.kodebrg);
            $(".NAMA_MERCHANDISE").val(data.brg);
            $(".HARGA").val(data.hrg);
        },
        error: function(e) {
            console.log('error:', e);
            alert('Data gagal diambil');
        }
    });
}
</script> -->