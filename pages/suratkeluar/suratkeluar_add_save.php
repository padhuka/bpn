<?php
        include_once '../../lib/config.php';
        include_once '../../lib/fungsi.php';
		 //$ip = ; // Ambil IP Address dari User
        //$tahunnow;
  //EST.BR.020818.000001
        //$kodeawal2 = 'EST_BR.';
        //$kodeawal = 'EST_BR.'.$hrn2.'.';
        //$sqljur = "SELECT * FROM t_estimasi WHERE id_estimasi LIKE '$kodeawal2%' ORDER BY id_estimasi DESC";
        $tahunnows = date('Y');
        $kodeawal=$tahunnows;
        $sqljur = "SELECT * FROM t_surat_keluar WHERE SUBSTRING(no_agenda,1,4)='$tahunnows' ORDER BY no_agenda DESC";
        echo $sqljur;
        $resultjur = mysql_query($sqljur);
        $jur = mysql_fetch_array($resultjur);
        if (empty($jur['no_agenda'])){
            $kodeakhir = '000001';
        }else{
            # GENERATE
            $kode = $jur['no_agenda'];
            $pecah = explode('.',$kode);
            $nilbaru = $pecah[1] + 1;
            $panj = strlen($nilbaru);
            //message_back($panj);
            switch($panj){
                default : break;
                case '1' : $kodeakhir='00000'.$nilbaru; break;
                case '2' : $kodeakhir='0000'.$nilbaru; break;
                case '3' : $kodeakhir='000'.$nilbaru; break;
                case '4' : $kodeakhir='00'.$nilbaru; break;
                case '5' : $kodeakhir='0'.$nilbaru; break;
                case '6' : $kodeakhir=$nilbaru; break;
            }
        }
        
        $kodebaru = $kodeawal.'.'.$kodeakhir; 
    	
		$noagenda = $kodebaru;
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
        
        $kodesurat= $agenda.'/'.$kdsurat.'-'.$wilayah.'/'.$bulan.'/'.$tahun;
        
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
		        $sqltbemp = "INSERT INTO t_surat_keluar (no_agenda,no_surat,tujuan, tgl_surat,isi_ringkas,file, suratmasuk) VALUES ('$noagenda','$kodesurat','$tujuan','$tglsurat','$perihal','$photo','$suratmasuk')";
        			mysql_query($sqltbemp);
        			echo $sqltbemp;
        			$sqltbemp2 = "UPDATE t_surat_masuk SET dibales=0 WHERE no_agenda='$suratmasuk'";
        			mysql_query($sqltbemp2);
            echo 'n';
        //}
?>