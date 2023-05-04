<div class="container-fluid">
    <div class="col-md-12">
        <!-- <?= $this->session->flashdata('message'); ?> -->
        <div class="alert alert-info alert-dismissible d-flex align-items-center fade show">
            <i class="fa fa-info-circle"></i>
            <strong class="mx-2">Info!</strong>Data stock merchandise update setiap harinya (REALTIME) setelah
            proses barang masuk dan barang keluar.
            <!-- <button type="button" class="btn-close" data-bs-dismiss="alert"></button> -->
        </div>
        <div class="card shadow">
            <div class="card-header bg-info border-bottom-warning py-2">
                <div class="row">
                    <div class="col-sm-7">
                        <span class="text-light">STOK MERCHANDISE</span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- <div class="card-body"> -->
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="1">
                        <thead class="thead-light">
                            <tr class="text-center" style="font-size: 12px; color: black;">
                                <th class="align-middle text-center" rowspan="2">No</th>
                                <th class="align-middle text-center" rowspan="2">Tanggal</th>
                                <th class="align-middle text-center" rowspan="2">Kode Barang</th>
                                <th class="align-middle text-center" rowspan="2">Nama <br>Merchandise</th>
                                <th class="align-middle text-center" rowspan="2">Harga Merchandise</th>
                                <th class="text-center" colspan="3">Jumlah Merchandise</th>
                                <th class="text-center" colspan="3">Jumlah Ammount Merchandise</th>
                            <tr class="text-center" style="font-size: 12px; color: black;">
                                <th class="text-center">Total</th>
                                <th class="text-center">Gudang 45</th>
                                <th class="text-center">Gudang 11</th>

                                <th class="text-center">Total</th>
                                <th class="text-center">Gudang 45</th>
                                <th class="text-center">Gudang 11</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            ?>
                            <?php foreach ($stok_merchan as $data) : ?>
                            <tr class="text-left text-dark text-small item">
                                <td class="text-center"><small><?= $no++; ?></small></td>
                                <td class="text-center"><small><?= date('d M Y', strtotime($data['TGL'])) ?></small>
                                </td>
                                <td class="text-center"><small><?= $data['KODEBARANG'] ?></small></td>
                                <!-- <td class=""><small><?= $data['NAMABARANG'] ?></small></td> -->
                                <td class="text-dark"><small>
                                        <a href="<?= base_url() . $data['KODEBARANGMASUK'] ?>" type="button"
                                            data-toggle="modal"
                                            data-target="#bd-example-modal-lg<?= $data['KODEBARANGMASUK'] ?>"><?= $data['NAMABARANG'] ?></a></small>

                                    <!-- Modal trigger from nama barang atau nama merchandise-->
                                    <div class="modal fade bd-example-modal-lg"
                                        id="bd-example-modal-lg<?= $data['KODEBARANGMASUK'] ?>" tabindex="-1"
                                        role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-primary" id="exampleModalLabel">
                                                        <?= $data['NAMABARANG'] ?></h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="card-body">
                                                    <!-- <div class="card-body"> -->
                                                    <div class="table-responsive">
                                                        <table class="table table-hover" id="dataTable" width="100%"
                                                            cellspacing="1">
                                                            <thead class="thead-light">
                                                                <tr class="text-center"
                                                                    style="font-size: 12px; color: black; width: 50%;">
                                                                    <th class="align-middle text-center" rowspan="2">No
                                                                    </th>
                                                                    <th class="align-middle text-center" rowspan="2"
                                                                        style="width: 50%;">Tgl Barang
                                                                        Masuk/Keluar</th>
                                                                    <th class="align-middle text-center" rowspan="2"
                                                                        style="width: 50%;">Cabang/Vendor
                                                                    </th>
                                                                    <th class="align-middle text-center" rowspan="2"
                                                                        style="width: 50%;">Penggunaan
                                                                        Acara/Event</th>
                                                                    <th class="text-center" colspan="2">Tomang 11</th>
                                                                    <th class="text-center" colspan="2">Tomang 45</th>
                                                                    <th class="align-middle text-center" rowspan="2">
                                                                        Stok</th>
                                                                <tr class="text-center"
                                                                    style="font-size: 12px; color: black;">
                                                                    <th class="text-center">Masuk</th>
                                                                    <th class="text-center">Keluar</th>

                                                                    <th class="text-center">Total</th>
                                                                    <th class="text-center">Keluar</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    $no = 1;
                                                                    ?>
                                                                <tr class="text-left text-dark text-small item">
                                                                    <td class="text-center"><small><?= $no++; ?></small>
                                                                    </td>
                                                                    <td class="text-center"><small></small></td>
                                                                    <td class=""><small></small></td>
                                                                    <td class="text-right"><small></small></td>
                                                                    <td class="text-right"><small></small></td>
                                                                    <td class="text-right"><small></small></td>

                                                                    <td class="text-right"><small></small></td>
                                                                    <td class="text-right"><small></small></td>
                                                                    <td class="text-right"><small></small></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!-- </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End modal trigger namabarang -->

                                </td>
                                <td class="text-right"><small><?= number_format($data['HARGA'], 0, ',', '.'); ?></small>
                                </td>
                                <td class="text-right"><small><?= number_format($data['JUMLAH'], 0, ',', '.') ?></small>
                                </td>
                                <td class="text-right"><small><?= $data['LOKASI'] ?></small></td>
                                <td class="text-right"><small><?= $data['LOKASI'] ?></small></td>

                                <td class="text-right"><small><?= number_format($data['HARGA'], 0, ',', '.'); ?></small>
                                </td>
                                <td class="text-right"><small><?= $data['HARGA'] ?></small></td>
                                <td class="text-right"><small><?= $data['HARGA'] ?></small></td>
                            </tr>


                            <?php endforeach; ?>
                        </tbody>
                        <tr class="text-left text-small" style="background-color: #4f6070; font-weight: bold;">
                            <td class="text-center text-light" colspan="4">Total</td>
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
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>


<!-- Modal trigger from nama barang atau nama merchandise-->
<!-- <div class="modal fade bd-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">BUFF JONI</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="1">
                        <thead class="thead-light">
                            <tr class="text-center" style="font-size: 12px; color: black; width: 50%;">
                                <th class="align-middle text-center" rowspan="2">No</th>
                                <th class="align-middle text-center" rowspan="2" style="width: 50%;">Tgl Barang
                                    Masuk/Keluar</th>
                                <th class="align-middle text-center" rowspan="2" style="width: 50%;">Cabang/Vendor
                                </th>
                                <th class="align-middle text-center" rowspan="2" style="width: 50%;">Penggunaan
                                    Acara/Event</th>
                                <th class="text-center" colspan="2">Tomang 11</th>
                                <th class="text-center" colspan="2">Tomang 45</th>
                                <th class="align-middle text-center" rowspan="2">Stok</th>
                            <tr class="text-center" style="font-size: 12px; color: black;">
                                <th class="text-center">Masuk</th>
                                <th class="text-center">Keluar</th>

                                <th class="text-center">Total</th>
                                <th class="text-center">Keluar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            ?>
                            <tr class="text-left text-dark text-small item">
                                <td class="text-center"><small><?= $no++; ?></small></td>
                                <td class="text-center"><small></small></td>
                                <td class=""><small></small></td>
                                <td class="text-right"><small></small></td>
                                <td class="text-right"><small></small></td>
                                <td class="text-right"><small></small></td>

                                <td class="text-right"><small></small></td>
                                <td class="text-right"><small></small></td>
                                <td class="text-right"><small></small></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- End modal trigger namabarang -->