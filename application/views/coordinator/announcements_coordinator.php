<!doctype html>
<html>
<head>

  <title>Example Domain</title>
  <meta charset="utf-8" />
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <link href="<?=base_url()?>styles/dist/toolkit.min.css" rel="stylesheet">
  <link href="<?=base_url()?>styles/main.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/sweetalert2/6.4.2/sweetalert2.css" rel="stylesheet">
  
</head>

<body class="with-top-navbar">

<div class="growl" id="app-growl"></div>

    <nav class="navbar navbar-inverse navbar-fixed-top app-navbar">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-main">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">
            <img src="<?=base_url()?>assets/img/brand-white.png" alt="brand">
          </a>
        </div>
        <div class="navbar-collapse collapse" id="navbar-collapse-main">

            <ul class="nav navbar-nav hidden-xs">
                <li>
                  <a href="<?=base_url()?>index.php/coordinator/profile">Home</a>
                </li>
              </li>
            </ul>

            <ul class="nav navbar-nav navbar-right m-r-0 hidden-xs">
                <li>
                    <a href="<?=base_url()?>index.php/coordinator/logout">Logout</a>
                </li>
            </ul>

            <ul class="nav navbar-nav hidden-sm hidden-md hidden-lg">
                <li><a href="<?=base_url()?>index.php/coordinator/profile">Home</a></li>
                <li><a href="<?=base_url()?>index.php/coordinator/logout">Logout</a></li>
                
            </ul>

          </div>
      </div>
    </nav>

<div class="container">
  <h2>Avisos</h2>
  <div class="table-responsive">          
  <table id="tableAnnouncemente" class="table ">
    <thead>
      <tr>
        <th>Título</th>
        <th>Descripción</th>
        <th>Fecha</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        <?php foreach ($announcements as $row): { ?> 
        <tr>
            <td class="title"><?php echo $row['title'];?></td>
            <td class="description"><?php echo $row['description'];?></td>
            <td class="date"><?php echo $row['date'];?></td>
            <td>
              <a href="#" class="confirm-edit btn mini btn-default" role="button" data-id="<?php echo $row['idAnnouncement'];?>">Editar</a>
            </td>
            <td>
              <a href="#" class="confirm-delete btn mini btn-danger" role="button" data-id="<?php echo $row['idAnnouncement'];?>">Eliminar</a>
            </td>
             

        </tr>    
        <?php } ?>
        <?php endforeach; ?>
    </tbody>
  </table>
  </div>
</div>


<div class="modal fade" id="modalAnnouncement" tabindex="-1" role="dialog" aria-labelledby="modalAnnouncement" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Aviso </h4>
          </div>

          <div class="modal-body p-a-0 js-modalBody">
              <div class="container-fluid">
                  <form class="form-horizontal" role="form" id="formEditAlert">
                       <div class="form-group">
                         <label class="col-sm-2 control-label" for="inputEmail3">Título del aviso</label>
                         <div class="col-sm-10">
                             <input  id="title" class="form-control" data-validation="required" name="titleAlert"/>
                         </div>
                       </div>
                       <div class="form-group">
                           <label class="col-sm-2 control-label"  for="comment">Comentario</label>
                           <div class="col-sm-10">
                               <textarea class="form-control"  data-validation="required" rows="5" name="bodyAlert" id="bodyAlert"></textarea>
                           </div>
                       </div>
                       <div class="form-group">
                         <div class="col-sm-offset-2 col-sm-10">
                           <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                         </div>
                       </div>
                     </form>
              </div>


          </div>
        </div>
      </div>
    </div>


</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/sweetalert2/6.4.2/sweetalert2.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script src="<?=base_url()?>styles/dist/toolkit.js"></script>
<script type="text/javascript">


  $('.confirm-delete').on('click', function(e) {
      e.preventDefault();

      var id = $(this).data('id');
      $.ajax({
          url: "removeannouncement/"+id,
          success: function(result){
          
            $('[data-id='+id+']').parents('tr').remove();
            swal(
                          'Aviso eliminado!',
                          'Eliminaste un aviso correctamente!',
                          'success'
                        )
            
          },
          error: function(error){
            swal(
                          'Oops...',
                          'Something went wrong!',
                          'error'
                        )
          }
      });

  });

  $('.confirm-edit').on('click',function(e){

    e.preventDefault();
    var idObject = $(this).data('id');
    var row = $(this).closest('tr');    // Find the row
    var title = row.find('.title').text(); // Find the text
    var description = row.find('.description').text();
    var date = row.find('.date').text();
    
    $('#title').val(title);
    $('#bodyAlert').val(description);
    // Let's test it out
    $('#modalAnnouncement').data('objectAnnouncement', {id: idObject, title: title,description: description, date: date}).modal('show');
    });

    $.validate();

        //Submit new alert to database
        $('#formEditAlert').submit(function(event) {

            var id = $('#modalAnnouncement').data("objectAnnouncement").id;
            var formData = {
                        'title'              :  $('input[name=titleAlert]').val(),
                        'body'             :  $('#bodyAlert').val(),
                        'idAnnouncement' : id
                    };

                $.ajax({
                    type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                    url         : 'editannouncement', // the url where we want to POST
                    data        : formData, // our data object
                    dataType    : 'json', // what type of data do we expect back from the server
                    encode          : true
                })

                .done(function(data) {

                    $('#modalAnnouncement').modal('hide');
                    $('#formEditAlert').each (function(){
                      this.reset();
                    });

                    var success = data.success;
                    if(success){
                        

                        swal(
                          'Aviso editado!',
                          'Has editado un aviso correctamente!',
                          'success'
                        )

                        location.reload();
                        
                    }else{
                        swal(
                          'Oops...',
                          'Algo salió mal!',
                          'error'
                        )
                    }
                });

            // stop the form from submitting the normal way and refreshing the page
            event.preventDefault();


        });


</script>
</html>
