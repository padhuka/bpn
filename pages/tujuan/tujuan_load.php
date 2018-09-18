			<?php
        		include_once '../../lib/config.php';
        	?>
			<table id="example1Tujuan" class="table table-bordered table-striped">
                <thead>
                <tr>
                  		    <th>Kode</th>
                          <th>Nama</th>                          
                          <th>Kantor</th> 
                          <th>Alamat</th> 
                          <th><button type="button" class="btn btn btn-default btn-circle" onclick="open_addTujuan();"><span class="glyphicon glyphicon-plus"></span></button></th>
                </tr>
                </thead>
                <tbody>
                <?php
                                    $j=1;
                                    $sqlcatat = "SELECT * FROM m_tujuan ORDER BY id ASC";
                                    $rescatat = mysql_query( $sqlcatat );
                                    while($catat = mysql_fetch_array( $rescatat )){
                                ?>
                        <tr>
                          <td><?php echo $catat['kode'];?></td>
                          <td><?php echo $catat['nama'];?></td>
                          <td><?php echo $catat['kantor'];?></td>
                          <td><?php echo $catat['alamat'];?></td>
                          <td>                                       
                                        <!--<button type="button" class="btn btn btn-default btn-circle" id="<?php echo $catat['id']; ?>"><span class="fa fa-print"></span></button>-->
                                        <button type="button" class="btn btn btn-default btn-circle" id="<?php echo $catat['id']; ?>" onclick="open_modalTujuan(idedit=<?php echo $catat['id']; ?>);"><span class="glyphicon glyphicon-pencil"></span></button>
                                         <button type="button" class="btn btn btn-default btn-circle open_delTujuan" id="<?php echo $catat['id']; ?>" onclick="open_delTujuan(iddel=<?php echo $catat['id']; ?>);"><span class="glyphicon glyphicon-remove"></span></button>

                                    </td>
                        </tr>
                    <?php }?>
                </tfoot>
              </table>
              <script>
			       $('#example1Tujuan').DataTable();	

  			     function open_addTujuan(){
  					                    //var m = $(this).attr("id");
  					        $.ajax({
  					        url: "tujuan/tujuan_add.php",
  					        type: "GET",
  				            success: function (ajaxData){
  				            	$("#ModalAddTujuan").html(ajaxData);
  				            	$("#ModalAddTujuan").modal('show',{backdrop: 'true'});
  				            }
  				          });
  				  }; 

             function open_delTujuan(){
                                $.ajax({
                                    url: "tujuan/tujuan_del.php?id="+iddel,
                                    type: "GET",
                                    success: function (ajaxData){
                                        $("#ModalDeleteTujuan").html(ajaxData);
                                        $("#ModalDeleteTujuan").modal('show',{backdrop: 'true'});
                                    }
                                });
              }; 	

             function open_modalTujuan(){
                              $.ajax({
                                  url: "tujuan/tujuan_edit.php?id="+idedit,
                                  type: "GET",
                                  success: function (ajaxData){
                                      $("#ModalEditTujuan").html(ajaxData);
                                      $("#ModalEditTujuan").modal('show',{backdrop: 'true'});
                                  }
                              });
            };	
			</script>