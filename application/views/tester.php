<html>  
      <head>  
           <title>Tutorial Bootstrap modal</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <div class="container" style="width:700px;">  
                <h3 align="center">Coba tampilkan modal</h3>  
                <div class="table-responsive">  
                     <div align="right">  
                          <button type="button" name="add" id="add" class="btn btn-warning modalAdd">Add</button>  
                     </div>  
   
                </div>  
           </div>  
      </body>  
 </html>  
 <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Contoh Modal</h4>  
                </div>  
                <div class="modal-body">  
                        <form method="post" id="insert_form">  
                          <label>Enter Employee Name</label>  
                          <input type="text" name="name" id="name" class="form-control" />  
                          <label>Enter Employee Address</label>  
                          <input type="text" name="username" id="username" class="form-control" />
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />   
                        </form> 
                </div>  
                <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>  
           </div>  
      </div>  
 </div>  
<script>
    $(document).on('click', '.modalAdd', function(){  
      // alert("wkwk");
        $('#dataModal').modal('show');  

      });  
  
      //  $('#insert_form').on("submit", function(event){  
      //      $.ajax({  
      //           url:"insert.php",  
      //           method:"POST",  
      //           data:$('#insert_form').serialize(),  
      //           success:function(data){  
      //                $('#insert_form')[0].reset();  
      //                $('#dataModal').modal('hide');  
      //           }  
      //      });   
      // });
</script>  