<?php

// BaseURL
$BASEURL = "http://localhost/penilaian";

session_start();

// koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "penilaian";

$conn = new mysqli($servername, $username, $password, $dbname);

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// untuk data user saja
function user($key)
{
    $kuy = $_SESSION["user"];
    return query("SELECT * FROM users WHERE id  = $kuy")[0][$key];
}

// untuk database
function data($key)
{
    $kuy = user('id');
    $data = query("SELECT * FROM $key WHERE user  = $kuy")[0]['user'];
    if (!empty($data)) {
        return $data;
    } else {
        return 0;
    }
}

// ambil data dari tabel file
$nilai = $result = mysqli_query($conn, "SELECT * FROM nilai");

function insert($data)
{
    global $conn;
    for ($i = 0; $i < 3; $i++) {
        if (empty($data['nama'][$i])) {
            break;
        }
        $nama = $data['nama'][$i];
        $nim = $data['nim'][$i];
        $matakuliah = $data['matakuliah'][$i];
        $nilai_tugas = $data['nilai_tugas'][$i];
        $nilai_uts = $data['nilai_uts'][$i];
        $nilai_uas = $data['nilai_uas'][$i];
        $nilai_akhir = ($nilai_tugas * 20 / 100) + ($nilai_uts * 30 / 100) + ($nilai_uas * 50 / 100);
        if ($nilai_akhir >= 60) {
            $status = 'Lulus';
        } elseif ($nilai_akhir < 60) {
            $status = 'Tidak Lulus';
        } else {
            return 0;
        }
        // query insert data
        $query = "INSERT INTO nilai
                    VALUES
                    ('', '$nama', '$nim', '$matakuliah', '$nilai_tugas', '$nilai_uts', '$nilai_uas', '$nilai_akhir', '$status')
                    ";
        mysqli_query($conn, $query);
    }

    return mysqli_affected_rows($conn);
}

function update($data)
{
    global $conn;

    $id = $data['id'];
    $nama = $data['nama'];
    $nim = $data['nim'];
    $matakuliah = $data['matakuliah'];
    $nilai_tugas = $data['nilai_tugas'];
    $nilai_uts = $data['nilai_uts'];
    $nilai_uas = $data['nilai_uas'];
    $nilai_akhir = ($nilai_tugas * 20 / 100) + ($nilai_uts * 30 / 100) + ($nilai_uas * 50 / 100);

    if ($nilai_akhir >= 60) {
        $status = 'Lulus';
    } elseif ($nilai_akhir < 60) {
        $status = 'Tidak Lulus';
    } else {
        return 0;
    }
    /// query update data
    $query = "UPDATE nilai SET
    -- id = '$id',
    nama = '$nama',
    nim = '$nim',
    matakuliah = '$matakuliah',
    nilai_tugas = '$nilai_tugas',
    nilai_uts = '$nilai_uts',
    nilai_uas = '$nilai_uas',
    nilai_akhir = '$nilai_akhir',
    status = '$status'
    WHERE id = $id
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// function untuk menghapus data
function delete($data)
{
    $id = $data['id'];
    global $conn;
    mysqli_query($conn, "DELETE FROM nilai WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function get($key)
{
    $key = htmlspecialchars($key);
    $method = $_GET[$key];
    return  query("SELECT * FROM nilai WHERE $key = $method")[0];
}

// untuk menghitung jumlah data dalam table
function jumlahdata($key)
{
    global $conn;
    return mysqli_num_rows(mysqli_query($conn, "SELECT * FROM $key"));
}

// untuk menghitung berapa persen yang lulus
function lulus($nama, $kuy)
{
    global $conn;
    $jumlah =  mysqli_num_rows(mysqli_query($conn, "SELECT * FROM $nama WHERE $kuy >= 60"));
    if (!empty($jumlah)) {
        return ($jumlah / jumlahdata('nilai')) * 100;
    } else {
        echo 0;
    }
}

// untuk menghitung berapa persen yang lulus
function tidak_lulus($nama, $kuy)
{
    global $conn;
    $jumlah =  mysqli_num_rows(mysqli_query($conn, "SELECT * FROM $nama WHERE $kuy < 60"));
    if (!empty($jumlah)) {
        return ($jumlah / jumlahdata('nilai')) * 100;
    } else {
        echo 0;
    }
}

function register($data)
{
    global $conn;
    $nama_lengkap = $data['nama_lengkap'];
    $username = $data['username'];
    $password = $data['password'];
    $password2 = $data['password2'];

    // cek konfirmasi password
    if ($password != $password2) {
        return false;
    }

    // query insert data
    $query = "INSERT INTO users
                    VALUES
                    ('', '$nama_lengkap', '$username', '$password')
                    ";
    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
}
