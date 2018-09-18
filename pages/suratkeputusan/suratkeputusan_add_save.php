<?php
        include_once '../../lib/config.php';
		 //$ip = ; // Ambil IP Address dari User
    
		$noagenda = trim($_POST['noagenda']);
		$kodesurat = trim($_POST['kodesurat']);
        $tglsurat = trim($_POST['tglsurat']);
        $perihal = $_POST['perihal'];
        $photo = $_POST['filescanhid'];
        
		 #cek idsurat
        $sqlcek = "SELECT * FROM t_surat_keputusan WHERE no_agenda='$noagenda'";
        $qrycek = mysql_query($sqlcek);
        $row = mysql_fetch_array($qrycek);

        if ($row){
            //echo 'var obat=new Array("'.$row[kode].'","'.$nama.'","'.$harga.'","'.$row[ukuran].'","'.$stkisi.'","'.$stk.'","'.$carabayar.'","'.$byre.'","'.$jl.'");';
            //unlink('../../file/tmp/'.$photo);
            echo 'y';
        }else{
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
		        $sqltbemp = "INSERT INTO t_surat_keputusan (no_agenda,kode, tgl_surat,tentang,file) VALUES ('$noagenda','$kodesurat','$tglsurat','$perihal','$photo')";

        			mysql_query($sqltbemp);
            echo 'n';
        }
?>