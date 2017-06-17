<?php
include "Library/connectdb.php";
$id_kelas		= $_POST['txtIdKelas']; 
$nama_kelas		= $_POST['txtNm_kelas'];

$sql	= "insert into tkelas values('$id_kelas','$nama_kelas')";
$result = mysql_query($sql);


if ((isset($_GET['txtIdKelas'])) && ($_GET['txtIdKelas'] != "")) {
  $deleteSQL = sprintf("DELETE FROM tkelas WHERE txtIdKelas=%s",
                       GetSQLValueString($_GET['txtIdKelas'], "int"));

  mysql_select_db($database_koneksi, $karyawan);
  $Result1 = mysql_query($deleteSQL, $karyawan) or die(mysql_error());
}

if($result){
	echo "<script type='text/javascript'>
		alert('Data Berhasil Disimpan..!');
	</script>";
	echo "<meta http-equiv='refresh' content='0;
	url=Form_kelas.php'>";
}else{
echo "<script type='text/javascript'>
	onload =function(){
	alert('Data Gagal Disimpan!');
	}
	</script>";
}

?>