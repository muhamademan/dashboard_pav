<div class="container-fluid">
    <div class="col-md-12">
        <?= $this->session->flashdata('message'); ?>
        <div class="col mb-2 text-right">
            <button type="button" data-toggle="modal" data-target="#dataBarang" class="btn btn-outline-info"><i
                    class="fa fa-plus-circle"></i>
                Create</button>
        </div>
        <div class="card shadow">
            <div class="card-header bg-info border-bottom-warning py-2">
                <div class="row">
                    <div class="col">
                        <span class="text-light">MASTER DATA BARANG</span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="1">
                        <thead class="thead-light">
                            <tr class="text-center" style="font-size: 12px; color: black;">
                                <th class="text-center">No</th>
                                <th class="text-center">Kode Barang</th>
                                <th class="text-center">Nama Barang/Merchandise</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($dt_barang)) {
                                $no = 1;
                                foreach ($dt_barang as $dt) {
                            ?>
                            <tr class="text-left" style="font-size: 12px; color: black;">
                                <td class="py-3 align-middle text-center"><?= $no++; ?></td>
                                <td class="py-3 align-middle"><?= $dt['KODE_BARANG'] ?></td>
                                <td class="py-3 align-middle"><?= $dt['NAMA_BARANG'] ?></td>
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


<!-- Modal -->
<div class="modal fade" id="dataBarang" tabindex="-1" role="dialog" aria-labelledby="dataBarangLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dataBarangLabel">Create Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('master_data/addDataBarang') ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <label for="KODE_BARANG"><small>Kode Barang</small></label>
                            <input type="text" class="form-control" name="KODE_BARANG" id="KODE_BARANG" required
                                autocomplete="off" onkeyup="this.value = this.value.toUpperCase()">
                        </div>
                        <div class="col">
                            <label for="NAMA_BARANG"><small>Kode Barang</small></label>
                            <input type="text" class="form-control" name="NAMA_BARANG" id="NAMA_BARANG" required
                                autocomplete="off" onkeyup="this.value = this.value.toUpperCase()">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="sumit" class="btn btn-outline-success btn-block py-2"><i class="fa fa-save"></i> Save
                        Data</button>
                </div>
            </form>
        </div>
    </div>
</div>