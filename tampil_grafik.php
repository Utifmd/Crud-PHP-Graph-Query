<?php
	include "./Library/connectdb.php";
	$sql = "SELECT mhs.Kode_f, tfakultas.Nama_f, COUNT(tfakultas.Kode_F) AS jumlah
			FROM mhs, tfakultas 
			WHERE tfakultas.Kode_F=mhs.Kode_F
			GROUP BY mhs.Kode_f, tfakultas.Nama_f ORDER BY mhs.Kode_f";

	$query = mysql_query($sql);
	echo "<graph caption='Grafik fakultas yang paling diminati di STMIK INDONESIA' xAxisName='Nama Fakultas' yAxisName='Jumlah Mahasiswa' numberPrefix=''>";
	
	$warna = array('ffhgg', 'f6bd0f', '8bba00', 'ff8e46',
					'ffhgg', 'f6bd0f', '8bba00', 'ff8e46',
					'ffhgg', 'f6bd0f', '8bba00', 'ff8e46');

	$no=0;
	while ($data = mysql_fetch_array($query)) {
		$nm = $data[Nama_f];
		$no++;
		echo "<set name='$nm' value='$data[jumlah]' color='$warna[$no]' />";
	}

	echo "</graph>";
?>