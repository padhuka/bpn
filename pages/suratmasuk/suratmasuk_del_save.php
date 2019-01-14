<?php
		//$skrg = date('Y-m-d');
        include_once '../../lib/config.php';
		$id = $_GET['id'];
		$noagenda = $_GET['noagenda'];
		# HAPUS DATA 
		$sqlhapusproker = "DELETE FROM t_surat_masuk WHERE no_agenda='$noagenda'";
   		mysql_query( $sqlhapusproker );

   		$sqlhapusproker = "DELETE FROM t_disposisi WHERE id_surat='$noagenda'";
   		mysql_query( $sqlhapusproker );
?>
