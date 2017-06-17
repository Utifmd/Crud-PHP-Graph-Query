<?php
error_reporting(0);
//Koneksi Ke Server Database
include "Library/connectdb.php";

if (isset($_GET['delKd_MK'])) {
	$kd_del = $_GET['delKd_MK'];
	$Qdelete = mysql_query("DELETE FROM tmtk WHERE Kode_MK='$kd_del'");
	if ($Qdelete) {
		echo "<script>alert('berhasil terhapus');</script>"; 
		echo "<meta http-equiv='refresh' content='0; url=Form_matakuliah.php'>"; 
	}
}

$kd_updt = $_GET['updtKd_MK'];
$Qupdate = mysql_query("SELECT * FROM tmtk WHERE Kode_MK='$kd_updt' ");
$data_mtk = mysql_fetch_array($Qupdate);

if (isset($_POST['btn_updt'])) {
	$kd_updt = $_GET['updtKd_MK'];
	$nm_mtk = $_POST['txtNama_MK'];
	$sks = $_POST['txtSks'];
	$prSyrt1 = $_POST['txtPrasyarat1'];
	$prSyrt2 = $_POST['txtPrasyarat2'];
	$prSyrt3 = $_POST['txtPrasyarat3'];

	$Qupdt = mysql_query("UPDATE tmtk SET Nama_MK='$nm_mtk', Sks='$sks', Prasyarat1='$prSyrt1', Prasyarat2='$prSyrt2', Prasyarat3='$prSyrt3' WHERE Kode_MK='$kd_updt' ");
	if ($Qupdt) {
		echo "<script>alert('berhasil diperbarui');</script>"; 
		echo "<meta http-equiv='refresh' content='0; url=Form_matakuliah.php'>"; 
	}else{echo "<script>alert('gagal diperbarui');</script>"; }
}elseif (isset($_POST['SAVE'])) {
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
}

?>

<form name="frm_matakuliah" method="post" onSubmit="return validasi(this)">
<table width="700" border="0">
<tr bgcolor=#4baafa>
<th colspan=3>ENTRY DATA MATAKULIAH</th>
</tr>

<tr>
<td><label>Kode Matakuliah</label></td>
<td> : </td>
<td>
<input type="text" value="<?php echo $data_mtk['Kode_MK']; ?>" name="txtKode_MK" size="16" maxlength="14">
</td>
</tr>

<tr>
<td><label>Nama Matakuliah</label></td>
<td> : </td>
<td>
<input type="text" type="text" value="<?php echo $data_mtk['Nama_MK']; ?>" name="txtNama_MK" size="25" maxlength="25">
</td>
</tr>

<tr>
<td><label>Sks</label></td>
<td> : </td>
<td>
<input type="text" value="<?php echo $data_mtk['Sks']; ?>" name="txtSks" size="5" maxlength="5">
</td>
</tr>

<tr>
<td><label>Prasyarat 1</label></td>
<td> : </td>
<td>
<input type="text" value="<?php echo $data_mtk['Prasyarat1']; ?>" name="txtPrasyarat1" size="10" maxlength="10">
</td>
</tr>

<tr>
<td><label>Prasyarat 2</label></td>
<td> : </td>
<td>
<input type="text" value="<?php echo $data_mtk['Prasyarat2']; ?>" name="txtPrasyarat2" size="10" maxlength="10">
</td>
</tr>

<tr>
<td><label>Prasyarat 3</label></td>
<td> : </td>
<td>
<input type="text" value="<?php echo $data_mtk['Prasyarat3']; ?>" name="txtPrasyarat3" size="10" maxlength="10">
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

<table border=1 width=902>
<tr bgcolor=#4baafa>
  <th colspan=10>DAFTAR MATAKULIAH STMIK INDONESIAPADANG</th>
<tr>
<tr>
<td width="27">No.</td>
<td width="121">Kode Matakuliah</td>
<td width="123">Nama Matakuliah</td>
<td width="26">Sks</td>
<td width="74">Prasyarat1</td>
<td width="74">Prasyarat2</td>
<td width="74">Prasyarat3</td>
<td width="32">Aksi</td>
<?php
include "Library/connectdb.php";
error_reporting(0);
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

$sql1 = "select * from tmtk order by Kode_MK ASC LIMIT $posisi, $batas";

$query1 = mysql_query($sql1);
$no = $posisi + 1;
while ($data1 =  mysql_fetch_array($query1)){

echo "<tr>";
echo "<td>$no</td>";
echo "<td>$data1[Kode_MK]</td>";
echo "<td>$data1[Nama_MK]</td>";
echo "<td>$data1[Sks]</td>";
echo "<td>$data1[Prasyarat1]</td>";
echo "<td>$data1[Prasyarat2]</td>";
echo "<td>$data1[Prasyarat3]</td>";
?>
<td width="103"><a href='Form_matakuliah.php?updtKd_MK=<?php echo $data1['Kode_MK']?>'>update</a>| 
<a href="Form_matakuliah.php?delKd_MK=<?php echo $data1['Kode_MK']?>">delete</a></td>
<?php
echo "</tr>";
}
?>

<td width="192" colspan=10><center><a href='index.php'>Kembali Ke Menu Utama</a></td>
</tr>

</table>

<?php
//Langkah 3
//Hitunh jumlah data, halaman dan link
	$tampilData = mysql_query("select * from tmtk");
	$jmlData = mysql_num_rows($tampilData);
	$jumlahHalaman = ceil($jmlData/$batas);
	echo "Halaman :";
	for($z=1; $z<=$jumlahHalaman; $z++)
	
	if($z != $halaman){
		echo "<a href=Form_matakuliah.php?halaman= $z > $z </a> |";
	} else{
	echo "<b>$z</b>";
	}
	echo "Jumlah Matakuliah : $jmlData";

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
	        type: "Column2D",
	        //type: "Pie3d",
	        data: "tampil_grafik_mtk.php",
	        dataFormat: "URIdata"
		});
</script>