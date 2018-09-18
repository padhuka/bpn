<?php
    include_once '../../lib/config.php';
    //include_once '../../lib/fungsi.php';
    $id = $_GET['id'];
    $sqlemp = "SELECT * FROM m_tujuan WHERE id='$id'";
    $resemp = mysql_query( $sqlemp );
    $emp = mysql_fetch_array( $resemp );
?>

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" onclick="$('#ModalDeleteTujuan').hide();$('#tabeleTujuan').show();"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Data Tujuan</h4>                        
                    </div>
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-lg-6">
                                    <form>
                                    <div class="alert alert-danger">Apakah anda yakin ingin menghapus data ini ( <?php echo $emp['kode'];?>) ?</div>  
                                        
                                        <div class="form-group">                
                                            <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
                                            <input type="hidden" id="kode" name="kode" value="<?php echo $emp['kode'];?>">
                                            <button type="button" class="btn btn-primary save_submit" name="Submit" value="SIMPAN">&nbsp;&nbsp;&nbsp;Ya&nbsp;&nbsp;&nbsp;</button>
                                            <button type="button" class="btn btn-primary" onclick="$('#ModalDeleteTujuan').hide();$('#tabeleTujuan').show();">&nbsp;Batal&nbsp;</button>
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
                  $(document).ready(function (){
                        $(".save_submit").click(function (e){
                            var id = $('#id').val();
                           $.ajax({
                                url: 'tujuan/tujuan_del_save.php?id='+id,
                                type: 'GET',
                                success: function (response){
                                      alert('Data Berhasil Dihapus');
                                        $('#ModalDeleteTujuan').hide();
                                        $('#tabeleTujuan').show();
                                        $("#tabeleTujuan").load('suratkeluar/tujuan_load.php');
                                }
                            });

                    });
                });
              </script> 