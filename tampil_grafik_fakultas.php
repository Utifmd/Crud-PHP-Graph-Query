<?php
	include "./Library/connectdb.php";
	$sql = "SELECT tfakultas.Status, COUNT(*) AS jumlah
			FROM tfakultas
			GROUP BY tfakultas.Status
			HAVING COUNT(tfakultas.Status)";

	$query = mysql_query($sql);
	echo "<graph caption='Grafik Fakultas yang bersatatus Akreditasi di STMIK INDONESIA' xAxisName='Nama Fakultas' yAxisName='Jumlah Fakultas' numberPrefix=''>";
		$warna = array('ffhgg', 'f6bd0f', '8bba00', 'ff8e46',
						'ffhgg', 'f6bd0f', '8bba00', 'ff8e46',
						'ffhgg', 'f6bd0f', '8bba00', 'ff8e46');
		$no=0;
		while ($data = mysql_fetch_array($query)) {
			$no++;
			echo "<set name='$data[Status]' value='$data[jumlah]' color='$warna[$no]' />";
		}
	echo "</graph>";
?>
