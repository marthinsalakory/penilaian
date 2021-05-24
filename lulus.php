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
                                        <th>Nilai Tugas</th>
                                        <th>Nilai UTS</th>
                                        <th>Nilai UAS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Marthin</td>
                                        <td>201971060</td>
                                        <td>32</td>
                                        <td>50</td>
                                        <td>100</td>
                                    </tr>
                                    <tr>
                                        <td>dio</td>
                                        <td>201871090</td>
                                        <td>64</td>
                                        <td>11</td>
                                        <td>20</td>
                                    </tr>
                                    <tr>
                                        <td>nesya</td>
                                        <td>201871020</td>
                                        <td>32</td>
                                        <td>30</td>
                                        <td>10</td>
                                    </tr>
                                    <tr>
                                        <td>edo</td>
                                        <td>201871090</td>
                                        <td>33</td>
                                        <td>55</td>
                                        <td>40</td>
                                    </tr>
                                    <tr>
                                        <td>Marthin</td>
                                        <td>201971060</td>
                                        <td>32</td>
                                        <td>50</td>
                                        <td>100</td>
                                    </tr>
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