    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $title;?></h3>
        </div>
        <div class="box-body">
          <input type="button" value="Tambah Proses" class="btn btn-info btn-xs addTelegram" /><br/><br/>
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#nonLoop">Channel Non Looping</a></li>
            <li><a data-toggle="tab" href="#done">Channel Non Looping Done</a></li>
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
                  <form method="post" id="insertChannel" autocomplete="off">
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
                      <input type="radio" name="period" value="2" required> Kirim Sekarang                        
                    </div>
                    <div class="form-group" style="display: none" id="onePeriod">
                      <div class="col-xs-12"> 
                        <label>Send Time :</label>
                      </div>
                      <div class="col-xs-8">
                          <input type="date" name="dateSend" class="form-control" id="dateSend">
                      </div>
                      <div class="col-xs-4">
                          <input type="time" name="timeSend" class="form-control" id="timeSend"><br/>
                      </div>                            
                    </div>
                    <div class="form-group" style="display: none" id="loopPeriod">
                      <div class="col-xs-12">
                        <label>Send First Time :</label>
                      </div>
                       <div class="col-xs-8">
                          <input type="date" name="dateSend1" class="form-control" id="dateSend1">
                        </div>
                      <div class="col-xs-4">
                          <input type="time" name="timeSend1" class="form-control" id="timeSend1"><br/>
                      </div>   
                      <div class="col-xs-12">
                        <label>Looping Time :</label>
                      </div>                                                   
                        <div class="col-xs-6">
                            <select class="form-control" name="loopEvery" id="loopEvery">
                              <option value=""> - Choose Time Period - </option>
                              <option value="0"> Loop every this time </option>
                              <?php for($i=1;$i<=60;$i++){
                                  $k= 1 * $i;
                              ?>
                              <option value="<?php echo $k;?>">Every <?php echo $k;?></option>
                              <?php }?>
                            </select><br/>
                        </div>
                        <div class="col-xs-6">
                            <select class="form-control" name="looptime" id="looptime">
                              <option value=""> - Choose Time Period - </option>
                              <option value="minutes">Minutes</option>
                              <option value="hours">Hours</option>
                            </select><br/>
                        </div>                        
                    </div>                            
                    <div class="form-group"> 
                      <label>Konten</label><br/> 
                      <input type="radio" name="kontenCat" value="0" required> Text Only
                      <input type="radio" name="kontenCat" value="1" required> With Image
                      <div class="form-group" id="kontenText" style="display: none">
                        <div class="form-group">
                          <label>Isi Konten</label><br/>
                          <span id="emoji">
                              <a href="#" title="&amp;#x1F680; ">&#x1F680;</a>&nbsp;
                              <a href="#" title="&amp;#x1F525; ">&#x1F525;</a>&nbsp;
                              <a href="#" title="&amp;#x1F4AF; ">&#x1F4AF;</a>&nbsp;
                              <a href="#" title="&amp;#x1F3AE; ">&#x1F3AE;</a>&nbsp;
                              <a href="#" title="&amp;#x2705; ">&#x2705;</a>&nbsp;
                              <a href="#" title="&amp;#x274C; ">&#x274C;</a>&nbsp;
                              <a href="#" title="&amp;#x26A0; ">&#x26A0;</a>&nbsp;
                              <a href="#" title="&amp;#x26D4; ">&#x26D4;</a>&nbsp;
                              <a href="#" title="&amp;#x2B06; ">&#x2B06;</a>&nbsp;
                              <a href="#" title="&amp;#x2B07; ">&#x2B07;</a>&nbsp;
                              <a href="#" title="&amp;#x26D4; ">&#x26D4;</a>&nbsp;
                              <a href="#" title="&amp;#x1F4E2; ">&#x1F4E2;</a>&nbsp;
                              <a href="#" title="&amp;#x26AB; ">&#x26AB;</a>&nbsp;
                              <a href="#" title="&amp;#x26A1; ">&#x26A1;</a>&nbsp;
                              <a href="#" title="%5Bgreeting%5D "><strong>Greeting</strong></a>&nbsp;
                          </span><br/><br/>

                          <textarea class="textarea" placeholder="Place some text here" name="konten" id="konten"
                      style="font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px; max-width: 560px;min-width: 560px;max-height: 140px;min-height: 140px;"></textarea>
                        </div>
                      </div>
                      <div class="form-group" id="kontenImage" style="display: none">
                        <div class="form-group">
                          <label>Image Source</label>                         
                          <input type="text" name="imageSend" id="imageSend" class="form-control"/> 
                          <label>Isi Konten</label><br/>
                          <span id="emoticons">
                              <a href="#" title="&amp;#x1F680; ">&#x1F680;</a>&nbsp;
                              <a href="#" title="&amp;#x1F525; "> &#x1F525;</a>&nbsp;
                              <a href="#" title="&amp;#x1F4AF; ">&#x1F4AF;</a>&nbsp;
                              <a href="#" title="&amp;#x1F3AE; ">&#x1F3AE;</a>&nbsp;
                              <a href="#" title="&amp;#x2705; ">&#x2705;</a>&nbsp;
                              <a href="#" title="&amp;#x274C; ">&#x274C;</a>&nbsp;
                              <a href="#" title="&amp;#x26A0; ">&#x26A0;</a>&nbsp;
                              <a href="#" title="&amp;#x26D4; ">&#x26D4;</a>&nbsp;
                              <a href="#" title="&amp;#x2B06; ">&#x2B06;</a>&nbsp;
                              <a href="#" title="&amp;#x2B07; ">&#x2B07;</a>&nbsp;
                              <a href="#" title="&amp;#x26D4; ">&#x26D4;</a>&nbsp;
                              <a href="#" title="&amp;#x1F4E2; ">&#x1F4E2;</a>&nbsp;
                              <a href="#" title="&amp;#x26AB; ">&#x26AB;</a>&nbsp;
                              <a href="#" title="&amp;#x26A1; ">&#x26A1;</a>&nbsp;
                              <a href="#" title="%5Bgreeting%5D "><strong>Greeting</strong></a>&nbsp;
                              <!-- <input type="button" class="button" onclick="changeText()" value="Word View"> -->
                          </span><br/><br/>
                          <textarea class="textarea" placeholder="Place some text here" name="captionImage" id="captionImage"
                      style="font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px; max-width: 560px;min-width: 560px;max-height: 140px;min-height: 140px;"></textarea> 
                        </div>                         
                      </div>
                      <!-- <textarea id="lol"></textarea> -->
                      
                    </div>
                </div>  
                <div class="modal-footer">
                        <input type="hidden" name="idChannel" id="idChannel" class="form-control" />
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
                  <input type="hidden" name="idProses" id="idProses" />  
                  <input type="submit" name="hapusChannel" value="Yes" class="btn btn-danger" />
                  <input type="button" name="cancel" value="Cancel" class="btn btn-primary" data-dismiss="modal"/>
              </form>
              </div>
          </div>
      </div>
  </div>  

    <div class="modal fade" id="contentViewer" role="dialog">
      <div class="modal-dialog">

      <!-- Modal content-->
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Isi Konten</h4>
              </div>
              <div class="modal-body">
                  <p><span id="showKonten" style="white-space: pre-line;"></span></p>
              </div>
              <div class="modal-footer">
                <input type="button" name="cancel" value="Cancel" class="btn btn-success" data-dismiss="modal"/>
              </div>
          </div>
      </div>
  </div>  

    <div class="modal fade" id="enabledDisabled" role="dialog">
      <div class="modal-dialog">

      <!-- Modal content-->
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><span id="titleEnabledDisabled"></span></h4>
              </div>
              <div class="modal-body">
                  <p>Apakah Anda ingin <strong><span id="pilihanAktifasi"></span></strong> proses <strong><span id="viewProses"></span> ?</strong></p>
              </div>
              <div class="modal-footer">
                <form class="confirmProses" method="POST" autocomplete="off">
                  <input type="hidden" name="idDisableEnable" id="idDisableEnable" />
                  <input type="submit" name="changeProses" value="Yes" class="btn btn-success" /> 
                  <input type="button" name="cancel" value="Cancel" class="btn btn-primary" data-dismiss="modal"/>
                </form>
              </div>
          </div>
      </div>
  </div>    

