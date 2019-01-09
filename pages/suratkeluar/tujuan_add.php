<div class="modal-dialog">
			<div class="col-md-8">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" onclick="$('#ModalAddTujuan').hide();$('#tabeleTujuan').show();"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Tambah Data Tujuan</h4>                        
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
                          <label for="inputEmail3" class="col-sm-4 control-label">Kantor</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="kantor" name="kantor" required>
                          </div>
                        </div>
                         <div class="form-group">
                          <label for="inputEmail3" class="col-sm-4 control-label">Alamat</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="alamat" name="alamat" required>
                          </div>
                        </div>				                
				                <div class="form-group">
				                  <label for="inputEmail3" class="col-sm-4 control-label"></label>
				                  <div class="col-sm-8">
				                    <!--<button type="submit" class="btn btn-primary save_submit" name="Submit" value="SIMPAN">Simpan</button>-->
                                    <button type="button" class="btn btn-primary" onclick="save_submit();" name="Submit" value="SIMPAN">Simpan</button>
                                    <button type="button" class="btn btn-primary" onclick="$('#ModalAddTujuan').hide();$('#tabeleTujuan').show();">&nbsp;Batal&nbsp;</button>
				                  </div>
				                </div>

				              </div>
				            </form>
				          </div>
				</div>
			</div>
</div>
<script>
	function save_submit(){		
		$.ajax({
            url: "suratkeluar/tujuan_add_save.php?kode="+ $('#kode').val() +"&nama="+ $('#nama').val() +" &kantor="+ $('#kantor').val() +"&alamat="+ $('#alamat').val(),
            type: "GET",
            //data : {id: m,},
            success: function(data){ 
                var hsl=data.trim();
                if (hsl=='y'){
                	alert('Kode Sudah ada');  
			        return false;
			        exit();
			   	}else{                                            	
                    alert('Data Berhasil Disimpan');
                    $('#ModalAddTujuan').hide();
					$('#tabeleTujuan').show();
					$("#tabeleTujuan").load('suratkeluar/tujuan_load.php');
			    }   
            }
        });
                           						
	}
</script>


