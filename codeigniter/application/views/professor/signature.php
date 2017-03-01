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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/sweetalert2/6.4.2/sweetalert2.css" rel="stylesheet">
    <link href="<?=base_url()?>styles/dist/toolkit.min.css" rel="stylesheet">
    <link href="<?=base_url()?>styles/main.css" rel="stylesheet">
    <link href="<?=base_url()?>styles/dist/bootstrap-datetimepicker.css" rel="stylesheet">
    <link href="<?=base_url()?>styles/dist/bootstrap-datetimepicker-standalone.css" rel="stylesheet">
    <link href="<?=base_url()?>styles/dist/bootstrap-datetimepicker.min.css" rel="stylesheet">

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
                  <a href="<?=base_url()?>index.php/professor/profile">Home</a>
                </li> 
            </ul>

            <ul class="nav navbar-nav navbar-right m-r-0 hidden-xs">
                <li>
                    <a data-toggle="modal" href="<?=base_url()?>index.php/professor/logout">Logout</a>
                </li>
            </ul>

            <ul class="nav navbar-nav hidden-sm hidden-md hidden-lg">
                <li>
                  <a href="<?=base_url()?>index.php/professor/profile">Home</a>
                </li> 
                <li><a data-toggle="modal" href="<?=base_url()?>index.php/professor/logout">Logout</a></li>
            </ul>

          </div>
      </div>
    </nav>


<div class="container">
  
  <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
  </br> </br> 
  <button type="button" class="btn btn-primary pull-right" id="buttonAddSignature">Agregar clase</button>

  <h2>Materias</h2> 
  <div class="table-responsive">       
  <table id="tableSignatures" class="table ">
    <thead>
      <tr>
        <th>NRC</th>
        <th>Nombre</th>
        <th>Clave</th>
        <th>Periodo</th>
        <th>Fecha Inicio</th>
        <th>Fecha Fin</th>
        <th>Hora Inicio</th>
        <th>Hora Fin</th>
        <th>Salón</th>
        <th>Editar</th>
        <th>Eliminar</th>

      </tr>
    </thead>
    <tbody>
    <?php foreach($signatures as $row):{?>
      <tr>
        <td><?php echo $row['nrc'];?></td><!--NRC-->
        <td><?php echo $row['name_signature'];?></td>
        <td><?php echo $row['key_signature'];?></td>
        <td><?php echo $row['period'];?></td>
        <td><?php echo $row['date_init'];?></td>
        <td><?php echo $row['date_end'];?></td>
        <td><?php echo $row['time_init'];?></td>
        <td><?php echo $row['time_end'];?></td>
        <td><?php echo $row['room'];?></td>
        <td>
              <a href="#" class="confirm-edit btn mini btn-default" role="button" >Editar</a>
            </td>
            <td>
              <a href="#" class="confirm-delete btn mini btn-danger" role="button" data-id="<?php echo $row['id_signature_active'];?>">Eliminar</a>
            </td>
      </tr>
      <?php }?>
    <?php endforeach;?>
    </tbody>
  </table>
  </div>


</div>


