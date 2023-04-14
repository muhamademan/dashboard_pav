<div class="container-fluid">
    <div class="col-md-12">
        <?= $this->session->flashdata('message'); ?>
        <!-- ========================================= FILTER STATUS REPORT PAV ========================================= -->
        <div class="card-header col-6 shadow mb-4" style="background-color: #edeceb;">
            <div class="card-body col-md-12">
                <div class="container">
                    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
                    <!-- Load File Jquery -->
                    <form action="" method="GET" class="">
                        <div class="form-group">
                            <label for="">Filter Berdasarkan</label>
                            <select class="form-control" name="filter" id="filter" style="width: 100%">
                                <option value="" selected disabled>Pilih Salah Satu</option>
                                <option value="1">Range Tanggal</option>
                                <option value="2">Regional</option>
                                <option value="3">Merchandise</option>
                                <option value="4">Merchandise & Range Tanggal</option>
                                <option value="5">Regional & Range Tanggal</option>
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

                        <!-- ========== BERDASARKAN NAMA CABANG / REGIONAL ========== -->
                        <div class="form-group" id="form-regional">
                            <label>Regional/Destinasi</label>
                            <select name="regional" class="form-control selectpicker" style="width: 50%"
                                data-actions-box="true" data-virtual-scroll="false" data-live-search="true">
                                <option value="" selected disabled>-- Select Option --</option>
                                <?php foreach ($report_regional as $data) : ?>
                                <option value="<?= $data['REGIONAL'] ?>"><?= $data['REGIONAL'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <!-- ========== BERDASARKAN NAMA CABANG / REGIONAL ========== -->

                        <!-- ========== BERDASARKAN MERCHANDISE ========== -->
                        <div class="form-group" id="form-merchandise">
                            <label>Nama Merchandise</label>
                            <select name="merchandise" class="form-control selectpicker" style="width: 50%"
                                data-actions-box="true" data-virtual-scroll="false" data-live-search="true">
                                <option value="" selected disabled>-- Select Option --</option>
                                <?php
                                foreach ($report_merchan as $data) {
                                    echo '<option value="' . $data['NAMABARANG'] . '">' . $data['NAMABARANG'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <!-- ========== END BERDASARKAN MERCHANDISE ========== -->

                        <!-- ========== BERDASARKAN MERCHANDISE DAN RANGE TANGGAL ========== -->
                        <div class="form-group" id="form-merchandise2">
                            <label>Merchandise</label>
                            <select name="merchandise2" class="form-control selectpicker" style="width: 50%"
                                data-actions-box="true" data-virtual-scroll="false" data-live-search="true">
                                <option value="" selected disabled>-- Select Option --</option>
                                <?php foreach ($report_merchan as $data) : ?>
                                <option value="<?= $data['NAMABARANG'] ?>"><?= $data['NAMABARANG'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group" id="dari_tanggal_merchan">
                            <label for="">Date From</label>
                            <input type="date" name="tanggal3" class="form-control">
                        </div>
                        <div class="form-group" id="sampai_tanggal_merchan">
                            <label>Date Thru</label>
                            <input type="date" name="tanggal4" class="form-control" />
                        </div>
                        <!-- ========== END BERDASARKAN MERCHANDISE DAN RANGE TANGGAL ========== -->

                        <!-- ========== BERDASARKAN REGIONAL DAN RANGE TANGGAL ========== -->
                        <div class="form-group" id="form-regional2">
                            <label>Regional</label>
                            <select name="regional2" class="form-control selectpicker" style="width: 50%"
                                data-actions-box="true" data-virtual-scroll="false" data-live-search="true">
                                <option value="" selected disabled>-- Select Option --</option>
                                <?php
                                foreach ($report_regional as $data) {
                                    echo '<option value="' . $data['REGIONAL'] . '">' . $data['REGIONAL'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group" id="dari_tanggal_regional">
                            <label for="">Dari Tanggal</label>
                            <input type="date" name="tanggal5" class="form-control">
                        </div>
                        <div class="form-group" id="sampai_tanggal_regional">
                            <label>Sampai Tanggal</label>
                            <input type="date" name="tanggal6" class="form-control" />
                        </div>
                        <!-- ========== END BERDASARKAN REGIONAL DAN RANGE TANGAAL ========== -->

                        <!-- ========== END BUTTON DATA FILTERISASI ========== -->
                        <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search">
                                Cari</i></button>
                        <a href="<?= base_url('report_pav/report') ?>" class="text-success btn btn-outline-inverse"><i
                                class="fa fa-refresh"></i> Refresh</a>
                        <!-- ========== END BUTTON DATA FILTERISASI ========== -->
                    </form>
                </div>
            </div>
        </div>
        <!-- ========================================= END FILTER STATUS REPORT PAV ========================================= -->


        <!-- ==================================== TABLE REPORT PAV ==================================== -->
        <div class="card shadow mt-3">
            <div class="card-header bg-info border-bottom-warning py-2">
                <div class="row">
                    <div class="col">
                        <div class="d-flex justify-content-between">
                            <span class="text-light">REPORT HARIAN MERCHANDISE</span>
                            <a href="" target="_blank" class="text-warning btn-outline-info"><i
                                    class="fas fa-file-excel-o"></i> Excel</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="180%" cellspacing="1">
                        <thead class="thead-light">
                            <tr class="text-center" style="font-size: 12px; color: black;">
                                <th class="text-center">No</th>
                                <th class="text-center">Nomor SPSM</th>
                                <th class="text-center">Tanggal Permintaan</th>
                                <th class="text-center">Tanggal Kirim</th>
                                <th class="text-center">PIC PAV</th>
                                <th class="text-center">Kode Barang</th>
                                <th class="text-center">Nama Merchandise</th>
                                <!-- <th class="text-center">Lokasi Barang</th> -->
                                <th class="text-center">Branch</th>
                                <th class="text-center">Regional</th>
                                <th class="text-center">Destination</th>
                                <th class="text-center">PIC Cabang</th>
                                <th class="text-center">Event/Acara</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            ?>
                            <?php foreach ($dt_report as $data) { ?>
                            <tr class="text-left" style="font-size: 12px; color: black;">
                                <td class="py-3 align-middle text-center"><?= $no++; ?></td>
                                <td class="py-3 align-middle text-center"><?= $data['SPSM'] ?></td>
                                <td class="py-3 align-middle text-center"><?= $data['TGLPERMINTAAN'] ?></td>
                                <td class="py-3 align-middle text-center"><?= $data['TGLKIRIM'] ?></td>
                                <td class="py-3 align-middle text-center"><?= $data['NAMAPAV'] ?></td>
                                <td class="py-3 align-middle text-center"><?= $data['KODEBARANG'] ?></td>
                                <td class="py-3 align-middle text-center"><?= $data['NAMABARANG'] ?></td>
                                <!-- <td class="py-3 align-middle text-center"></td> -->
                                <td class="py-3 align-middle text-center"><?= $data['KODE_CABANG'] ?></td>
                                <td class="py-3 align-middle text-center"><?= $data['CABANG'] ?></td>
                                <td class="py-3 align-middle text-center"><?= $data['REGIONAL'] ?></td>
                                <td class="py-3 align-middle text-center"><?= $data['PIC'] ?></td>
                                <td class="py-3 align-middle text-center"><?= $data['KETERANGAN'] ?></td>
                                <td class="py-3 align-middle text-center"><?= $data['QTY'] ?></td>
                                <td class="py-3 align-middle text-center"><?= $data['HARGA'] ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- ==================================== TABLE REPORT PAV ==================================== -->
    </div>
</div>
</div>

<!-- ====================================== SCRIPT JQUERY FILTER DATA ====================================== -->
<script>
$(document).ready(function() { // Ketika halaman selesai di load
    $('#form-tanggal, #form-tanggal2, #form-regional, #form-merchandise, #form-merchandise2, #dari_tanggal_merchan, #sampai_tanggal_merchan, #form-regional2, #dari_tanggal_regional, #sampai_tanggal_regional')
        .hide(); // Sebagai default kita sembunyikan form filternya
    $('#filter').change(function() { // Ketika user memilih filter
        if ($(this).val() == '1') { // Jika filter nya 1 (per tanggal)
            $('#form-regional, #form-merchandise, #form-merchandise2, #dari_tanggal_merchan, #sampai_tanggal_merchan, #form-regional2, #dari_tanggal_regional, #sampai_tanggal_regional')
                .hide();
            $('#form-tanggal').show(); // Tampilkan form tanggal
            $('#form-tanggal2').show(); // Tampilkan form tanggal
        } else if ($(this).val() == '2') { // Jika filter nya 2 (per regional)
            $('#form-tanggal, #form-tanggal2, #form-merchandise, #form-merchandise2, #dari_tanggal_merchan, #sampai_tanggal_merchan, #form-regional2, #dari_tanggal_regional, #sampai_tanggal_regional')
                .hide();
            $('#form-regional').show(); // Tampilkan form regional
        } else if ($(this).val() == '3') { // Jika filter nya 2 (per merhandise)
            $('#form-tanggal, #form-tanggal2, #form-regional, #form-merchandise2, #dari_tanggal_merchan, #sampai_tanggal_merchan, #form-regional2, #dari_tanggal_regional, #sampai_tanggal_regional')
                .hide();
            $('#form-merchandise').show(); // Tampilkan form merchandise
        } else if ($(this).val() ==
            '4') { // Jika filter nya 3 (per merchandise dan periode tanggal permintaan)
            $('#form-tanggal, #form-tanggal2, #form-regional, #form-merchandise, #form-regional2, #dari_tanggal_regional, #sampai_tanggal_regional')
                .hide();
            $('#form-merchandise2').show(); // Tampilkan form merchandise
            $('#dari_tanggal_merchan').show(); // Tampilkan form tanggal
            $('#sampai_tanggal_merchan').show(); // Tampilkan form tanggal
        } else if ($(this).val() ==
            '5') { // Jika filter nya 3 (per regional dan periode tanggal permintaan)
            $('#form-tanggal, #form-tanggal2, #form-regional, #form-merchandise, #form-merchandise2, #dari_tanggal_merchan, #sampai_tanggal_merchan')
                .hide();
            $('#form-regional2').show(); // Tampilkan form regional
            $('#dari_tanggal_regional').show(); // Tampilkan form tanggal
            $('#sampai_tanggal_regional').show(); // Tampilkan form tanggal
        }
        $('#form-tanggal input, #form-bulan select, #form-jenis select, #form-tipe select, #form-kcu select, #form-milik select')
            .val(
                ''); // Clear data pada textbox filter
    })
})
</script>
<!-- ====================================== END SCRIPT JQUERY FILTER DATA ====================================== -->