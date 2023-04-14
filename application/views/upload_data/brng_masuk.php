<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<div class="container-fluid">
    <div class="col-md-12 align-center">
        <?= $this->session->flashdata('message') ?>
        <div class="card shadow">
            <div class="card-header bg-info border-bottom-warning">
                <span class="text-light">Upload Data Barang Masuk Dari Vendor</span>
            </div>
            <div class="card-body">
                <form action="<?= base_url('upload_data/add_barangMasuk') ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="row">
                        <!-- <input type="hidden" name="id" value=""> -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="TGL"><small>Tanggal Entry</small></label>
                                <input name="TGL" type="date" class="form-control" id="TGL" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="LOKASI"><small>Lokasi Barang</small></label>
                                <select name="LOKASI" id="LOKASI" class="form-control">
                                    <option value="" selected disabled>--selected--</option>
                                    <option value="Gudang 45">Gudang 45</option>
                                    <option value="Gudang 11">Gudang 11</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="KODEVENDOR"><small>Nama Vendor</small></label>
                                <select name="KODEVENDOR" id="KODEVENDOR" class="form-control selectpicker"
                                    data-action-box="true" data-virtual-scroll="false" data-live-search="true" required
                                    oninvalid="this.setCustomValidity('data tidak boleh kosong')"
                                    oninput="setCustomValidity('')">
                                    <option value="" selected disabled>--selected--</option>
                                    <?php foreach ($dt_vendor as $dt) { ?>
                                    <option value="<?= $dt['KODEVENDOR'] ?>"><?= $dt['NAMA'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="SURATJALAN"><small>Nomor Surat Jalan</small></label>
                                <input name="SURATJALAN" type="text" class="form-control" id="SURATJALAN"
                                    autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="PURCHASE_ORDER"><small>Nomor Purchase Order</small></label>
                                <input name="PURCHASE_ORDER" type="text" class="form-control" id="PURCHASE_ORDER"
                                    autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="FSUPPORT"><small>Form Support</small></label>
                                <input name="FSUPPORT" type="text" class="form-control" id="FSUPPORT"
                                    autocomplete="off">
                            </div>
                        </div>

                        <!-- TABEL TAMBAH DATA BARANG DARI VENDOR -->
                        <div class="col-md-12 text-primary mt-4 mb-4 d-flex justify-content-between">
                            <p>Masukan Data Barang</p>
                            <button type="button" name="add" id="add-more" class="btn btn-success"><i
                                    class="fa fa-plus-square" aria-hidden="true"></i></button>
                        </div>
                        <div id="dynamic_field" class="container-fluid row text-center after-add-more">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="KODEBARANG"><small>Kode Barang</small></label>
                                    <select name="KODEBARANG[]" id="KODEBARANG" class="form-control selectpicker"
                                        data-action-box="true" data-virtual-scroll="false" data-live-search="true"
                                        onchange="test()" required
                                        oninvalid="this.setCustomValidity('data tidak boleh kosong')"
                                        oninput="setCustomValidity('')">
                                        <option value="" selected disabled>--selected--</option>
                                        <?php foreach ($dt_barang as $brg) : ?>
                                        <option value="<?= $brg['KODE_BARANG'] ?>"><?= $brg['KODE_BARANG'] ?> |
                                            <?= $brg['NAMA_BARANG'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="NAMABARANG"><small>Nama Merchandise</small></label>
                                    <input name="NAMABARANG[]" type="text" class="form-control" autocomplete="off"
                                        value="" readonly id="NAMABARANG">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="JUMLAH"><small>Jumlah</small></label>
                                    <input name="JUMLAH[]" type="text" class="form-control" id="JUMLAH"
                                        autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="HARGA"><small>Harga</small></label>
                                    <input name="HARGA[]" type="text" class="form-control" id="HARGA"
                                        autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Divider -->
                    <hr class="sidebar-divider">
                    <div class="mt-3 text-center">
                        <button type="submit" class="btn btn-block btn-lg btn-success"><i
                                class="fa fa-floppy-o text-light mx-3"></i>Simpan</button>
                    </div>
                </form>

                <!-- batas hide row table-->
                <div class="text-center d-none" id="copy">
                    <div class="container-fluid control-group row text-center">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="KODEBARANG"><small>Kode Barang</small></label>
                                <select name="KODEBARANG[]" id="KODEBARANG2" class="form-control" data-action-box="true"
                                    data-virtual-scroll="false" data-live-search="true" onchange="test2()" required
                                    oninvalid="this.setCustomValidity('data tidak boleh kosong')"
                                    oninput="setCustomValidity('')">
                                    <option value="" selected disabled>--selected--</option>
                                    <?php foreach ($dt_barang as $brg) : ?>
                                    <option value="<?= $brg['KODE_BARANG'] ?>"><?= $brg['KODE_BARANG'] ?> |
                                        <?= $brg['NAMA_BARANG'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="NAMABARANG"><small>Nama Merchandise</small></label>
                                <input name="NAMABARANG[]" type="text" class="form-control" autocomplete="off" value=""
                                    readonly id="NAMABARANG2">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="JUMLAH"><small>Jumlah</small></label>
                                <input name="JUMLAH[]" type="text" class="form-control" id="JUMLAH" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="HARGA"><small>Harga</small></label>
                                <input name="HARGA[]" type="text" class="form-control" id="HARGA" autocomplete="off">
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
        url: "<?= base_url('/upload_data/get_kode') ?>",
        data: postForm,
        dataType: 'json',
        success: function(data) {
            $("#NAMABARANG").val(data.brg);
        },
        error: function(e) {
            console.log('error:', e);
        }
    });
}

function test2() {
    var kodebarang = $("#KODEBARANG2").val();
    var op = 1
    var postForm = "id=" + kodebarang + "&op=" + op;
    $.ajax({
        type: "post",
        url: "<?= base_url('/upload_data/get_kode') ?>",
        data: postForm,
        dataType: 'json',
        success: function(data) {
            $("#NAMABARANG2").val(data.brg);
        },
        error: function(e) {
            console.log('erorr add more:', e);
        }
    });
}
</script>

<!-- <script type="text/javascript">
$(document).ready(function() {
    var i = 1;

    $('#add').click(function() {
        i++;
        $('#dynamic_field').append('<div class="container-fluid" id="row' + i +
            '"><div class="row"><div class="col-sm-2"><div class="form-group"><label for="name"><small>Kode Barang</small></label><input type="text" class="form-control" name="KODEBARANG[]" autocomplete="off"></div></div><div class="col-sm-2"><div class="form-group"><label for="NAMABARANG"><small>Nama Merchandise</small></label><input type="text" class="form-control" id="NAMABARANG" name="NAMABARANG[]" autocomplete="off"></div></div><div class="col-sm-2"><div class="form-group"><label for="JUMLAH"><small>Jumlah</small></label><input type="text" class="form-control" id="JUMLAH" name="JUMLAH[]" autocomplete="off"></div></div><div class="col-sm-2"><div class="form-group"><label for="HARGA"><small>Harga</small></label><input type="text" class="form-control" id="HARGA" name="HARGA[]" autocomplete="off"></div></div><button type="button" name="remove" id="' +
            i +
            '" class="btn btn-sm btn_remove"><i class="fa fa-times" aria-hidden="true"></i></button></div></div></div>'
        );
    });

    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        var res = confirm('Are You Sure You Want To Delete This?');
        if (res == true) {
            $('#row' + button_id + '').remove();
            $('#' + button_id + '').remove();
        }
    });

});
</script> -->