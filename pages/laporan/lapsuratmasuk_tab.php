   
  <!-- Left side column. contains the logo and sidebar -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Surat Masuk
        
        <small><form enctype="multipart/form-data" novalidate id="fupForm">
              <input type="text" id="tgl" name="tgl" required value="<?php echo $harinow;?>"> - <input type="text" id="tgl2" name="tgl2" required value="<?php echo $harinow;?>"> 
              <input type="button" name="cari" id="cari" value="Cari" onclick="findsurat();">
              <span id="ekspor" onclick="ekspor();" style="cursor: pointer;">                                
                               &nbsp;&nbsp;[ Ekspor Laporan Stok ]
                            </span>
          </form></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data Surat Masuk</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!--<div class="box-header">
              <h3 class="box-title"></h3>
            </div>
             /.box-header -->
            <div class="box-body">
              <div id="tabele">
              
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
      
        <script type="text/javascript">

            $(document).ready(function (){
                  $("#tabele").load('laporan/lapsuratmasuk_load.php');  

                  $('#tgl').datepicker({       
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                  });
                  $('#tgl2').datepicker({        
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                  });

                  document.getElementById("cari").addEventListener("click", 
                      function () {
                          var tgl= $('#tgl').val();
                          var tgl2= $('#tgl2').val();
                          $("#tabele").load('laporan/lapsuratmasuk_load.php?tgl='+tgl+'&tgl2='+tgl2);
                          
                            
                      });
             });
    //$('#tablexl').hide();
           function ekspor(){//table_search                
                window.open('data:application/vnd.ms-excel,' + $('#tabele').html());
                e.preventDefault();
            }
        </script>

        