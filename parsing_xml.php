<?php
 
//koneksi ke database
$connection = mysqli_connect("localhost", "root", "", "db_belajar") or die("Error " . mysqli_error($connection));
// membuka file XML
$file = simplexml_load_file("dataanggota.xml");
 
$i = 1;
echo 'Data Anggota baru :<br />';
foreach ($file as $key => $value) {
    echo $i . "<br />";
    echo "nama : " . $value->nama . "<br />";
    echo "email : " . $value->email . "<br />";
    echo "alamat : " . $value->alamat . "<br />";
    echo "umur : " . $value->umur . "<br /><br />";
    $sql = "INSERT into tb_anggota(nama,email,alamat,umur) VALUES('" . $value->nama . "','" . $value->email . "','" . $value->alamat . "','" . $value->umur . "')";
    mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
    $i++;
}
//tutup koneksi ke database
mysqli_close($connection);
?>