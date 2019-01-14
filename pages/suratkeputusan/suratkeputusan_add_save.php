<?php
        include_once '../../lib/config.php';
		 //$ip = ; // Ambil IP Address dari User
    
		$tglsurat = trim($_POST['tglsurat']);
        $tahun = substr($tglsurat, 0,4);

        $sqljur = "SELECT * FROM t_surat_keputusan ORDER BY no_agenda DESC";
        $resultjur = mysql_query( $sqljur );
        $jur = mysql_fetch_array( $resultjur ); 
        $kodebaru = $jur['no_agenda']+1;

        $sqljur2 = "SELECT * FROM t_surat_keputusan WHERE substring(tgl_surat,1,4)='$tahun' ORDER BY urut DESC";
        $resultjur2 = mysql_query( $sqljur2 );
        $jur2 = mysql_fetch_array( $resultjur2 ); 
        $kode = $jur2['urut']+1;

		$noagenda = $kodebaru;
		$kodesurat = trim($_POST['kodesurat']);
        //$tglsurat = trim($_POST['tglsurat']);
        $perihal = $_POST['perihal'];
        $photo = $_POST['filescanhid'];
        
		/* #cek idsurat
        $sqlcek = "SELECT * FROM t_surat_keputusan WHERE no_agenda='$noagenda'";
        $qrycek = mysql_query($sqlcek);
        $row = mysql_fetch_array($qrycek);

        if ($row){
            //echo 'var obat=new Array("'.$row[kode].'","'.$nama.'","'.$harga.'","'.$row[ukuran].'","'.$stkisi.'","'.$stk.'","'.$carabayar.'","'.$byre.'","'.$jl.'");';
            //unlink('../../file/tmp/'.$photo);
            echo 'y';
        }else{*/
        	if(!empty($_FILES['filescan']['name'])){
			    $uploadedFile = '';
			        $fileName = $_FILES['filescan']['name'];
			            $sourcePath = $_FILES['filescan']['tmp_name'];
			            $targetPath = "../../file/tmp/".$fileName;
			            if(move_uploaded_file($sourcePath,$targetPath)){
			                $uploadedFile = $fileName;
			            }
			    
			}
				if ($photo){
	            //$nmlengkap=$nama_file_barutelp.$doc_hp;
		            if (is_file('../../file/tmp/'.$photo)) // Jika file tersebut ada
		             // Hapus file tersebut
		            //unlink('../file/'.$doc_hpold);//Hapus file lama
		            $source_file = '../../file/tmp/'.$photo;
		            $target_file = '../../file/'.$photo;
		            //move_uploaded_file($_FILES['filetelp']['tmp_name'],$target_file);
		            //move_uploaded_file($source_file,$target_file);
		            copy($source_file,$target_file);
		            unlink('../../file/tmp/'.$photo);
		            //copy($pathphoto,$target_file);
		            //unlink($pathphoto);
		            //message_back($nmlengkap);
		        }else{
		            $photo="";
		        }
		        $sqltbemp = "INSERT INTO t_surat_keputusan (no_agenda,kode, tgl_surat,tentang,file,urut) VALUES ('$noagenda','$kodesurat','$tglsurat','$perihal','$photo','$kode')";

        			mysql_query($sqltbemp);
            echo 'n';
        //}
?>