<?php
include('koneksi.php');

function tambahAlatMusik($data)
{
    global $koneksi;

    $nama = $data['nama_alat_musik'];
    $deskripsi = $data['deskripsi'];
    $jumlah = $data['jumlah'];

    $query = "INSERT INTO alat_musik (nama_alat_musik, deskripsi, jumlah) VALUES ('$nama', '$deskripsi', $jumlah)";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function getAlatMusik()
{
    global $koneksi;

    $query = "SELECT * FROM alat_musik";
    $result = mysqli_query($koneksi, $query);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getAlatMusikById($id)
{
    global $koneksi;

    $query = "SELECT * FROM alat_musik WHERE id_alat_musik = $id";
    $result = mysqli_query($koneksi, $query);

    return mysqli_fetch_assoc($result);
}

function editAlatMusik($data)
{
    global $koneksi;

    $id = $data['id_alat_musik'];
    $nama = $data['nama_alat_musik'];
    $deskripsi = $data['deskripsi'];
    $jumlah = $data['jumlah'];

    $query = "UPDATE alat_musik SET nama_alat_musik = '$nama', deskripsi = '$deskripsi', jumlah = $jumlah WHERE id_alat_musik = $id";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function hapusAlatMusik($id)
{
    global $koneksi;

    $query = "DELETE FROM alat_musik WHERE id_alat_musik = $id";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
?>
