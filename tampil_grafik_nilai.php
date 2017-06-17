<?php
	include "./Library/connectdb.php";
	$sql = "SELECT tnilai.NoBp, tnilai.Kode_MK, tnilai.Nilai_UAS
			FROM tnilai
			GROUP BY tnilai.NoBp";

	$query = mysql_query($sql);
	echo "<graph caption='Grafik Mahasiswa dengan Nilai tertinggi di STMIK INDONESIA' xAxisName='No.BP Mahasiswa' yAxisName='Nilai Uas' numberPrefix=''>";
		$warna = array('ffhgg', 'f6bd0f', '8bba00', 'ff8e46',
						'ffhgg', 'f6bd0f', '8bba00', 'ff8e46',
						'ffhgg', 'f6bd0f', '8bba00', 'ff8e46');
		$no=0;
		while ($data = mysql_fetch_array($query)) {
			$no++;
			echo "<set name='$data[NoBp]' value='$data[Nilai_UAS]' color='$warna[$no]' />";
		}
	echo "</graph>";
?>