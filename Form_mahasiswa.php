<?php 
error_reporting(0	);
//Koneksi Ke Server Database
include "Library/connectdb.php";

if (isset($_GET['DelNobp'])) {
    $kd_del = $_GET['DelNobp'];
    $Qdelete = mysql_query("DELETE FROM mhs WHERE Nobp='$kd_del'");
    if ($Qdelete) {
        echo "<script>alert('berhasil terhapus');</script>"; 
        echo "<meta http-equiv='refresh' content='0; url=Form_mahasiswa.php'>"; 
    }
}

$kd_updt = $_GET['UpdateNobp'];
$Qupdate = mysql_query("SELECT * FROM mhs WHERE Nobp='$kd_updt' ");
$data_mhs = mysql_fetch_array($Qupdate);

if (isset($_POST['btn_updt'])) {
    $kd_updt = $_GET['UpdateNobp'];

    $nama       = $_POST['txtnama'];
    $jk         = $_POST['txtjekel'];
    $tempat     = $_POST['txttmptlahir'];
    $tgllahir   = $_POST['tahun']."-".$_POST['bulan']."-".$_POST['tanggal'];
    $kelas      = $_POST['kelas'];
    $kodef      = $_POST['fakultas'];
    $alamat     = $_POST['txtalamat'];

    $Qupdt = mysql_query("UPDATE mhs SET Nama='$nama', Jekel='$jk', TempatLahir='$tempat', TglLahir='$tgllahir', Kelas='$kelas', Kode_f='$kodef', alamat='$alamat' WHERE Nobp='$kd_updt' ") or die(mysql_error());
    if ($Qupdt) {
        echo "<script>alert('berhasil diperbarui');</script>"; 
        echo "<meta http-equiv='refresh' content='0; url=Form_mahasiswa.php'>"; 
    }else{echo "<script>alert('gagal diperbarui');</script>"; }
}elseif (isset($_POST['SAVE'])) {
    $nobp       = $_POST['txtnobp'];
    $nama       = $_POST['txtnama'];
    $jk         = $_POST['txtjekel'];
    $tempat     = $_POST['txttmptlahir'];
    $tgllahir   = $_POST['tahun']."-".$_POST['bulan']."-".$_POST['tanggal'];
    $kelas      = $_POST['kelas'];
    $kodef      = $_POST['fakultas'];
    $alamat     = $_POST['txtalamat'];

    $sql    = "insert into mhs values('$nobp',
                                      '$nama',
                                      '$jk',
                                      '$tempat',
                                      '$tgllahir',
                                      '$kelas',
                                      '$kodef',
                                      '$alamat')";
    $result = mysql_query($sql);
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
}

?>

<form name="frm_mahasiswa" method="post"onSubmit="return validasi(this)">
<table width="700" border="0">
<tr bgcolor=#4baafa>
<th colspan=3>ENTRY DATA MAHASISWA</th>
</tr>

<tr>
<td><label>Nomor Induk Mahasiswa</label></td>
<td> : </td>
<td>
<input type="text" value="<?php echo $data_mhs['Nobp'] ?>" name="txtnobp" size="16" maxlength="14">
</td>
</tr>

<tr>
<td><label>Nama Mahasiswa</label></td>
<td> : </td>
<td>
<input type="text" value="<?php echo $data_mhs['Nama'] ?>" name="txtnama" size="30" maxlength="30">
</td>
</tr>

<tr>
<td><label>Jenis Kelamin</label></td>
<td> : </td>
<td>
<input type="radio" name="txtjekel" value="Laki-Laki">Laki-Laki
<input type="radio" name="txtjekel" value="Perempuan">Perempuan
</td>
</tr>

<tr>
<td><label>Tempat/ Tgl Lahir</label></td>
<td> : </td>
<td>
<input type="text" value="<?php echo $data_mhs['TempatLahir'] ?>" name="txttmptlahir" size="16" maxlength="16"> /
<?php
echo "<select name=tanggal>
<option value=0>-Pilih Tanggal-</option>";
for ($no=1;$no<=31;$no++)
{
echo "<option value=$no>$no</option>";
}
echo "</select>";

