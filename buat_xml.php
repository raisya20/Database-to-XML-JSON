<?php

Header('Content-type: text/xml');
//koneksi ke database
$connection = mysqli_connect("localhost", "root", "", "data_xml") or die("Error " . mysqli_error($connection));
$xml = new SimpleXMLElement('<xml/>');
//menampilkan data dari database, table tb_anggota
$sql = "select * from pasien ";
$result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));

//membuat array
while ($row = mysqli_fetch_assoc($result)) {

    $track = $xml->addChild('pasien');
    $track->addChild('nama', $row['nama']);
    $track->addChild('kota', $row['kota']);
    $track->addChild('kecamatan', $row['kecamatan']);
    $track->addChild('umur', $row['umur']);
}

print($xml->asXML());
//tutup koneksi ke database
mysqli_close($connection);
?>