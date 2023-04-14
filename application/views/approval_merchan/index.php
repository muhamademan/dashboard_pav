<div class="container-fluid">
    <div class="col-md-12">
        <?= $this->session->flashdata('message'); ?>
        <div class="card shadow">
            <div class="card-header bg-info border-bottom-warning py-2">
                <div class="row">
                    <div class="col">
                        <span class="text-light">APPROVAL MERCHANDISE ADMIN</span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="1">
                        <thead class="thead-light">
                            <tr class="text-center" style="font-size: 12px; color: black;">
                                <th class="text-center">Tanggal <br>Permintaan</th>
                                <th class="text-center">Cabang</th>
                                <th class="text-center">No SPSM</th>
                                <th class="text-center">Tgl <br>Penggunaan</th>
                                <th class="text-center">Keterangan <br>Penggunaan</th>
                                <!-- <th class="text-center">Qty <br>Request</th>
                                <th class="text-center">Total <br>Amount</th>
                                <th class="text-center">Nama <br>Merchandise</th> -->
                                <th class="text-center">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($dt_permintaan as $dt) {
                            ?>
                            <tr class="text-left" style="font-size: 12px; color: black;">
                                <td class="py-3 align-middle text-center"><?= $dt['CREATEDATE'] ?></td>
                                <td class="py-3 align-middle"><?= $dt['CABANG'] ?></td>
                                <td class="py-3 align-middle"><?= $dt['SPSM'] ?></td>
                                <td class="py-3 align-middle"><?= $dt['TGLGUNA'] ?></td>
                                <td class="py-3 align-middle"><?= $dt['KETERANGAN'] ?></td>
                                <!-- <td class="py-3 align-middle"><?= $dt['JUMLAHMINTA'] ?></td>
                                <td class="py-3 align-middle"><?= $dt['TOTAL_HARGA'] ?></td>
                                <td class="py-3 align-middle"><?= $dt['NAMABARANG'] ?></td> -->

                                <td class="py-3 align-middle text-center flex-column">
                                    <!-- Action detail permintaan barang -->
                                    <a href="<?= base_url('approval_merchandise/detailPermintaan/') . $dt['SPSM'] ?>"
                                        class="tombol-edit-user"><span
                                            class="bg-success rounded-circle py-2 pl-1 pr-1"><i
                                                class="fa fa-pencil-square-o text-light mx-2"></i></span></a>
                                    <!-- End detail permintaan barang -->
                                </td>

                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>