$nm_bulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
echo "<select name=bulan>
<option value=0>-Pilih Bulan-</option>";
for ($bln=1; $bln<=12; $bln++)
{
echo "<option value=$bln>$nm_bulan[$bln]</option>";
}
echo "</select>";

$thn_skrg=date('Y');
echo "<select name=tahun>
<option value=0 selected>-Pilih Tahun-</option>";
for ($thn=1990;$thn<=$thn_skrg;$thn++)
{
echo "<option value=$thn>$thn</option>";
}
echo "</select>";
?>
</td>
</tr>

<tr>
<td><label>Kelas</label></td>
<td> : </td>
<td>
<select name=kelas>
<option value=0 selected>-Pilih Kelas-</option>
<?php
include "/Library/connectdb.php";
$sqlKelas =mysql_query("select * from tkelas order by Nm_kelas");
while($data=mysql_fetch_array($sqlKelas))
{
echo "<option value=$data[Nm_kelas]>$data[Nm_kelas]</option>";
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
//error_reporting( error_reporting() & ~E_NOTICE);
include "/Library/connectdb.php";
$sqlFak =mysql_query("select * from tfakultas order by Kode_f");
while($data=mysql_fetch_array($sqlFak))
{
echo "<option value=$data[Kode_f]>$data[Kode_f]=>$data[Nama_f]</option>";
}
?>
</select>
</td>
</tr>

<tr>
<td><label>Alamat</label></td>
<td> : </td>
<td>
<textarea name="txtalamat" value="<?php echo $data_mhs['Alamat'] ?>" cols="60" rows="3"></textarea>
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
  <th colspan=10>DAFTAR NAMA MAHASISWA STMIK INDONESIA PADANG</th>
<tr>
<tr>
<td width="25">No.</td>
<td width="33">NIM</td>
<td width="116">Nama Mahasiswa</td>
<td width="33">Jekel</td>
<td width="49">Tempat</td>
<td width="62">Tgl. Lahir</td>
<td width="37">Kelas</td>
<td width="96">Kode Fakultas</td>
<td width="46">Alamat</td>
<td width="30">Aksi</td>
<?php
error_reporting(0);
include "/library/connectdb.php";
if (isset($_GET["halaman"])) { $halaman  = $_GET["halaman"]; } else { $halaman=1; };
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

$sql1 = "select * from mhs order by Nobp ASC LIMIT $posisi, $batas";

$query1 = mysql_query($sql1);
$no = $posisi + 1;
while ($data1 =  mysql_fetch_array($query1)){

echo "<tr>";
echo "<td>$no</td>";
echo "<td>$data1[Nobp]</td>";
echo "<td>$data1[Nama]</td>";
echo "<td>$data1[Jekel]</td>";
echo "<td>$data1[TempatLahir]</td>";
echo "<td>$data1[TglLahir]</td>";
echo "<td>$data1[Kelas]</td>";
echo "<td>$data1[Kode_f]</td>";
echo "<td>$data1[Alamat]</td>";
?>
<td width="103"><a href='Form_mahasiswa.php?UpdateNobp=<?php echo $data1['Nobp']?>'>update</a>| 
<a href="Form_mahasiswa.php?DelNobp=<?php echo $data1['Nobp']?>"">delete</a></td>
<?php
echo "</tr>";
}
?>

<td width="144" colspan=10><center><a href='index.php'>Kembali Ke Menu Utama</a></td>
</tr>

</table>

<?php
//Langkah 3
//Hitunh jumlah data, halaman dan link
	$tampilData = mysql_query("select * from mhs");
	$jmlData = mysql_num_rows($tampilData);
	$jumlahHalaman = ceil($jmlData/$batas);
	echo "Halaman :";
	for($z=1; $z<=$jumlahHalaman; $z++)
	
	if($z != $halaman){
		//echo "<a href="pagination.php?p='.$i.'">'.$i.'</a>";
		echo '<a href="?halaman='.$z.'" > '.$z.' </a>';
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
	        type: "Column2D",
	        //type: "Pie3d",
	        data: "tampil_grafik.php",
	        dataFormat: "URIdata"
		});
</script>
