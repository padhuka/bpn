   <?php
    include_once '../../lib/config.php';
    include_once '../../lib/fungsi.php';
    $id = $_GET['id'];
    $sqlemp = "SELECT * FROM t_surat_masuk WHERE no_agenda='$id'";
    $resemp = mysql_query( $sqlemp );
    $emp = mysql_fetch_array( $resemp );
    //load nama pengirim
    $sqlkirim = "SELECT * FROM t_pengirim WHERE kode='$emp[dari]'";
    $qrykirim = mysql_query($sqlkirim);
    $hslkirim = mysql_fetch_array($qrykirim);
  ?>  
<?php ob_start(); ?>
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
  <tr><td>NOMOR SURAT</td><td colspan="2">:</td><td>PERIHAL</td><td>:<?php echo $emp['isi_ringkas'];?></td></tr>
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
                                            }                                      
                                 
                                 
                                  } ?>
  </td>
  <td></td><td></td><td colspan="2"><?php echo $posisi['isi_disposisi'];?></td></tr>
</table>

<?php
$html = ob_get_contents();
ob_end_clean();

$surat= 'SuratMasuk-'.$emp['no_agenda'].'.pdf';
require_once('../../vendore/html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$filename="../../file/print/".$surat;
//$pdf->Output($filename,'F');
$pdf->Output('F.pdf');
?>