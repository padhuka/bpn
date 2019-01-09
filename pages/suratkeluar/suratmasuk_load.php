			     <?php
        		include_once '../../lib/config.php';
        	?>

      <div id="ModalSuratmasuk" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
      <div class="col-md-11">
                <div class="modal-content" style="border-radius:10px">
                    <div class="modal-header" style="padding: 8px;border-top-style: 5px">
                        
                        <h4 class="modal-title" id="myModalLabel" style="text-align: center;padding-right: 0px">Data Surat Masuk Dibalas</h4>                        
                    </div>

                  <div class="box box-info" style="border-top-color:#dd4b39; margin-bottom: 10px;">

			<table id="example2" class="table table-bordered table-striped" width="40%">
                <thead>
                <tr>
                  		  <th>No Agenda</th>
                          <th>Asal Surat</th>
                          <th>Tgl Surat</th>
                          <th>Tgl Terima</th>
                          <th>Perihal</th>
                          <th>Disposisi</th>
                          <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                                    $j=1;
                                    $sqlcatat = "SELECT * FROM t_surat_masuk WHERE dibales=1 ORDER BY id DESC";
                                    $rescatat = mysql_query( $sqlcatat );
                                    while($catat = mysql_fetch_array( $rescatat )){
                                      //load nama disposisi
                                        $sqlkirim = "SELECT * FROM t_pengirim WHERE kode='$catat[dari]'";
                                          $qrykirim = mysql_query($sqlkirim);
                                          $hslkirim = mysql_fetch_array($qrykirim);
                                          $pengirim= $hslkirim['nama'];
                                      //load nama disposisi
                                        $namae='';
                                        //$namae2='';
                                        $sqldis = "SELECT * FROM t_disposisi AS A,t_pejabat AS B WHERE A.id_surat='$catat[no_agenda]' AND A.kpd_yth=B.nip";
                                        $qrydis = mysql_query($sqldis);
                                        $dispos='';
                                        while($hsldis = mysql_fetch_array($qrydis)){
                                          $namae= $namae.','.$hsldis['nama'];
                                          //$namae2= $namae2.','.$hsldis['nip'];
                                          $dispos=substr($namae,1);
                                          //$kddispos=substr($namae2,1);
                                        }
                                ?>                               
                        <tr style="<?php echo $stylee;?>">
                          <td><?php echo $catat['no_agenda'];?> </td>
                          <td><?php echo $pengirim;?></td>
                          <td><?php echo $catat['tgl_surat'];?></td>
                          <td><?php echo $catat['tgl_diterima'];?></td>
                          <td><?php echo $catat['isi_ringkas'];?></td>
                          <td><?php echo $dispos;?></td>
                          <td><button type="button" class="btn btn btn-default btn-circle pilih" id="<?php echo $catat['no_agenda']; ?>">Pilih</button></td>
                        </tr>
                    <?php }?>
                </tfoot>
              </table>
              </div>
              </div>
              </div>
              </div>
              </div>
              <script>
              /*var tbl = document.getElementById("example1");

                if (tbl != null) {
                            for (var i = 0; i < tbl.rows.length; i++) {
                                for (var j = 0; j < tbl.rows[i].cells.length; j++)
                                    tbl.rows[i].cells[j].onclick = function () { getval(this); };
                            }
                        }        
                        function getval(cel) {
                            //alert(cel.innerHTML);
                            var w = window.open('../file/'+cel.innerHTML);
                        } */
        //$(document).ready(function(){
             $('#example2').DataTable();
        //});


            $(".pilih").click(function (e){
                    var x = $(this).attr("id");
                    //alert(m);
                    $("#suratmasuks").val(x);
                    $("#ModalSuratmasuk").modal('hide');
                    /*$.ajax({
                    url: "suratmasuk/suratmasuk_add.php",
                    type: "GET",
                      success: function (ajaxData){
                        $("#ModalAdd").html(ajaxData);
                        $("#ModalAdd").modal('show',{backdrop: 'true'});
                      }
                    });*/
            }); 
       
      </script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font 
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->
        <!-- jQuery 3 -->
