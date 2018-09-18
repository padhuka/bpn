<?php
		//$skrg = date('Y-m-d');
        include_once '../../lib/config.php';
		$id = $_GET['id'];
		# HAPUS DATA 
		$sqlhapusproker = "DELETE FROM m_kodewilayah WHERE id='$id'";
   		mysql_query( $sqlhapusproker );
?>
