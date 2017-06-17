<?php
	include "./Library/connectdb.php";
	$sql = "SELECT tmtk.Sks, COUNT(*) AS jumlah
			FROM tmtk
			GROUP BY tmtk.Sks
			HAVING COUNT(tmtk.Sks)";

	$query = mysql_query($sql);
	echo "<graph caption='Grafik jumlah Matakuliah dengan SKS Terbanyak di STMIK INDONESIA' xAxisName='Jumlah SKS' yAxisName='Jumlah Matakuliah' numberPrefix=''>";
		$warna = array('ffhgg', 'f6bd0f', '8bba00', 'ff8e46',
						'ffhgg', 'f6bd0f', '8bba00', 'ff8e46',
						'ffhgg', 'f6bd0f', '8bba00', 'ff8e46');
		$no=0;
		while ($data = mysql_fetch_array($query)) {
			$no++;
			echo "<set name='$data[Sks]' value='$data[jumlah]' color='$warna[$no]' />";
		}
	echo "</graph>";
?>