<?php
        include_once '../../lib/config.php';
		 //$ip = ; // Ambil IP Address dari User
    
		$nip = trim($_POST['nip']);
        $nama = trim($_POST['nama']); 
        
		 #cek idsurat
        $sqlcek = "SELECT * FROM t_pejabat WHERE nip='$nip'";
        $qrycek = mysql_query($sqlcek);
        $row = mysql_fetch_array($qrycek);

        if ($row){
            //echo 'var obat=new Array("'.$row[kode].'","'.$nama.'","'.$harga.'","'.$row[ukuran].'","'.$stkisi.'","'.$stk.'","'.$carabayar.'","'.$byre.'","'.$jl.'");';
            //unlink('../../file/tmp/'.$photo);
            echo 'y';
        }else{
        	
		    $sqltbemp = "INSERT INTO t_pejabat (nip,nama) VALUES ('$nip','$nama')";
            mysql_query($sqltbemp);
            echo 'n';
        }
?>