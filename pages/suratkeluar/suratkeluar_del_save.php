<?php
		//$skrg = date('Y-m-d');
        include_once '../../lib/config.php';
		$id = $_GET['id'];
		# HAPUS DATA 
		$sqlhapusproker = "DELETE FROM t_surat_keluar WHERE id='$id'";
   		mysql_query( $sqlhapusproker );
?>
