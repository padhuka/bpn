<!-- general form elements disabled -->
   <?php
    include_once '../../lib/config.php';
    	/*$sqljur = "SELECT * FROM t_surat_keputusan ORDER BY no_agenda DESC";
   		$resultjur = mysql_query( $sqljur );
	    $jur = mysql_fetch_array( $resultjur );		
		
		$kodebaru = $jur['no_agenda']+1;*/
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
                        <h4 class="modal-title" id="myModalLabel" style="text-align: center;padding-right: 0px">Tambah Data Surat Keputusan</h4>                        
                    </div>

				          <div class="box box-info" style="border-top-color:#dd4b39">
				            <!--<div class="box-header with-border">
				              <h3 class="box-title">Horizontal Form</h3>
				            </div>
				             /.box-header -->
				            <!-- form start -->
				            <form class="form-horizontal" enctype="multipart/form-data" novalidate id="fupForm">
				              <div class="box-body">
				                <!--<div class="form-group">
				                  <label for="inputEmail3" class="col-sm-4 control-label">No Agenda</label>
				                  <div class="col-sm-8">
				                    <input type="text" class="form-control" id="noagenda" name="noagenda" value="<?php //echo $kodebaru;?>" required>
				                  </div>
				                </div>-->				               
				                <div class="form-group">
				                  <label for="inputEmail3" class="col-sm-4 control-label">Kode Surat</label>
				                  <div class="col-sm-8">
				                    <input type="text" class="form-control" id="kodesurat" name="kodesurat" required>
				                  </div>
				                </div>
				                <div class="form-group">
				                  <label for="inputEmail3" class="col-sm-4 control-label">Tgl surat</label>
				                  <div class="col-sm-8">
					                <div class="input-group date">
					                  <div class="input-group-addon">
					                    <i class="fa fa-calendar"></i>
					                  </div>
					                  <input type="text" class="form-control pull-right" id="tglsurat" name="tglsurat" required>
					                </div>
				                  </div>
				                </div>
				                
				                <div class="form-group">
				                  <label for="inputEmail3" class="col-sm-4 control-label">Perihal</label>
				                  <div class="col-sm-8">
				                    <textarea class="form-control" rows="3" id="perihal" name="perihal" required></textarea>
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
                          var cbocust = [];

                            $('.cbocust:checked').each(function(){
                                    
                                    cbocust.push($(this).val());              
                                    });

                            var disposisine = cbocust.toString();
                            $('#disposisi').val(disposisine);    
                            //alert(disposisine)                       ;
                           						$.ajax({
                                                  type: 'POST',
                                                  url: 'suratkeputusan/suratkeputusan_add_save.php',
                                                  data: new FormData(this),
                                                  contentType: false,
                                                  cache: false,
                                                  processData:false,
                                                  success: function(data){                              
                                                        //alert('lolos');
                                                        var hsl=data.trim();
                                                        //alert(hsl);
                                                        if (hsl=='y'){
			                                                alert('Nomor Agenda Sudah ada');  
			                                                return false;
			                                                exit();
			                                            }else{
			                                            	
			                                                $("#tabele").load('suratkeputusan/suratkeputusan_load.php');
                                                            alert('Data Berhasil Disimpan');
                                                            $('#ModalAdd').modal('hide');
			                                            }   
                                                      }
                                                });
                      });
    });

</script>