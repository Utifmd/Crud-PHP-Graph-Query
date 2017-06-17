<?php
error_reporting(mysql_error());
//koneksi ke server database
include "Library/connectdb.php";

if (isset($_GET['DelNobp'])) {
	$kd_del = $_GET['DelNobp'];
	$Qdelete = mysql_query("DELETE FROM tnilai WHERE ID='$kd_del'");
	if ($Qdelete) {
		echo "<script>alert('berhasil terhapus');</script>"; 
		echo "<meta http-equiv='refresh' content='0; url=Form_nilai.php'>"; 
	}
}

$kd_updt = $_GET['UpdateNobp'];
$Qupdate = mysql_query("SELECT * FROM tnilai WHERE ID='$kd_updt' ");
$data_nilai = mysql_fetch_array($Qupdate);

if (isset($_POST['btn_updt'])) {
	$kd_updt = $_GET['UpdateNobp'];

	$Nobp 		= $_POST['Nobp'];
	$KodeMK   	= $_POST['matakuliah'];
	$kodef		= $_POST['fakultas'];
	$nilaimid	= $_POST['txtNilai_MID'];
	$nilaiuas	= $_POST['txtnilai_UAS'];


	$Qupdt = mysql_query("UPDATE tnilai SET Nobp='$Nobp', Kode_MK='$KodeMK', Kode_f='$kodef', Nilai_MID='$nilaimid', Nilai_UAS='$nilaiuas' WHERE ID='$kd_updt' ");
	if ($Qupdt) {
		echo "<script>alert('berhasil diperbarui');</script>"; 
		echo "<meta http-equiv='refresh' content='0; url=Form_nilai.php'>"; 
	}else{echo "<script>alert('gagal diperbarui');</script>"; }
}elseif (isset($_POST['SAVE'])) {
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

}
?>

<form name="tnilai" method="post" onSubmit="return validasi(this)">
<table width="700" border="0">
<tr bgcolor=#4baafa>

<th colspan=3>ENTRY DATA NILAI</th>
</tr>

<tr>
<td><label>Identitas</label></td>
<td> : </td>
<td>
<input type="text" value="<?php echo $data_nilai['ID']; ?>" name="txtID" size="16" maxlength="16">
</td>
</tr>

<tr>
<td><label>Nomor BP</label></td>
<td> : </td>
<td>
<select name=Nobp>
<option value=0 selected>-Pilih Nomor BP-</option>
<?php
include "Library/connectdb.php";
$sqlNobp = mysql_query("select * from mhs order by Nobp");
while($data=mysql_fetch_array($sqlNobp))
{
echo "<option value=$data[Nobp]>$data[Nobp]</option>";
}
?>
</select>
</td>
</tr>

<tr>
<td><label>Kode Matakuliah</label></td>
<td> : </td>
<td>
<select name=matakuliah>
<option value=0 selected>-Pilih Matakuliah-</option>
<?php
include "Library/connectdb.php";
$sqlmatakuliah = mysql_query("select * from tmtk") or die(mysql_error());
while($data=mysql_fetch_array($sqlmatakuliah))
{
echo "<option value=$data[Kode_MK]>$data[Kode_MK]</option>";
}
?>
</select>
</td>
</tr>

<tr>
<td><label>Kode Fakultas</label></td>
<td> : </td>
<td>
<select name=fakultas>
<option value=0 selected>-Pilih Fakultas-</option>
<?php
include "Library/connectdb.php";
$sqlfakultas = mysql_query("select * from tfakultas order by Kode_f");
while($data=mysql_fetch_array($sqlfakultas))
{
echo "<option value=$data[Kode_f]>$data[Kode_f]</option>";
}
?>
</select>
</td>
</tr>

<tr>
<td><label>Nilai MID</label></td>
<td> : </td>
<td>
<input type="text" value="<?php echo $data_nilai['Nilai_MID']; ?>" name="txtNilai_MID" size="5" maxlength="5">
</td>
</tr>

<tr>
<td><label>Nilai UAS</label></td>
<td> : </td>
<td>
<input type="text" value="<?php echo $data_nilai['Nilai_UAS']; ?>" name="txtnilai_UAS" size="5" maxlength="5">
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
  <th colspan=10>DAFTAR NILAI MAHASISWA STMIK INDONESIAPADANG</th>
<tr>
<tr>
<td width="28">No.</td>
<td width="15">Id</td>
<td width="75">Nomor Bp</td>
<td width="121">Kode Matakuliah</td>
<td width="103">Kode Fakultas</td>
<td width="71">Nilai MID</td>
<td width="72">Nilai UAS</td>
<td width="32">Aksi</td>
<?php
error_reporting(0);
include "Library/connectdb.php";
//Langkah 1
//Tentukan Batas, dann posisi, halaman
	$batas = 5;
	$halaman = $_GET['halaman'];

	if(empty($halaman)){
		$posisi	= 0;
		$halaman = 1;
	}else {
		$posisi = ($halaman - 1)* $batas;
	}
//Langkah 2
//sesuaikan perintah sql dengan posisi dan batas data

$sql1 = "select * from tnilai order by Nobp ASC LIMIT $posisi, $batas";

$query1 = mysql_query($sql1);
$no = $posisi + 1;
while ($data1 =  mysql_fetch_array($query1)){

echo "<tr>";
echo "<td>$no</td>";
echo "<td>$data1[ID]</td>";
echo "<td>$data1[NoBp]</td>";
echo "<td>$data1[Kode_MK]</td>";
echo "<td>$data1[Kode_f]</td>";
echo "<td>$data1[Nilai_MID]</td>";
echo "<td>$data1[Nilai_UAS]</td>";
?>
<td width="103"><a href='Form_nilai.php?UpdateNobp=<?php echo $data1['ID']?>'>update</a>| 
<a href="Form_nilai.php?DelNobp=<?php echo $data1['ID']?>">delete</a></td>
<?php
echo "</tr>";
}
?>

<td width="167" colspan=10><center><a href='index.php'>Kembali Ke Menu Utama</a></td>
</tr>

</table>

<?php
//Langkah 3
//Hitunh jumlah data, halaman dan link
	$tampilData = mysql_query("select * from tnilai");
	$jmlData = mysql_num_rows($tampilData);
	$jumlahHalaman = ceil($jmlData/$batas);
	echo "Halaman :";
	for($z=1; $z<=$jumlahHalaman; $z++)
	
	if($z != $halaman){
		echo "<a href=Form_mahasiswa.php?halaman= $z > $z </a> |";
	} else{
	echo "<b>$z</b>";
	}
	echo "Jumlah Mahasiswa : $jmlData";

?>
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
	        //type: "Column2D",
	        type: "Pie3d",
	        data: "tampil_grafik_nilai.php",
	        dataFormat: "URIdata"
		});
</script>