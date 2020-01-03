    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $title;?></h3>
        </div>
        <div class="box-body">
          <input type="button" value="Tambah Penjualan" class="btn btn-info btn-xs addTelegram" /><br/><br/>
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#nonLoop">Channel Non Looping</a></li>
            <li><a data-toggle="tab" href="#done">Channel Looping Done</a></li>
            <li><a data-toggle="tab" href="#looping">Channel Looping</a></li>
            <li><a data-toggle="tab" href="#stopLooping">Channel Looping Stop</a></li>
          </ul>
          <div class="tab-content" style="padding: 20px 0 0 20px;">
            <!-- tab importir start here -->
            <div id="nonLoop" class="tab-pane fade in active">
              <span id="loadChannelNonLoop">
                <?php
                  $this->load->view('telegram/prosesTableNonLoop');
                ?>              
              </span>          
            </div>
            <div id="done" class="tab-pane fade in">
              <span id="loadChannelNonLoopDone">
                <?php
                  $this->load->view('telegram/prosesTableNonLoopDone');
                ?>              
              </span>          
            </div>
            <div id="looping" class="tab-pane fade in">
              <span id="loadChannelLoop">
                <?php
                  $this->load->view('telegram/prosesTableLoop');
                ?>              
              </span>          
            </div> 
            <div id="stopLooping" class="tab-pane fade in">
              <span id="loadChannelLoopDone">
                <?php
                  $this->load->view('telegram/prosesTableLoopDone');
                ?>              
              </span>          
            </div>                                             
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>

 <div class="modal fade formAddProses">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Menambahkan Proses Telegram</h4>  
                </div>  
                <div class="modal-body">  
                  <form method="post" id="insertChannel">
                    <div class="form-group">  
                      <label>Nama Proses</label>  
                      <input type="text" name="namaChannel" id="namaChannel" class="form-control" required/> 
                    </div> 
                    <div class="form-group"> 
                      <label>Channel ID</label>  
                      <select class="form-control" name="channelID" id="channelID" required>
                        <option value=""> - Choose Channel ID -</option>
                        <?php foreach($channel as $row) { ?>
                        <option value="<?php echo $row['id_channel'];?>"><?php echo $row['channel_name']." - ".$row['chat_id'];?></option>
                        <?php }?>
                      </select>                        
                    </div>
                    <div class="form-group"> 
                      <label>Period</label><br/>  
                      <input type="radio" name="period" value="0" required> One Time
                      <input type="radio" name="period" value="1" required> Looping                        
                    </div>
                    <div class="form-group" style="display: none" id="onePeriod">
                      <div class="col-xs-12"> 
                        <label>Send Time :</label>
                      </div>
                      <div class="col-xs-8">
                          <input type="date" name="dateSend" class="form-control" id="dateSend" value="<?php echo date("m/d/Y");?>">
                      </div>
                      <div class="col-xs-4">
                          <input type="time" name="timeSend" class="form-control" id="timeSend" value="<?php echo date("h:i A");?>"><br/>
                      </div>                            
                    </div>
                    <div class="form-group" style="display: none" id="loopPeriod">
                      <div class="col-xs-12">
                        <label>Send Time :</label>
                      </div>
                       <div class="col-xs-4">
                          <input type="date" name="dateSend1" class="form-control" id="dateSend1" value="<?php echo date("m/d/Y");?>">
                        </div>
                      <div class="col-xs-4">
                          <input type="time" name="timeSend1" class="form-control" id="timeSend1" value="<?php echo date("h:i A");?>"><br/>
                      </div>                                 
                        <div class="col-xs-4">
                            <select class="form-control" name="loopEvery" id="loopEvery">
                              <option value=""> - Choose Time Period - </option>
                              <?php for($i=1;$i<=12;$i++){
                                  $k= 5 * $i;
                              ?>
                              <option value="<?php echo $k;?>">Every <?php echo $k;?> Minute</option>
                              <?php }?>
                            </select><br/>
                        </div>
                    </div>                            
                    <div class="form-group"> 
                      <label>Konten</label>  
                      <textarea class="textarea" placeholder="Place some text here" name="konten" id="konten"
                      style="font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px; max-width: 560px;min-width: 560px;max-height: 140px;min-height: 140px;" required></textarea>
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

  <div class="modal fade" id="delProses" role="dialog">
      <div class="modal-dialog">

      <!-- Modal content-->
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Delete Proses Telegram</h4>
              </div>
              <div class="modal-body">
                  <p>Apakah anda yakin ingin menghapus Poses <strong><span id="showProsses"></span></strong> ?</p>
              </div>
              <div class="modal-footer">
              <form class="deleteProses" method="POST" autocomplete="off">
                  <input type="text" name="idProses" id="idProses" />  
                  <input type="submit" name="hapusChannel" value="Yes" class="btn btn-success" />
                  <input type="button" name="cancel" value="Cancel" class="btn btn-success" data-dismiss="modal"/>
              </form>
              </div>
          </div>
      </div>
  </div>  

