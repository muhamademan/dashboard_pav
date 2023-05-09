<div class="container-fluid">
    <div class="col-md-12">
        <form action="<?= base_url('stok_barangMerchan/inputOpname') ?>" method="post">
            <div class="mb-4">
                <label for="test">TANGGAL STOCK OPNAME :</label>
                <input type="text" class="form-control col-lg-3" name="TGL_OPNAME" readonly
                    value="<?= date('d-M-Y') ?>">
            </div>
            <?= $this->session->flashdata('message') ?>
            <!-- ==================================== TABLE STOK OPNAM ==================================== -->
            <div class="card shadow">
                <div class="card-header bg-info border-bottom-warning py-2">
                    <div class="row">
                        <div class="col d-flex justify-content-between">
                            <span class="text-light">STOK OPNAME</span>
                            <button class="btn btn-warning pl-4 justify-content-right" type="submit"><i
                                    class="fa fa-save">
                                    SIMPAN</i></button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable" width="230%" cellspacing="1">
                            <thead class="thead-light">
                                <tr class="text-center" style="font-size: 12px; color: black;">
                                    <th class="align-middle text-center" rowspan="2">No</th>
                                    <th class="align-middle text-center" rowspan="2">Tanggal</th>
                                    <th class="align-middle text-center" rowspan="2">Kode Barang</th>
                                    <th class="align-middle text-center" rowspan="2">Nama <br>Merchandise</th>
                                    <th class="align-middle text-center" rowspan="2">Harga Merchandise</th>
                                    <th class="text-center" colspan="3" style="background-color: #97bff0;">Jumlah Stok
                                        Merchandise</th>
                                    <th class="text-center" colspan="3" style="background-color: #a9e8c6;">Perhitungan
                                        Stok
                                        Opname Jumlah Merchandise
                                    </th>
                                    <th class="text-center" colspan="3" style="background-color: #edc9b7;">Selisih
                                        Jumlah Merchandise</th>
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
                                    <td class="text-center"><small><input type="text" class="form-control"
                                                name="TGL_BRG[]" value="<?= $data['TGL'] ?>" readonly>
                                        </small>
                                    </td>
                                    <td class="text-center"><small><input type="text" class="form-control" readonly
                                                name="KODEBARANG[]" value="<?= $data['KODEBARANG'] ?>">
                                        </small>
                                    </td>
                                    <td class=""><small><input type="text" class="form-control" name="NAMABARANG[]"
                                                readonly value="<?= $data['NAMABARANG'] ?>">
                                        </small>
                                    </td>
                                    <td class="text-center">
                                        <small><input type="text" class="form-control" name="HARGA[]" readonly
                                                value="<?= number_format($data['HARGA'], 0, ',', '.'); ?>">
                                        </small>
                                    </td>

                                    <!-- ===================== Jumlah Stok Merchandise ===================== -->
                                    <td class="text-right" style="background-color: #97bff0;"><small><input type="text"
                                                name="TOTAL_JUMLAH[]" class="form-control"
                                                value="<?= number_format($data['JUMLAH'], 0, ',', '.') ?>"
                                                readonly></small></td>
                                    <td class="text-right" style="background-color: #97bff0;">
                                        <small>
                                            <?php if ($data['LOKASI'] == 'Gudang 45') { ?>
                                            <input type="text" name="JUMLAH45[]" class="form-control stok45" id=""
                                                value="<?= $data['JUMLAH'] ?>" readonly>
                                            <?php } else { ?>
                                            <input type="text" name="JUMLAH45[]" class="form-control stok45" id=""
                                                value="-" readonly>
                                            <?php } ?>
                                        </small>
                                    </td>

                                    <td class="text-right" style="background-color: #97bff0;">
                                        <small>
                                            <?php if ($data['LOKASI'] == 'Gudang 11') { ?>
                                            <input type="text" name="JUMLAH11[]" class="form-control stok11" id=""
                                                value="<?= $data['JUMLAH'] ?>" readonly>
                                            <?php } else { ?>
                                            <input type="text" name="JUMLAH11[]" class="form-control stok11" id=""
                                                value="-" readonly>
                                            <?php } ?>
                                        </small>
                                    </td>
                                    <!-- ===================== END ===================== -->

                                    <!-- ===================== Perhitungan Stok Opname Jumlah Merchandise ===================== -->
                                    <td class="text-right" style="background-color: #a9e8c6;"><small><input type="text"
                                                name="TOTAL_PERHITUNGAN[]" class="form-control" id=""
                                                value="<?= number_format($data['JUMLAH'], 0, ',', '.') ?>"
                                                readonly></small></td>
                                    <td class="text-right" style="background-color: #a9e8c6;">
                                        <small>
                                            <?php if ($data['LOKASI'] == 'Gudang 45') { ?>
                                            <input type="text" name="PERHITUNGAN_STOK45[]" class="form-control opname45"
                                                id="" value="<?= $data['JUMLAH'] ?>">
                                            <?php } else { ?>
                                            <input type="text" name="PERHITUNGAN_STOK45[]" class="form-control opname45"
                                                id="" value="-" readonly>
                                            <?php } ?>
                                        </small>
                                    </td>

                                    <td class="text-right" style="background-color: #a9e8c6;">
                                        <small>
                                            <?php if ($data['LOKASI'] == 'Gudang 11') { ?>
                                            <input type="text" name="PERHITUNGAN_STOK11[]" class="form-control opname11"
                                                id="" value="<?= $data['JUMLAH'] ?>">
                                            <?php } else { ?>
                                            <input type="text" name="PERHITUNGAN_STOK11[]" class="form-control opname11"
                                                id="" value="-" readonly>
                                            <?php } ?>
                                        </small>
                                    </td>
                                    <!-- ===================== END ===================== -->

                                    <!-- ===================== Selisih Jumlah Merchandise ===================== -->
                                    <td class="text-right" style="background-color: #edc9b7;"><small><input type="text"
                                                name="SELISIH_QTY[]" class="form-control"
                                                value="<?= number_format($data['JUMLAH'], 0, ',', '.') ?>"
                                                readonly></small></td>

                                    <td class="text-right" style="background-color: #edc9b7;">
                                        <small>
                                            <?php if ($data['LOKASI'] == 'Gudang 45') { ?>
                                            <input type="text" name="SELISIH_QTY45[]" class="form-control selisihQty45"
                                                value="0" readonly>
                                            <?php } else { ?>
                                            <input type="text" name="SELISIH_QTY45[]" class="form-control selisihQty45"
                                                value="-" readonly>
                                            <?php } ?>
                                        </small>
                                    </td>

                                    <td class="text-right" style="background-color: #edc9b7;">
                                        <small>
                                            <?php if ($data['LOKASI'] == 'Gudang 11') { ?>
                                            <input type="text" name="SELISIH_QTY11[]" class="form-control selisihQty11"
                                                value="0" readonly>
                                            <?php } else { ?>
                                            <input type="text" name="SELISIH_QTY11[]" class="form-control selisihQty11"
                                                value="-" readonly>
                                            <?php } ?>
                                        </small>
                                    </td>
                                    <!-- ===================== END ===================== -->

                                    <!-- ===================== Selisih Jumlah Ammount Merchandise (Besarkan Stok Opname) ===================== -->
                                    <td class="text-right" style="background-color: #edc9b7;"><small><input type="text"
                                                name="SELISIH_HARGA[]" class="form-control harga"
                                                value="<?= $data['HARGA'] ?>" readonly></small></td>
                                    <td class="text-right" style="background-color: #edc9b7;">
                                        <small>
                                            <?php if ($data['LOKASI'] == 'Gudang 45') { ?>
                                            <input type="text" name="SELISIH_HARGA45[]"
                                                class="form-control selishiHarga45" value="0" readonly>
                                            <?php } else { ?>
                                            <input type="text" name="SELISIH_HARGA45[]"
                                                class="form-control selishiHarga45" value="-" readonly>
                                            <?php } ?>
                                        </small>
                                    </td>

                                    <td class="text-right" style="background-color: #edc9b7;">
                                        <small>
                                            <?php if ($data['LOKASI'] == 'Gudang 11') { ?>
                                            <input type="text" name="SELISIH_HARGA11[]"
                                                class="form-control selisihHarga11" value="0" readonly>
                                            <?php } else { ?>
                                            <input type="text" name="SELISIH_HARGA11[]"
                                                class="form-control selisihHarga11" value="-" readonly>
                                            <?php } ?>
                                        </small>
                                    </td>
                                    <!-- ===================== END ===================== -->
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
$('.item').each(function() {
    const obj = $(this)
    const opname45 = obj.find('.opname45')
    const selisihQty45 = obj.find('.selisihQty45')
    const stok45 = obj.find('.stok45')

    const opname11 = obj.find('.opname11')
    const selisihQty11 = obj.find('.selisihQty11')
    const stok11 = obj.find('.stok11')

    const selishiHarga45 = obj.find('.selishiHarga45')
    const selisihHarga11 = obj.find('.selisihHarga11')
    const harga = obj.find('.harga')

    opname45.keyup(function() {
        selisihQty45.val(opname45.val() - stok45.val())
        selishiHarga45.val(selisihQty45.val() * harga.val())
    })

    opname11.keyup(function() {
        selisihQty11.val(opname11.val() - stok11.val())
        selisihHarga11.val(selisihQty11.val() * harga.val())
    })
})
</script>