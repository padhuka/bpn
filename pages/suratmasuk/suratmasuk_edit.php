<!-- general form elements disabled -->
<script type="text/javascript">
    $('#disposisi').val();
</script>
   <?php
    include_once '../../lib/config.php';
    include_once '../../lib/fungsi.php';
    $id = $_GET['id'];
    $sqlemp = "SELECT * FROM t_surat_masuk WHERE id='$id'";
    $resemp = mysql_query( $sqlemp );
    $emp = mysql_fetch_array( $resemp );
    $agendapdf=$emp['agenda_pdf'];
    //load nama pengirim
    $sqlkirim = "SELECT * FROM t_disposisi AS A,t_pejabat AS B WHERE A.id_surat='$emp[no_agenda]' AND A.kpd_yth=B.nip";
    $qrykirim = mysql_query($sqlkirim);
    $hslkirim = mysql_fetch_array($qrykirim);

    //
    //load nama dari
    $sqldari = "SELECT * FROM t_pengirim WHERE kode='$emp[dari]'";
    $qrydari = mysql_query($sqldari);
    $hsldari = mysql_fetch_array($qrydari);
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
                    <form class="form-horizontal" enctype="multipart/form-data" id="fupFormedit">

                    <div class="box-body" style="padding: 0px">
                        <table class="table" style="font-size: 12px;padding: 5px;">

                        <tr>
                        <td style="padding: 8px;padding-right: 2px;text-align: left;"> 
                        <div class="form-group" style="margin-bottom:1px">
                          <label for="inputEmail3" class="col-sm-4 control-label">No Agenda</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="noagenda" name="noagenda" value="<?php echo substr($emp['tgl_surat'], 0,4).'.'.$emp['kode'];?>" required readonly>
                          </div>
                        </div>
                      </td>
                       <td style="padding: 8px;padding-right: 2px;text-align: left;">
                      <div class="form-group" style="margin-bottom:1px">
                          <label for="inputEmail3" class="col-sm-4 control-label">No Surat</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="nosurat" name="nosurat" value="<?php echo $emp['no_surat'];?>" required>
                          </div>
                        </div>
                              </td>
                        </tr>

                        <tr>
                        <td style="padding: 8px;padding-right: 2px;text-align: left;"> 
                        <div class="form-group" style="margin-bottom:1px">
                          <label for="inputEmail3" class="col-sm-4 control-label">Asal Surat</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="asalsurat" name="asalsurat"  value="<?php echo $hsldari['nama'];?>" required>
                          </div>
                        </div>
                        </td>
                            <td style="padding: 8px;padding-right: 2px;text-align: left;">
                         <div class="form-group" style="margin-bottom:1px">
                          <label for="inputEmail3" class="col-sm-4 control-label">Tgl surat</label>
                          <div class="col-sm-8">
                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="tglsurat" name="tglsurat" required value="<?php echo $emp['tgl_surat'];?>" >
                          </div>
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
                            <input type="text" class="form-control pull-right" id="tglterima"  name="tglterima" required  value="<?php echo $emp['tgl_diterima'];?>" >
                          </div>
                          </div>
                        </div>
                      </td>
                        <td style="padding: 8px;padding-right: 2px;text-align: left;">
                            <div class="form-group" style="margin-bottom:1px">
                          <label for="inputEmail3" class="col-sm-4 control-label">File Lama</label>
                          <div class="col-sm-8">
                            <label><?php echo $emp['file'];?></label>
                          </div>
                        </div>
                        
                      </td>
                    </tr>

                      <tr>
                        <td style="padding: 8px;padding-right: 2px;text-align: left;"> 
                        <div class="form-group" style="margin-bottom:1px">
                          <label for="inputEmail3" class="col-sm-4 control-label">Perihal</label>
                          <div class="col-sm-8">
                            <textarea class="form-control" rows="3" id="perihal" name="perihal" required> <?php echo $emp['isi_ringkas'];?> </textarea>
                          </div>
                        </div>
                      </td>
                       <td style="padding: 8px;padding-right: 2px;text-align: left;">
                          <div class="form-group" style="margin-bottom:1px">
                          <label for="inputEmail3" class="col-sm-4 control-label">File Scan</label>
                          <div class="col-sm-8">
                            <input type="file" class="form-control" id="filescan" name="filescan">
                          </div>
                        </div>
                        <div class="form-group" style="margin-bottom:1px">
                          <label for="inputEmail3" class="col-sm-4 control-label">Dibales</label>
                          <div class="col-sm-8">
                              <select id="dibales" name="dibales">
                                <?php if ($emp['dibales']=='0'){?>
                                <option value="0">Tidak</option>
                                <option value="1">Ya</option>
                                <?php } ?>
                                <?php if ($emp['dibales']=='1'){?>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                                <?php } ?>
                              </select>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td style="padding: 8px;padding-right: 2px;text-align: left;"> 
                          <?php
                              $sqldisp = "SELECT * FROM t_disposisi WHERE id_surat='$emp[no_agenda]'";
                                            $qrydisp = mysql_query($sqldisp);
                                            $hsldisp = mysql_fetch_array($qrydisp);
                        ?>

                         <div class="form-group" style="margin-bottom:1px">
                          <label for="inputEmail3" class="col-sm-4 control-label">Isi Disposisi</label>
                          <div class="col-sm-8">
                            <textarea class="form-control" rows="3" id="isi" name="isi" required>
                              <?php echo $hsldisp['isi_disposisi'];?></textarea>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </table>
                    <table class="table" style="font-size: 12px;">
                    <tr>
                      <td style="padding: 8px;padding-right: 2px;text-align: left;"> 
                        <div class="form-group" style="margin-bottom:1px">
                          <label for="inputEmail3" class="col-sm-2 control-label">Disposisi</label>
                          <div class="col-sm-8">
                            <input type='checkbox' name='showhide' onchange="checkAll(this)"> Select All<br/>
                            <?php
                                          $j=1;
                                          $sqlcatat = "SELECT * FROM t_pejabat ORDER BY nip ASC";
                                          $rescatat = mysql_query( $sqlcatat );
                                          while($catat = mysql_fetch_array( $rescatat )){

                                            $pilih="";
                                            $sqlposisi = "SELECT * FROM t_disposisi WHERE id_surat='$emp[no_agenda]' AND kpd_yth='$catat[nip]'";
                                            $qryposisi = mysql_query($sqlposisi);
                                            $posisi = mysql_fetch_array($qryposisi);

                                            if ($posisi){
                                              $pilih="checked";                                             
                                            }else{
                                              $pilih="";
                                            }                                         
                                  ?>
                                  <input type="checkbox" id="cbocusta[]" name="cbocusta[]" class="cbocustx" value="<?php echo $catat['nip'];?>" <?php echo $pilih;?> >&nbsp;<?php echo $catat['nama'];?><br/>
                                  <?php }?>
                          </div>
                        </div>
                      
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-4 control-label"></label>
                          <div class="col-sm-8">
                            <input type="hidden" id="id"  name="id" value="<?php echo $id?>">
                            <input type="hidden" id="agendaold"  name="agendaold" value="<?php echo $emp['no_agenda'];?>">
                            <input type="hidden" id="filescanold"  name="filescanold" value="<?php echo $emp['file'];?>"> 
                            <input type="hidden" id="asalsuratold"  name="asalsuratold" value="<?php echo $emp['dari'];?>">                             
                            <input type="hidden" id="filescanhid"  name="filescanhid">
                            <input type="hidden" id="asalsurathid"  name="asalsurathid">
                            <input type="hidden" id="disposisin"  name="disposisin">
                            <input type="hidden" id="agendapdf"  name="agendapdf" value="<?php echo $agendapdf;?>"> 
                            <button type="submit" class="btn btn-primary save_submit" name="Submit" value="SIMPAN">Simpan</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">&nbsp;Batal&nbsp;</button>
                          </div>
                        </div>
                        </td>
                      </tr>
                    </table>
                      </div>
                    </form>
                  </div>
        </div>
      </div>