<script>
        //menampilkan modal insert
      $(document).on('click', '.addTelegram', function(){  
        $('.formAddProses').modal('show');  
        $('#insertChannel')[0].reset();
        document.getElementById('loopPeriod').style.display = 'none';
        document.getElementById('onePeriod').style.display = 'none';
      });  

      //fungsi untuk pilihan radio button period
      $(document).ready(function() {
        $('input:radio[name=period]').change(function() {
            if (this.value == '0') {
              document.getElementById('onePeriod').style.display = 'inline';
              document.getElementById('loopPeriod').style.display = 'none';
              document.getElementById('dateSend').required = true;
              document.getElementById('timeSend').required = true;
              document.getElementById('dateSend1').required = false;
              document.getElementById('timeSend1').required = false;
              document.getElementById('loopEvery').required = false; 
            }else if(this.value=="1"){
              document.getElementById('onePeriod').style.display = 'none';
              document.getElementById('loopPeriod').style.display = 'inline';
              document.getElementById('dateSend1').required = true;
              document.getElementById('timeSend1').required = true;
              document.getElementById('loopEvery').required = true;
              document.getElementById('dateSend').required = false;
              document.getElementById('timeSend').required = false;              
            }
        });
      });

    //insert atau update channel
    $(document).ready(function() {
      $('#insertChannel').on("submit", function(event){  
        event.preventDefault();  
          $.ajax({  
              url:"<?php echo site_url()?>/Telegram/addProses",  
              method:"POST",  
                     data:new FormData(this), //this is formData
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,                   
              success:function(data){
                  $('#loadChannelNonLoop').load('<?php echo site_url('Telegram/loadTableProsesNonLoop');?>');
                  $('#loadChannelNonLoopDone').load('<?php echo site_url('Telegram/loadTableProsesNonLoopDone');?>');
                  $('#loadChannelLoop').load('<?php echo site_url('Telegram/loadTableProsesLoop');?>');
                  $('#loadChannelLoopDone').load('<?php echo site_url('Telegram/loadTableProsesLoopDone');?>');
                  $('.formAddProses').modal('hide');
                  alert("Suskes simpan");
              },error:function () {
                  alert("Gagal Menyimpan, segarkan halaman Anda.");
                  // body...
              }  
          });  

      });
    });

    //hapus channel
    $('.deleteProses').on("submit", function(event){  
      event.preventDefault();  
        $.ajax({  
            url:"<?php echo site_url()?>/Telegram/deleteProses",  
            method:"POST",  
            data:$('.deleteProses').serialize(),                   
            success:function(data){
                  $('#loadChannelNonLoop').load('<?php echo site_url('Telegram/loadTableProsesNonLoop');?>');
                  $('#loadChannelNonLoopDone').load('<?php echo site_url('Telegram/loadTableProsesNonLoopDone');?>');
                  $('#loadChannelLoop').load('<?php echo site_url('Telegram/loadTableProsesLoop');?>');
                  $('#loadChannelLoopDone').load('<?php echo site_url('Telegram/loadTableProsesLoopDone');?>');
                  $('#delProses').modal('hide');
                alert("Proses Telegram berhasil dihapus.");
            },error:function () {
                alert("Gagal Menghapus, segarkan halaman Anda.");
                // body...
            }  
        });  

    });    

    //menampikan modal delete beserta isinya
    $(document).on('click', '.deleteProsesModal', function(){ 
         var idChannel = $(this).attr("id");  
         $.ajax({  
              url:"<?php echo site_url()?>/Telegram/getProses",  
              method:"POST",  
              data:{idChannel:idChannel},  
              dataType:"json",  
              success:function(data){  
                   document.getElementById("showProsses").innerHTML = data.nama_proses;
                   $('#idProses').val(idChannel);
                   $('#delProses').modal('show');  
              }
         });          
      
    });        

  // CKEDITOR.replace( 'konten', {
  //   toolbar: 'Bold'
  // } );

</script>