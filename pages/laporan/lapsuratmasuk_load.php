			<?php
        		include_once '../../lib/config.php';
        	?>
          <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
			<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  		  <th>No Agenda</th>
                          <th>Asal Surat</th>
                          <th>Tgl Surat</th>
                          <th>Tgl Terima</th>
                          <th>Perihal</th>
                          <th>Disposisi</th>                      
                </tr>
                </thead>
                <tbody>
                <?php                                    
                                   
                                    if (isset($_GET['tgl'])){
                                      $tgl1=$_GET['tgl'];  
                                    }
                                     if (isset($_GET['tgl2'])){
                                      $tgl2=$_GET['tgl2'];  
                                    }

                                    if (isset($tgl1) AND isset($tgl2)){
                                        $sqlcatat = "SELECT * FROM t_surat_masuk WHERE tgl_surat>='$tgl1' AND  tgl_surat<='$tgl2' ORDER BY id ASC";
                                      }else{
                                        $sqlcatat = "SELECT * FROM t_surat_masuk ORDER BY id ASC";
                                    }
                                    $j=1;
                                    
                                    $rescatat = mysql_query( $sqlcatat );
                                    while($catat = mysql_fetch_array( $rescatat )){
                                      //load nama disposisi
                                        $sqlkirim = "SELECT * FROM t_pengirim WHERE kode='$catat[dari]'";
                                          $qrykirim = mysql_query($sqlkirim);
                                          $hslkirim = mysql_fetch_array($qrykirim);
                                          $pengirim= $hslkirim['nama'];
                                      //load nama disposisi
                                        $namae='';
                                        //$namae2='';
                                        $sqldis = "SELECT * FROM t_disposisi AS A,t_pejabat AS B WHERE A.id_surat='$catat[no_agenda]' AND A.kpd_yth=B.nip";
                                        $qrydis = mysql_query($sqldis);
                                        $dispos='';
                                        while($hsldis = mysql_fetch_array($qrydis)){
                                          $namae= $namae.','.$hsldis['nama'];
                                          //$namae2= $namae2.','.$hsldis['nip'];
                                          $dispos=substr($namae,1);
                                          //$kddispos=substr($namae2,1);
                                        };
                                ?>
                        <tr>
                          <td><?php echo $catat['no_agenda'];?></td>
                          <td><?php echo $pengirim;?></td>
                          <td><?php echo $catat['tgl_surat'];?></td>
                          <td><?php echo $catat['tgl_diterima'];?></td>
                          <td><?php echo $catat['isi_ringkas'];?></td>
                          <td><?php echo $dispos;?></td>                    
                        </tr>
                    <?php }?>
                </tfoot>
              </table>
              <div id="tbl">
              <table>
                <thead>
                <tr>
                        <th>No Agenda</th>
                          <th>Asal Surat</th>
                          <th>Tgl Surat</th>
                          <th>Tgl Terima</th>
                          <th>Perihal</th>
                          <th>Disposisi</th>                   
                </tr>
                </thead>
                <tbody>
                <?php                                    
                                   
                                    if (isset($_GET['tgl'])){
                                      $tgl1=$_GET['tgl'];  
                                    }
                                     if (isset($_GET['tgl2'])){
                                      $tgl2=$_GET['tgl2'];  
                                    }

                                    if (isset($tgl1) AND isset($tgl2)){
                                        $sqlcatat = "SELECT * FROM t_surat_masuk WHERE tgl_surat>='$tgl1' AND  tgl_surat<='$tgl2' ORDER BY id ASC";
                                      }else{
                                        $sqlcatat = "SELECT * FROM t_surat_masuk ORDER BY id ASC";
                                    }
                                    $j=1;
                                    
                                    $rescatat = mysql_query( $sqlcatat );
                                    while($catat = mysql_fetch_array( $rescatat )){
                                      //load nama disposisi
                                        $sqlkirim = "SELECT * FROM t_pengirim WHERE kode='$catat[dari]'";
                                          $qrykirim = mysql_query($sqlkirim);
                                          $hslkirim = mysql_fetch_array($qrykirim);
                                          $pengirim= $hslkirim['nama'];
                                      //load nama disposisi
                                        $namae='';
                                        //$namae2='';
                                        $sqldis = "SELECT * FROM t_disposisi AS A,t_pejabat AS B WHERE A.id_surat='$catat[no_agenda]' AND A.kpd_yth=B.nip";
                                        $qrydis = mysql_query($sqldis);
                                        $dispos='';
                                        while($hsldis = mysql_fetch_array($qrydis)){
                                          $namae= $namae.','.$hsldis['nama'];
                                          //$namae2= $namae2.','.$hsldis['nip'];
                                          $dispos=substr($namae,1);
                                          //$kddispos=substr($namae2,1);
                                        };
                                ?>
                        <tr>
                          <td><?php echo $catat['no_agenda'];?></td>
                          <td><?php echo $pengirim;?></td>
                          <td><?php echo $catat['tgl_surat'];?></td>
                          <td><?php echo $catat['tgl_diterima'];?></td>
                          <td><?php echo $catat['isi_ringkas'];?></td>
                          <td><?php echo $dispos;?></td>                    
                        </tr>
                    <?php }?>
                </tfoot>
              </table>
      </div>
              <script>
              $('#tbl').hide();
			  $(document).ready(function(){
			       $('#example1').DataTable();
			  });
        
         function ekspor(){//table_search                
                window.open('data:application/vnd.ms-excel,' + $('#tbl').html());
                e.preventDefault();
            }
			</script>