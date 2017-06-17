<?php
$hostname	= "localhost";
$user		= "root";
$password	= "";
$db_name	= "dbmhs";

//koneksi Ke Server Database
$conn	= mysql_connect("$hostname","$user", "$password");

//Memilih database Server
$nmdb	= mysql_select_db($db_name);
?>