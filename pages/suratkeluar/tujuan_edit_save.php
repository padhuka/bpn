<?php
        include_once '../../lib/config.php';
		 //$ip = ; // Ambil IP Address dari User
    	$id = trim($_GET['id']);
		$kode = trim($_GET['kode']);
        $kodehid = trim($_GET['kodehid']); 
        $nama = trim($_GET['nama']);
        $kantor = trim($_GET['kantor']);
        $alamat = trim($_GET['alamat']);
		 #cek idsurat
        $sqlcek = "SELECT * FROM m_tujuan WHERE kode='$kode' AND kode<>'$kodehid'";
        $qrycek = mysql_query($sqlcek);
        $row = mysql_fetch_array($qrycek);

        if ($row){
            //echo 'var obat=new Array("'.$row[kode].'","'.$nama.'","'.$harga.'","'.$row[ukuran].'","'.$stkisi.'","'.$stk.'","'.$carabayar.'","'.$byre.'","'.$jl.'");';
            //unlink('../../file/tmp/'.$photo);
            echo 'y';
        }else{
		        $sqltbemp = "UPDATE m_tujuan SET kode='$kode',nama='$nama',kantor='$kantor',alamat='$alamat' WHERE id='$id'";		        
        		mysql_query($sqltbemp);
            echo 'n';
        }
?>