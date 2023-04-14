<div class="container-fluid">
    <div class="col-md-12">
        <div class="card shadow rounded" style="background-color: #c0c4bb;">
            <div class="d-flex mt-2">
                <div class="col-md-3">
                    <label for="">Date From</label>
                    <input type="date" class="form-control" name="tanggal1">
                </div>
                <div class="col-md-3">
                    <label for="">Date Thru</label>
                    <input type="date" class="form-control" name="tanggal2">
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-1">
                        <button type="button" class="text-light btn btn-warning mt-4">
                            <i class="fas fa-search"> Cari</i>
                        </button>
                    </div>
                </div>
                </button>
            </div>
        </div>


        <p class="font-weight-bold align-middle mt-4 mb-3 text-italic">PILIH HASIL DATA
            STOCK OPNAME</p>
        <div class="d-flex mb-4">
            <select name="hasil_opname" id="hasil_opname" class="form-control col-lg-3 selectpicker"
                data-live-search="true">
                <option value="" selected disabled>-- selected --</option>
                <option value="<?= date('Y/M/d') ?>">5 april 2023</option>
                <option value="<?= date('Y/M/d') ?>">10 april 2023</option>
            </select>
            <button type="button" class="text-light btn btn-warning ml-3"><i class="fa fa-search"></i> Cari</button>
        </div>


        <!-- ==================================== TABLE REPORT STOK OPNAM ==================================== -->
        <div class="card shadow">
            <div class="card-header bg-info border-bottom-warning py-2">
                <div class="row">
                    <div class="col d-flex justify-content-between">
                        <span class="text-light">REPORT STOK OPNAME</span>
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
                                <td class="text-right" style="background-color: #97bff0;"><small>989</small></td>
                                <td class="text-right" style="background-color: #97bff0;">
                                    <small><?= $data['LOKASI'] ?></small>
                                </td>
                                <td class="text-right" style="background-color: #97bff0;">
                                    <small><?= $data['LOKASI'] ?></small>
                                </td>

                                <td class="text-right" style="background-color: #a9e8c6;"><small>676</small></td>
                                <td class="text-right" style="background-color: #a9e8c6;">
                                    <small><?= $data['LOKASI'] ?></small>
                                </td>
                                <td class="text-right" style="background-color: #a9e8c6;">
                                    <small><?= $data['LOKASI'] ?></small>
                                </td>

                                <td class="text-right" style="background-color: #edc9b7;"><small>34</small></td>
                                <td class="text-right" style="background-color: #edc9b7;">
                                    <small><?= $data['LOKASI'] ?></small>
                                </td>
                                <td class="text-right" style="background-color: #edc9b7;">
                                    <small><?= $data['LOKASI'] ?></small>
                                </td>

                                <td class="text-right" style="background-color: #edc9b7;"><small>10</small></td>
                                <td class="text-right" style="background-color: #edc9b7;">
                                    <small><?= number_format($data['HARGA'], 0, ',', '.'); ?></small>
                                </td>
                                <td class="text-right" style="background-color: #edc9b7;">
                                    <small><?= number_format($data['HARGA'], 0, ',', '.'); ?></small>
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
    </div>
</div>
</div>