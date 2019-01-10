<?php
        include_once '../../lib/config.php';
        include_once '../../lib/fungsi.php';
		 //$ip = ; // Ambil IP Address dari User
        //$tahunnow;
  //EST.BR.020818.000001
        //$kodeawal2 = 'EST_BR.';
        //$kodeawal = 'EST_BR.'.$hrn2.'.';
        //$sqljur = "SELECT * FROM t_estimasi WHERE id_estimasi LIKE '$kodeawal2%' ORDER BY id_estimasi DESC";
        //$tahunnows = date('Y');
        $sqljur = "SELECT * FROM t_surat_keluar ORDER BY no_agenda DESC";
        $resultjur = mysql_query( $sqljur );
        $jur = mysql_fetch_array( $resultjur ); 
        $kodebaru = $jur['no_agenda']+1;

        $sqljur2 = "SELECT * FROM t_surat_keluar ORDER BY kode DESC";
        $resultjur2 = mysql_query( $sqljur2 );
        $jur2 = mysql_fetch_array( $resultjur2 ); 
        $kode = $jur2['kode']+1;

        $noagenda = trim($kodebaru);
		$agenda = trim($_POST['agenda']);
		$kdsurat = trim($_POST['kodesurat']);
		$wilayah = trim($_POST['wilayah']);
		$bulan = trim($_POST['bulan1']);
		$tahun = trim($_POST['tahun']);
        $tglsurat = trim($_POST['tglsurat']);
        $tujuan = trim($_POST['tujuan']);
        $perihal = $_POST['perihal'];
        $photo = $_POST['filescanhid'];
        $suratmasuk = trim($_POST['suratmasuks']);
        $pecah=explode('-',$tujuan);
        $tujuan=$pecah[1];
        
        $kodesurat= $noagenda.'/'.$kdsurat.'-'.$wilayah.'/'.$bulan.'/'.$tahun;
        
		 #cek idsurat
        /*$sqlcek = "SELECT * FROM t_surat_keluar WHERE no_agenda='$noagenda'";
        $qrycek = mysql_query($sqlcek);
        $row = mysql_fetch_array($qrycek);
        //echo $kodesurat;
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
		        $sqltbemp = "INSERT INTO t_surat_keluar (no_agenda,no_surat,tujuan, tgl_surat,isi_ringkas,file, suratmasuk,kode,tahun) VALUES ('$noagenda','$kodesurat','$tujuan','$tglsurat','$perihal','$photo','$suratmasuk','$kode','$tahun')";
        			mysql_query($sqltbemp);
        			echo $sqltbemp;
        			$sqltbemp2 = "UPDATE t_surat_masuk SET dibales=0 WHERE no_agenda='$suratmasuk'";
        			mysql_query($sqltbemp2);
            echo 'n';
        //}
?>