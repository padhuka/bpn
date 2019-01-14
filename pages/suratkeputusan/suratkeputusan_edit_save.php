<?php
        include_once '../../lib/config.php';
		 //$ip = ; // Ambil IP Address dari User
    
		//$noagenda = trim($_POST['noagenda']);
		$nosurat = trim($_POST['nosurat']);
        $tglsurat = trim($_POST['tglsurat']);
        $perihal = $_POST['perihal'];
        $photo = $_POST['filescanhid'];

        $id = trim($_POST['id']);
        $noagendahid = trim($_POST['agendaold']);
        $filelama = trim($_POST['filescanold']);
		 #cek idsurat
        /*$sqlcek = "SELECT * FROM t_surat_keputusan WHERE no_agenda='$noagenda' AND no_agenda<>'$noagendahid'";
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
		            $photo=$filelama;
		        }
		        $sqltbemp = "UPDATE t_surat_keputusan SET no_agenda='$noagendahid',kode='$nosurat',tentang='$perihal',tgl_surat='$tglsurat',file='$photo' WHERE id='$id'";
		        
		        //echo $sqltbemp;
		        mysql_query($sqltbemp);
		            echo 'n';
		        //}
?>