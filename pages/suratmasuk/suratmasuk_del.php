<?php
    include_once '../../lib/config.php';
    //include_once '../../lib/fungsi.php';
    $id = $_GET['id'];
    $sqlemp = "SELECT * FROM t_surat_masuk WHERE id='$id'";
    $resemp = mysql_query( $sqlemp );
    $emp = mysql_fetch_array( $resemp );
?>

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Data Surat Keluar</h4>                        
                    </div>
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-lg-6">
                                    <form>
                                    <div class="alert alert-danger">Apakah anda yakin ingin menghapus data ini ( <?php echo $emp['no_agenda'];?>) ?</div>  
                                        
                                        <div class="form-group">                
                                            <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
                                            <input type="hidden" id="noagenda" name="noagenda" value="<?php echo $emp['no_agenda'];?>">
                                            <button type="button" class="btn btn-primary save_submit" name="Submit" value="SIMPAN">&nbsp;&nbsp;&nbsp;Ya&nbsp;&nbsp;&nbsp;</button>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">&nbsp;Batal&nbsp;</button>
                                        </div>
                                    </form>
                                </div>
                                
                            </div>
                            

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

                <script type="text/javascript">
                   $(".save_submit").click(function (e){
                            var id = $('#id').val();
                            var noagenda = $('#noagenda').val();
                            //alert(noagenda);
                            //return false;
                           $.ajax({
                                url: 'suratmasuk/suratmasuk_del_save.php?id='+id+'&noagenda='+noagenda,
                                type: 'GET',
                                success: function (response){
                                      $("#tabele").load('suratmasuk/suratmasuk_load.php');
                                      alert('Data Berhasil Dihapus');
                                      $('#ModalDelete').modal('hide');
                                }
                            });

                    });
              </script> 