<div class="modal fade" id="modalSignature" tabindex="-1" role="dialog" aria-labelledby="modalSignature" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Clase </h4>
          </div>

          <div class="modal-body p-a-0 js-modalBody">
              <div class="container-fluid">
                  <form id="formRegisterSignature">
                    <div class="form-group">
                      <label for="idSignature">Materia</label>
                      <select class="form-control" id="idSignature">
                        <option value="1">Metodologia de la Programacion </option>
                        <option value="2">Programacion I</option>
                        <option value="3">Programacion II</option>
                        <option value="4">Estructuras de datos</option>
                        <option value="5">Programacion Distribuida</option>
                        <option value="6">Aplicaciones web</option>
                        <option value="7">Programacion Concurrente y paralela</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="nrcNumber">NRC</label>
                      <input type="text" class="form-control" id="nrcNumber" data-validation="number required" >
                    </div>
                    <div class="form-group">
                      <label for="exampleSelect1">Periodo</label>
                      <select class="form-control" id="periodNumber">
                        <option value="1">Primavera</option>
                        <option value="2">Verano</option>
                        <option value="3">Otoño</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="roomNumber">Salón</label>
                      <input type="text" class="form-control" id="roomNumber" data-validation="number required">
                    </div>
                    <!--DATES-->
                    <div class="form-group row">
                        <div class="col-md-6">
                          <label for="datetimeinit">Fecha Inicio Curso</label>
                          <div class='input-group date' id='datetimeinit'>
                              <input id="datetimeinitvalue" type='text' class="form-control" data-validation="required date" data-validation-format="YYYY/MM/DD"/>
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="datetimeend">Fecha Fin Curso</label>
                          <div class='input-group date' id='datetimeend'>
                              <input id='datetimeendvalue' type='text' class="form-control" data-validation="required date" data-validation-format="YYYY/MM/DD" />
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                          <label for="timeinit">Hora Inicio Clase</label>
                          <div class='input-group date' id='timeinit'>
                              <input id="timeinitvalue" type='text' class="form-control" />
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-time"></span>
                              </span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="timeend">Fecha Fin Clase</label>
                          <div class='input-group date' id='timeend'>
                              <input id="timeendvalue" type='text' class="form-control" />
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-time"></span>
                              </span>
                          </div>
                        </div>
                    </div>
                    <div class="form-group row text-center">
                      <div class="col-md-12">
                         <input type="submit" class="btn btn-primary" value="Registrar materia" name="submit"></input>
                      </div>
                       
                    </div>
                    


                  </form>
              </div>
          </div>
        </div>
      </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/sweetalert2/6.4.2/sweetalert2.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script src="<?=base_url()?>styles/dist/toolkit.js"></script>
<script src="<?=base_url()?>styles/js/moment.js"></script>
<script src="<?=base_url()?>styles/js/moment-with-locales.min.js"></script>
<script src="<?=base_url()?>styles/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">

    $.validate();

    $('#buttonAddSignature').on('click',function(e){

      $('#modalSignature').modal('show');

    });

    //XXX DATES
    $('#datetimeinit').datetimepicker({
      format: 'YYYY/MM/DD'
    });
        
    $('#datetimeend').datetimepicker({
      format: 'YYYY/MM/DD',
      useCurrent: false //Important! See issue #1075
    });

    $("#datetimeinit").on("dp.change", function (e) {
      $('#datetimeend').data("DateTimePicker").minDate(e.date);
    });

    $("#datetimeend").on("dp.change", function (e) {
      $('#datetimeinit').data("DateTimePicker").maxDate(e.date);
    });

    //XXX TIME
    $('#timeinit').datetimepicker({
      format: 'LT'
    });
        
    $('#timeend').datetimepicker({
      format: 'LT',
      useCurrent: false //Important! See issue #1075
    });

    $("#timeinit").on("dp.change", function (e) {
      $('#timeend').data("DateTimePicker").minDate(e.date);
    });

    $("#timeend").on("dp.change", function (e) {
      $('#timeinit').data("DateTimePicker").maxDate(e.date);
    });

    //FORM SUBMISSION
    $('#formRegisterSignature').submit(function(event) {

      
      var formData = {
                        'idSignature': $('#idSignature').val(),
                        'nrc' :  $('#nrcNumber').val(),
                        'numberPeriod' : $('#periodNumber').val(),
                        'roomNumber': $('#roomNumber').val(),
                        'dateinit': $('#datetimeinitvalue').val(),
                        'dateend': $('#datetimeendvalue').val(),
                        'timeinit': $('#timeinitvalue').val(),
                        'timeend': $('#timeendvalue').val() 
                    };

                    console.log(formData);

      $.ajax({
          type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
          url         : 'registersignature', // the url where we want to POST
          data        : formData, // our data object
          dataType    : 'json', // what type of data do we expect back from the server
          encode          : true,
          success: function(data){
            $('#modalSignature').modal('hide');
            $('#formEditAlert').each (function(){
              this.reset();
            });
             swal(
                'Materia registrada correctamente',
                'Has creado una materia correctamente!',
                'success'
                )
              location.reload();
          },
          error: function(xhr, status, errorThrown){
            swal(
                        'Oops...',
                        'Algo salió mal!',
                        'error'
                        )
              }
          })

    
      event.preventDefault();

    });

    $('.confirm-delete').on('click', function(e) {
      e.preventDefault();

      var id = $(this).data('id');

      $.ajax({
          url: "removesignature/"+id,
          success: function(result){
          
            $('[data-id='+id+']').parents('tr').remove();
            swal(
                          'Materia eliminada!',
                          'Eliminaste una materia correctamente!',
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

</script>


</html>
