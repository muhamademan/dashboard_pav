<div class="container-fluid">
    <div class="col-md-12">
        <?= $this->session->flashdata('message'); ?>
        <div class="card shadow">
            <div class="card-header bg-info border-bottom-warning py-2">
                <div class="row">
                    <div class="col">
                        <span class="text-light">MASTER DATA TOOLS & MARKETING</span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="200%" cellspacing="1">
                        <thead class="thead-light">
                            <tr class="text-center" style="font-size: 12px; color: black;">
                                <th class="text-center">No</th>
                                <th class="text-center">Nomor</th>
                                <th class="text-center">Regional</th>
                                <th class="text-center">Cabang</th>
                                <th class="text-center">Umbul-Umbul</th>
                                <th class="text-center">X-Banner Logo JNE</th>
                                <th class="text-center">Badut JONI</th>
                                <th class="text-center">Tenda JNE</th>
                                <th class="text-center">Booth Portable</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($dt_toolsMar)) {
                                $no = 1;
                                foreach ($dt_toolsMar as $toolsMar) {
                            ?>
                            <tr class="text-left" style="font-size: 12px; color: black;">
                                <td class="py-3 align-middle text-center"><?= $no++; ?></td>
                                <td class="py-3 align-middle"><?= $toolsMar['NO'] ?></td>
                                <td class="py-3 align-middle"><?= $toolsMar['REGIONAL'] ?></td>
                                <td class="py-3 align-middle"><?= $toolsMar['CABANG'] ?></td>
                                <td class="py-3 align-middle"><?= $toolsMar['UMBUL'] ?></td>
                                <td class="py-3 align-middle"><?= $toolsMar['BANNER'] ?></td>
                                <td class="py-3 align-middle"><?= $toolsMar['BADUT'] ?></td>
                                <td class="py-3 align-middle"><?= $toolsMar['TENDA'] ?></td>
                                <td class="py-3 align-middle"><?= $toolsMar['BOOTH'] ?></td>
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