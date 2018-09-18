<?php
        include_once '../../lib/config.php';
		 //$ip = ; // Ambil IP Address dari User
    
		$kode = trim($_POST['kode']);
        $nama = trim($_POST['nama']); 
        $kantor = trim($_POST['kantor']);
        $alamat = trim($_POST['alamat']);
        
		 #cek idsurat
        $sqlcek = "SELECT * FROM m_tujuan WHERE kode='$kode'";
        $qrycek = mysql_query($sqlcek);
        $row = mysql_fetch_array($qrycek);

        if ($row){
            //echo 'var obat=new Array("'.$row[kode].'","'.$nama.'","'.$harga.'","'.$row[ukuran].'","'.$stkisi.'","'.$stk.'","'.$carabayar.'","'.$byre.'","'.$jl.'");';
            //unlink('../../file/tmp/'.$photo);
            echo 'y';
        }else{
        	
		    $sqltbemp = "INSERT INTO m_tujuan (kode,nama,kantor,alamat) VALUES ('$kode','$nama','$kantor','$alamat')";
            mysql_query($sqltbemp);
            echo 'n';
        }
?>