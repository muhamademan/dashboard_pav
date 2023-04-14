<div class="container-fluid">
    <div class="col-md-12">
        <?= $this->session->flashdata('message'); ?>
        <div class="card shadow">
            <div class="card-header bg-info border-bottom-warning py-2">
                <div class="row">
                    <div class="col">
                        <span class="text-light">Approval Merchandise Kepala Cabang</span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="1">
                        <thead>
                            <tr class="text-center" style="font-size: 12px; color: black;">
                                <th class="text-center">Tanggal <br>Permintaan</th>
                                <th class="text-center">Cabang</th>
                                <th class="text-center">No SPSM</th>
                                <th class="text-center">Tgl <br>Penggunaan</th>
                                <th class="text-center">Keterangan <br>Penggunaan</th>
                                <th class="text-center">Qty <br>Request</th>
                                <th class="text-center">Total <br>Amount</th>
                                <th class="text-center">Detail</th>
                                <th class="text-center">Approved / <br>Reject</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($dt_permintaan as $dt) {
                            ?>
                            <tr class="text-left" style="font-size: 12px; color: black;">
                                <td class="py-2 align-middle text-center"><?= $dt['TGLGUNA'] ?></td>
                                <td class="py-2 align-middle"><?= $dt['CABANG'] ?></td>
                                <!-- <td class="py-2 align-middle"><?= $this->session->userdata('USER_BRANCH') ?></td> -->
                                <td class="py-2 align-middle"><?= $dt['SPSM'] ?></td>
                                <td class="py-2 align-middle"><?= $dt['TGLGUNA'] ?></td>
                                <td class="py-2 align-middle"><?= $dt['KETERANGAN'] ?></td>
                                <td class="py-2 align-middle"><?= $dt['JUMLAHMINTA'] ?></td>
                                <td class="py-2 align-middle"><?= $dt['TOTAL_HARGA'] ?></td>
                                <td class="py-2 align-middle"><?= $dt['NAMABARANG'] ?></td>
                                <!-- <td class="py-2 align-middle"><?= $statusprf ?></td> -->

                                <td class="py-2 align-middle text-center flex-column">
                                    <!-- Action Approv permintaan barang -->
                                    <a href="<?= base_url('kepala_cabang/disetujui/') . $dt['KD_PERMINTAAN_BRG'] ?>"
                                        class="tombol-edit-user"><span class="bg-success rounded py-2 pl-1 pr-1"><i
                                                class="fa fa-check-square-o text-light mx-2"></i></span></a>
                                    <!-- End Approv permintaan barang -->

                                    <!-- Action Reject permintaan barang -->
                                    <a href="<?= base_url('kepala_cabang/reject/') . $dt['KODEBARANGMASUK'] ?>"
                                        class="tombol-edit-user"><span class="bg-danger rounded py-2 pl-1 pr-1"><i
                                                class="fa fa-close text-light mx-2"></i></span></a>
                                    <!-- End Reject permintaan barang -->
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