</div>
<script type="text/javascript">
function checkAll(e) {
   var checkboxes = document.getElementsByName('cbocusta[]');
 
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
   var checkboxes = document.getElementsByName('cbocusta[]');
 
   for (var i = 0; i < checkboxes.length; i++) {
     var checkid = checkboxes[i].id;
     var split_id = checkid.split("_");
     var rowno = split_id[1];
     if(checkboxes[i].checked){
       document.getElementById("tr_"+rowno).style.display="none";
     } 
   }
 
 }
 $('#tglsurat').datepicker({
        autoclose: true
      });
      $('#tglterima').datepicker({
        autoclose: true
      });

                        $("#asalsurat").autocomplete({
                            source: "suratmasuk/suratmasuk_cari.php",
                            minLength: 1,
                            appendTo: "#fupFormedit"
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

                      $("#fupFormedit").on('submit', function(e){
                          e.preventDefault();
                          var cbocusty = [];

                            $('.cbocustx:checked').each(function(){                                    
                                    cbocusty.push($(this).val());              
                            });
                            
                            var disposisin = cbocusty.toString();
                            $('#disposisin').val(disposisin);   

                          //var x = $("#asalsurat").val();
                          //var asurat = x.split("-");


                          
                          //return(false);
                          //$("#asalsurathid").val(asurat[1]); 
                            //alert(disposisine)                       ;
                                      $.ajax({
                                                  type: 'POST',
                                                  url: 'suratmasuk/suratmasuk_edit_save.php',
                                                  data: new FormData(this),
                                                  contentType: false,
                                                  cache: false,
                                                  processData:false,
                                                  success: function(data){                              
                                                       // alert(disposisin);
                                                        var hsl=data.trim();
                                                        //alert(hsl);
                                                        if (hsl=='y'){
                                                      alert('Nomor Agenda Sudah ada');  
                                                      return false;
                                                      exit();
                                                  }else{
                                                    
                                                      $("#tabele").load('suratmasuk/suratmasuk_load.php');
                                                            alert('Data Berhasil Disimpan');
                                                            $('#ModalEdit').modal('hide');
                                                  }   
                                                      }
                                                });
                      });
          

</script>