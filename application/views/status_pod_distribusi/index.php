<div class="container-fluid">
    <div class="col-md-12">
        <?= $this->session->flashdata('message'); ?>
        <!-- ========================================= FILTER STATUS POD DISTRIBUSI ========================================= -->
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
                                <option value="3">Regional & Range Tanggal</option>
                            </select>
                        </div>

                        <!-- BERDASARKAN RANGE TANGGAL -->
                        <div class="form-group" id="form-tanggal">
                            <label for="">Dari Tanggal</label>
                            <input type="date" name="tanggal" class="form-control">
                        </div>
                        <div class="form-group" id="form-tanggal2">
                            <label>Sampai Tanggal</label>
                            <input type="date" name="tanggal2" class="form-control" />
                        </div>

                        <!-- BERDASARKAN REGIONAL -->
                        <div class="form-group" id="form-regional">
                            <label>Regional</label>
                            <select name="regional" class="form-control selectpicker" style="width: 50%"
                                data-actions-box="true" data-virtual-scroll="false" data-live-search="true">
                                <option value="" selected disabled>-- Select Option --</option>
                                <?php
                                foreach ($regional as $data) {
                                    echo '<option value="' . $data['REGIONAL'] . '">' . $data['REGIONAL'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <!-- BERDASARKAN REGIONAL DAN RANGE TANGGAL -->
                        <div class="form-group" id="form-regional2">
                            <label>Regional</label>
                            <select name="regional2" class="form-control selectpicker" style="width: 50%"
                                data-actions-box="true" data-virtual-scroll="false" data-live-search="true">
                                <option value="" selected disabled>-- Select Option --</option>
                                <?php
                                foreach ($regional as $data) {
                                    echo '<option value="' . $data['REGIONAL'] . '">' . $data['REGIONAL'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group" id="dari_tanggal">
                            <label for="">Dari Tanggal</label>
                            <input type="date" name="tanggal3" class="form-control">
                        </div>
                        <div class="form-group" id="sampai_tanggal">
                            <label>Sampai Tanggal</label>
                            <input type="date" name="tanggal4" class="form-control" />
                        </div>

                        <!-- Button tampil data filterisasi -->
                        <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search">
                                Cari</i></button>
                        <a href="<?= base_url('status_pod_distribusi') ?>"
                            class="text-success btn btn-outline-inverse"><i class="fa fa-refresh"></i> Refresh</a>


                    </form>
                </div>
            </div>
        </div>
        <!-- ========================================= FILTER STATUS POD DISTRIBUSI ========================================= -->


        <!-- ==================================== TABLE POD DISTRIBUSI ==================================== -->
        <div class="card shadow mt-3">
            <div class="card-header bg-info border-bottom-warning py-2">
                <div class="row">
                    <div class="col">
                        <div class="d-flex justify-content-between">
                            <span class="text-light">UPDATE STATUS POD DISTRIBUSI</span>
                            <a href="<?= $cetak_excel ?>" target="_blank" class="text-warning btn-outline-info"><i
                                    class="fas fa-file-excel-o"></i> Excel</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="250%" cellspacing="1">
                        <thead class="thead-light">
                            <tr class="text-center" style="font-size: 12px; color: black; width: 100%;">
                                <th class="text-center">No</th>
                                <th class="text-center">PIC PAV</th>
                                <th class="text-center">Tanggal Permintaan</th>
                                <th class="text-center">Tanggal <br>Penggunaan</th>
                                <th class="text-center">PIC Request</th>
                                <th class="text-center">Dept</th>
                                <th class="text-center">Nomor SPSM</th>
                                <th class="text-center">Request Cabang</th>
                                <th class="text-center">Regional</th>
                                <!-- <th class="text-center">Inisiatif</th>
                                <th class="text-center">Frekuensi</th> -->
                                <th class="text-center">Penggunaan <br>Acara / Event</th>
                                <th class="text-center">Kode Barang</th>
                                <th class="text-center">Merchandise</th>
                                <th class="text-center">QTY</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Total Ammount</th>
                                <th class="text-center">Tanggal Kirim</th>
                                <th class="text-center">AWB</th>
                                <th class="text-center">Tanggal Terima</th>
                                <th class="text-center">Nama Penerima</th>
                                <th class="text-center">Foto <br>Dokumentasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1; ?>
                            <?php foreach ($data_pod as $distribusi) : ?>
                            <tr class="text-left" style="font-size: 12px; color: black;">
                                <td class="py-4 align-middle text-center"><?= $no++; ?></td>
                                <td class="py-4 align-middle text-center"><?= $distribusi['NAMAPAV'] ?></td>
                                <td class="py-4 align-middle text-center"><?= $distribusi['TGLPERMINTAAN'] ?></td>
                                <td class="py-4 align-middle text-center"><?= $distribusi['TGLPENGGUNAAN'] ?></td>
                                <td class="py-4 align-middle text-center"><?= $distribusi['PIC'] ?></td>
                                <td class="py-4 align-middle text-center"><?= $distribusi['DEPARTEMENT'] ?></td>
                                <td class="py-4 align-middle text-center"><?= $distribusi['SPSM'] ?></td>
                                <td class="py-4 align-middle text-center"><?= $distribusi['CABANG'] ?></td>
                                <td class="py-4 align-middle text-center"><?= $distribusi['REGIONAL'] ?></td>
                                <!-- <td class="py-4 align-middle text-center"><?= $distribusi['INISIATIF'] ?></td>
                                <td class="py-4 align-middle text-center"><?= $distribusi['FREKUENSI'] ?></td> -->
                                <td class="py-4 align-middle text-center"><?= $distribusi['KETERANGAN'] ?></td>
                                <td class="py-4 align-middle text-center"><?= $distribusi['KODEBARANG'] ?></td>
                                <td class="py-4 align-middle text-center"><?= $distribusi['NAMABARANG'] ?></td>
                                <td class="py-4 align-middle text-center"><?= $distribusi['QTY'] ?></td>
                                <td class="py-4 align-middle text-center"><?= $distribusi['HARGA'] ?></td>
                                <td class="py-4 align-middle text-center"><?= $distribusi['TOTAL_HARGA'] ?></td>
                                <td class="py-4 align-middle text-center"><?= $distribusi['TGLKIRIM'] ?></td>
                                <td class="py-4 align-middle text-center"><?= $distribusi['AWB'] ?></td>
                                <td class="py-4 align-middle text-center"><?= $distribusi['TGLDITERIMA'] ?></td>
                                <td class="py-4 align-middle text-center"><?= $distribusi['NAMAPENERIMA'] ?></td>
                                <!-- <td class="py-4 align-middle text-center"><?php $distribusi[''] ?></td> -->
                                <td class="py-4 align-middle text-center">
                                    <img src="<?= base_url('./uploads/update_dokumentasi/') . $distribusi['FOTOPENERIMA'] ?>"
                                        alt="<?= $distribusi['FOTOPENERIMA'] ?>" width="90%">
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
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
    $('#form-tanggal, #form-tanggal2, #form-regional, #form-regional2, #dari_tanggal, #sampai_tanggal')
        .hide(); // Sebagai default kita sembunyikan form filternya
    $('#filter').change(function() { // Ketika user memilih filter
        if ($(this).val() == '1') { // Jika filter nya 1 (per tanggal)
            $('#form-regional, #form-regional2, #dari_tanggal, #sampai_tanggal')
                .hide();
            $('#form-tanggal').show(); // Tampilkan form tanggal
            $('#form-tanggal2').show(); // Tampilkan form tanggal
        } else if ($(this).val() == '2') { // Jika filter nya 2 (per regional)
            $('#form-tanggal, #form-tanggal2, #form-regional2, #dari_tanggal, #sampai_tanggal')
                .hide();
            $('#form-regional').show(); // Tampilkan form regional
        } else if ($(this).val() ==
            '3') { // Jika filter nya 3 (per regional dan periode tanggal permintaan)
            $('#form-tanggal, #form-tanggal2, #form-regional, #form-regional2, #dari_tanggal, #sampai_tanggal')
                .hide();
            $('#form-regional2').show(); // Tampilkan form regional
            $('#dari_tanggal').show(); // Tampilkan form tanggal
            $('#sampai_tanggal').show(); // Tampilkan form tanggal
        }
        $('#form-tanggal input, #form-bulan select, #form-jenis select, #form-tipe select, #form-kcu select, #form-milik select')
            .val(
                ''); // Clear data pada textbox filter
    })
})
</script>
<!-- ====================================== END SCRIPT JQUERY FILTER DATA ====================================== -->