<script>

    function changeText() {
      // body...
      var source = encodeURIComponent(document.getElementById('captionImage').value);
      document.getElementById('captionImage').value = source;
      // alert(source);
    }
      //konvert konten
      // function myFunction() {
      //   var a = document.getElementById("konten").value;
      //   var getKonten = encodeURIComponent(a); 
      //   document.getElementById("lol").value = "fdsfs"+getKonten;

      // }

        //menampilkan modal insert
      $(document).on('click', '.addTelegram', function(){  
        $('.formAddProses').modal('show');  
        $('#insertChannel')[0].reset();
        document.getElementById('loopPeriod').style.display = 'none';
        document.getElementById('onePeriod').style.display = 'none';
        document.getElementById('kontenText').style.display = 'none';
        document.getElementById('kontenImage').style.display = 'none';        
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
            }else if(this.value=="2"){
              document.getElementById('onePeriod').style.display = 'none';
              document.getElementById('loopPeriod').style.display = 'none';              
              document.getElementById('dateSend').required = false;
              document.getElementById('timeSend').required = false;
              document.getElementById('dateSend1').required = false;
              document.getElementById('timeSend1').required = false;
              document.getElementById('loopEvery').required = false; 
            }
        });
      });

      //fungsi untuk pilihan radio button type message
      $(document).ready(function() {
        $('input:radio[name=kontenCat]').change(function() {
            if (this.value == '0') {
              document.getElementById('kontenText').style.display = 'inline';
              document.getElementById('kontenImage').style.display = 'none';
              document.getElementById('konten').required = true;
              document.getElementById('captionImage').required = false;
              document.getElementById('imageSend').required = false;
            }else if(this.value=="1"){
              document.getElementById('kontenText').style.display = 'none';
              document.getElementById('kontenImage').style.display = 'inline';
              document.getElementById('captionImage').required = true;
              document.getElementById('imageSend').required = true;
              document.getElementById('konten').required = false;          
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

    // menampilkan isi konten
    $(document).on('click', '.viewKonten', function(){ 
         var idChannel = $(this).attr("id");  
         $.ajax({  
              url:"<?php echo site_url()?>/Telegram/getProses",  
              method:"POST",  
              data:{idChannel:idChannel},  
              dataType:"json",  
              success:function(data){  
                   document.getElementById("showKonten").innerHTML = data.konten;
                   $('#contentViewer').modal('show');  
              }
         });          
      
    });         

    //form edit proses
    $(document).on('click', '.editChannelModal', function(){ 
         var idChannel = $(this).attr("id");  
         $.ajax({  
              url:"<?php echo site_url()?>/Telegram/getProses",  
              method:"POST",  
              data:{idChannel:idChannel},  
              dataType:"json",  
              success:function(data){  

                if(data.looping=="0"){
                    document.getElementById('onePeriod').style.display = 'inline';
                    document.getElementById('loopPeriod').style.display = 'none';
                    $('#dateSend').val(data.tanggal);
                    $('#timeSend').val(data.jam);
                    $('#dateSend1').val('');
                    $('#timeSend1').val('');
                    $('#loopEvery').val('');
                    $('input[name=period][value=0]').prop('checked',true);
                }else{
                    document.getElementById('loopPeriod').style.display = 'inline';
                    document.getElementById('onePeriod').style.display = 'none';
                    $('#dateSend').val('');
                    $('#timeSend').val('');
                    $('#dateSend1').val(data.tanggal);
                    $('#timeSend1').val(data.jam);
                    $('#loopEvery').val(data.loopevery);
                    $('input[name=period][value=1]').prop('checked',true);
                }

                if(data.type_konten=="0"){
                  document.getElementById('kontenText').style.display = 'inline';
                  document.getElementById('kontenImage').style.display = 'none';                  
                  $('input[name=kontenCat][value=0]').prop('checked',true);
                  document.getElementById('konten').value = data.konten;
                  document.getElementById('captionImage').value = "";
                  document.getElementById('imageSend').value = "";                  
                }else{
                  document.getElementById('kontenText').style.display = 'none';
                  document.getElementById('kontenImage').style.display = 'inline';                  
                  $('input[name=kontenCat][value=1]').prop('checked',true);
                  document.getElementById('konten').value = "";
                  document.getElementById('captionImage').value = data.konten;
                  document.getElementById('imageSend').value = data.image_konten;                   
                }

                $('#namaChannel').val(data.nama_proses);
                $('#channelID').val(data.channel_id);
                $('#konten').val(data.konten);
                $('#idChannel').val(idChannel);
                $('.formAddProses').modal('show');  
              }
         });          
      
    });                

    // menampilkan modal disable enable
    $(document).on('click', '.enabledDisabled', function(){ 
        var idChannel = $(this).attr("id");
         $.ajax({  
              url:"<?php echo site_url()?>/Telegram/getProses",  
              method:"POST",  
              data:{idChannel:idChannel},  
              dataType:"json",  
              success:function(data){  
                  if(data.status=="0"){
                    $('#titleEnabledDisabled').html('Confirmation Disable Proses');
                    $('#pilihanAktifasi').html('Non Aktifkan');
                  }else{
                    $('#titleEnabledDisabled').html('Confirmation Enable Proses');
                    $('#pilihanAktifasi').html('Aktifkan');
                  }
                    $('#idDisableEnable').val(idChannel);
                    $('#viewProses').html(data.nama_proses);                   
                    $('#enabledDisabled').modal('show');  
              }
         });          
             
      
    });    


    //confirm proses
    $('.confirmProses').on("submit", function(event){  
      event.preventDefault();  
        $.ajax({  
            url:"<?php echo site_url()?>/Telegram/confirmProses",  
            method:"POST",  
            data:$('.confirmProses').serialize(),                   
            success:function(data){
                  $('#loadChannelNonLoop').load('<?php echo site_url('Telegram/loadTableProsesNonLoop');?>');
                  $('#loadChannelNonLoopDone').load('<?php echo site_url('Telegram/loadTableProsesNonLoopDone');?>');
                  $('#loadChannelLoop').load('<?php echo site_url('Telegram/loadTableProsesLoop');?>');
                  $('#loadChannelLoopDone').load('<?php echo site_url('Telegram/loadTableProsesLoopDone');?>');
                  $('#enabledDisabled').modal('hide');
                alert("Status Proses berhasil diubah");
            },error:function () {
                alert("Gagal Mengubah Status.");
                // body...
            }  
        });  

    });  
  // CKEDITOR.replace( 'konten', {
  //   //toolbar: 'Bold'
  // } );

$('#emoticons a').click(function() {
    var smiley = $(this).attr('title');
    ins2pos(smiley, 'captionImage');
});

$('#emoji a').click(function() {
    var smiley = $(this).attr('title');
    ins2pos(smiley, 'konten');
});

function ins2pos(str, id) {
   var TextArea = document.getElementById(id);
   var val = TextArea.value;
   var before = val.substring(0, TextArea.selectionStart);
   var after = val.substring(TextArea.selectionEnd, val.length);
   TextArea.value = before + str + after;
}

</script>