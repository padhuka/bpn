<?php
        include_once '../../lib/config.php';
        include_once '../../lib/fungsi.php';
		 //$ip = ; // Ambil IP Address dari User
    
		    //$noagenda = trim($_POST['noagenda']);
		    $nosurat = trim($_POST['nosurat']);
        $asalsurat = trim($_POST['asalsurathid']);
        $tglsurat = trim($_POST['tglsurat']);
        $tglterima = trim($_POST['tglterima']);
        $perihal = $_POST['perihal'];
        $photo = $_POST['filescanhid'];
        $dibales = $_POST['dibales'];
        $agendapdf= $_POST['agendapdf']+1;

        $id = trim($_POST['id']);
        $noagendahid = trim($_POST['agendaold']);
        $filelama = trim($_POST['filescanold']);
        $asalsuratlama= trim($_POST['asalsuratold']);
        if ($asalsurat){
        	$asalsurat=$asalsurat;
        }else{
		 	$asalsurat=$asalsuratlama;
        }

        /*$sqlcek = "SELECT * FROM t_surat_masuk WHERE no_agenda='$noagenda' AND no_agenda<>'$noagendahid'";
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
		        $sqltbemp = "UPDATE t_surat_masuk SET no_agenda='$noagenda',no_surat='$nosurat',dari='$asalsurat',isi_ringkas='$perihal',tgl_surat='$tglsurat',tgl_diterima='$tglterima',file='$photo',agenda_pdf='$agendapdf',dibales='$dibales' WHERE id='$id'";	
		        mysql_query($sqltbemp);
		        $sqlhapusproker = "DELETE FROM t_disposisi WHERE id_surat='$noagendahid'";
   				mysql_query($sqlhapusproker);

		        $disposisin = $_POST['disposisin'];
		        $isi = $_POST['isi'];
		        //$catatan = $_GET['catatan'];
		        $disp = explode(",", $disposisin);
		        //$disp = array($disposisi);
		            foreach ($disp as &$value) {
		                    $sqldisp = "INSERT INTO t_disposisi (id_surat,kpd_yth,isi_disposisi) VALUES ('$noagendahid','$value','$isi')";
		                    mysql_query($sqldisp);
		                    //echo $sqldisp;
		            }
        //echo $sqltbemp;?>
		        <?php ob_start(); ?>
<?php
    //include_once '../../lib/config.php';
    //include_once '../../lib/fungsi.php';
    //$id = $_GET['id'];
    $sqlemp = "SELECT * FROM t_surat_masuk WHERE no_agenda='$noagendahid'";
    $resemp = mysql_query( $sqlemp );
    $emp = mysql_fetch_array( $resemp );
    //load nama pengirim
    $sqlkirim = "SELECT * FROM t_pengirim WHERE kode='$emp[dari]'";
    $qrykirim = mysql_query($sqlkirim);
    $hslkirim = mysql_fetch_array($qrykirim);
  ?>  

<table>
  <tr valign="center"><td width="20%"><img src="../../file/print/logobpn.jpeg" height="200px;" width="200px;"></td>
    <td width="80%" style="font-size: 22px; vertical-align: middle;text-align: center;">
        KEMENTRIAN AGRARIA DAN TATA RUANG/ <br/>
        BADAN PERTANAHAN NASIONAL <br/>
        KANTOR PERTANAHAN KABUPATEN MANOKWARI <br/>
        PROVINSI PAPUA BARAT <br/>
        <span style="font-size: 14px;">
        Jl. Percertakan Negara Manowkari Email : kab-manokwari@bpn.go.id
        </span>
  </td></tr>
</table>
<hr>
<table border="1" cellspacing="0" cellpadding="0" align="center">
  <tr><td width="40%">ASAL</td><td colspan="2">:<?php echo $hslkirim['nama'];?></td><td>TANGGAL TERIMA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>:<?php echo $emp['tgl_diterima'];?></td></tr>
  <tr><td>TANGGAL SURAT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td colspan="2">:<?php echo $emp['tgl_surat'];?></td><td>NOMOR AGENDA</td><td>:<?php echo $emp['no_agenda'];?></td></tr>
  <tr><td>NOMOR SURAT</td><td colspan="2">:<?php echo $emp['no_surat'];?></td><td>PERIHAL</td><td>:<?php echo $emp['isi_ringkas'];?></td></tr>
  <tr><td>DITERUSKAN</td><td>&nbsp;&nbsp;&nbsp;TANGGAL&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;PARAF&nbsp;&nbsp;&nbsp;</td><td colspan="2">DISPOSISI</td></tr>
  <tr><td height="600px;">
    <?php
                                          $j=1;
                                          $sqlcatat = "SELECT * FROM t_pejabat ORDER BY id ASC";
                                          $rescatat = mysql_query( $sqlcatat );
                                          while($catat = mysql_fetch_array( $rescatat )){

                                            $pilih="";
                                            $sqlposisi = "SELECT * FROM t_disposisi WHERE id_surat='$emp[no_agenda]' AND kpd_yth='$catat[nip]'";
                                            $qryposisi = mysql_query($sqlposisi);
                                            $posisi = mysql_fetch_array($qryposisi);

                                             if ($posisi){
                                              //$pilih="checked";  
                                               echo $catat['nama'].'<br/>';
                                               $isidisposisi= $posisi['isi_disposisi'];
                                            }                                      
                                 
                                 
                                  } ?>
  </td>
  <td></td><td></td><td colspan="2"><?php echo $isidisposisi;?></td></tr>
</table>

<?php
$html = ob_get_contents();
ob_end_clean();

    // convert in PDF
    require_once('../../vendore/html2pdf/html2pdf.class.php');
    try
    {
        $surat= 'SuratMasuk'.$emp['no_agenda'].'-'.$agendapdf.'.pdf';
        //$html2pdf = new HTML2PDF('P', 'A4', 'fr', true, 'UTF-8', array(15, 5, 15, 5));
        $html2pdf = new HTML2PDF('P','A4','en');
        //$html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($html);
        //$html2pdf->Output('exemple03.pdf');
        $filename="../../file/print/".$surat;
        $html2pdf->Output($filename,'F');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }

       
           echo 'n';
        //}*/
?>