<!-- general form elements disabled -->
   <?php
    include_once '../../lib/config.php';
    	$sqljur = "SELECT * FROM t_surat_masuk WHERE tahun='$tahunnow' ORDER BY no_agenda DESC";
   		$resultjur = mysql_query( $sqljur );
	    $jur = mysql_fetch_array( $resultjur );		
		echo $sqljur;
		$kodebaru = $jur['no_agenda']+1;
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
<div class="modal-dialog" style="margin-top: 1px;
">
			<div class="col-md-12">
                <div class="modal-content" style="border-radius:10px">
                   <div class="modal-header" style="padding: 8px;border-top-style: 5px">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel" style="text-align: center;padding-right: 0px;line-height:1">Tambah Data Surat Masuk</h4>                        
                    </div>

				          <div class="box box-info" style="border-top-color:#dd4b39">
				            <!--<div class="box-header with-border">
				              <h3 class="box-title">Horizontal Form</h3>
				            </div>
				             /.box-header -->
				            <!-- form start -->
				             <form class="form-horizontal" enctype="multipart/form-data" novalidate id="fupForm" >
				              <div class="box-body" style="padding: 0px">

				              	<table class="table" style="font-size: 12px;padding: 5px;">
				              	<tr>
				              		<td style="padding: 8px;padding-right: 2px;text-align: left;"> 
				              			<div class="form-group" style="margin-bottom:1px">
				                  			<label for="inputEmail3" class="col-md-4 control-label">No Agenda</label>
				                  			<div class="col-sm-6">
				                    		<input type="text" class="form-control" id="noagenda" name="noagenda" value="<?php echo $kodebaru; ?>" required>
				                  		</div>
				                </div>
				              		</td>

				                    <td style="padding: 8px;padding-right: 2px;text-align: left;">
				                    	<div class="form-group" style="margin-bottom:1px">
					                  	<label for="inputEmail3" class="col-sm-4 control-label">Asal Surat</label>
					                  	<div class="col-sm-6">
					                    <input type="text" class="form-control" id="asalsurat" name="asalsurat" required>
					                  </div>
				                	</div>

				              		</td>
				              	</tr>


				              		<tr>
				              		<td style="padding: 8px;padding-right: 2px;text-align: left;">
				              			<div class="form-group" style="margin-bottom:1px">
				                  <label for="inputEmail3" class="col-sm-4 control-label">Tgl surat</label>
				                  <div class="col-sm-8">
					                <div class="input-group date">
					                  <div class="input-group-addon">
					                    <i class="fa fa-calendar"></i>
					                  </div>
					                  <input type="text" class="form-control pull-right" id="tglsurat" name="tglsurat" required value="<?php echo $harinow;?>">
					                </div>
				                  </div>
				                </div>
				              		</td>


				                    <td style="padding: 8px;padding-right: 2px;text-align: left;">
				                    	 <div class="form-group" style="margin-bottom:1px">
				                  <label for="inputEmail3" class="col-sm-4 control-label">No Surat</label>
				                  <div class="col-sm-6">
				                    <input type="text" class="form-control" id="nosurat" name="nosurat" required>
				                  </div>
				                </div>
				                    	
				              		</td>
				              	</tr>

				              		<tr>
				              		<td style="padding: 8px;padding-right: 2px;text-align: left;">
				              			<div class="form-group" style="margin-bottom:1px">
				                  <label for="inputEmail3" class="col-sm-4 control-label">Tgl Terima</label>
				                  <div class="col-sm-8">
				                    <div class="input-group date">
					                  <div class="input-group-addon">
					                    <i class="fa fa-calendar"></i>
					                  </div>
					                  <input type="text" class="form-control pull-right" id="tglterima"  name="tglterima" required value="<?php echo $harinow;?>">
					                </div>
				                  </div>
				                </div>
				              		</td>
				              		
				                    <td style="padding: 8px;padding-right: 2px;text-align: left;">
				                    	    <div class="form-group" style="margin-bottom:1px">
				                  <label for="inputEmail3" class="col-sm-4 control-label">File Scan</label>
				                  <div class="col-sm-6">
				                    <input type="file" class="form-control" id="filescan" name="filescan" required>
				                  </div>
				                </div>
				                    	
				              		</td>
				              	</tr>

				              		<tr>
				              		<td style="padding: 8px;padding-right: 2px;text-align: left;">
				              			  <div class="form-group" style="margin-bottom:1px">
				                  <label for="inputEmail3" class="col-sm-4 control-label">Perihal</label>
				                  <div class="col-sm-8">
				                    <textarea class="form-control" rows="3" id="perihal" name="perihal" required style="margin: 0px -277.672px 0px 0px; width: 444px; height: 54px;"></textarea>
				                  </div>
				                </div>
				              		</td>
				              		<td>
				              		</td>

				              	</tr>
				              	
				              	<tr>
				              		<td style="padding: 8px;padding-right: 2px;text-align: left;">
				              		  <div class="form-group" style="margin-bottom:1px">
				                  <label for="inputEmail3" class="col-sm-4 control-label">Isi Disposisi</label>
				                  <div class="col-sm-8">
				                    <textarea class="form-control" rows="3" id="isi" name="isi" required style="margin: 0px -277.672px 0px 0px; width: 444px; height: 54px;"></textarea>
				                  </div>
				                </div>
				                </td>
				                <td>
				             </td>
				              	</tr>
				              	</table>

				              	<table class="table" style="font-size: 12px;">
				              	<tr>
				              		<td style="padding: 8px;padding-right: 2px;text-align: left;">
				              					<div class="form-group" style="margin-bottom:1px">
				                  <label for="inputEmail3" class="col-sm-2 control-label">Disposisi</label>
				                  <div class="col-sm-8">
				                  	<input type='checkbox' name='showhide' onchange="checkAll(this)"> Pilih Semua<br/>
				                    <?php
                                          $j=1;
                                          $sqlcatat = "SELECT * FROM t_pejabat ORDER BY id ASC";
                                          $rescatat = mysql_query( $sqlcatat );
                                          while($catat = mysql_fetch_array( $rescatat )){
                                  ?>
                                  <input type="checkbox" id="cbocust[]" name="cbocust[]" class="cbocust" value="<?php echo $catat['nip'];?>" />&nbsp;<?php echo $catat['nama'];?><br/>
                                  <?php }?>
				                  </div>
				                </div>
				              		</td>
				              	</tr>
				              	<tr>
				              		<td>
				              		     <div class="form-group" style="margin-bottom:1px">
				                  <label for="inputEmail3" class="col-sm-4 control-label"></label>
				                  <div class="col-sm-8">
				                  	<input type="hidden" id="filescanhid"  name="filescanhid">
				                  	<input type="hidden" id="asalsurathid"  name="asalsurathid">
				                  	<input type="hidden" id="disposisi"  name="disposisi">
				                    <button type="submit" class="btn btn-primary save_submit" name="Submit" value="SIMPAN">Simpan</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">&nbsp;Batal&nbsp;</button>
				                  </div>
				                </div>
				              	</tr>

				                
				                </td>
		       
				            </table>
				              </div>
				            </form>
				          </div>
				</div>
			</div>
			
