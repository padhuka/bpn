<?php //$pdfe = $_GET['id'];
    include_once '../../lib/config.php';
    $id = $_GET['id'];
    $sqlemp = "SELECT * FROM t_surat_masuk WHERE no_agenda='$id'";
    $resemp = mysql_query( $sqlemp );
    $emp = mysql_fetch_array( $resemp );
?>

<div class="modal-dialog">
      <div class="col-md-24">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Data Pdf</h4>                        
                    </div>

                  <div class="modal-body">

                        <embed src="../file/print/SuratMasuk<?php echo trim($id);?>-<?php echo trim($emp['agenda_pdf']);?>.pdf" frameborder="0" width="100%" height="400px" type='application/pdf'>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
        </div>
      </div>
      
</div>
