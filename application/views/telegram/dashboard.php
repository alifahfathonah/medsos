    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $title;?></h3>
        </div>
        <div class="box-body">
          <input type="button" value="Tambah Penjualan" class="btn btn-info btn-xs addTelegram" /><br/><br/>
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#all">Channel All</a></li>
            <li><a data-toggle="tab" href="#proses">Channel On Proses</a></li>
            <li><a data-toggle="tab" href="#done">Channel Done</a></li>
            <li><a data-toggle="tab" href="#loop">Channel Looping</a></li>
          </ul>
          <div class="tab-content" style="padding: 20px 0 0 20px;">
            <!-- tab importir start here -->
            <div id="all" class="tab-pane fade in active">
              <span id="loadJual">
                <?php
                  // $data['wheres'] = $where;
                  // $data['idnya'] = "status='1'";
                  // $data['proses'] = 'view_jual';
                  // $this->load->view('inputJual/tableJual',$data);
                ?>              
              </span>          
            </div>
            <div id="proses" class="tab-pane fade in">
              <span id="loadJual">
                <?php
                  // $data['wheres'] = $where;
                  // $data['idnya'] = "status='1'";
                  // $data['proses'] = 'view_jual';
                  // $this->load->view('inputJual/tableJual',$data);
                ?>              
              </span>          
            </div>
            <div id="done" class="tab-pane fade in">
              <span id="loadJual">
                <?php
                  // $data['wheres'] = $where;
                  // $data['idnya'] = "status='1'";
                  // $data['proses'] = 'view_jual';
                  // $this->load->view('inputJual/tableJual',$data);
                ?>              
              </span>          
            </div>
            <div id="loop" class="tab-pane fade in">
              <span id="loadJual">
                <?php
                  // $data['wheres'] = $where;
                  // $data['idnya'] = "status='1'";
                  // $data['proses'] = 'view_jual';
                  // $this->load->view('inputJual/tableJual',$data);
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
                            <input type="text" name="namaChannel" id="namaChannel" class="form-control" /> 
                          </div> 
                          <div class="form-group"> 
                            <label>Channel ID</label>  
                            <select class="form-control" name="channelID" id="channelID" >
                              <option value=""> - Choose Channel ID -</option>
                              <?php foreach($channel as $row) { ?>
                              <option value="<?php echo $row['id_channel'];?>"><?php echo $row['channel_name']." - ".$row['chat_id'];?></option>
                              <?php }?>
                            </select>                        
                          </div>
                          <div class="form-group"> 
                            <label>Period</label><br/>  
                            <input type="radio" name="period" value="1"> One Time
                            <input type="radio" name="period" value="2"> Looping                        
                          </div>
                          <div class="form-group" style="display: none" id="onePeriod">
                            <div class="col-xs-12"> 
                              <label>Send Time :</label>
                            </div>
                            <div class="col-xs-8">
                                <input type="text" name="dateSend" class="dateSend form-control dateTimePicker" value="<?php echo date("m/d/Y");?>">
                            </div>
                            <div class="col-xs-4">
                                <input type="text" name="timeSend" class="timeSend form-control timepicker" value="<?php echo date("h:i A");?>"><br/>
                            </div>                            
                          </div>
                          <div class="form-group" style="display: none" id="loopPeriod">
                            <div class="col-xs-12">
                              <label>Send Time :</label>
                            </div>
                             <div class="col-xs-4">
                                <input type="text" name="dateSend" class="dateSend form-control dateTimePicker" value="<?php echo date("m/d/Y");?>">
                              </div>
                            <div class="col-xs-4">
                                <input type="text" name="timeSend" class="timeSend form-control timepicker" value="<?php echo date("h:i A");?>"><br/>
                            </div>                                 
                              <div class="col-xs-4">
                                  <select class="form-control">
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
                            style="font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px; max-width: 560px;min-width: 560px;max-height: 140px;min-height: 140px;"></textarea>
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

<script>
        //menampilkan modal insert
      $(document).on('click', '.addTelegram', function(){  
        $('.formAddProses').modal('show');  
        $('#insertChannel')[0].reset();
      });  

      $(document).ready(function() {
        $('input:radio[name=period]').change(function() {
            if (this.value == '1') {
              document.getElementById('onePeriod').style.display = 'inline';
              document.getElementById('loopPeriod').style.display = 'none';
            }else if(this.value=="2"){
              document.getElementById('onePeriod').style.display = 'none';
              document.getElementById('loopPeriod').style.display = 'inline';
            }
        });
      });

            $(function () {
              $('.dateTimePicker').datepicker({
                autoclose: true
              });
                
            });

              $('.timepicker').timepicker({
                showInputs: false
              }); 
  // CKEDITOR.replace( 'konten', {
  //   toolbar: 'Bold'
  // } );

</script>