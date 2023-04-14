<div class="container-fluid">
    <div class="col-md-12">
        <?= $this->session->flashdata('message'); ?>
        <div class="card shadow">
            <div class="card-header bg-info border-bottom-warning py-2">
                <div class="row">
                    <div class="col">
                        <span class="text-light">MASTER DATA CABANG</span>
                    </div>
                    <div class="col text-right">
                        <a href="<?= base_url('master_data/md_cabang') ?>" class="text-warning"><span>Refresh</span></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="250%" cellspacing="1">
                        <thead class="thead-light">
                            <tr class="text-center" style="font-size: 12px; color: black;">
                                <th class="text-center">No</th>
                                <th class="text-center">Destinasi</th>
                                <th class="text-center">Kode Cabang</th>
                                <th class="text-center">Regional</th>
                                <th class="text-center">Status Cabang Utama / <br>Mitra (Agen)</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center">Nama Kacab</th>
                                <th class="text-center"><small class="text-danger">User Orion</small> <br>Kepala Cabang
                                </th>
                                <th class="text-center">HP Kacab</th>
                                <th class="text-center">Email Kacab</th>
                                <th class="text-center">Nama PIC Cabang</th>
                                <th class="text-center">Departement</th>
                                <th class="text-center"><small class="text-danger">User Orion</small><br> PIC
                                    Cabang
                                </th>
                                <th class="text-center">Nomor HP</th>
                                <th class="text-center">Email PIC</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($dt_cabang)) {
                                $no = 1;
                                foreach ($dt_cabang as $dt) {
                            ?>
                            <tr class="text-left" style="font-size: 12px; color: black;">
                                <td class="py-2 align-middle text-center"><?= $no++; ?></td>
                                <td class="py-2 align-middle"><?= $dt['DESTINASI'] ?></td>
                                <td class="py-2 align-middle"><?= $dt['KODECABANG'] ?></td>
                                <td class="py-2 align-middle"><?= $dt['REGIONAL'] ?></td>
                                <td class="py-2 align-middle"><?= $dt['STATUS_CABANG'] ?></td>
                                <td class="py-2 align-middle"><?= $dt['ALAMAT'] ?></td>
                                <td class="py-2 align-middle"><?= $dt['NAMA_KACAB'] ?></td>
                                <td class="py-2 align-middle"><?= $dt['KACAB'] ?></td>
                                <td class="py-2 align-middle"><?= $dt['HPKACAB'] ?></td>
                                <td class="py-2 align-middle"><?= $dt['EMAILKACAB'] ?></td>
                                <td class="py-2 align-middle"><?= $dt['NAMA_PIC_CAB'] ?></td>
                                <td class="py-2 align-middle"><?= $dt['DEPARTEMENT'] ?></td>
                                <td class="py-2 align-middle"><?= $dt['USER_NAME'] ?></td>
                                <td class="py-2 align-middle"><?= $dt['HPPIC'] ?></td>
                                <td class="py-2 align-middle"><?= $dt['EMAILPIC'] ?></td>
                                <!-- <td class="py-2 align-middle text-center">
                                    <img src="<?= base_url('') ?>" class="m-4" alt="..." style="max-width: 50px">
                                </td> -->


                                <!-- Action lihat gambar-->
                                <td class=" py-2 align-middle text-center">

                                    <!-- Action Edit configuration data cabang -->
                                    <a href="<?= base_url('master_data/editCabang/') . $dt['ID_CABANG'] ?>"
                                        class="tombol-edit-user"><span
                                            class="bg-success rounded py-2 pl-1 pr-0 rounded-circle"><i
                                                class="fa fa-edit text-light mx-2"></i></span></a>
                                    <!-- End Modal Edit Panduan data cabang -->
                                </td>
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