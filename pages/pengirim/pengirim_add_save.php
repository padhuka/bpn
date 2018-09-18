<?php
        include_once '../../lib/config.php';
		 //$ip = ; // Ambil IP Address dari User
    
		$kode = trim($_POST['kode']);
        $nama = trim($_POST['nama']); 
        $alamat = trim($_POST['alamat']); 
        $email = trim($_POST['email']); 
        $notelp = trim($_POST['notelp']); 
        
		 #cek idsurat
        $sqlcek = "SELECT * FROM t_pengirim WHERE kode='$kode'";
        $qrycek = mysql_query($sqlcek);
        $row = mysql_fetch_array($qrycek);

        if ($row){
            //echo 'var obat=new Array("'.$row[kode].'","'.$nama.'","'.$harga.'","'.$row[ukuran].'","'.$stkisi.'","'.$stk.'","'.$carabayar.'","'.$byre.'","'.$jl.'");';
            //unlink('../../file/tmp/'.$photo);
            echo 'y';
        }else{
        	
		    $sqltbemp = "INSERT INTO t_pengirim (kode,nama,alamat,email,notelp) VALUES ('$kode','$nama','$alamat','$email','$notelp')";
            mysql_query($sqltbemp);
            echo 'n';
        }
?>