<?php
require 'koneksi.php';
$input = file_get_contents('php://input');
$data = json_decode($input,true);

$jenis=trim($data['jenis']);
$deskripsi=trim($data['deskripsi']);
$jumlah=trim($data['jumlah']);

http_response_code(201);
if($jenis!='' and $deskripsi!='' and $jumlah!=''){
$query = mysqli_query($koneksi,"insert into keuangan(jenis,deskripsi,jumlah) values('$jenis','$deskripsi', '$jumlah')");
$pesan = true;
}else{
$pesan = false;
}
echo json_encode($pesan);
echo mysqli_error($koneksi);