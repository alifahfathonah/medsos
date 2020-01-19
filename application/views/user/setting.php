    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $title;?></h3>
        </div>
        <div class="box-body">
          <input type="button" value="Tambah User" class="btn btn-info btn-xs addUser"/><br/><br/>
          <span id="loadTableSetting">
            <?php $this->load->view("user/settingTable");?>
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

 <div class="modal fade formAddUser">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Form User</h4>  
                </div>  
                <div class="modal-body">  
                        <form method="post" id="insertUser" autocomplete="off">
                          <div class="form-group">  
                            <label>Nama</label>  
                            <input type="text" name="namaUser" id="namaUser" class="form-control" />  
                          </div>
                          <div class="form-group">
                            <label>Username</label>  
                            <input type="text" name="userName" id="userName" class="form-control" />
                          </div>
                          <div class="form-group">
                            <label>Password</label>  
                            <input type="password" name="password" id="password" class="form-control" />
                          </div>                          
                          <div class="form-group">                            
                            <label>Role</label><br/>  
		                      <input type="radio" name="role" value="0" required> User Only
		                      <input type="radio" name="role" value="1" required> Super Admin
                          </div>                         
                            
                        
                </div>  
                <div class="modal-footer">
                		<input type="hidden" name="idUser" id="idUser">
                        <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-primary" /> 
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>  
                </form> 
           </div>  
      </div>  
 </div>  

  <div class="modal fade" id="delUser" role="dialog">
      <div class="modal-dialog">

      <!-- Modal content-->
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Delete User</h4>
              </div>
              <div class="modal-body">
                  <p>Apakah anda yakin ingin menghapus Channel <strong><span id="showUser"></span></strong> ?</p>
              </div>
              <div class="modal-footer">
              <form class="deleteUser" method="POST" autocomplete="off">
                  <input type="hidden" name="idUser2" id="idUser2" />  
                  <input type="submit" name="hapusChannel" value="Yes" class="btn btn-danger" />
                  <input type="button" name="cancel" value="Cancel" class="btn btn-primary" data-dismiss="modal"/>
              </form>
              </div>
          </div>
      </div>
  </div>  

<script>
      //menampilkan modal insert
      $(document).on('click', '.addUser', function(){  
        $('.formAddUser').modal('show');  
        $('#insertUser')[0].reset();
      });  

    //menampikan modal delete beserta isinya
    $(document).on('click', '.deleteUser', function(){ 
         var idUser = $(this).attr("id");  
         $.ajax({  
              url:"<?php echo site_url()?>/user/get",  
              method:"POST",  
              data:{idUser:idUser},  
              dataType:"json",  
              success:function(data){  
                   document.getElementById("showUser").innerHTML = data.username;
                   $('#idUser2').val(idUser);
                   $('#delUser').modal('show');  
              }
         });          
      
    });        

    //menampikan modal edit beserta isinya
    $(document).on('click', '.editUser', function(){ 
         var idUser = $(this).attr("id");  
         $.ajax({  
              url:"<?php echo site_url()?>/user/get",  
              method:"POST",  
              data:{idUser:idUser},  
              dataType:"json",  
              success:function(data){
              	  $('#insertUser')[0].reset();
                  $('#namaUser').val(data.nama);
                  $('#userName').val(data.username);              
                  $('#idUser').val(idUser);
                  if(data.role=="0"){$('input[name=role][value=0]').prop('checked',true);}
                  else{$('input[name=role][value=1]').prop('checked',true);}
                  $('.formAddUser').modal('show');  
              }
         });          
      
    }); 

    //insert atau update channel
    $(document).ready(function() {
      $('#insertUser').on("submit", function(event){  
        event.preventDefault();  
          $.ajax({  
              url:"<?php echo site_url()?>/user/add",  
              method:"POST",  
                     data:new FormData(this), //this is formData
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,                   
              success:function(data){
                  $('#loadTableSetting').load('<?php echo site_url('user/loadTable');?>');
                  $('.formAddUser').modal('hide');
                  alert("Suskes simpan user");
              },error:function () {
                  alert("Gagal Menyimpan, segarkan halaman Anda.");
                  // body...
              }  
          });  

      });
    });

    //hapus channel
    $('.deleteUser').on("submit", function(event){  
      event.preventDefault();  
        $.ajax({  
            url:"<?php echo site_url()?>/user/delete",  
            method:"POST",  
            data:$('.deleteUser').serialize(),                   
            success:function(data){
                $('#loadTableSetting').load('<?php echo site_url('user/loadTable');?>');
                $('#delUser').modal('hide');
                alert("User berhasil dihapus.");
            },error:function () {
                alert("Gagal Menghapus, segarkan halaman Anda.");
                // body...
            }  
        });  

    });     

</script>