</div>
<script type="text/javascript">

	function checkAll(e) {
   var checkboxes = document.getElementsByName('cbocust[]');
 
   if (e.checked) {
     for (var i = 0; i < checkboxes.length; i++) { 
       checkboxes[i].checked = true;
     }
   } else {
     for (var i = 0; i < checkboxes.length; i++) {
       checkboxes[i].checked = false;
     }
   }
 }
 
 // Hide Checked rows
 function hideChecked(){
   var checkboxes = document.getElementsByName('cbocust[]');
 
   for (var i = 0; i < checkboxes.length; i++) {
     var checkid = checkboxes[i].id;
     var split_id = checkid.split("_");
     var rowno = split_id[1];
     if(checkboxes[i].checked){
       document.getElementById("tr_"+rowno).style.display="none";
     } 
   }
 
 }
	$(document).ready(function (){
						//Date picker
	    $('#tglsurat').datepicker({	      
	      format: 'yyyy-mm-dd',
	      autoclose: true,
	    });
	    $('#tglterima').datepicker({	      
	      format: 'yyyy-mm-dd',
	      autoclose: true,
	    });

	    /// Set check or unchecked all checkboxes
 

                        $("#asalsurat").autocomplete({
                            source: "suratmasuk/suratmasuk_cari.php",
                            minLength: 1,
                            appendTo: "#fupForm"
                        });   
                      
                      document.getElementById("asalsurat").addEventListener("change", 
                      function () {
                          //var x = document.getElementById("asalsurat").val();
                          var x = $("#asalsurat").val();
                          var asurat = x.split("-");
                          $("#asalsurathid").val(asurat[1]);
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
                            $('#disposisi').val(''); 
                            $('#disposisi').val(disposisine);    
                            //alert(disposisine);
                            //return false;
                           						$.ajax({
                                                  type: 'POST',
                                                  url: 'suratmasuk/suratmasuk_add_save.php',
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
			                                            	
			                                                $("#tabele").load('suratmasuk/suratmasuk_load.php');
                                                            alert('Data Berhasil Disimpan');
                                                            $('#ModalAdd').modal('hide');
			                                            }   
                                                      }
                                                });
                      });
    });
	
					

</script>