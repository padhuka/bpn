<!-- general form elements disabled -->
   <?php
    include_once '../../lib/config.php';
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
			<div class="col-md-8">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Tambah Data Kode Wilayah</h4>                        
                    </div>

				          <div class="box box-info">
				            <!--<div class="box-header with-border">
				              <h3 class="box-title">Horizontal Form</h3>
				            </div>
				             /.box-header -->
				            <!-- form start -->
				            <form class="form-horizontal" enctype="multipart/form-data" novalidate id="fupForm">
				              <div class="box-body">
				                <div class="form-group">
				                  <label for="inputEmail3" class="col-sm-4 control-label">Kode</label>
				                  <div class="col-sm-8">
				                    <input type="text" class="form-control" id="kode" name="kode" required>
				                  </div>
				                </div>
				                <div class="form-group">
				                  <label for="inputEmail3" class="col-sm-4 control-label">Nama</label>
				                  <div class="col-sm-8">
				                    <input type="text" class="form-control" id="nama" name="nama" required>
				                  </div>
				                </div>				                
				                <div class="form-group">
				                  <label for="inputEmail3" class="col-sm-4 control-label"></label>
				                  <div class="col-sm-8">
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

                      $("#fupForm").on('submit', function(e){
                          e.preventDefault();
                          
                            //alert(disposisine)                       ;
                           						$.ajax({
                                                  type: 'POST',
                                                  url: 'kodewilayah/kodewilayah_add_save.php',
                                                  data: new FormData(this),
                                                  contentType: false,
                                                  cache: false,
                                                  processData:false,
                                                  success: function(data){                              
                                                        //alert('lolos');
                                                        var hsl=data.trim();
                                                        //alert(hsl);
                                                        if (hsl=='y'){
			                                                alert('Kode Sudah ada');  
			                                                return false;
			                                                exit();
			                                            }else{
			                                            	
			                                                $("#tabele").load('kodewilayah/kodewilayah_load.php');
                                                            alert('Data Berhasil Disimpan');
                                                            $('#ModalAdd').modal('hide');
			                                            }   
                                                      }
                                                });
                      });
    });
	
					

</script>