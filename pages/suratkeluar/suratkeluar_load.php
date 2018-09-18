			<?php
        		include_once '../../lib/config.php';
        	?>
      <div id="suratkeluar">
			<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  		    <th>No Agenda</th>
                          <th>Kode Surat</th>
                          <th>Tgl Surat</th>
                          <th>Perihal</th>
                          <th>Tujuan</th>
                          <th>File</th>
                          <th><button type="button" class="btn btn btn-default btn-circle open_add"><span class="glyphicon glyphicon-plus"></span></button></th>
                </tr>
                </thead>
                <tbody>
                <?php
                                    $j=1;
                                    $sqlcatat = "SELECT * FROM t_surat_keluar ORDER BY id DESC";
                                    $rescatat = mysql_query( $sqlcatat );
                                    while($catat = mysql_fetch_array( $rescatat )){
                                ?>
                        <tr>
                          <td><?php echo $catat['no_agenda'];?></td>
                          <td><?php echo $catat['no_surat'];?></td>
                          <td><?php echo $catat['tgl_surat'];?></td>
                          <td><?php echo $catat['isi_ringkas'];?></td>
                          <?php 
                           $kode=trim($catat['tujuan']);
                            $sqlcatat2 = "SELECT * FROM m_tujuan WHERE kode='$kode'";
                            $tuj=mysql_fetch_array(mysql_query($sqlcatat2));
                            ?>
                          <td><?php echo $tuj['nama'].' - '.$catat['tujuan'];?></td>
                          <td><span onclick="pdfe('<?php echo substr($catat['file'],0,-
                          4);?>','<?php echo substr($catat['file'],
                          -4);?>');"  onMouseOver="this.style.cursor='pointer'"><?php echo $catat['file'];?></span></td>
                          <td>          
                                        <button type="button" class="btn btn btn-default btn-circle" id="<?php echo $catat['id']; ?>" onclick="open_modal(idedit=<?php echo $catat['id']; ?>);"><span class="glyphicon glyphicon-pencil"></span></button>
                                         <button type="button" class="btn btn btn-default btn-circle " id="<?php echo $catat['id']; ?>" onclick="open_del(iddel=<?php echo $catat['id']; ?>);"><span class="glyphicon glyphicon-remove"></span></button>

                                    </td>
                        </tr>
                    <?php }?>
                </tfoot>
              </table>
              <script>
			       $('#example1').DataTable();	
            function pdfe(x,y){
                //alert(x);
                $.ajax({
                    url: "suratmasuk/suratmasuk_pdf.php?id="+x+''+y,
                    type: "GET",
                      success: function (ajaxData){
                        $("#ModalPdf").html(ajaxData);
                        $("#ModalPdf").modal('show',{backdrop: 'true'});
                      }
                    });
            }; 

  			    $(".open_add").click(function (e){
  					                    //var m = $(this).attr("id");
  					        $.ajax({
  					        url: "suratkeluar/suratkeluar_add.php",
  					        type: "GET",
  				            success: function (ajaxData){
  				            	$("#ModalAdd").html(ajaxData);
  				            	$("#ModalAdd").modal('show',{backdrop: 'true'});
  				            }
  				          });
  				  }); 
            function open_del(){
                                $.ajax({
                                    url: "suratkeluar/suratkeluar_del.php?id="+iddel,
                                    type: "GET",
                                    success: function (ajaxData){
                                        $("#ModalDelete").html(ajaxData);
                                        $("#ModalDelete").modal('show',{backdrop: 'true'});
                                    }
                                });
            }; 	

            function open_modal(){
                              $.ajax({
                                  url: "suratkeluar/suratkeluar_edit.php?id="+idedit,
                                  type: "GET",
                                  success: function (ajaxData){
                                      $("#ModalEdit").html(ajaxData);
                                      $("#ModalEdit").modal('show',{backdrop: 'true'});
                                  }
                              });
            };	
            /*$(".open_print").click(function (e){
              //alert('ook');
                              var m = $(this).attr("id");  
                              var w = window.open('../file/print/suratkeluar_print.php?id='+m,'_blank');
            });*/

			</script>