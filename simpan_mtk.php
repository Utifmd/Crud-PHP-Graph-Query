<?php
include "Library/connectdb.php";
$Kode_MK		= $_POST['txtKode_MK'];
$Nama_MK		= $_POST['txtNama_MK'];
$sks			= $_POST['txtSks'];
$prasyarat1		= $_POST['txtPrasyarat1'];
$prasyarat2		= $_POST['txtPrasyarat2'];
$prasyarat3		= $_POST['txtPrasyarat3'];

$sql	= "insert into tmtk values('$Kode_MK',
								  '$Nama_MK',
								  '$sks',
								  '$prasyarat1',
								  '$prasyarat2',
								  '$prasyarat3')";
$result	= mysql_query($sql);
if($result){
    echo "<script type='text/javascript'>
    		alert('Data Berhasil Disimpan..!');
    </script>";
	echo "<meta http-equiv='refresh' content='0; url=Form_matakuliah.php'>";
}else{
echo "<script type='text/javascript'>
	onload =function(){
	alert('Data Gagal Disimpan!');
	}
	</script>";
}
?>