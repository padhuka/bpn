<?php
        include_once '../../lib/config.php';
		 //$ip = ; // Ambil IP Address dari User
    
		$noagenda = trim($_POST['noagenda']);
		$agenda = trim($_POST['agenda']);
		$kdsurat = trim($_POST['kodesurat']);
		$wilayah = trim($_POST['wilayah']);
		$bulan = trim($_POST['bulan']);
		$tahun = trim($_POST['tahun']);
        $tglsurat = trim($_POST['tglsurat']);
        $tujuan = trim($_POST['tujuan']);
        $perihal = $_POST['perihal'];
        $photo = $_POST['filescanhid'];
        $suratmasuk = trim($_POST['suratmasuks']);
        $pecah=explode('-',$tujuan);
        $tujuan=$pecah[1];
        
        $kodesurat= $agenda.'/'.$kdsurat.'-'.$wilayah.'/'.$bulan.'/'.$tahun;
        
		 #cek idsurat
        $sqlcek = "SELECT * FROM t_surat_keluar WHERE no_agenda='$noagenda'";
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
		        $sqltbemp = "INSERT INTO t_surat_keluar (no_agenda,no_surat,tujuan, tgl_surat,isi_ringkas,file, suratmasuk) VALUES ('$noagenda','$kodesurat','$tujuan','$tglsurat','$perihal','$photo','$suratmasuk')";
        			mysql_query($sqltbemp);
        			$sqltbemp2 = "UPDATE t_surat_masuk SET dibales=0 WHERE no_agenda='$suratmasuk'";
        			mysql_query($sqltbemp2);
            echo 'n';
        }
?>