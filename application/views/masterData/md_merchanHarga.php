<div class="container-fluid">
    <div class="col-md-12">
        <?= $this->session->flashdata('message'); ?>
        <div class="card shadow">
            <div class="card-header bg-info border-bottom-warning py-2">
                <div class="row">
                    <div class="col">
                        <span class="text-light">MASTER DATA MERCHANDISE & HARGA</span>
                    </div>
                    <!-- <div class="col text-right">
                        <button class="btn btn-success py-0" data-toggle="modal" data-target="#newV">
                            <i class="fa fa-user-plus text-light mx-1"></i>
                        </button>
                    </div> -->
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="200%" cellspacing="1">
                        <thead class="thead-light">
                            <tr class="text-center" style="font-size: 12px; color: black;">
                                <th class="text-center">No</th>
                                <th class="text-center">Tgl Entry Vendor</th>
                                <th class="text-center">Lokasi Barang</th>
                                <th class="text-center">Vendor</th>
                                <th class="text-center">Surat Jalan</th>
                                <th class="text-center">No Purchase Order</th>
                                <th class="text-center">Kode Barang</th>
                                <th class="text-center">Nama Merchandise</th>
                                <th class="text-center">Qty</th>
                                <th class="text-center">Harga Satuan</th>
                                <th class="text-center">Form Support</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($dt_merchan)) {
                                $no = 1;
                                foreach ($dt_merchan as $merchan) {
                            ?>
                            <tr class="text-left" style="font-size: 12px; color: black;">
                                <td class="py-3 align-middle"><?= $no++; ?></td>
                                <td class="py-3 align-middle"><?= $merchan['TGL'] ?></td>
                                <td class="py-3 align-middle"><?= $merchan['LOKASI'] ?></td>
                                <td class="py-3 align-middle"><?= $merchan['KODEVENDOR'] ?></td>
                                <td class="py-3 align-middle"><?= $merchan['SURATJALAN'] ?></td>
                                <td class="py-3 align-middle"><?= $merchan['PURCHASE_ORDER'] ?></td>
                                <td class="py-3 align-middle"><?= $merchan['KODEBARANG'] ?></td>
                                <td class="py-3 align-middle"><?= $merchan['NAMABARANG'] ?></td>
                                <td class="py-3 align-middle"><?= $merchan['JUMLAH'] ?></td>
                                <td class="py-3 align-middle"><?= number_format($merchan['HARGA'], 0, ',', '.'); ?></td>
                                <td class="py-3 align-middle"><?= $merchan['FSUPPORT'] ?></td>
                            </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>