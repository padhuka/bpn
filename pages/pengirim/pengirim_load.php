			     <?php
        		include_once '../../lib/config.php';
        	?>
			<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  		    <th>Kode</th>
                          <th>Nama</th>
                          <th>Alamat</th>
                          <th>Email</th>
                          <th>Telp</th>                          
                          <th><button type="button" class="btn btn btn-default btn-circle open_add"><span class="glyphicon glyphicon-plus"></span></button></th>
                </tr>
                </thead>
                <tbody>
                <?php
                                    $j=1;
                                    $sqlcatat = "SELECT * FROM t_pengirim ORDER BY id ASC";
                                    $rescatat = mysql_query( $sqlcatat );
                                    while($catat = mysql_fetch_array( $rescatat )){
                                ?>
                        <tr>
                          <td><?php echo $catat['kode'];?></td>
                          <td><?php echo $catat['nama'];?></td>
                          <td><?php echo $catat['alamat'];?></td>
                          <td><?php echo $catat['email'];?></td>
                          <td><?php echo $catat['notelp'];?></td>
                          <td>                                       
                                        <!--<button type="button" class="btn btn btn-default btn-circle" id="<?php echo $catat['id']; ?>"><span class="fa fa-print"></span></button>-->
                                        <button type="button" class="btn btn btn-default btn-circle" id="<?php echo $catat['id']; ?>" onclick="open_modal(idedit=<?php echo $catat['id']; ?>);"><span class="glyphicon glyphicon-pencil"></span></button>
                                         <button type="button" class="btn btn btn-default btn-circle " id="<?php echo $catat['id']; ?>" onclick="open_del(iddel=<?php echo $catat['id']; ?>);"> <span class="glyphicon glyphicon-remove"></span></button>

                                    </td>
                        </tr>
                    <?php }?>
                </tfoot>
              </table>
              <script>
			       $('#example1').DataTable();	

  			    $(".open_add").click(function (e){
  					                    //var m = $(this).attr("id");
  					        $.ajax({
  					        url: "pengirim/pengirim_add.php",
  					        type: "GET",
  				            success: function (ajaxData){
  				            	$("#ModalAdd").html(ajaxData);
  				            	$("#ModalAdd").modal('show',{backdrop: 'true'});
  				            }
  				          });
  				  }); 

             function open_del(){
                                $.ajax({
                                    url: "pengirim/pengirim_del.php?id="+iddel,
                                    type: "GET",
                                    success: function (ajaxData){
                                        $("#ModalDelete").html(ajaxData);
                                        $("#ModalDelete").modal('show',{backdrop: 'true'});
                                    }
                                });
            }; 	

            function open_modal(){
                              $.ajax({
                                  url: "pengirim/pengirim_edit.php?id="+idedit,
                                  type: "GET",
                                  success: function (ajaxData){
                                      $("#ModalEdit").html(ajaxData);
                                      $("#ModalEdit").modal('show',{backdrop: 'true'});
                                  }
                              });
            };	    
			</script>