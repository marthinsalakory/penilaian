<?php

include "header.php";

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Semua Data Nilai</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Semua Data</a></li>
                        <li class="breadcrumb-item active">Penilaian</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Nilai Mahasiswa</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table style="text-align: center;" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>Nama</th>
                                        <th>NIM</th>
                                        <th>Nilai Tugas</th>
                                        <th>Nilai UTS</th>
                                        <th>Nilai UAS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="text">
                                        </td>
                                        <td>
                                            <input type="text">
                                        </td>
                                        <td>
                                            <input type="text">
                                        </td>
                                        <td>
                                            <input type="text">
                                        </td>
                                        <td>
                                            <input type="text">
                                        </td>
                                    </tr>
                                    <tr id="tampil">
                                        <th class="bg-primary"></th>
                                        <th class="bg-success">
                                            <button id="tambah" style="background-color: transparent; border: 0mm;"><i class="fas fa-plus"></i></button>
                                        </th>
                                        <th class="bg-warning">
                                            <button style="background-color: transparent; border: 0mm;">KIRIM</button>
                                        </th>
                                        <th class="bg-danger">
                                            <button id="kurang" style="background-color: transparent; border: 0mm;"><i class="fas fa-minus"></i></button>
                                        </th>
                                        <th class="bg-primary"></th>
                                    </tr>
                                </tbody>
                            </table><br><br><br><br><br><br><br><br><br><br><br><br>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#tambah").click(function() {
            $("#tampil").before("<tr id='hapus'><td><input type='text'></td><td><input type='text'></td><td><input type='text'></td><td><input type='text'></td><td><input type='text'></td></tr>");
        });
        $("#kurang").click(function() {
            $("#hapus").remove();
        });
    });
</script>

<?php include "footer.php"; ?>