
<?php
	include "./Library/connectdb.php";
	$sql = "SELECT tkelas.Nm_kelas, COUNT(*) AS jumlah 
			FROM tkelas 
			GROUP BY tkelas.Nm_kelas
			HAVING COUNT(tkelas.Nm_kelas)";

	$query = mysql_query($sql);
	echo "<graph caption='Grafik jumlah kelas mandiri dan reguler di STMIK INDONESIA' xAxisName='Nama Kelas' yAxisName='Jumlah Kelas' numberPrefix=''>";
		$warna = array('ffhgg', 'f6bd0f', '8bba00', 'ff8e46',
						'ffhgg', 'f6bd0f', '8bba00', 'ff8e46',
						'ffhgg', 'f6bd0f', '8bba00', 'ff8e46');
		$no=0;
		while ($data = mysql_fetch_array($query)) {
			$no++;
			echo "<set name='$data[Nm_kelas]' value='$data[jumlah]' color='$warna[$no]' />";
		}
	echo "</graph>";
?>