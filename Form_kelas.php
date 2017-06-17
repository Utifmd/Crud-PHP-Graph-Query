<?php
error_reporting(0);
//Koneksi Ke Server Database
include "Library/connectdb.php";

if (isset($_GET['DelIdKelas'])) {
	$kd_del = $_GET['DelIdKelas'];
	$Qdelete = mysql_query("DELETE FROM tkelas WHERE IdKelas='$kd_del'");
	if ($Qdelete) {
		echo "<script>alert('berhasil terhapus');</script>"; 
		echo "<meta http-equiv='refresh' content='0; url=Form_kelas.php'>"; 
	}
}

$kd_updt = $_GET['UpdateIdKelas'];
$Qupdate = mysql_query("SELECT * FROM tkelas WHERE IdKelas='$kd_updt' ");
$data_kelas = mysql_fetch_array($Qupdate);

if (isset($_POST['btn_updt'])) {
	$kd_updt = $_GET['UpdateIdKelas'];
	$nm_kelas = $_POST['txtNm_kelas'];

	$Qupdt = mysql_query("UPDATE tkelas SET Nm_kelas='$nm_kelas' WHERE IdKelas='$kd_updt' ");
	if ($Qupdt) {
		echo "<script>alert('berhasil diperbarui');</script>"; 
		echo "<meta http-equiv='refresh' content='0; url=Form_kelas.php'>"; 
	}else{echo "<script>alert('gagal diperbarui');</script>"; }
}elseif (isset($_POST['SAVE'])) {
	$id_kelas		= $_POST['txtIdKelas']; 
	$nama_kelas		= $_POST['txtNm_kelas'];

	$sql	= "insert into tkelas values('$id_kelas','$nama_kelas')";
	$result = mysql_query($sql);

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
}

?>
<form name="frm_kelas" method="post" onSubmit="return validasi(this)">
<table width="700" border="0">
<tr bgcolor=#4baafa>
<th colspan=3>ENTRY DATA KELAS</th>
</tr>

<tr>
<td><label>Identitas Kelas</label></td>
<td> : </td>
<td>
<input type="text" value="<?php echo $data_kelas['IdKelas']; ?>"  name="txtIdKelas" size="10" maxlength="10">
</td>
</tr>

<tr>
<td><label>Nama Kelas</label></td>
<td> : </td>
<td>
<input type="text" value="<?php echo $data_kelas['Nm_kelas']; ?>" name="txtNm_kelas" size="10" maxlength="10">
</td>
</tr>

<tr>
<td>
<input type="submit" name="SAVE" value="SIMPAN">
<input type="submit" name="btn_updt" value="UPDATE">
<input type="reset" name="cancel" value="BATAL">
</td>
</tr>
</table>

<table border=1 width=850>
<tr bgcolor=#4baafa>
  <th colspan=10>DAFTAR KELAS STMIK INDONESIA PADANG</th>
<tr>
<tr>
<td>No.</td>
<td>Idkelas</td>
<td>Nama Kelas</td>
<td>Aksi</td>
<?php
include "Library/connectdb.php";
$sql1 	= "select * from tkelas order by IdKelas";
$query1 = mysql_query($sql1);
$no = 0;
while($data1 = mysql_fetch_array($query1))
{
$no++;
echo "<tr>";
echo "<td>$no</td>";
echo "<td>$data1[IdKelas]</td>";
echo "<td>$data1[Nm_kelas]</td>";
?>
<td><a href='Form_kelas.php?UpdateIdKelas=<?php echo $data1['IdKelas'];?>'>update</img></a>| 
<a href="Form_kelas.php?DelIdKelas=<?php echo $data1['IdKelas']; ?>">delete</img></a></td>
<?php
echo "</tr>";
}
?>
<td colspan=10><center><a href='index.php'>Kembali Ke Menu Utama</a></td>
</tr>

</table>
</form>


<span id="myChart1Container"></span>

<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
	<script type="text/javascript" src="js/jquery.fusioncharts.js"></script>
	<SCRIPT LANGUAGE="Javascript" src="js/FusionCharts.js"></SCRIPT>
	<script type="text/javascript">
		$('#myChart1Container').insertFusionCharts({
	        swfPath: "Charts/",			
			id: "Chart1",
	        width: "800",
	        height: "400",
	        type: "Column2D",
	        //type: "Pie3d",
	        data: "tampil_grafik_kelas.php",
	        dataFormat: "URIdata"
		});
</script>