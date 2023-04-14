<div class="container-fluid">
    <div class="col-md-12">
        <div class="mb-4">
            <label for="test">TANGGAL STOCK OPNAME :</label>
            <input type="text" class="form-control col-lg-3" readonly value="<?= date('d/M/Y') ?>">
        </div>
        <!-- ==================================== TABLE STOK OPNAM ==================================== -->
        <form action="<?= base_url('test') ?>" method="post">
            <div class="card shadow">
                <div class="card-header bg-info border-bottom-warning py-2">
                    <div class="row">
                        <div class="col d-flex justify-content-between">
                            <span class="text-light">STOK OPNAME</span>
                            <button class="btn btn-warning pl-4 justify-content-right" type="submit"><i
                                    class="fa fa-save">
                                    SIMPAN</i></button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable" width="230%" cellspacing="1">
                            <thead class="thead-light">
                                <tr class="text-center" style="font-size: 12px; color: black;">
                                    <th class="align-middle text-center" rowspan="2">No</th>
                                    <th class="align-middle text-center" rowspan="2">Kode Barang</th>
                                    <th class="align-middle text-center" rowspan="2">Nama <br>Merchandise</th>
                                    <th class="align-middle text-center" rowspan="2">Harga Merchandise</th>
                                    <th class="text-center" colspan="3" style="background-color: #97bff0;">Jumlah Stok
                                        BarangMerchandise</th>
                                    <th class="text-center" colspan="3" style="background-color: #a9e8c6;">Perhitungan
                                        Stok
                                        Opname Jumlah Barang Merchandise
                                    </th>
                                    <th class="text-center" colspan="3" style="background-color: #edc9b7;">Selisih
                                        Jumlah
                                        Barang Merchandise</th>
                                    <th class="text-center" colspan="3" style="background-color: #edc9b7;">Selisih
                                        Jumlah
                                        Ammount Merchandise (Besarkan Stok
                                        Opname)</th>
                                <tr class="text-center" style="font-size: 12px; color: black;">
                                    <th class="text-center" style="background-color: #97bff0;">Total</th>
                                    <th class="text-center" style="background-color: #97bff0;">Gudang 45</th>
                                    <th class="text-center" style="background-color: #97bff0;">Gudang 11</th>

                                    <th class="text-center" style="background-color: #a9e8c6;">Total</th>
                                    <th class="text-center" style="background-color: #a9e8c6;">Gudang 45</th>
                                    <th class="text-center" style="background-color: #a9e8c6;">Gudang 11</th>

                                    <th class="text-center" style="background-color: #edc9b7;">Total</th>
                                    <th class="text-center" style="background-color: #edc9b7;">Gudang 45</th>
                                    <th class="text-center" style="background-color: #edc9b7;">Gudang 11</th>

                                    <th class="text-center" style="background-color: #edc9b7;">Total</th>
                                    <th class="text-center" style="background-color: #edc9b7;">Gudang 45</th>
                                    <th class="text-center" style="background-color: #edc9b7;">Gudang 11</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                ?>
                                <?php foreach ($stok_merchan as $data) : ?>
                                <tr class="text-left text-dark text-small item">
                                    <td class="text-center"><small><?= $no++; ?></small></td>
                                    <td class="text-center"><small><?= $data['KODEBARANG'] ?></small></td>
                                    <td class=""><small><?= $data['NAMABARANG'] ?></small></td>
                                    <td class="text-right">
                                        <small><?= number_format($data['HARGA'], 0, ',', '.'); ?></small>
                                    </td>
                                    <td class="text-right" style="background-color: #97bff0;"><small><input type="text"
                                                name="" class="form-control" id="" value="12" readonly></small></td>
                                    <td class="text-right" style="background-color: #97bff0;">
                                        <small><input type="text" name="" class="form-control" id=""
                                                value="<?= $data['LOKASI'] ?>" readonly></small>
                                    </td>
                                    <td class="text-right" style="background-color: #97bff0;">
                                        <small><input type="text" name="" class="form-control" id=""
                                                value="<?= $data['LOKASI'] ?>" readonly></small>
                                    </td>

                                    <td class="text-right" style="background-color: #a9e8c6;"><small><input type="text"
                                                name="" class="form-control" id="" value=""></small></td>
                                    <td class="text-right" style="background-color: #a9e8c6;">
                                        <small><input type="text" name="" class="form-control" id=""
                                                value="<?= $data['LOKASI'] ?>"></small>
                                    </td>
                                    <td class="text-right" style="background-color: #a9e8c6;">
                                        <small><input type="text" name="" class="form-control" id=""
                                                value="<?= $data['LOKASI'] ?>"></small>
                                    </td>

                                    <td class="text-right" style="background-color: #edc9b7;"><small><input type="text"
                                                name="" class="form-control" id="" value="34" readonly></small></td>
                                    <td class="text-right" style="background-color: #edc9b7;">
                                        <small><input type="text" name="" class="form-control" id=""
                                                value="<?= $data['LOKASI'] ?>" readonly></small>
                                    </td>
                                    <td class="text-right" style="background-color: #edc9b7;">
                                        <small><input type="text" name="" class="form-control" id=""
                                                value="<?= $data['LOKASI'] ?>" readonly></small>
                                    </td>

                                    <td class="text-right" style="background-color: #edc9b7;"><small><input type="text"
                                                name="" class="form-control" id="" value="10" readonly></small></td>
                                    <td class="text-right" style="background-color: #edc9b7;">
                                        <small><input type="text" name="" class="form-control" id=""
                                                value="<?= number_format($data['HARGA'], 0, ',', '.'); ?>"
                                                readonly></small>
                                    </td>
                                    <td class="text-right" style="background-color: #edc9b7;">
                                        <small><input type="text" name="" class="form-control" id=""
                                                value="<?= number_format($data['HARGA'], 0, ',', '.'); ?>"
                                                readonly></small>
                                    </td>
                                </tr>


                                <?php endforeach; ?>
                            </tbody>
                            <tr class="text-left text-small" style="background-color: #4f6070; font-weight: bold;">
                                <td class="text-center text-light" colspan="3">Total</td>
                                <td class="text-right text-light">0</td>
                                <td class="text-right text-light">0</td>
                                <td class="text-right text-light">0</td>
                                <td class="text-right text-light">0</td>
                                <td class="text-right text-light">0</td>
                                <td class="text-right text-light">0</td>
                                <td class="text-right text-light">0</td>
                                <td class="text-right text-light">0</td>
                                <td class="text-right text-light">0</td>
                                <td class="text-right text-light">0</td>
                                <td class="text-right text-light">0</td>
                                <td class="text-right text-light">0</td>
                                <td class="text-right text-light">0</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>