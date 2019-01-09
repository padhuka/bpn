<!-- general form elements disabled -->
   <?php
    include_once '../../lib/config.php';
    include_once '../../lib/fungsi.php';
    $id = $_GET['id'];
    $sqlemp = "SELECT * FROM m_tujuan WHERE id='$id'";
    $resemp = mysql_query( $sqlemp );
    $emp = mysql_fetch_array( $resemp );
    
  ?>  
    
<div class="modal-dialog">
			<div class="col-md-8">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" onclick="$('#ModalEditTujuan').hide();$('#tabeleTujuan').show();"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Tambah Data Kode Wilayah</h4>                   
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
				                    <input type="text" class="form-control" id="kode" name="kode" value="<?php echo $emp['kode'];?>" required>
				                  </div>
				                </div>
				                <div class="form-group">
				                  <label for="inputEmail3" class="col-sm-4 control-label">Nama</label>
				                  <div class="col-sm-8">
				                    <input type="text" class="form-control" id="nama" name="nama"  value="<?php echo $emp['nama'];?>" required>
				                  </div>
				                </div>
				                <div class="form-group">
				                  <label for="inputEmail3" class="col-sm-4 control-label">Kantor</label>
				                  <div class="col-sm-8">
				                    <input type="text" class="form-control" id="kantor" name="kantor"  value="<?php echo $emp['kantor'];?>" required>
				                  </div>
				                </div>
				                <div class="form-group">
				                  <label for="inputEmail3" class="col-sm-4 control-label">Alamat</label>
				                  <div class="col-sm-8">
				                    <input type="text" class="form-control" id="alamat" name="alamat"  value="<?php echo $emp['alamat'];?>" required>
				                  </div>
				                </div>
				                <div class="form-group">
				                  <label for="inputEmail3" class="col-sm-4 control-label"></label>
				                  <div class="col-sm-8">
				                  	<input type="hidden" id="id"  name="id" value="<?php echo $id?>">
				                  	<input type="hidden" id="kodehid"  name="kodehid" value="<?php echo $emp['kode'];?>">				                  	
				                     <!--<button type="submit" class="btn btn-primary save_submit" name="Submit" value="SIMPAN">Simpan</button>-->
                                    <button type="button" class="btn btn-primary" onclick="save_submit();" name="Submit" value="SIMPAN">Simpan</button>
                                    <button type="button" class="btn btn-primary" onclick="$('#ModalEditTujuan').hide();$('#tabeleTujuan').show();">&nbsp;Batal&nbsp;</button>
				                  </div>
				                </div>

				              </div>
				            </form>
				          </div>
				</div>
			</div>
</div>
<script type="text/javascript">
	function save_submit(){		
		$.ajax({
            url: "suratkeluar/tujuan_edit_save.php?kode="+ $('#kode').val() +"&nama="+ $('#nama').val() +" &kantor="+ $('#kantor').val() +"&alamat="+ $('#alamat').val()+"&id="+ $('#id').val()+"&kodehid="+ $('#kodehid').val(),
            type: "GET",
            //data : {id: m,},
            success: function(data){ 
                var hsl=data.trim();
                if (hsl=='y'){
                	alert('Data Sudah ada');  
			        return false;
			        exit();
			   	}else{                                            	
                    alert('Data Berhasil Disimpan');
                    $('#ModalEditTujuan').hide();
					$('#tabeleTujuan').show();
					$("#tabeleTujuan").load('suratkeluar/tujuan_load.php');
			    }   
            }
        });
                           						
	}


	
					

</script>