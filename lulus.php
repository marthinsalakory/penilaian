<?php

include "header.php";

// untuk delete data
if (isset($_POST["delete"])) {
    // cek apakah data berhasi di tambahkan atau tidak
    if (delete($_POST) > 0) {
        echo "
        <script>
            alert('Data Berhasil Dihapus');
            document.location.href = 'lulus.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal dihapus');
            document.location.href = 'lulus.php';
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
                    <h1>Daftar Data Kelulusan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Data Kelulusan</a></li>
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
                            <h3 class="card-title">Daftar Nilai Kelulusan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" style="text-align: center;" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>Nama</th>
                                        <th>NIM</th>
                                        <th>Matakuliah</th>
                                        <th>Nilai Tugas</th>
                                        <th>Nilai UTS</th>
                                        <th>Nilai UAS</th>
                                        <th>Nilai Akhir</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($nilai as $n) : ?>
                                        <?php if ($n['nilai_akhir'] >= 60) : ?>
                                            <tr>
                                                <td><?= $n['nama']; ?></td>
                                                <td><?= $n['nim']; ?></td>
                                                <td><?= $n['matakuliah']; ?></td>
                                                <td><?= $n['nilai_tugas']; ?></td>
                                                <td><?= $n['nilai_uts']; ?></td>
                                                <td><?= $n['nilai_uas']; ?></td>
                                                <td><?= $n['nilai_akhir']; ?></td>
                                                <td>
                                                    <form action="" method="POST">
                                                        <input type="hidden" name="id" value="<?= $n['id']; ?>">
                                                        <button type="submit" class="btn btn-danger  btn-sm" name="delete"><i class="fas fa-trash-alt"></i></button>
                                                    </form>
                                                    <a type="button" class="btn btn-warning btn-sm" href="<?= $BASEURL; ?>/edit.php?id=<?= $n['id']; ?>"><i class="fas fa-edit"></i></a>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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

<?php include "footer.php"; ?>