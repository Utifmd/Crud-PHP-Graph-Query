
<?php
error_reporting(0);
//koneksi ke server database
include "Library/connectdb.php";

if (isset($_GET['DelKode_f'])) {
	$kd_del = $_GET['DelKode_f'];
	$Qdelete = mysql_query("DELETE FROM tfakultas WHERE Kode_f='$kd_del'");
	if ($Qdelete) {
		echo "<script>alert('berhasil terhapus');</script>"; 
		echo "<meta http-equiv='refresh' content='0; url=Form_fakultas.php'>"; 
	}
}

$kd_updt = $_GET['UpdateKode_f'];
$Qupdate = mysql_query("SELECT * FROM tfakultas WHERE Kode_f='$kd_updt' ");
$data_fakultas = mysql_fetch_array($Qupdate);

if (isset($_POST['btn_updt'])) {
	$kd_updt = $_GET['UpdateKode_f'];
	$nm_f = $_POST['txtNama_f'];
	$nm_ps = $_POST['txtNama_PS'];
	$stat = $_POST['txtStatus'];
	$nos_k = $_POST['txtNoSK'];

	$Qupdt = mysql_query("UPDATE tfakultas SET Nama_f='$nm_f', Nama_PS='$nm_ps', Status='$stat', NoSK='$nos_k' WHERE Kode_f='$kd_updt' ");
	if ($Qupdt) {
		echo "<script>alert('berhasil diperbarui');</script>"; 
		echo "<meta http-equiv='refresh' content='0; url=Form_fakultas.php'>"; 
	}else{echo "<script>alert('gagal diperbarui');</script>"; }
}elseif (isset($_POST['SAVE'])) {
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
}

?>

<form name="frm_fakultas" method="post" onSubmit="return validasi(this)">
<table width="700" border="0">
<tr bgcolor=#4baafa>

<th colspan=3>ENTRY DATA FAKULTAS</th>
</tr>

<tr>
<td><label>Kode Fakultas</label></td>
<td> : </td>
<td>
<input type="text" value="<?php echo $data_fakultas['Kode_f'] ?>" name="txtKode_f" size="10" maxlength="10">
</td>
</tr>

<tr>
<td><label>Nama Fakultas</label></td>
<td> : </td>
<td>
<input type="text" value="<?php echo $data_fakultas['Nama_f'] ?>" name="txtNama_f" size="25" maxlength="25">
</td>
</tr>

<tr>
<td><label>Nama PS</label></td>
<td> : </td>
<td>
<input type="text" value="<?php echo $data_fakultas['Nama_PS'] ?>" name="txtNama_PS" size="15" maxlength="15">
</td>
</tr>

<tr>
<td><label>Status</label></td>
<td> : </td>
<td>
<input type="radio" name="txtStatus" value="Terakreditasi">Terakreditasi
<input type="radio" name="txtStatus" value="Tidak Terakreditasi">Terakreditasi
</td>
</tr>

<tr>
<td><label>Nomor SK</label></td>
<td> : </td>
<td>
<input type="text" value="<?php echo $data_fakultas['NoSK'] ?>" name="txtNoSK" size="8" maxlength="8">
</td>
</tr>

<tr>
<td>
<input type="submit" name="SAVE" value="SIMPAN">
<input type="submit" name="btn_updt" value="UPDATE">
<input type="reset" name="CANCEL" value="BATAL">
</td>
</tr>
</table>

<table border=1 width=850>
<tr bgcolor=#4baafa>
  <th colspan=10>DAFTAR NAMA FAKULTAS STMIK INDONESIA PADANG</th>
<tr>
<tr>
<td>No.</td>
<td>Kode Fakultas</td>
<td>Nama Fakultas</td>
<td>Nama PS</td>
<td>Status</td>
<td>Nomor SK</td>
<td>Aksi</td>
<?php
include "Library/connectdb.php";
$sql1 	= "select * from tfakultas order by Kode_f";
$query1 = mysql_query($sql1);
$no = 0;
while($data1 = mysql_fetch_array($query1))
{
$no++;
echo "<tr>";
echo "<td>$no</td>";
echo "<td>$data1[Kode_f]</td>";
echo "<td>$data1[Nama_f]</td>";
echo "<td>$data1[Nama_PS]</td>";
echo "<td>$data1[Status]</td>";
echo "<td>$data1[NoSK]</td>";
?>
<td><a href='Form_fakultas.php?UpdateKode_f=<?php echo $data1['Kode_f']?>'>update</img></a>| 
<a href="Form_fakultas.php?DelKode_f=<?php echo $data1['Kode_f']?>">delete</img></a></td>
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
	        data: "tampil_grafik_fakultas.php",
	        dataFormat: "URIdata"
		});
</script>