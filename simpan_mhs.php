
<?php
include "Library/connectdb.php";
$nobp		= $_POST['txtnobp'];
$nama		= $_POST['txtnama'];
$jk			= $_POST['txtjekel'];
$tempat		= $_POST['txttmptlahir'];
$tgllahir	= $_POST['tahun']."-".$_POST['bulan']."-".$_POST['tanggal'];
$kelas		= $_POST['kelas'];
$kodef		= $_POST['fakultas'];
$alamat		= $_POST['txtalamat'];

$sql	= "insert into mhs values('$nobp',
								  '$nama',
								  '$jk',
								  '$tempat',
								  '$tgllahir',
								  '$kelas',
								  '$kodef',
								  '$alamat')";
$result	= mysql_query($sql);
if($result){
    echo "<script type='text/javascript'>
    		alert('Data Berhasil Disimpan..!');
    </script>";
	echo "<meta http-equiv='refresh' content='0; url=Form_mahasiswa.php'>";
}else{
echo "<script type='text/javascript'>
	onload = function(){
	alert('Data Gagal Disimpan!');
	}
	</script>";
}
?>