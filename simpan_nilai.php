<?php
include "Library/connectdb.php";
$ID 		= $_POST['txtID'];
$Nobp 		= $_POST['Nobp'];
$KodeMK   	= $_POST['matakuliah'];
$kodef		= $_POST['fakultas'];
$nilaimid	= $_POST['txtNilai_MID'];
$nilaiuas	= $_POST['txtnilai_UAS'];

$sql	= "insert into tnilai values('$ID','$Nobp','$KodeMK','$kodef','$nilaimid','$nilaiuas')";
$result = mysql_query($sql);

if($result){
	echo "<script type='text/javascript'>
		alert('Data Berhasil Disimpan..!');
	</script>";
	echo "<meta http-equiv='refresh' content='0;
	url=Form_nilai.php'>";
}else{
echo "<script type='text/javascript'>
	onload =function(){
	alert('Data Gagal Disimpan!');
	}
	</script>";
}

?>