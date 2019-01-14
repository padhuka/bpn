			     <?php
        		include_once '../../lib/config.php';
        	?>
      
     
			<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  		  <th>No Agenda</th>
                          <th>Asal Surat</th>
                          <th>Tgl Surat</th>
                          <th>Tgl Terima</th>
                          <th>Perihal</th>
                          <th>Disposisi</th>
                          <th>File</th>
                          <th><button type="button" class="btn btn btn-default btn-circle open_add"><span class="glyphicon glyphicon-plus"></span></button></th>
                </tr>
                </thead>
                <tbody>
                <?php
                                    $j=1;
                                    $sqlcatat = "SELECT * FROM t_surat_masuk ORDER BY id ASC";
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
                                        };

                                        if ($catat['dibales']=='1'){
                                            $stylee="background-color: yellow;";
                                        }else{
                                            $stylee="";
                                        }
                                ?>                               
                        <tr style="<?php echo $stylee;?>">
                          <td><?php echo substr($catat['tgl_surat'],0,4);?>.<?php echo $catat['kode'];?></td>
                          <td><?php echo $pengirim;?></td>
                          <td><?php echo $catat['tgl_surat'];?></td>
                          <td><?php echo $catat['tgl_diterima'];?></td>
                          <td><?php echo $catat['isi_ringkas'];?></td>
                          <td><?php echo $dispos;?></td>
                          <td><span onclick="pdfe('<?php echo substr($catat['file'],0,-
                          4);?>','<?php echo substr($catat['file'],
                          -4);?>');"  onMouseOver="this.style.cursor='pointer'"><?php echo $catat['file'];?></span></td>
                          <td>                                
                                        <button type="button" class="btn btn btn-default btn-circle" id="<?php echo $catat['id']; ?>" onclick="printe(m=<?php echo $catat['no_agenda']; ?>);"><span class="fa fa-print"></span></button>
                                        <button type="button" class="btn btn btn-default btn-circle" id="<?php echo $catat['id']; ?>" onclick="open_modal(idedit=<?php echo $catat['id']; ?>);"><span class="glyphicon glyphicon-pencil"></span></button>
                                         <button type="button" class="btn btn btn-default btn-circle" id="<?php echo $catat['id']; ?>" onclick="open_del(iddel=<?php echo $catat['id']; ?>);"><span class="glyphicon glyphicon-remove"></span></button>

                                    </td>
                        </tr>
                    <?php }?>
                </tfoot>
              </table>
              
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
            $('#example1').DataTable({
                "order": 3,
             });  
        //});

            $(".open_add").click(function (e){
                                //var m = $(this).attr("id");
                    $.ajax({
                    url: "suratmasuk/suratmasuk_add.php",
                    type: "GET",
                      success: function (ajaxData){
                        $("#ModalAdd").html(ajaxData);
                        $("#ModalAdd").modal('show',{backdrop: 'true'});
                      }
                    });
            }); 
                         
            
        
            //$(".open_modal"){
            function open_modal(){
                //alert('keluar');
                //var m = $(this).attr("id");    
                                    $.ajax({
                                        url: "suratmasuk/suratmasuk_edit.php?id="+idedit,
                                        type: "GET",
                                        success: function (ajaxData){
                                          //alert(m);
                                            $("#ModalEdit").html(ajaxData);
                                            $("#ModalEdit").modal('show',{backdrop: 'true'});
                                        }
                                    });
            };

            //$(".open_del").click(function (e){
            function open_del(){
                //alert('keluar');
                //var m = $(this).attr("id");    
                                    $.ajax({
                                        url: "suratmasuk/suratmasuk_del.php?id="+iddel,
                                        type: "GET",
                                        //data : {id: m,},
                                        success: function (ajaxData){
                                          //alert(m);
                                            $("#ModalDelete").html(ajaxData);
                                            $("#ModalDelete").modal('show',{backdrop: 'true'});
                                        }
                                    });
            };

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

         function printe(){
                //var m = $(this).attr("id");  
                //var m = $('#id').val();      
                //alert(m);        
                /*$.ajax({
                    url: "suratmasuk/suratmasuk_print.php?id="+m,
                    type: "GET",
                    success: function (ajaxData){
                    }
                    });*/
                //alert(m);
                //alert(m);
                $.ajax({
                    url: "suratmasuk/suratmasuk_pdf_print.php?id="+m,
                    type: "GET",
                      success: function (ajaxData){
                        $("#ModalPdfPrint").html(ajaxData);
                        $("#ModalPdfPrint").modal('show',{backdrop: 'true'});
                      }
                    });
                };  

            function refresh()    {
              location.reload();
              exit();
            }
      </script>