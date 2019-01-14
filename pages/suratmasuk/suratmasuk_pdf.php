<?php $pdfe = $_GET['id']; ?>


<div class="modal-dialog">
      <div class="col-md-24">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Data Pdf</h4>                        
                    </div>

                  <div class="modal-body">

                        <embed src="../file/<?php echo $pdfe;?>" frameborder="0" width="100%" height="400px">

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
        </div>
      </div>
      
</div>
