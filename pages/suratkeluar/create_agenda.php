<?php
    include_once '../../lib/config.php';
    include_once '../../lib/fungsi.php';
    # GENERATE KODE
		//$kdtgl = date('Ymd');
		//$kodeawal = 'SKL_';
    	//$tahunnow = date('Y');
    $th=$_GET['th'];
		$sqljur = "SELECT * FROM t_surat_keluar WHERE substring(no_surat,-4)='$th' ORDER BY no_agenda ASC";
   		$resultjur = mysql_query( $sqljur );
	    //$jur = mysql_fetch_array( $resultjur );			
    $j=1;
   ?>

   <table border="1">
      <tr><td>Kode</td><td>Urut</td><td>Tahun</td></tr>
    <?php while($hjur=mysql_fetch_array($resultjur)){?>
      <tr>
          <td><?php $urut=$j++;echo $hjur['no_agenda'];?></td>
          <td><?php echo $urut;?></td>
          <td><?php echo $hjur['tahun'];?></td>
          <?php 
          
          mysql_query("update t_surat_keluar set kode='$urut' WHERE no_agenda='$hjur[no_agenda]'");
          mysql_query("update t_surat_keluar set tahun='$th' WHERE no_agenda='$hjur[no_agenda]'"); ?>
      </tr>
    <?php }?>
   </table>