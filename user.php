<?php

include "header.php";

// untuk delete data
if (isset($_POST["delete"])) {
    // cek apakah data berhasi di tambahkan atau tidak
    if (delete_user($_POST) > 0) {
        echo "
        <script>
            alert('Data User Berhasil Dihapus');
            document.location.href = 'user.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data User gagal dihapus');
            document.location.href = 'user.php';
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
                    <h1>Data Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Data Users</a></li>
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
                            <h3 class="card-title">Users Terdaftar</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" style="text-align: center;" class="table table-bordered table-striped table_search">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    <?php foreach ($users as $u) : ?>
                                        <tr>
                                            <td><?= ++$no ?></td>
                                            <td><?= $u['nama_lengkap']; ?></td>
                                            <td><?= $u['username']; ?></td>
                                            <td><?= $u['password']; ?></td>
                                            <td>
                                                <?php
                                                if (user('id') != $u['id']) : ?>
                                                    <form action="" method="POST">
                                                        <input type="hidden" name="id" value="<?= $u['id']; ?>">
                                                        <button type="submit" class="btn btn-danger  btn-sm" name="delete"><i class="fas fa-trash-alt"></i></button>
                                                    </form>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
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