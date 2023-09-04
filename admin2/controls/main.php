<?php

$refresh = fn ($waktu, $url) => '<meta http-equiv="refresh" content="' . $waktu . '; url=' . $url . '">';

$query = fn ($table, $id, $id2) => mysqli_query($conn, "SELECT * FROM $table WHERE $id = '$id2'");

$hapus = fn ($table, $id, $id_value) => mysqli_query($conn, "DELETE FROM $table WHERE $id ='$id_value'");

$alertSuccess = fn ($text) => '<div class="alert alert-success">' . $text . '</div>';
$alertDanger = fn ($text) => '<div class="alert alert-danger">' . $text . '</div>';


function nJarakRumah($jurusan)
{
    include "../koneksi.php";
    $nJarak = mysqli_fetch_array(mysqli_query($conn, "SELECT MIN(jarak_rumah) FROM pendaftar_pmb a LEFT JOIN jurusan b ON a.id_jurusan = b.id_jurusan WHERE nama_jurusan = '$jurusan'"));

    return $nJarak[0];
}

function nMax($jurusan, $nilai)
{
    include "../koneksi.php";
    $n = mysqli_fetch_array(mysqli_query($conn, "SELECT MAX($nilai) FROM pendaftar_pmb a LEFT JOIN jurusan b ON a.id_jurusan = b.id_jurusan WHERE nama_jurusan = '$jurusan'"));

    return $n[0];
}


function hasilDataNormalisasi($jurusan)
{
    include "../koneksi.php";

    $q = mysqli_query($conn, "SELECT * FROM kriteria_spk a LEFT JOIN jurusan b ON a.id_jurusan = b.id_jurusan WHERE nama_jurusan = '$jurusan'");
    $k = mysqli_fetch_array($q);

    $jumlah_k = $k['jarak_rumah'] + $k['mtk'] + $k['ipa'] + $k['inggris'] + $k['indonesia'] + $k['agama'] + $k['ppkn'];

    $data_hasil = [];

    $q_jurusan = mysqli_query($conn, "SELECT * FROM pendaftar_pmb a LEFT JOIN jurusan b ON a.id_jurusan = b.id_jurusan WHERE nama_jurusan = '$jurusan'");

    while ($pendaftar = mysqli_fetch_array($q_jurusan)) {

        $nor_jarak = nJarakRumah($jurusan) / $pendaftar['jarak_rumah'];
        $nor_mtk =  $pendaftar['mtk'] / nMax($jurusan, 'mtk');
        $nor_ipa =  $pendaftar['ipa'] / nMax($jurusan, 'ipa');
        $nor_inggris =  $pendaftar['inggris'] / nMax($jurusan, 'inggris');
        $nor_indonesia =  $pendaftar['indonesia'] / nMax($jurusan, 'indonesia');
        $nor_agama =  $pendaftar['agama'] / nMax($jurusan, 'agama');
        $nor_ppkn =  $pendaftar['ppkn'] / nMax($jurusan, 'ppkn');

        $hasil_jumlah_nor = ($k['jarak_rumah'] / $jumlah_k * $nor_jarak) + ($k['mtk'] / $jumlah_k * $nor_mtk) + ($k['ipa'] / $jumlah_k * $nor_ipa) + ($k['inggris'] / $jumlah_k * $nor_inggris) + ($k['indonesia'] / $jumlah_k * $nor_indonesia) + ($k['agama'] / $jumlah_k * $nor_agama) + ($k['ppkn'] / $jumlah_k * $nor_ppkn);

        $data_hasil[] = [$pendaftar['nisn'], $pendaftar['nama'], $pendaftar['email'], $pendaftar['nama_jurusan'], $hasil_jumlah_nor];
    }

    $keys = array_column($data_hasil, 4);
    array_multisort($keys, SORT_DESC, $data_hasil);

    return array_slice($data_hasil, 0, 20);
}


$numRowsUser = fn ($level) => mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE level ='$level'"));
$numRows = fn ($table) => mysqli_num_rows(mysqli_query($conn, "SELECT * FROM $table"));


$tambahUser = fn ($nama, $username, $password, $level) => mysqli_query($conn, "INSERT INTO user VALUES('','$nama','$username','$password','$level','')");

$editUser = fn ($nama, $username, $password, $id) => mysqli_query($conn, "UPDATE user SET nama='$nama', username='$username', password='$password' WHERE id_user='$id'");
