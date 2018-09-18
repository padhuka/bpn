<!-- general form elements disabled -->
   <?php
    include_once '../../lib/config.php';
    include_once '../../lib/fungsi.php';
    $id = $_GET['id'];
    $sqlemp = "SELECT * FROM t_surat_keputusan WHERE id='$id'";
    $resemp = mysql_query( $sqlemp );
    $emp = mysql_fetch_array( $resemp );
    
  ?>  
    <style>      
            .ui-autocomplete {
                position: absolute;
                z-index: 1000;
                cursor: default;
                padding: 0;
                margin-top: 2px;
                list-style: none;
                background-color: #ffffff;
                border: 1px solid #ccc;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
                -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            }
            .ui-autocomplete > li {
                padding: 3px 10px;
            }
            .ui-autocomplete > li.ui-state-focus {
                background-color: #3399FF;
                color:#ffffff;
            }
            
        </style>
<div class="modal-dialog">
			<div class="col-md-11">
                <div class="modal-content" style="border-radius:10px">
                    <div class="modal-header" style="padding: 8px;border-top-style: 5px">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel" style="text-align: center;padding-right: 0px">Edit Data Surat Keputusan</h4>                   
                    </div>

				  <div class="box box-info" style="border-top-color:#dd4b39">
				            <!--<div class="box-header with-border">
				              <h3 class="box-title">Horizontal Form</h3>
				            </div>
				             /.box-header -->
				            <!-- form start -->
				            <form class="form-horizontal" enctype="multipart/form-data" novalidate id="fupForm">
				              <div class="box-body">
				                <div class="form-group">
				                  <label for="inputEmail3" class="col-sm-4 control-label">No Agenda</label>
				                  <div class="col-sm-8">
				                    <input type="text" class="form-control" id="noagenda" name="noagenda" required value="<?php echo $emp['no_agenda'];?>">
				                  </div>
				                </div>				               
				                <div class="form-group">
				                  <label for="inputEmail3" class="col-sm-4 control-label">Kode Surat</label>
				                  <div class="col-sm-8">
				                    <input type="text" class="form-control" id="nosurat" name="nosurat" required value="<?php echo $emp['kode'];?>">
				                  </div>
				                </div>
				                <div class="form-group">
				                  <label for="inputEmail3" class="col-sm-4 control-label">Tgl surat</label>
				                  <div class="col-sm-8">
					                <div class="input-group date">
					                  <div class="input-group-addon">
					                    <i class="fa fa-calendar"></i>
					                  </div>
					                  <input type="text" class="form-control pull-right" id="tglsurat" name="tglsurat" required value="<?php echo $emp['tgl_surat'];?>">
					                </div>
				                  </div>
				                </div>				               
				                <div class="form-group">
				                  <label for="inputEmail3" class="col-sm-4 control-label">Perihal</label>
				                  <div class="col-sm-8">
				                    <textarea class="form-control" rows="3" id="perihal" name="perihal" required><?php echo $emp['tentang'];?></textarea>
				                  </div>
				                </div>
				                <div class="form-group">
				                  <label for="inputEmail3" class="col-sm-4 control-label">File Lama</label>
				                  <div class="col-sm-8">
				                    <span><?php echo $emp['file'];?></span>
				                  </div>
				                </div>
				                <div class="form-group">
				                  <label for="inputEmail3" class="col-sm-4 control-label">File Scan</label>
				                  <div class="col-sm-8">
				                    <input type="file" class="form-control" id="filescan" name="filescan" required>
				                  </div>
				                </div>
				                <div class="form-group">
				                  <label for="inputEmail3" class="col-sm-4 control-label"></label>
				                  <div class="col-sm-8">
				                  	<input type="hidden" id="id"  name="id" value="<?php echo $id?>">
				                  	<input type="hidden" id="agendaold"  name="agendaold" value="<?php echo $emp['no_agenda'];?>">
				                  	<input type="hidden" id="filescanold"  name="filescanold" value="<?php echo $emp['file'];?>">					                  	
				                  	<input type="hidden" id="filescanhid"  name="filescanhid">
				                    <button type="submit" class="btn btn-primary save_submit" name="Submit" value="SIMPAN">Simpan</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">&nbsp;Batal&nbsp;</button>
				                  </div>
				                </div>

				              </div>
				            </form>
				          </div>
				</div>
			</div>
</div>
<script type="text/javascript">
	$(document).ready(function (){
						//Date picker
	    $('#tglsurat').datepicker({	      
	      format: 'yyyy-mm-dd',
	      autoclose: true,
	    });
                     document.getElementById("filescan").addEventListener("change", 
                      function () {
                           var ph= document.getElementById('filescan').files[0].name;
                          $("#filescanhid").val(ph);
                      });

                      $("#fupForm").on('submit', function(e){
                          e.preventDefault();
                         
                           						$.ajax({
                                                  type: 'POST',
                                                  url: 'suratkeputusan/suratkeputusan_edit_save.php',
                                                  data: new FormData(this),
                                                  contentType: false,
                                                  cache: false,
                                                  processData:false,
                                                  success: function(data){                              
                                                        //alert('lolos');
                                                        var hsl=data.trim();
                                                        //alert(hsl);
                                                        if (hsl=='y'){
			                                                alert('Data Sudah ada');  
			                                                return false;
			                                                exit();
			                                            }else{
			                                            	
			                                                $("#tabele").load('suratkeputusan/suratkeputusan_load.php');
                                                            alert('Data Berhasil Disimpan');
                                                            $('#ModalEdit').modal('hide');
			                                            }   
                                                      }
                                                });
                      });
    });
	
					

</script>