<div class="container-fluid">
    <div class="col-md-12">
        <?= $this->session->flashdata('message'); ?>
        <div class="card shadow">
            <div class="card-header bg-info border-bottom-warning py-2">
                <div class="row">
                    <div class="col">
                        <span class="text-light">MASTER DATA TEAM PAV</span>
                    </div>

                    <div class="col text-right">
                        <a href="<?= base_url('master_data/md_teamPAV') ?>"
                            class="text-warning"><span>Refresh</span></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="250%" cellspacing="1">
                        <thead class="thead-light">
                            <tr class="text-center" style="font-size: 12px; color: black;">
                                <th class="text-center">No</th>
                                <th class="text-center">Kode PAV</th>
                                <th class="text-center">Tanggal Pendaftaran</th>
                                <th class="text-center">NIP</th>
                                <th class="text-center">Nama Lengkap</th>
                                <th class="text-center">Position</th>
                                <th class="text-center">Tanggal Lahir</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center">Nomor HP</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Nomor Telp. Keluarga</th>
                                <th class="text-center">Tanggal Masuk Kerja</th>
                                <th class="text-center">Golongan Darah</th>
                                <th class="text-center">User ID Orion</th>
                                <th class="text-center">Foto</th>
                                <th class="text-center">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($dt_team_pav)) {
                                $no = 1;
                                foreach ($dt_team_pav as $teamPAV) {
                            ?>
                            <tr class="text-left" style="font-size: 12px; color: black;">
                                <td class="py-2 align-middle text-center"><?= $no++; ?></td>
                                <td class="py-2 align-middle"><?= $teamPAV['KODEPAV'] ?></td>
                                <td class="py-2 align-middle"><?= $teamPAV['CREATEDATE'] ?></td>
                                <td class="py-2 align-middle"><?= $teamPAV['NIP_PAV'] ?></td>
                                <td class="py-2 align-middle"><?= $teamPAV['NAMA_PAV'] ?></td>
                                <td class="py-2 align-middle"><?= $teamPAV['POSITION_PAV'] ?></td>
                                <td class="py-2 align-middle"><?= $teamPAV['TGL_LAHIR_PAV'] ?></td>
                                <td class="py-2 align-middle"><?= $teamPAV['ALAMAT_PAV'] ?></td>
                                <td class="py-2 align-middle"><?= $teamPAV['NO_HP_PAV'] ?></td>
                                <td class="py-2 align-middle"><?= $teamPAV['EMAIL_PAV'] ?></td>
                                <td class="py-2 align-middle"><?= $teamPAV['NO_TELP_KEL_PAV'] ?></td>
                                <td class="py-2 align-middle"><?= $teamPAV['TGL_MASUK_KERJA_PAV'] ?></td>
                                <td class="py-2 align-middle text-center"><?= $teamPAV['GOLDAR_PAV'] ?></td>
                                <td class="py-2 align-middle"><?= $teamPAV['USER_NAME'] ?></td>
                                <td class="py-2 align-middle text-center">
                                    <img src="<?= base_url('/uploads/data_pav/') . $teamPAV['FOTO'] ?>" alt="..."
                                        width="100">
                                </td>

                                <td class="py-2 align-middle text-center flex-column">

                                    <!-- Action Edit configuration team PAV -->
                                    <a href="<?= base_url('master_data/editTeamPAV/') . $teamPAV['KODEPAV'] ?>"
                                        class="tombol-edit-user"><span
                                            class="bg-success rounded py-2 pl-1 pr-0 rounded-circle"><i
                                                class="fa fa-edit text-light mx-2"></i></span></a>
                                    <!-- End Modal Edit Panduan team PAV -->
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