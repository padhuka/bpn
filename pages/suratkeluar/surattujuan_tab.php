			     <?php
        		include_once '../../lib/config.php';
        	?>

      <div id="ModalTujuan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">          
      <div class="col-md-11">
                <div class="modal-content" style="border-radius:10px">
                    <div class="modal-header" style="padding: 8px;border-top-style: 5px">
                        
                        <h4 class="modal-title" id="myModalLabel" style="text-align: center;padding-right: 0px">Data Tujuan</h4>                        
                    </div>

                  <div class="box box-info" style="border-top-color:#dd4b39; margin-bottom: 10px;">
               <div id="tabeleTujuan">
                    
              </div>

			         
        <div id="ModalAddTujuan"></div>
         <div id="ModalEditTujuan"></div>
         <div id="ModalDeleteTujuan"></div>
        <script type="text/javascript">
                  
                  $("#tabeleTujuan").load('suratkeluar/tujuan_load.php');  
            function open_addTujuan(){
                                //var m = $(this).attr("id");
                    $.ajax({
                    url: "suratkeluar/tujuan_add.php",
                    type: "GET",
                      success: function (ajaxData){
                        $("#tabeleTujuan").hide();
                        $("#ModalAddTujuan").show();
                        $("#ModalAddTujuan").html(ajaxData);
                        //$("#ModalAddTujuan").modal('show',{backdrop: 'true'});
                      }
                    });
            };   

            function open_delTujuan(){
                                $.ajax({
                                    url: "suratkeluar/tujuan_del.php?id="+iddel,
                                    type: "GET",
                                    success: function (ajaxData){
                                        $("#tabeleTujuan").hide();
                                        $("#ModalDeleteTujuan").show();
                                        $("#ModalDeleteTujuan").html(ajaxData);
                                    }
                                });
              };   

              function open_modalTujuan(){
                                $.ajax({
                                    url: "suratkeluar/tujuan_edit.php?id="+idedit,
                                    type: "GET",
                                    success: function (ajaxData){
                                        $("#tabeleTujuan").hide();
                                        $("#ModalEditTujuan").show();
                                        $("#ModalEditTujuan").html(ajaxData);
                                    }
                                });
              };         
          
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
