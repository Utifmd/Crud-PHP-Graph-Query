<?php
include "Library/connectdb.php";
$kode_f 		= $_POST['txtKode_f'];
$nama_f 		= $_POST['txtNama_f'];
$nama_ps  		= $_POST['txtNama_PS'];
$status			= $_POST['txtStatus'];
$nomor_sk		= $_POST['txtNoSK'];

$sql	= "insert into tfakultas values('$kode_f','$nama_f','$nama_ps','$status','$nomor_sk')";
$result = mysql_query($sql);

if($result){
	echo "<script type='text/javascript'>
		alert('Data Berhasil Disimpan..!');
	</script>";
	echo "<meta http-equiv='refresh' content='0;
	url=Form_fakultas.php'>";
}else{
echo "<script type='text/javascript'>
	onload =function(){
	alert('Data Gagal Disimpan!');
	}
	</script>";
}

?>