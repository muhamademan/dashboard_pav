<div class="container-fluid">
    <div class="col-md-12">
        <!-- <div class="card shadow rounded" style="background-color: #c0c4bb;">
            <div class="d-flex mt-2">
                <div class="col-md-3">
                    <label for="">Date From</label>
                    <input type="date" class="form-control" name="tgl_awal">
                </div>
                <div class="col-md-3">
                    <label for="">Date Thru</label>
                    <input type="date" class="form-control" name="tgl_akhir">
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-1">
                        <button type="button" class="text-light btn btn-warning mt-4">
                            <i class="fas fa-search"> Cari</i>
                        </button>
                    </div>
                </div>
                </button>
            </div>
        </div> -->


        <!-- <p class="font-weight-bold align-middle mt-4 mb-3 text-italic">PILIH TANGGAL
            STOCK OPNAME</p>
        <div class="d-flex mb-4">
            <select name="hasil_opname" id="hasil_opname" class="form-control col-lg-3 selectpicker"
                data-live-search="true">
                <option value="" selected disabled>-- selected --</option>
                <option value="<?= date('Y/M/d') ?>">5 april 2023</option>
                <option value="<?= date('Y/M/d') ?>">10 april 2023</option>
            </select>
            <button type="button" class="text-light btn btn-warning ml-3"><i class="fa fa-search"></i> Cari</button>
        </div> -->



        <div class="card-header col-6 shadow mb-4" style="background-color: #edeceb;">
            <div class="card-body col-md-12">
                <div class="container">
                    <!-- Load File Jquery -->
                    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
                    <!-- End Load File Jquery -->
                    <form action="" method="GET" class="">
                        <div class="form-group">
                            <label for="">Filter Berdasarkan</label>
                            <select class="form-control" name="filter" id="filter" style="width: 100%">
                                <option value="" selected disabled>Pilih Salah Satu</option>
                                <option value="1">Periode Tanggal</option>
                                <option value="2">Tanggal Opname</option>
                            </select>
                        </div>
                        <!-- ========== BERDASARKAN RANGE TANGGAL ========== -->
                        <div class="form-group" id="form-tanggal">
                            <label for="">Date From</label>
                            <input type="date" name="tanggal" class="form-control">
                        </div>
                        <div class="form-group" id="form-tanggal2">
                            <label>Date Thru</label>
                            <input type="date" name="tanggal2" class="form-control" />
                        </div>
                        <!-- ========== END BERDASARKAN RANGE TANGGAL ========== -->

                        <!-- ========== BERDASARKAN NAMA TANGGAL OPNAME ========== -->
                        <div class="form-group" id="form-opname">
                            <label>Tanggal Opname</label>
                            <select name="tgl_opname" class="form-control selectpicker" style="width: 50%"
                                data-actions-box="true" data-virtual-scroll="false" data-live-search="true">
                                <option value="" selected disabled>-- Select Option --</option>
                                <?php foreach ($tglOpname as $data) : ?>
                                <option value="<?= $data['TGL_OPNAME'] ?>"><?= $data['TGL_OPNAME'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <!-- ========== BERDASARKAN NAMA TANGGAL OPNAME ========== -->

                        <!-- ========== END BUTTON DATA FILTERISASI ========== -->
                        <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search">
                                Cari</i></button>
                        <a href="<?= base_url('stok_barangMerchan/report_stok_opname') ?>"
                            class="text-success btn btn-outline-inverse"><i class="fa fa-refresh"></i>
                            Refresh</a>
                        <!-- ========== END BUTTON DATA FILTERISASI ========== -->
                    </form>
                </div>
            </div>
        </div>

        <!-- ==================================== TABLE REPORT STOK OPNAM ==================================== -->
        <div class="card shadow">
            <div class="card-header bg-info border-bottom-warning py-2">
                <div class="row">
                    <div class="col d-flex justify-content-between">
                        <span class="text-light">REPORT STOK OPNAME</span>
                        <a href="<?= $cetak_file ?>" class="text-warning btn-outline-info" target="_blank"><i
                                class="fas fa-file-excel-o"></i> Excel</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="230%" cellspacing="1">
                        <thead class="thead-light">
                            <tr class="text-center" style="font-size: 12px; color: black;">
                                <th class="align-middle text-center" rowspan="2">No</th>
                                <th class="align-middle text-center" rowspan="2">Tanggal Opname</th>
                                <th class="align-middle text-center" rowspan="2">Tanggal Barang Masuk</th>
                                <th class="align-middle text-center" rowspan="2">Kode Barang</th>
                                <th class="align-middle text-center" rowspan="2">Nama <br>Merchandise</th>
                                <th class="align-middle text-center" rowspan="2">Harga Merchandise</th>
                                <th class="text-center" colspan="3" style="background-color: #97bff0;">Jumlah Stok
                                    Barang Merchandise</th>
                                <th class="text-center" colspan="3" style="background-color: #a9e8c6;">Perhitungan
                                    Stok Opname Jumlah Barang Merchandise
                                </th>
                                <th class="text-center" colspan="3" style="background-color: #edc9b7;">Selisih
                                    Jumlah
                                    Barang Merchandise</th>
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
                            <?php foreach ($dt_report as $data) : ?>
                            <tr class="text-left text-dark text-small item">
                                <td class="text-center"><small><?= $no++; ?></small></td>
                                <td class="text-center"><small><?= $data['TGL_OPNAME'] ?></small></td>
                                <td class="text-center"><small><?= $data['TGL_BRG'] ?></small></td>
                                <td class="text-center"><small><?= $data['KODEBARANG'] ?></small></td>
                                <td class=""><small><?= $data['NAMABARANG'] ?></small></td>
                                <td class="text-right">
                                    <small><?= number_format($data['HARGA'], 0, ',', '.'); ?></small>
                                </td>

                                <td class="text-right" style="background-color: #97bff0;">
                                    <small><?= $data['TOTAL_JUMLAH'] ?></small>
                                </td>
                                <td class="text-right" style="background-color: #97bff0;">
                                    <small><?= $data['JUMLAH45'] ?></small>
                                </td>
                                <td class="text-right" style="background-color: #97bff0;">
                                    <small><?= $data['JUMLAH11'] ?></small>
                                </td>

                                <td class="text-right" style="background-color: #a9e8c6;">
                                    <small><?= $data['TOTAL_PERHITUNGAN'] ?></small>
                                </td>
                                <td class="text-right" style="background-color: #a9e8c6;">
                                    <small><?= $data['PERHITUNGAN_STOK45'] ?></small>
                                </td>
                                <td class="text-right" style="background-color: #a9e8c6;">
                                    <small><?= $data['PERHITUNGAN_STOK11'] ?></small>
                                </td>

                                <td class="text-right" style="background-color: #edc9b7;">
                                    <small><?= $data['SELISIH_QTY'] ?></small>
                                </td>
                                <td class="text-right" style="background-color: #edc9b7;">
                                    <small><?= $data['SELISIH_QTY45'] ?></small>
                                </td>
                                <td class="text-right" style="background-color: #edc9b7;">
                                    <small><?= $data['SELISIH_QTY11'] ?></small>
                                </td>

                                <td class="text-right" style="background-color: #edc9b7;">
                                    <small><?= $data['SELISIH_HARGA'] ?></small>
                                </td>
                                <td class="text-right" style="background-color: #edc9b7;">
                                    <small><?= $data['SELISIH_HARGA45'] ?></small>
                                </td>
                                <td class="text-right" style="background-color: #edc9b7;">
                                    <small><?= $data['SELISIH_HARGA11'] ?></small>
                                </td>
                            </tr>


                            <?php endforeach; ?>
                        </tbody>
                        <tr class="text-left text-small" style="background-color: #4f6070; font-weight: bold;">
                            <td class="text-center text-light" colspan="5">TOTAL REPORT OPNAME</td>
                            <?php foreach ($dt_tgl as $data) : ?>
                            <td class="text-right text-light"><?= number_format($data['HARGA'], 0, ',', '.') ?></td>
                            <td class="text-right text-light"><?= number_format($data['TOTAL_JUMLAH'], 0, ',', '.') ?>
                            </td>
                            <td class="text-right text-light"><?= number_format($data['JUMLAH45'], 0, ',', '.') ?></td>
                            <td class="text-right text-light"><?= number_format($data['JUMLAH11'], 0, ',', '.') ?></td>
                            <td class="text-right text-light"><?= number_format($data['TOTAL_JUMLAH'], 0, ',', '.') ?>
                            </td>
                            <td class="text-right text-light">
                                <?= number_format($data['PERHITUNGAN_STOK45'], 0, ',', '.') ?></td>
                            <td class="text-right text-light">
                                <?= number_format($data['PERHITUNGAN_STOK11'], 0, ',', '.') ?></td>
                            <td class="text-right text-light"><?= number_format($data['TOTAL_JUMLAH'], 0, ',', '.') ?>
                            </td>
                            <td class="text-right text-light"><?= number_format($data['SELISIH_QTY45'], 0, ',', '.') ?>
                            </td>
                            <td class="text-right text-light"><?= number_format($data['SELISIH_QTY11'], 0, ',', '.') ?>
                            </td>
                            <td class="text-right text-light"><?= number_format($data['TOTAL_JUMLAH'], 0, ',', '.') ?>
                            </td>
                            <td class="text-right text-light">
                                <?= number_format($data['SELISIH_HARGA45'], 0, ',', '.') ?></td>
                            <td class="text-right text-light">
                                <?= number_format($data['SELISIH_HARGA11'], 0, ',', '.') ?></td>
                            <?php endforeach ?>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<!-- ====================================== SCRIPT JQUERY FILTER DATA ====================================== -->
<script>
$(document).ready(function() { // Ketika halaman selesai di load
    $('#form-tanggal, #form-tanggal2, #form-opname')
        .hide(); // Sebagai default kita sembunyikan form filternya
    $('#filter').change(function() { // Ketika user memilih filter
        if ($(this).val() == '1') { // Jika filter nya 1 (per tanggal)
            $('#form-opname').hide();
            $('#form-tanggal').show(); // Tampilkan form tanggal
            $('#form-tanggal2').show(); // Tampilkan form tanggal
        } else if ($(this).val() == '2') { // Jika filter nya 2 (per regional)
            $('#form-tanggal, #form-tanggal2').hide();
            $('#form-opname').show(); // Tampilkan form regional
        }
        $('#form-tanggal input, #form-tanggal2 input, #form-opname select').val(
            ''); // Clear data pada textbox filter
    })
})
</script>
<!-- ====================================== END SCRIPT JQUERY FILTER DATA ====================================== -->