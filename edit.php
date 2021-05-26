<?php

$int = preg_replace("/[^0-9]/", "", $_GET['id']);
if (empty($int)) {
    header('Location: data.php');
}

include "header.php";

$edit = get('id');


// cek apakah tombol jual sudah ditekan atau belum
if (isset($_POST["submit"])) {
    // cek apakah data berhasi di tambahkan atau tidak
    if (update($_POST) > 0) {
        echo "
        <script>
            alert('Data Berhasil Diubah');
            document.location.href = 'data.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Belum Diubah');
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
                    <h1>Halaman Pengeditan Nilai</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Edit</a></li>
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
                            <h3 class="card-title">Edit Nilai</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- /.row -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <!-- general form elements disabled -->
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Edit Nilai</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <form action="" method="POST">
                                                    <input type="hidden" name="id" value="<?= $edit['id']; ?>">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <!-- text input -->
                                                            <div class="form-group">
                                                                <label>Nama</label>
                                                                <input style="background-color: yellow; color: black;" name="nama" value="<?= $edit['nama']; ?>" type="text" class="form-control" placeholder="Enter ...">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>NIM</label>
                                                                <input style="background-color: fuchsia; color: white;" min="100000000" max="999999999" name="nim" value="<?= $edit['nim']; ?>" type="number" class="form-control" placeholder="Enter ...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <!-- text input -->
                                                            <div class="form-group">
                                                                <label>Matakuliah</label>
                                                                <input style="background-color: yellow; color: black;" name="matakuliah" value="<?= $edit['matakuliah']; ?>" type="text" class="form-control" placeholder="Enter ...">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Nilai Tugas</label>
                                                                <input style="background-color: fuchsia; color: white;" name="nilai_tugas" value="<?= $edit['nilai_tugas']; ?>" type="number" max="100" class="form-control" placeholder="Enter ...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <!-- text input -->
                                                            <div class="form-group">
                                                                <label>Nilai UTS</label>
                                                                <input style="background-color: yellow; color: black;" name="nilai_uts" value="<?= $edit['nilai_uts']; ?>" type="number" max="100" class="form-control" placeholder="Enter ...">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Nilai UAS</label>
                                                                <input style="background-color: fuchsia; color: white;" name="nilai_uas" value="<?= $edit['nilai_uas']; ?>" type="number" max="100" class="form-control" placeholder="Enter ...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="card-footer">
                                                        <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                                                        <a href="<?= $BASEURL; ?>/data.php" type="submit" class="btn btn-danger">Kembali</a>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
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
                    <input style="text-align: center;" type="text" class="form-control" name="nama[]" aria-label="nama">
                    <input style="text-align: center;" type="text" class="form-control" name="nim[]" aria-label="nim">
                    <input style="text-align: center;" type="text" class="form-control" name="matakuliah[]" aria-label="matakuliah">
                    <input style="text-align: center;" type="text" class="form-control" name="nilai_tugas[]" aria-label="nilai_tugas">
                    <input style="text-align: center;" type="text" class="form-control" name="nilai_uts[]" aria-label="nilai_uts">
                    <input style="text-align: center;" type="text" class="form-control" name="nilai_uas[]" aria-label="nilai_uas">
                </div>
            `);
        });
        $("#kurang").click(function() {
            $("#hapus").remove();
        });
    });
</script>

<?php include "footer.php"; ?>