    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $title;?></h3>
        </div>
        <div class="box-body">
          <input type="button" value="Tambah Channel" class="btn btn-info btn-xs addChannel"/><br/><br/>
          <span id="loadTableSetting">
            <?php $this->load->view("telegram/settingTable");?>
          </span>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>

 <div class="modal fade formAddChannel">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Menambahkan Channel & ID Bot</h4>  
                </div>  
                <div class="modal-body">  
                        <form method="post" id="insertChannel">
                          <div class="form-group">  
                            <label>Nama Channel</label>  
                            <input type="text" name="namaChannel" id="namaChannel" class="form-control" />  
                          </div>
                          <div class="form-group">
                            <label>Channel ID</label>  
                            <input type="text" name="channelID" id="channelID" class="form-control" />
                          </div>
                          <div class="form-group">                            
                            <label>API Token Bot</label>  
                            <input type="text" name="apiToken" id="apiToken" class="form-control" />
                            <input type="hidden" name="idChannel" id="idChannel" class="form-control" /> 
                          </div>                         
                            
                        
                </div>  
                <div class="modal-footer">
                        <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-primary" /> 
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>  
                </form> 
           </div>  
      </div>  
 </div>  

  <div class="modal fade" id="delChannel" role="dialog">
      <div class="modal-dialog">

      <!-- Modal content-->
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Delete Channel</h4>
              </div>
              <div class="modal-body">
                  <p>Apakah anda yakin ingin menghapus Channel <strong><span id="showChannel"></span></strong> ?</p>
              </div>
              <div class="modal-footer">
              <form class="deleteChannel" method="POST" autocomplete="off">
                  <input type="hidden" name="idChannel2" id="idChannel2" />  
                  <input type="submit" name="hapusChannel" value="Yes" class="btn btn-success" />
                  <input type="button" name="cancel" value="Cancel" class="btn btn-success" data-dismiss="modal"/>
              </form>
              </div>
          </div>
      </div>
  </div>  

<script>
      //menampilkan modal insert
      $(document).on('click', '.addChannel', function(){  
        $('.formAddChannel').modal('show');  
        $('#insertChannel')[0].reset();
      });  

    //menampikan modal delete beserta isinya
    $(document).on('click', '.deleteChannel', function(){ 
         var idChannel = $(this).attr("id");  
         $.ajax({  
              url:"<?php echo site_url()?>/Telegram/get",  
              method:"POST",  
              data:{idChannel:idChannel},  
              dataType:"json",  
              success:function(data){  
                   document.getElementById("showChannel").innerHTML = data.channel_name;
                   $('#idChannel2').val(idChannel);
                   $('#delChannel').modal('show');  
              }
         });          
      
    });        

    //menampikan modal edit beserta isinya
    $(document).on('click', '.editChannel', function(){ 
         var idChannel = $(this).attr("id");  
         $.ajax({  
              url:"<?php echo site_url()?>/Telegram/get",  
              method:"POST",  
              data:{idChannel:idChannel},  
              dataType:"json",  
              success:function(data){  
                  $('#namaChannel').val(data.channel_name);
                  $('#channelID').val(data.chat_id);
                  $('#apiToken').val(data.api_token);                
                  $('#idChannel').val(idChannel);
                  $('.formAddChannel').modal('show');  
              }
         });          
      
    }); 

    //insert atau update channel
    $(document).ready(function() {
      $('#insertChannel').on("submit", function(event){  
        event.preventDefault();  
          $.ajax({  
              url:"<?php echo site_url()?>/Telegram/add",  
              method:"POST",  
                     data:new FormData(this), //this is formData
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,                   
              success:function(data){
                  $('#loadTableSetting').load('<?php echo site_url('Telegram/loadTable');?>');
                  $('.formAddChannel').modal('hide');
                  alert("Suskes simpan");
              },error:function () {
                  alert("Gagal Menyimpan, segarkan halaman Anda.");
                  // body...
              }  
          });  

      });
    });

    //hapus channel
    $('.deleteChannel').on("submit", function(event){  
      event.preventDefault();  
        $.ajax({  
            url:"<?php echo site_url()?>/Telegram/delete",  
            method:"POST",  
            data:$('.deleteChannel').serialize(),                   
            success:function(data){
                $('#loadTableSetting').load('<?php echo site_url('Telegram/loadTable');?>');
                $('#delChannel').modal('hide');
                alert("Cannel berhasil dihapus.");
            },error:function () {
                alert("Gagal Menghapus, segarkan halaman Anda.");
                // body...
            }  
        });  

    });     

</script>