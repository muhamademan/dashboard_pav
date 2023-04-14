<div class="container-fluid">
    <div class="col-md-12">
        <?= $this->session->flashdata('message'); ?>
        <div class="card shadow">
            <div class="card-header bg-warning border-bottom-danger py-2">
                <div class="row">
                    <div class="col-sm-7">
                        <span class="text-dark font-weight-bold">DETAIL PREVIEW APPROVAL MERHANDISE</span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="<?= base_url('approval_merchandise/proses_detail_preview') ?>" method="post"
                    class="form-inline">
                    <table>
                        <tr class="text-center">
                            <?php foreach ($dt_permintaan as $detail) { ?>
                            <td class="col-sm-5 control-label">Nama Cabang:</td>
                            <td>
                                <input type="text" class="form-control" name="NAMA_CABANG" id="cabang"
                                    value="<?= $detail['CABANG'] ?>" readonly>
                            </td>

                            <td hidden>
                                <input type="text" class="form-control" name="DESTINASI" id="DESTINASI"
                                    value="<?= $detail['DESTINASI'] ?>" readonly>
                                <input type="text" class="form-control" name="REGIONAL" id="REGIONAL"
                                    value="<?= $detail['REGIONAL'] ?>" readonly>
                                <input type="text" class="form-control" name="NAMA_PEMINTA" id="NAMA_PEMINTA"
                                    value="<?= $detail['NAMA_PEMINTA'] ?>" readonly>
                                <input type="text" class="form-control" name="DEPARTEMENT" id="DEPARTEMENT"
                                    value="<?= $detail['DEPARTEMENT'] ?>" readonly>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td class="col-sm-5 control-label">Nomor SPSM:</td>
                            <td>

                                <input type="text" name="NO_SPSM" class="form-control" id="spsm"
                                    value="<?= $detail['SPSM']; ?>" readonly>

                            </td>
                        </tr>
                        <tr class="text-center">
                            <td class="col-sm-5 control-label">Tangaal Penggunaan:</td>
                            <td>
                                <input type="text" name="TGL_PENGGUNAAN" class="form-control" id="spsm"
                                    value="<?= $detail['TGLGUNA']; ?>" readonly>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td class="col-sm-5 control-label">Keterangan Pengguna:</td>
                            <td>
                                <input type="text" name="KETERANGAN" class="form-control" id="spsm"
                                    value="<?= $detail['KETERANGAN']; ?>" readonly>
                            </td>
                            <td hidden>
                                <input type="text" name="TGL_PERMINTAAN" class="form-control" id="TGL_PERMINTAAN"
                                    value="<?= $detail['CREATEDATE']; ?>" readonly>
                            </td>
                            <!-- GET NAMA PAV -->
                            <td hidden>
                                <input type="text" name="NAMA_PAV" class="form-control" id="NAMA_PAV"
                                    value="<?= $user['NAME_ORION']; ?>" readonly>
                            </td>
                            <!-- END GET NAMA PAV -->
                        </tr>
                        <?php } ?>
                    </table>
                    <!-- <div class="card-body"> -->
                    <div class="table-responsive mt-5">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr class="text-center" style="font-size: 12px; color: black;">
                                    <th class="text-center">No</th>
                                    <th class="text-center">Kode Barang</th>
                                    <th class="text-center">Nama <br>Merchandise</th>
                                    <th class="text-center text-primary">Stock <br>On Hand</th>
                                    <th class="text-center text-primary">Sisa Stock<br>On Hand</th>
                                    <th class="text-center text-primary">Harga Stock <br>On Hand</th>
                                    <th class="text-center text-primary">Balance<br>Harga</th>
                                    <th class="text-center">Jumlah<br>Permintaan</th>
                                    <th class="text-center text-white" style="background-color: #e34317;">Jumlah<br>Yang
                                        Disetujui</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($dt_preview)) {
                                    $no = 1;
                                    foreach ($dt_preview as $dt) {
                                ?>
                                <tr class="text-left text-dark text-small item">
                                    <td class="text-center"><small><?= $no++; ?></small></td>
                                    <td>
                                        <!-- kode barang -->
                                        <small><input type="text" name="KODE_BARANG[]" value="<?= $dt['KODE_BARANG'] ?>"
                                                readonly></small>
                                    </td>
                                    <td>
                                        <!-- nama barang -->
                                        <small><input type="text" name="NAMA_MERCHANDISE[]"
                                                value="<?= $dt['NAMA_MERCHANDISE'] ?>" readonly></small>
                                    </td>
                                    <td>
                                        <!-- Stock On Hand -->
                                        <small><input type="text" class="text-primary STOCK_ONHAND"
                                                name="STOCK_ON_HAND[]" id="STOCK_ONHAND"
                                                value="<?= $dt['STOCK_ON_HAND'] ?>" readonly></small>
                                    </td>
                                    <td>
                                        <!-- sisa stock on hand -->
                                        <small><input type="text" class="text-primary SISA_STOCK_ONHAND"
                                                name="SISA_STOCK_ONHAND[]" id="SISA_STOCK_ONHAND"
                                                value="<?= $dt['SISA_STOCK_ONHAND'] ?>" readonly></small>
                                    </td>
                                    <td>
                                        <!-- harga stock on hand -->
                                        <small><input type="text" class="text-primary HARGA_STOCK_ONHAND"
                                                name="HARGA_STOCK_ONHAND[]" id="HARGA_STOCK_ONHAND"
                                                value="<?= $dt['HARGA_STOCK_ONHAND'] ?>" readonly></small>
                                    </td>
                                    <td>
                                        <!-- Balance harga -->
                                        <small><input type="text" class="text-primary BALANCE_HARGA"
                                                name="BALANCE_HARGA[]" value="<?= $dt['BALANCE_HARGA'] ?>"
                                                id="BALANCE_HARGA" readonly></small>
                                    </td>
                                    <td>
                                        <!-- Jumlah permintaan -->
                                        <small><input type="text" name="JUMLAH_PERMINTAAN[]" id="JUMLAH_PERMINTAAN"
                                                class="JUMLAH_PERMINTAAN" value="<?= $dt['JUMLAH_PERMINTAAN'] ?>"
                                                readonly></small>
                                    </td>
                                    <td class="text-warning" style="background-color: #e34317;">
                                        <!-- Jumlah yang disetujui -->
                                        <!-- <small><input type="number" name="JML_DISETUJUI" class="text-danger" required
                                                id="JML_DISETUJUI" placeholder="Input" autocomplete="off"
                                                oninput="validasi()"></small> -->
                                        <small><input type="number" name="JUMLAH_DISETUJUI[]"
                                                class="text-danger JML_DISETUJUI" required id="JML_DISETUJUI"
                                                value="<?= $dt['JUMLAH_DISETUJUI'] ?>" placeholder="Input"
                                                readonly></small>
                                    </td>
                                    <td>
                                        <!-- Harga -->
                                        <small><input type="text" name="HARGA[]" class="HARGA"
                                                value="<?= $dt['HARGA'] ?>" id="HARGA" readonly></small>
                                    </td>
                                    <td>
                                        <!-- total harga -->
                                        <small><input type=" text" name="TOTAL_HARGA[]" class="TOTAL_HARGA"
                                                value="<?= $dt['TOTAL_HARGA'] ?>" id="TOTAL_HARGA" readonly>
                                            <!-- FORM YANG DI HIDDEN -->
                                        </small>
                                    </td>
                                    <td hidden>
                                        <small>
                                            <input name="KODEBARANGMASUK[]" type="text"
                                                value="<?= $dt['KODEBARANGMASUK'] ?>" class="form-control" readonly
                                                id="KODEBARANGMASUK">
                                        </small>
                                    </td>
                                    <td hidden>
                                        <small><input type="text" name="KODE_APPROVAL[]" id="KODE_APPROVAL"
                                                value="<?= $dt['KODE_APPROVAL'] ?>" class="KODE_APPROVAL"
                                                readonly></small>
                                    </td>
                                    <td hidden>
                                        <small><input type="text" name="SISA_JUMLAHMINTA[]" id="SISA_JUMLAHMINTA"
                                                value="<?= $dt['SISA_JUMLAHMINTA'] ?>" class="SISA_JUMLAHMINTA"
                                                readonly></small>
                                    </td>
                                    <!-- END FORM YANG DI HIDDEN -->
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- </div> -->

                    <div class="col text-right mt-3">
                        <div class="d-flex justify-content-between">
                            <a href="<?= base_url('approval_merchandise/delete_preview/') . $dt['KODE_APPROVAL'] ?>"
                                type="submit" class="btn btn-outline-danger py-2"><i
                                    class="fa fa-backward mx-2"></i>Back</a>
                            <button type="submit" class="btn btn-outline-primary py-2"><i
                                    class="fa fa-check-square-o mx-2" aria-hidden="true"></i>Submit</button>
                        </div>
                    </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</div>
</div>