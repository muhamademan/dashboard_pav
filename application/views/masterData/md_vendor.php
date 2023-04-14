<div class="container-fluid">
    <div class="col-md-12">
        <?= $this->session->flashdata('message'); ?>
        <div class="card shadow">
            <div class="card-header bg-info border-bottom-warning py-2">
                <div class="row">
                    <div class="col">
                        <span class="text-light">MASTER DATA VENDOR</span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="250%" cellspacing="1">
                        <thead class="thead-light">
                            <tr class="text-center" style="font-size: 12px; color: black;">
                                <th class="text-center">No</th>
                                <th class="text-center">Kode Vendor</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Telephone</th>
                                <th class="text-center">Fax</th>
                                <th class="text-center">Currency</th>
                                <th class="text-center">Terms Of Payment</th>
                                <th class="text-center">Alamat Vendor</th>
                                <th class="text-center">Nama NPWP</th>
                                <th class="text-center">Alamat NPWP</th>
                                <th class="text-center">Nomor NPWP</th>
                                <th class="text-center">Metode Pemayaran</th>
                                <th class="text-center">Nomor Rekening</th>
                                <th class="text-center">Nama Bank</th>
                                <th class="text-center">Nama Penerima Rening</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($dt_vendor)) {
                                $no = 1;
                                foreach ($dt_vendor as $vendor) {
                            ?>
                            <tr class="text-left" style="font-size: 12px; color: black;">
                                <td class="py-1 align-middle text-center"><?= $no++ ?></td>
                                <td class="py-1 align-middle"><?= $vendor['KODEVENDOR'] ?></td>
                                <td class="py-1 align-middle"><?= $vendor['NAMA'] ?></td>
                                <td class="py-1 align-middle"><?= $vendor['TLP'] ?></td>
                                <td class="py-1 align-middle"><?= $vendor['FAX'] ?></td>
                                <td class="py-1 align-middle"><?= $vendor['CURRENCY'] ?></td>
                                <td class="py-1 align-middle"><?= $vendor['TOP'] ?></td>
                                <td class="py-1 align-middle"><?= $vendor['ALAMATVENDOR'] ?></td>
                                <td class="py-1 align-middle"><?= $vendor['NAMANPWP'] ?></td>
                                <td class="py-1 align-middle"><?= $vendor['ALAMATNPWP'] ?></td>
                                <td class="py-1 align-middle"><?= $vendor['NOMORNPWP'] ?></td>
                                <td class="py-1 align-middle"><?= $vendor['MPEMBAYARAN'] ?></td>
                                <td class="py-1 align-middle"><?= $vendor['NOREK'] ?></td>
                                <td class="py-1 align-middle"><?= $vendor['NAMABANK'] ?></td>
                                <td class="py-1 align-middle"><?= $vendor['NAMAREKENING'] ?></td>
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