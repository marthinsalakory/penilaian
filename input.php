<?php

include "header.php";

// cek apakah tombol jual sudah ditekan atau belum
if (isset($_POST["submit"])) {
    // cek apakah data berhasi di tambahkan atau tidak
    if (insert($_POST) > 0) {
        echo "
        <script>
            alert('Data Berhasil Ditambahkan');
            document.location.href = 'data.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal ditambahkan');
        </script>
        ";
    }
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Halaman Penginputan Nilai</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Input</a></li>
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
                        <div class="card-header bg-success">
                            <h3 class="card-title">Input Nilai</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- /.row -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <!-- /.card-header -->
                                        <div class="card-body table-responsive p-0">
                                            <div class="input-group mb-3">
                                                <input style="font-weight: 900;text-align: center; background-color: blue; color: aliceblue;" type="text" class="form-control" value="Nama" readonly>
                                                <input style="font-weight: 900;text-align: center; background-color: blue; color: aliceblue;" type="text" class="form-control" value="NIM" readonly>
                                                <input style="font-weight: 900;text-align: center; background-color: blue; color: aliceblue;" type="text" class="form-control" value="Matakuliah" readonly>
                                                <input style="font-weight: 900;text-align: center; background-color: blue; color: aliceblue;" type="text" class="form-control" value="Nilai Tugas" readonly>
                                                <input style="font-weight: 900;text-align: center; background-color: blue; color: aliceblue;" type="text" class="form-control" value="Nilai UTS" readonly>
                                                <input style="font-weight: 900;text-align: center; background-color: blue; color: aliceblue;" type="text" class="form-control" value="Nilai UAS" readonly>
                                            </div>
                                            <form action="" method="POST">
                                                <div class="input-group mb-3">
                                                    <input required style="text-align: center;" type="text" class="form-control" name="nama[]" aria-label="nama">
                                                    <input required style="text-align: center;" type="number" class="form-control" min="100000000" max="999999999" name="nim[]" aria-label="nim">
                                                    <input required style="text-align: center;" type="text" class="form-control" name="matakuliah[]" aria-label="matakuliah">
                                                    <input required style="text-align: center;" type="number" max="100" class="form-control" name="nilai_tugas[]" aria-label="nilai_tugas">
                                                    <input required style="text-align: center;" type="number" max="100" class="form-control" name="nilai_uts[]" aria-label="nilai_uts">
                                                    <input required style="text-align: center;" type="number" max="100" class="form-control" name="nilai_uas[]" aria-label="nilai_uas">
                                                </div>
                                                <div class="input-group mb-3" id="tampil">
                                                    <input id="tambah" style="font-weight: 900;text-align: center; background-color: green; color: aliceblue;" type="button" class="form-control" value="+" readonly>
                                                    <input style="font-weight: 900;text-align: center; background-color: blue; color: aliceblue;" type="submit" class="form-control" value="Kirim" name="submit" readonly>
                                                    <input id="kurang" style="font-weight: 900;text-align: center; background-color: red; color: aliceblue;" type="button" class="form-control" value="-" readonly>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                            <!-- /.row --><br><br><br><br><br><br><br><br><br><br><br><br>
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
            $("#tampil").before(`
                <div class="input-group mb-3" id="hapus">
                    <input style="text-align: center;" required type="text" class="form-control" name="nama[]" aria-label="nama">
                    <input style="text-align: center;" required type="number" min="100000000" max="999999999"  class="form-control" name="nim[]" aria-label="nim">
                    <input style="text-align: center;" required type="text" class="form-control" name="matakuliah[]" aria-label="matakuliah">
                    <input style="text-align: center;" required type="number" max="100" class="form-control" name="nilai_tugas[]" aria-label="nilai_tugas">
                    <input style="text-align: center;" required type="number" max="100" class="form-control" name="nilai_uts[]" aria-label="nilai_uts">
                    <input style="text-align: center;" required type="number" max="100" class="form-control" name="nilai_uas[]" aria-label="nilai_uas">
                </div>
            `);
        });
        $("#kurang").click(function() {
            $("#hapus").remove();
        });
    });
</script>

<?php include "footer.php"; ?>