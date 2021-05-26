<?php

// BaseURL
$BASEURL = "http://localhost/penilaian";

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
