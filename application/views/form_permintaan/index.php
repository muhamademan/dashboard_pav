<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

<div class="container-fluid flex">
    <div class="col align-center">
        <?= $this->session->flashdata('message') ?>
        <div class="card shadow">
            <div class="card-header bg-info border-bottom-warning justify-content-between">
                <div class="row">
                    <div class="col">
                        <span class="text-light font-weight-bold">FORM PERMINTAAN MERCHANDISE</span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="<?= base_url('form_permintaan/proses_submit') ?>" method="post"
                    enctype="multipart/form-data">
                    <!-- <div class="row"> -->
                    <input type="hidden" name="id" value="">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="SPSM">Nomor SPSM</label>
                            <input name="SPSM" type="text" class="form-control" id="SPSM"
                                value="SPSM/VII/2023/<?= sprintf("%03s", $no_spsm) ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="TGLGUNA">Tanggal Penggunaan</label>
                            <input name="TGLGUNA" type="date" class="form-control" id="TGLGUNA" value="">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="KETERANGAN">Keterangan Penggunaan</label>
                            <input name="KETERANGAN" type="text" class="form-control" id="KETERANGAN" value=""
                                onkeyup="this.value = this.value.toUpperCase()" autocomplete="off">
                        </div>
                    </div>
                    <input type="text" name="CABANG" value="<?= $user['KODECABANG'] ?>" readonly hidden>
                    <input type="text" name="DESTINASI" value="<?= $user['DESTINASI'] ?>" readonly hidden>
                    <input type="text" name="REGIONAL" value="<?= $user['REGIONAL'] ?>" readonly hidden>
                    <input type="text" name="NAMA_PEMINTA" value="<?= $user['NAME_ORION'] ?>" readonly hidden>
                    <input type="text" name="DEPARTEMENT" value="<?= $user['DEPARTEMENT'] ?>" readonly hidden>

                    <!-- TABEL TAMBAH DATA PERMINTAAN MERCHANDISE -->
                    <div class="col-md-12 text-primary mt-4 mb-4 d-flex justify-content-between">
                        <p>Masukan Data Permintaan Merchandise</p>
                        <button type="button" id="add-more" class="btn btn-success"><i class="fa fa-plus-square"
                                aria-hidden="true"></i></button>
                    </div>

                    <div id="dynamic_field" class="container-fluid row text-center after-add-more">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="KODEBARANG"><small>Kode Barang</small></label>
                                <select name="KODEBARANG[]" id="KODEBARANG" class="form-control" data-action-box="true"
                                    data-virtual-scroll="false" data-live-search="true" required onchange="test()"
                                    oninvalid="this.setCustomValidity('data tidak boleh kosong')"
                                    oninput="setCustomValidity('')">
                                    <option value="" selected disabled>--selected--</option>
                                    <?php foreach ($dt_barang as $brng) { ?>
                                    <option value="<?= $brng['KODEBARANG'] ?>"><?= $brng['KODEBARANG'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <input name="KODEBARANGMASUK[]" type="text" class="form-control" readonly id="KODEBARANGMASUK"
                            hidden>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="NAMABARANG"><small>Nama Merchandise</small></label>
                                <input name="NAMABARANG[]" type="text" class="form-control" autocomplete="off" value=""
                                    readonly id="NAMABARANG">
                            </div>
                        </div>

                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="STOCK"><small class="text-warning">Stock</small></label>
                                <input name="STOCK[]" type="text" class="form-control" id="STOCK" autocomplete="off"
                                    value="" readonly>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="SISA"><small class="text-warning">Sisa</small></label>
                                <input name="SISA[]" type="text" class="form-control" id="SISA" autocomplete="off"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="JUMLAHMINTA"><small>Jumlah</small></label>
                                <input name="JUMLAHMINTA[]" type="text" class="form-control" id="JUMLAHMINTA"
                                    autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="HARGA"><small>Harga</small></label>
                                <input name="HARGA[]" id="HARGA" class="form-control" readonly="readonly">
                                </input>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="TOTAL_HARGA"><small>Total Harga</small></label>
                                <input name="TOTAL_HARGA[]" type="text" class="form-control" id="TOTAL_HARGA"
                                    autocomplete="off" readonly>
                            </div>
                        </div>
                    </div>
                    <!-- </div> -->
                    <hr class="sidebar-divider">
                    <div class="mt-3 text-center">
                        <button type="submit" class="btn btn-block btn-lg btn-outline-success">SUBMIT</button>
                    </div>
                </form>

                <!-- batas hide row table-->
                <div class="text-center d-none" id="copy">
                    <div class="container-fluid control-group row text-center">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="KODEBARANG"><small>Kode Barang</small></label>
                                <select name="KODEBARANG[]" id="KODEBARANG2" class="form-control" data-action-box="true"
                                    data-virtual-scroll="false" data-live-search="true" required onchange="test2()"
                                    oninvalid="this.setCustomValidity('data tidak boleh kosong')"
                                    oninput="setCustomValidity('')">
                                    <option value="" selected disabled>--selected--</option>
                                    <?php foreach ($dt_barang2 as $brng) { ?>
                                    <option value="<?= $brng['KODEBARANG'] ?>"><?= $brng['KODEBARANG'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <input name="KODEBARANGMASUK[]" type="text" class="form-control" readonly id="KODEBARANGMASUK2"
                            hidden>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="NAMABARANG"><small>Nama Merchandise</small></label>
                                <!-- <div id="NAMABARANG2"></div> -->
                                <input name="NAMABARANG[]" type="text" class="form-control" autocomplete="off" value=""
                                    readonly id="NAMABARANGG">
                            </div>
                        </div>

                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="STOCK"><small class="text-warning">Stock</small></label>
                                <input name="STOCK[]" type="text" class="form-control" id="STOCK2" autocomplete="off"
                                    value="" readonly>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="SISA"><small class="text-warning">Sisa</small></label>
                                <input name="SISA[]" type="text" class="form-control" id="SISA2" autocomplete="off"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="JUMLAHMINTA"><small>Jumlah</small></label>
                                <input name="JUMLAHMINTA[]" type="text" class="form-control" id="JUMLAHMINTA2"
                                    autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="HARGA"><small>Harga</small></label>
                                <input name="HARGA[]" id="HARGA2" class="form-control" readonly="readonly">
                                </input>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="TOTAL_HARGA"><small>Total Harga</small></label>
                                <input name="TOTAL_HARGA[]" type="text" class="form-control" id="TOTAL_HARGA2"
                                    autocomplete="off" readonly>
                            </div>
                        </div>
                        <button class="btn remove" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
                    </div>
                    <!-- end hide row table -->

                </div>
            </div>
        </div>
    </div>
</div>
<!-- </div> -->


<script type="text/javascript">
$(document).ready(function() {
    $("#add-more").click(function() {
        var html = $("#copy").html();
        $(".after-add-more").after(html);
    });

    // saat tombol remove dklik control group akan dihapus 
    $("body").on("click", ".remove", function() {
        $(this).parents(".control-group").remove();
    });
});
</script>

<script>
function test() {
    var kodebarang = $("#KODEBARANG").val();
    var op = 1
    var postForm = "id=" + kodebarang + "&op=" + op;
    $.ajax({
        type: "post",
        url: "<?= base_url('/form_permintaan/kode_barang') ?>",
        data: postForm,
        dataType: 'json',
        success: function(data) {
            // data = JSON.parse(data);
            // exit();
            // $("#NAMABARANG").html(data);
            $("#KODEBARANGMASUK").val(data.kodebrg);
            $("#NAMABARANG").val(data.brg);
            $("#STOCK").val(data.jml)
            $("#HARGA").val(data.hrg);
        },
        error: function(e) {
            console.log('error:', e);
        }
    });

    $(document).ready(function() {
        $("#JUMLAHMINTA, #HARGA").keyup(function() {
            var harga = $("#HARGA").val();
            var jumlah = $("#JUMLAHMINTA").val();

            var total = parseInt(harga) * parseInt(jumlah);
            $("#TOTAL_HARGA").val(total);
        })
    })

    $(document).ready(function() {
        $("#STOCK, #JUMLAHMINTA").keyup(function() {
            var stock = $("#STOCK").val();
            var jumlah = $("#JUMLAHMINTA").val();

            var sisa = parseInt(stock) - parseInt(jumlah);
            $("#SISA").val(sisa);
        })
    })
}

function test2() {
    var kodebarang = $("#KODEBARANG2").val();
    var op = 1
    var postForm = "id=" + kodebarang + "&op=" + op;
    $.ajax({
        type: "post",
        url: "<?= base_url('/form_permintaan/kode_barang') ?>",
        data: postForm,
        dataType: 'json',
        success: function(data) {
            // alert(data);
            // exit();
            // $("#NAMABARANG2").html(data);
            // $("#NAMABARANGG").hide();
            $("#KODEBARANGMASUK2").val(data.kodebrg);
            $("#NAMABARANGG").val(data.brg);
            $("#STOCK2").val(data.jml)
            $("#HARGA2").val(data.hrg);
        },
        error: function(e) {
            console.log('erorr add more:', e);
        }
    });

    // JS PERHITUNGAN SISA STOCK BARANG DAN TOTAL HARGA
    $(document).ready(function() {
        $("#JUMLAHMINTA2, #HARGA2").keyup(function() {
            var harga2 = $("#HARGA2").val();
            var jumlah2 = $("#JUMLAHMINTA2").val();

            var total2 = parseInt(harga2) * parseInt(jumlah2)
            $("#TOTAL_HARGA2").val(total2);
        })
    })

    $(document).ready(function() {
        $("#STOCK2, #JUMLAHMINTA2").keyup(function() {
            var stock2 = $("#STOCK2").val();
            var jumlah2 = $("#JUMLAHMINTA2").val();

            var sisa2 = parseInt(stock2) - parseInt(jumlah2)
            $("#SISA2").val(sisa2)
        })
    })
}
</script>

<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
<!-- <script>

</script> -->