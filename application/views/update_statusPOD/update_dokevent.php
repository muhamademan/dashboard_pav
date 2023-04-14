<div class="container-fluid">
    <div class="col-md-10 align-center">
        <?= $this->session->flashdata('message') ?>
        <div class="card shadow">
            <div class="card-header bg-info border-bottom-warning">
                <div class="row">
                    <div class="col">
                        <span class="text-light font-weight-bold">UPDATE DOKUMENTASI / EVENT</span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="GET">
                    <div class="col-md-7 mb-4">
                        <div class="form-group">
                            <label for="SPSM"><small>Nomor SPSM</small></label>
                            <select name="SPSM" id="SPSM" class="form-control selectpicker" data-live-search="true"
                                required oninvalid="this.setCusotomValidity('data tidak boleh kosong')"
                                oninput="setCustomValidity('')">
                                <option value="" selected disabled>--selected--</option>
                                <?php
                                $query = $this->db->query("SELECT DISTINCT(SPSM) SPSM FROM PAV_STATUSPOD GROUP BY SPSM ORDER BY SPSM")->result_array();
                                foreach ($query as $data) {
                                ?>
                                <option value="<?= $data['SPSM'] ?>"><?= $data['SPSM'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <input type="submit" value="Pilih" class="btn btn-primary btn-sm mr-3">
                        <a href="<?= base_url('update_status_pod/update_dokumentasi') ?>"
                            class="text-success">Refresh</a>
                    </div>
                </form>

                <form action="<?= base_url('update_status_pod/insertDokEvent') ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="NAMA_PENERIMA"><small>Nama Penerima</small></label>
                            <input name="NAMA_PENERIMA" type="text" class="form-control" id="NAMA_PENERIMA"
                                value="<?= $user['NAME_ORION'] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="TGL"><small>Tanggal Terima Merchandise</small></label>
                            <input name="TGL" type="date" class="form-control" id="TGL" value="" required>
                        </div>
                    </div>
                    <?php
                    if (isset($_GET['SPSM'])) {

                        $id = $_GET['SPSM'];
                        $CNOTE = $this->db->query("SELECT DISTINCT(AWB) AWB, KODE_APPROVAL FROM PAV_STATUSPOD WHERE SPSM = '$id'")->result_array();
                        $no = 0;
                        foreach ($CNOTE as $awb) {
                            $no++;
                    ?>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="AWB"><small>Nomor Connote</small></label>
                            <input name="AWB" type="text" class="form-control" id="AWB" value="<?= $awb['AWB'] ?>"
                                readonly>
                        </div>
                    </div>
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
                                    <th class="text-center">No SPSM</th>
                                    <th class="text-center">Kode Barang</th>
                                    <th class="text-center">Nama <br>Merchandise</th>
                                    <th class="text-center">Harga Satuan</th>
                                    <!-- <th class="text-center">Foto & Ukuran</th> -->
                                </tr>
                            </thead>
                            <?php
                            if (isset($_GET['SPSM'])) {

                                $id = $_GET['SPSM'];
                                $kdBarang = $this->db->query("SELECT SPSM, KODEBARANG, NAMABARANG, HARGA FROM PAV_STATUSPOD WHERE SPSM = '$id' ORDER BY KODEBARANG desc")->result_array();
                                $no = 0;
                                foreach ($kdBarang as $dt) {
                                    $no++;
                            ?>
                            <tbody>
                                <tr class="text-left text-dark text-small">
                                    <td class="text-center"><small><?= $no; ?></small></td>
                                    <td>
                                        <!-- NO SPSM -->
                                        <small><input type="text" name="SPSM[]" id="SPSM" class="form-control SPSM"
                                                value="<?= $dt['SPSM'] ?>" readonly></small>
                                    </td>
                                    <td>
                                        <!-- kode barang -->
                                        <small><input type="text" name="KODEBARANG[]" id="KODEBARANG"
                                                class="form-control" value="<?= $dt['KODEBARANG'] ?>" readonly></small>
                                    </td>
                                    <td>
                                        <!-- nama barang -->
                                        <small><input type="text" name="NAMABARANG[]" id="NAMABARANG"
                                                class="form-control" value="<?= $dt['NAMABARANG'] ?>" readonly></small>
                                    </td>
                                    <td>
                                        <!-- Harga Satuan -->
                                        <small><input type="text" class="form-control" name="HARGA[]" id="HARGA"
                                                value="<?= $dt['HARGA'] ?>" readonly></small>
                                    </td>
                                    <!-- Foto dan Ukuran -->
                                    <!-- <td>
                                        <small>
                                            <img src="<?= base_url('/uploads/update_status_pod/') . $dt['FOTOUKURAN'] ?>"
                                                alt="..." style="max-width: 50px" name="FOTOUKURAN">
                                            <input type="text" class="form-inline" name="FOTOUKURAN"
                                                value="<?= base_url('/uploads/update_status_pod/') . $dt['FOTOUKURAN'] ?>">
                                        </small>
                                    </td> -->
                                </tr>
                                <?php }
                            } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- end draf table -->

                    <div class="col-md-12 mt-5">
                        <p class="text-primary"><i>Upload foto dokumentasi serah terima</i></p>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="card py-4">
                                <div class="text-center">
                                    <input type="file" id="FOTO_DOKUMENTASI" name="FOTO_DOKUMENTASI">
                                    <small class="text-danger font-italic">(Max 2MB)</small>
                                </div>
                            </div>
                        </div>
                    </div>
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