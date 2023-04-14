<div class="container-fluid">
    <div class="col-md-12">
        <?= $this->session->flashdata('message'); ?>
        <div class="card shadow">
            <div class="card-header bg-secondary border-bottom-warning py-2">
                <div class="row">
                    <div class="col-sm-7">
                        <span class="text-light">DETAIL APPROVAL MERCHANDISE</span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="<?= base_url('approval_merchandise/preview') ?>" method="post" class="form-inline">
                    <table>
                        <?php foreach ($dt_permintaan as $detail) { ?>
                        <tr class="text-center">
                            <td class="col-sm-5 control-label">Nama Cabang:</td>
                            <td>
                                <input type="text" class="form-control" name="NAMA_CABANG" id="cabang"
                                    value="<?= $detail['CABANG'] ?>" readonly>
                            </td>

                            <td hidden>
                                <input type="text" class="form-control" name="DESTINASI" id="DESTINASI"
                                    value="<?= $detail['DESTINASI'] ?>" readonly>
                                <input type="text" class="form-control" name="REGIONAL" id="REGIONAL"
                                    value="<?= $detail['REGIONAL'] ?>" readonly>
                                <input type="text" class="form-control" name="NAMA_PEMINTA" id="NAMA_PEMINTA"
                                    value="<?= $detail['NAMA_PEMINTA'] ?>" readonly>
                                <input type="text" class="form-control" name="DEPARTEMENT" id="DEPARTEMENT"
                                    value="<?= $detail['DEPARTEMENT'] ?>" readonly>
                            </td>

                        </tr>
                        <tr class="text-center">
                            <td class="col-sm-5 control-label">Nomor SPSM:</td>
                            <td>
                                <input type="text" name="NO_SPSM" class="form-control" id="spsm"
                                    value="<?= $detail['SPSM']; ?>" readonly>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td class="col-sm-5 control-label">Tangaal Penggunaan:</td>
                            <td>
                                <input type="text" name="TGL_PENGGUNAAN" class="form-control" id="spsm"
                                    value="<?= $detail['TGLGUNA']; ?>" readonly>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td class="col-sm-5 control-label">Keterangan Pengguna:</td>
                            <td>
                                <input type="text" name="KETERANGAN" class="form-control" id="spsm"
                                    value="<?= $detail['KETERANGAN']; ?>" readonly>
                            </td>
                            <td hidden>
                                <input type="text" name="TGL_PERMINTAAN" class="form-control" id="TGL_PERMINTAAN"
                                    value="<?= $detail['CREATEDATE']; ?>" readonly>
                            </td>
                            <!-- GET NAMA PAV -->
                            <td hidden>
                                <input type="text" name="NAMA_PAV" class="form-control" id="NAMA_PAV"
                                    value="<?= $user['NAME_ORION']; ?>" readonly>
                            </td>
                            <!-- END GET NAMA PAV -->
                        </tr>
                        <?php } ?>
                    </table>
                    <!-- <div class="card-body"> -->
                    <div class="table-responsive mt-5">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr class="text-center" style="font-size: 12px; color: black;">
                                    <th class="text-center">No</th>
                                    <th class="text-center">Kode Barang</th>
                                    <th class="text-center">Nama <br>Merchandise</th>
                                    <th class="text-center text-primary">Stock <br>On Hand</th>
                                    <th class="text-center text-primary">Sisa Stock<br>On Hand</th>
                                    <th class="text-center text-primary">Harga Stock <br>On Hand</th>
                                    <th class="text-center text-primary">Balance<br>Harga</th>
                                    <th class="text-center">Jumlah<br>Permintaan</th>
                                    <th class="text-center text-white" style="background-color: #e34317;">
                                        Jumlah<br>Yang Disetujui</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1; ?>
                                <?php foreach ($detail2 as $dt) { ?>
                                <tr class="text-left text-dark text-small item">
                                    <td class="text-center"><small><?= $no++; ?></small></td>
                                    <td>
                                        <!-- kode barang -->
                                        <small><input type="text" name="KODE_BARANG[]" value="<?= $dt['KODEBARANG'] ?>"
                                                readonly></small>
                                    </td>
                                    <td>
                                        <!-- nama barang -->
                                        <small><input type="text" name="NAMA_MERCHANDISE[]"
                                                value="<?= $dt['NAMABARANG'] ?>" readonly></small>
                                    </td>
                                    <td>
                                        <!-- Stock On Hand -->
                                        <small><input type="text" class="text-primary STOCK_ONHAND"
                                                name="STOCK_ON_HAND[]" id="STOCK_ONHAND" value="<?= $dt['TOTAL'] ?>"
                                                readonly></small>
                                    </td>
                                    <td>
                                        <!-- sisa stock on hand -->
                                        <small><input type="text" class="text-primary SISA_STOCK_ONHAND"
                                                name="SISA_STOCK_ONHAND[]" id="SISA_STOCK_ONHAND" value="0"
                                                readonly></small>
                                    </td>
                                    <td>
                                        <!-- harga stock on hand -->
                                        <small><input type="text" class="text-primary HARGA_STOCK_ONHAND"
                                                name="HARGA_STOCK_ONHAND[]" id="HARGA_STOCK_ONHAND"
                                                value="<?= $dt['HARGA_STOCK'] ?>" readonly></small>
                                    </td>
                                    <td>
                                        <!-- Balance harga -->
                                        <small><input type="text" class="text-primary BALANCE_HARGA"
                                                name="BALANCE_HARGA[]" value="0" id="BALANCE_HARGA" readonly></small>
                                    </td>
                                    <td>
                                        <!-- Jumlah permintaan -->
                                        <small><input type="text" name="JUMLAH_PERMINTAAN[]" id="JUMLAH_PERMINTAAN"
                                                class="JUMLAH_PERMINTAAN" value="<?= $dt['JUMLAHMINTA'] ?>"
                                                readonly></small>
                                    </td>
                                    <td class="text-warning" style="background-color: #e34317;">
                                        <!-- Jumlah yang disetujui -->
                                        <!-- <small><input type="number" name="JML_DISETUJUI" class="text-danger" required
                                                id="JML_DISETUJUI" placeholder="Input" autocomplete="off"
                                                oninput="validasi()"></small> -->
                                        <small><input type="number" name="JUMLAH_DISETUJUI[]"
                                                class="text-danger JML_DISETUJUI" required id="JML_DISETUJUI"
                                                placeholder="Input" autocomplete="off"></small>
                                    </td>
                                    <td>
                                        <!-- Harga -->
                                        <small><input type="text" class="HARGA" name="HARGA[]"
                                                value="<?= $dt['HARGA'] ?>" id="HARGA" readonly></small>

                                        <!-- <small>
                                            <select name="HARGA[]" id="HARGA" class="form-control HARGA"
                                                data-action-box="true" data-virtual-scroll="false"
                                                data-live-search="true" required
                                                oninvalid="this.setCustomValidity('data tidak boleh kosong')"
                                                oninput="setCustomValidity('')">
                                                <option value="" selected disabled>--selected--</option>
                                                <option value="<?= $dt['HARGA'] ?>"><?= $dt['HARGA'] ?>
                                                </option>
                                            </select>
                                        </small> -->
                                    </td>
                                    <td>
                                        <!-- total harga -->
                                        <small><input type=" text" name="TOTAL_HARGA[]" class="TOTAL_HARGA" value="0"
                                                id="TOTAL_HARGA" readonly>
                                        </small>
                                    </td>
                                    <td hidden>
                                        <small>
                                            <input name="KODEBARANGMASUK[]" type="text"
                                                value="<?= $dt['KODEBARANGMASUK'] ?>" class="form-control" readonly
                                                id="KODEBARANGMASUK">
                                        </small>
                                    </td>
                                    <!-- SISA JUMLAH MINTA -->
                                    <td hidden>
                                        <small><input type="text" name="SISA_JUMLAHMINTA[]" id="SISA_JUMLAHMINTA"
                                                value="" class="SISA_JUMLAHMINTA" readonly></small>
                                    </td>
                                    <!-- END SISA JUMLAH MINTA -->
                                    <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- </div> -->

                    <div class="col text-right mt-3">
                        <div class="d-flex justify-content-between">
                            <a href="<?= base_url('approval_merchandise') ?>" type="submit"
                                class="btn btn-outline-danger py-2"><i class="fa fa-backward mx-2"></i>Back</a>
                            <button type="submit" class="btn btn-outline-primary py-2"><i
                                    class="fa fa-eye mx-2"></i>Preview</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
$('.item').each(function() {
    const obj = $(this)
    const jmlDisetujui = obj.find('.JML_DISETUJUI')
    const harga = obj.find('.HARGA')
    const totalHarga = obj.find('.TOTAL_HARGA')

    const stokOnhand = obj.find('.STOCK_ONHAND')
    const sisaStokOnhand = obj.find('.SISA_STOCK_ONHAND')
    const hargaBalance = obj.find('.BALANCE_HARGA')
    const hargaStokOnhand = obj.find('.HARGA_STOCK_ONHAND')
    const jumlahPermintaan = obj.find('.JUMLAH_PERMINTAAN')
    const sisaJumlahMinta = obj.find('.SISA_JUMLAHMINTA')

    jmlDisetujui.keyup(function() {
        totalHarga.val(jmlDisetujui.val() * harga.val())
        hargaBalance.val(hargaStokOnhand.val() - totalHarga.val())
        sisaStokOnhand.val(stokOnhand.val() - jmlDisetujui.val())
        sisaJumlahMinta.val(jumlahPermintaan.val() - jmlDisetujui.val())
    })
})
// $(document).ready(function() {
//     $("#STOCK_ONHAND, #JML_DISETUJUI").keyup(function() {
//         var stock2 = $("#STOCK_ONHAND").val();
//         var jumlah2 = $("#JML_DISETUJUI").val();

//         var sisa2 = parseInt(stock2) - parseInt(jumlah2)
//         $("#SISA_STOCK_ONHAND").val(sisa2)
//     })
// })

// $(document).ready(function() {
//     $("#JUMLAH_PERMINTAAN, #JML_DISETUJUI").keyup(function() {
//         var jml = $("#JUMLAH_PERMINTAAN").val();
//         var jumlah3 = $("#JML_DISETUJUI").val();

//         var sisa3 = parseInt(jml) - parseInt(jumlah3)
//         $("#SISA_JUMLAHMINTA").val(sisa3)
//     })
// })

// $(document).ready(function() {
//     $("#JML_DISETUJUI, #HARGA, #TOTAL_HARGA, #HARGA_STOCK_ONHAND").keyup(function() {
//         var jml_disetujui = $("#JML_DISETUJUI").val()
//         var harga = $("#HARGA").val()

//         var total_hargaa = $("#TOTAL_HARGA").val()
//         var harga_stok_onhandd = $("#HARGA_STOCK_ONHAND").val()

//         var balance_harga = parseInt(harga_stok_onhandd) - parseInt(total_hargaa)
//         $("#BALANCE_HARGA").val(balance_harga)

//         var total_harga = parseInt(jml_disetujui) * parseInt(harga)
//         $("#TOTAL_HARGA").val(total_harga)
//     })
// })

// function validasi() {
//     const jumlahminta = document.getElementById("JUMLAH_PERMINTAAN").innerHTML;
//     const jml_disetujui = document.getElementById("JML_DISETUJUI").innerHTML;

//     if (jml_disetujui > jumlahminta) {
//         alert("Jumlah yang disetujui melebihi jumlah permintaan")
//     }
// }
</script>