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
    <link href="<?=base_url()?>styles/dist/toolkit.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/sweetalert2/6.4.2/sweetalert2.css" rel="stylesheet">
    <link href="<?=base_url()?>styles/main.css" rel="stylesheet">

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
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Avisos <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a data-toggle="modal" href="#msgModal">Crear Aviso</a></li>
                  <li><a href="announcement">Ver avisos</a></li>
                </ul>
              </li>
            </ul>

            <ul class="nav navbar-nav navbar-right m-r-0 hidden-xs">
                <li>
                    <a href="logout">Logout</a>
                </li>
            </ul>

            <ul class="nav navbar-nav hidden-sm hidden-md hidden-lg">
                <li><a href="logout">Logout</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Avisos <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a data-toggle="modal" href="#msgModal">Crear Aviso</a></li>
                    <li><a href="announcement">Ver avisos</a></li>
                  </ul>
                </li>
            </ul>
          </div>
      </div>
    </nav>

    <div class="modal fade" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="msgModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Aviso</h4>
          </div>

          <div class="modal-body p-a-0 js-modalBody">
              <div class="container-fluid">
                  <form class="form-horizontal" role="form" id="formNewAlert">
                       <div class="form-group">
                         <label class="col-sm-2 control-label" for="inputEmail3">Título del aviso</label>
                         <div class="col-sm-10">
                             <input  class="form-control" data-validation="required" name="titleAlert"/>
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
                           <button type="submit" class="btn btn-primary">Nuevo aviso</button>
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
<script>

        $.validate();

        //Submit new alert to database
        $('#formNewAlert').submit(function(event) {


            var formData = {
                        'title'              :  $('input[name=titleAlert]').val(),
                        'body'             :  $('#bodyAlert').val()
                    };

                $.ajax({
                    type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                    url         : 'newalert', // the url where we want to POST
                    data        : formData, // our data object
                    dataType    : 'json', // what type of data do we expect back from the server
                    encode          : true
                })

                .done(function(data) {

                    $('#msgModal').modal('hide');
                    $('#formNewAlert').each (function(){
                      this.reset();
                    });

                    var success = data.success;
                    if(success){
                        swal(
                          'Aviso creado!',
                          'Has creado un aviso correctamente!',
                          'success'
                        )
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
