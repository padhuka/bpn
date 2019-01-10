<!-- general form elements disabled -->
   <?php
    include_once '../../lib/config.php';
    include_once '../../lib/fungsi.php';
    # GENERATE KODE
		//$kdtgl = date('Ymd');
		//$kodeawal = 'SKL_';
    	//$tahunnow = date('Y');
		/*$sqljur = "SELECT * FROM t_surat_keluar ORDER BY no_agenda DESC";
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
                        <h4 class="modal-title" id="myModalLabel" style="text-align: center;padding-right: 0px">Tambah Data Surat Keluar</h4>                        
                    </div>

				          <div class="box box-info" style="border-top-color:#dd4b39">
				            <!--<div class="box-header with-border">
				              <h3 class="box-title">Horizontal Form</h3>
				            </div>
				             /.box-header -->
				            <!-- form start -->
				            <form class="form-horizontal" enctype="multipart/form-data" novalidate id="fupForm">
				              <div class="box-body" style="padding: 2px">

				              	<table class="table" style="font-size: 12px;padding: 5px">
				              		<!--
				              	<tr>
				              		<td style="padding: 8px;padding-right: 2px">
				              			<div class="form-group" style="margin-bottom:1px">
				                  <label for="inputEmail3" class="col-sm-3 control-label" style="text-align: left;">No Agenda</label>
				                  <div class="col-sm-2">
				                    <input type="text" class="form-control" id="noagenda" name="noagenda" required value="<?php echo $kodebaru; ?>">
				                  </div>
				                  
				                	</div>
				              		</td>

				              		<td>
				              		</td>

				              		<td>
				              			
				              		</td>
				              	
				              	</tr>-->
				              	<tr>
				              		<td style="padding: 8px;padding-right: 2px">
				              			       <div class="form-group" style="margin-bottom:1px;padding-right: 0px;padding-right: 0px">
				                  <label for="inputEmail3" class="col-sm-3 control-label" style="text-align: left;padding-right: 0px;padding-right: 0px" >Kode Surat</label>
				                
				                  <div class="col-sm-6" style="padding-right: 0px;padding-left: 15px;width: 365px">
				                  
				                    <div class="col-sm-2" style="padding-right: 0px;padding-left: 0px;width: 70px">
				                    <input type="text" class="form-control" id="kodesurat" name="kodesurat" required style="padding-right: 0px;padding-left: 0px">
				                  	</div>

				                  <div class="col-sm-2" style="
									  	  padding-top: 10px;
									    padding-right: 10px;
									    padding-left: 10px;
									    width: 10px;
									">
													                  	-
				                  </div>
				                  
				                  <div class="col-sm-2" style="padding-right: 0px;padding-left: 0px">
				                    <input type="text" class="form-control" id="wilayah" name="wilayah" value="92.02" required style="padding-right: 0px;padding-left: 0px">
				                  </div>
				                    <div class="col-sm-2" style="
									  	  padding-top: 10px;
									    padding-right: 10px;
									    padding-left: 10px;
									    width: 10px;
									">
													                  	/
				                  </div>
				                  <div class="col-sm-2" style="padding-right: 0px;padding-left: 0px;padding-right: 0px;padding-left: 0px;height: 34px;width: 40px;">
				                    <select name="bulan1" id="bulan1" style="height: 34px;
">
				                    	  <option value="I">I</option>
		                                  <option value="II">II</option>
		                                  <option value="III">III</option>
		                                  <option value="IV">IV</option>
		                                  <option value="V">V</option>
		                                  <option value="VI">VI</option>
		                                  <option value="VII">VII</option>
		                                  <option value="VIII">VIII</option>
		                                  <option value="IX">IX</option>
		                                  <option value="X">X</option>
		                                  <option value="XI">XI</option>
		                                  <option value="XII">XII</option>
				                    </select>
				                  </div>
				                    <div class="col-sm-2" style="
									  	  padding-top: 10px;
									    padding-right: 10px;
									    padding-left: 10px;
									    width: 10px;
									">
													                  	/
				                  </div>
				                  <div class="col-sm-2" style="padding-right: 0px;padding-left: 0px;height: 34px;">
				                    <?php $th=date('Y');$bl=date('Y-m-d');$bulan=ambilBulan($bl);?>
                            <select name="tahun" id="tahun" style="
							    height: 34px;
							    border-left-width: 1px;
							">
                                  <option value="<?php echo $th;?>"><?php echo $th;?></option>
                                  <option value="<?php echo $th-1;?>"><?php echo $th-1;?></option>
                                  <?php for ($i=0; $i < 5; $i++) {
                                      $tahun=$i+$th; 
                                      echo "<option value=".$tahun.">".$tahun."</option>";
                                  } ?>
                            </select>
				                  </div>
				                  	<div class="col-sm-3" style="padding-right: 0px;padding-left: 0px">
				                    <input type="hidden" class="form-control" id="agenda" name="agenda" required value="<?php //echo $kodebaru; ?>">
				                  	</div>
				                  </div>
				                </div>
				              		</td>

				              		<td>
				              			
				              		</td>
				              		<td>
				              			
				              		</td>
				              	</tr>
								<tr>
				              		<td style="padding: 8px;padding-right: 2px">
				              			<div class="form-group" style="margin-bottom:1px">
				                  <label for="inputEmail3" class="col-sm-3 control-label" style="text-align: left;">Surat Masuk Dibales</label>
				                  <div class="col-sm-4">
				                    <input type="text" class="form-control" onclick="suratmasuke();" id="suratmasuks" name="suratmasuks" readonly >
				                  </div>
				                  
				                	</div>
				              		</td>

				              		<td>
				              		</td>

				              		<td>
				              			
				              		</td>
				              	
				              	</tr>
				              </table>



				              <table class="table" style="font-size: 12px;">
				                
				                <tr>
				                	<td>
				                		     <div class="form-group" style="margin-bottom:1px">
				                  <label for="inputEmail3" class="col-sm-3 control-label" style="text-align: left">Tgl surat</label>
				                  <div class="col-sm-8">
					                <div class="input-group date">
					                  <div class="input-group-addon">
					                    <i class="fa fa-calendar"></i>
					                  </div>
					                  <input type="text" class="form-control pull-right ganti" id="tglsurat" name="tglsurat" required onchange="tgle();">
					                </div>
				                  </div>
				                </div>
				                	</td>
				                	<td>
				                		
				                	</td>
				                </tr>			

				                   <tr>
				                	<td>
				                		  <div class="form-group" style="margin-bottom:1px">
				                  <label for="inputEmail3" class="col-sm-3 control-label" style="text-align: left;">Tujuan</label>
				                  <div class="col-sm-8">
				                    <input type="text" class="form-control pull-right" id="tujuan" name="tujuan" required onclick="tujuane();" readonly>
				                  </div>
				                </div>
				                	</td>
				                	<td>
				                		
				                	</td>
				                </tr>

				                   <tr>
				                	<td>
				                		   <div class="form-group" style="margin-bottom:1px">
				                  <label for="inputEmail3" class="col-sm-3 control-label" style="text-align: left;
">Perihal</label>
				                  <div class="col-sm-8">
				                    <textarea class="form-control" rows="3" id="perihal" name="perihal" required style="margin: 0px -277.672px 0px 0px; width: 310px; height: 54px;"></textarea>
				                  </div>
				                </div>
				                	</td>
				                	<td>
				                		
				                	</td>
				                </tr>
				                   <tr>
				                	<td>
				                		 
				                <div class="form-group" style="margin-bottom:1px">
				                  <label for="inputEmail3" class="col-sm-3 control-label" style="text-align: left;
  
">File Scan</label>
				                  <div class="col-sm-8">
				                    <input type="file" class="form-control" id="filescan" name="filescan" required>
				                  </div>
				                </div>
				                	</td>
				                	<td>
				                		
				                	</td>
				                </tr>

				                   </tr>
				                   <tr>
				                	<td>
				                							                
				                <div class="form-group" style="margin-bottom:1px">
				                  <label for="inputEmail3" class="col-sm-4 control-label"></label>
				                  <div class="col-sm-8">
				                  	<input type="hidden" id="filescanhid"  name="filescanhid">
				                    <button type="submit" class="btn btn-primary save_submit" name="Submit" value="SIMPAN">Simpan</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">&nbsp;Batal&nbsp;</button>
				                  </div>
				                </div>
				                	</td>
				                	<td>
				                		
				                	</td>
				                </tr>

				         		
				           
				              
				            
							
				            </table>

				              </div>
				            </form>
				          </div>
				</div>
			</div>
</div>
<?php include_once 'suratmasuk_load.php';?>
<?php include_once 'surattujuan_tab.php';?>
<?php //include_once 'surattujuan_load.php';?>

<script type="text/javascript">
	//$("#suratmasuk").hide();
	//$("#surattujuan").hide();
	
	function suratmasuke(){
		//alert('ook');
		//$("#suratmasuk").val('suratmasuk');
		//$("#ModalSuratmasuk").modal('show',{backdrop: 'false'});
		$("#ModalSuratmasuk").modal('show',{backdrop: 'true'});

	}
	function tujuane(){		
		$("#ModalTujuan").modal('show',{backdrop: 'true'});
	}

	function tgle(){
		var x = $("#tglsurat").val();
                          var tgl = x.split("-");
                          //alert(tgl[0]);
                          $("#bulan").val(tgl[1]);
                          $("#tahun").val(tgl[0]);
	}
	$(document).ready(function (){
						//Date picker
	    $('#tglsurat').datepicker({	      
	      format: 'yyyy-mm-dd',
	      autoclose: true,
	    });
	    				$("#kodesurat").autocomplete({
                            source: "suratkeluar/suratkeluar_cari.php",
                            minLength: 1,
                            appendTo: "#fupForm"
                        }); 
                        $("#tujuan").autocomplete({
                            source: "suratkeluar/suratkeluar_tujuan.php",
                            minLength: 1,
                            appendTo: "#fupForm"
                        });
                   

	    			document.getElementById("kodesurat").addEventListener("change", 
                      function () {
                          //var x = document.getElementById("asalsurat").val();
                          var x = $("#kodesurat").val();
                          var asurat = x.split("-");
                          $("#kodesurat").val(asurat[1]);
                      });

	    			/*document.getElementById("wilayah").addEventListener("change", 
                      function () {
                          //var x = document.getElementById("asalsurat").val();
                          var x = $("#wilayah").val();
                          var wil = x.split("-");
                          $("#wilayah").val(wil[1]);
                      });*/

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
                                                  url: 'suratkeluar/suratkeluar_add_save.php',
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
			                                            	
			                                                $("#tabele").load('suratkeluar/suratkeluar_load.php');
                                                            alert('Data Berhasil Disimpan');
                                                            $('#ModalAdd').modal('hide');
			                                            }   
                                                      }
                                                });
                      });
    });

</script>