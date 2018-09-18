			<?php
        		include_once '../../lib/config.php';
        	?>
          <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
			<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  		    <th>No Agenda</th>
                          <th>Kode Surat</th>
                          <th>Tgl Surat</th>
                          <th>Perihal</th>                   
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
                                        $sqlcatat = "SELECT * FROM t_surat_keputusan WHERE tgl_surat>='$tgl1' AND  tgl_surat<='$tgl2' ORDER BY id ASC";
                                      }else{
                                        $sqlcatat = "SELECT * FROM t_surat_keputusan ORDER BY id ASC";
                                    }
                                    $j=1;
                                    $rescatat = mysql_query( $sqlcatat );
                                    while($catat = mysql_fetch_array( $rescatat )){
                                ?>
                        <tr>
                          <td><?php echo $catat['no_agenda'];?></td>
                          <td><?php echo $catat['kode'];?></td>
                          <td><?php echo $catat['tgl_surat'];?></td>
                          <td><?php echo $catat['tentang'];?></td>
                        </tr>
                    <?php }?>
                </tfoot>
              </table>
              <div id="tbl">
              <table>
                <thead>
                <tr>
                          <th>No Agenda</th>
                          <th>Kode Surat</th>
                          <th>Tgl Surat</th>
                          <th>Perihal</th>                         
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
                                        $sqlcatat = "SELECT * FROM t_surat_keputusan WHERE tgl_surat>='$tgl1' AND  tgl_surat<='$tgl2' ORDER BY id ASC";
                                      }else{
                                        $sqlcatat = "SELECT * FROM t_surat_keputusan ORDER BY id ASC";
                                    }
                                    $j=1;
                                    $rescatat = mysql_query( $sqlcatat );
                                    while($catat = mysql_fetch_array( $rescatat )){
                                ?>
                        <tr>
                          <td><?php echo $catat['no_agenda'];?></td>
                          <td><?php echo $catat['kode'];?></td>
                          <td><?php echo $catat['tgl_surat'];?></td>
                          <td><?php echo $catat['tentang'];?></td>
                          <td>                        
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