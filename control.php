<?php

function artikelDESC()
{
    include "koneksi.php";
    $data = [];
    $q = mysqli_query($conn, "SELECT * FROM artikel a LEFT JOIN user b ON a.id_user=b.id_user WHERE status='1' ORDER BY id_artikel DESC");
    while ($d = mysqli_fetch_array($q)) {
        $data[] = $d;
    }

    return $data;
}
function artikelSearch($search)
{
    include "koneksi.php";
    $data = [];
    $q = mysqli_query($conn, "SELECT * FROM artikel a LEFT JOIN user b ON a.id_user=b.id_user WHERE status='1' and  judul LIKE '%$search%' or  keterangan LIKE '%$search%' ORDER BY id_artikel DESC");
    while ($d = mysqli_fetch_array($q)) {
        $data[] = $d;
    }

    return $data;
}

function artikeldetail($id)
{
    include "koneksi.php";
    $q = mysqli_query($conn, "SELECT * FROM artikel a LEFT JOIN user b ON a.id_user=b.id_user WHERE status='1' and id_artikel='$id' ORDER BY id_artikel DESC");
    return  mysqli_fetch_array($q);
}

$refresh = fn ($waktu, $url) => '<meta http-equiv="refresh" content="' . $waktu . '; url=' . $url . '">';
