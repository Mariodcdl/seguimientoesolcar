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
        <td class="nrc"><?php echo $row['nrc'];?></td><!--NRC-->
        <td class="name_signature"><?php echo $row['name_signature'];?></td>
        <td class="key_signature"><?php echo $row['key_signature'];?></td>
        <td class="period"><?php
         $period = $row['period']; switch ($period) {
              case '1':
                echo 'Primavera';
                break;
              case '2':
                echo 'Verano';
                break;
              case '3':
                echo 'Otoño';
                break;
              default:
                # code...
                break;
            }
          ?></td>
        <td class="date_init"><?php echo $row['date_init'];?></td>
        <td class="date_end"><?php echo $row['date_end'];?></td>
        <td class="time_init"><?php echo $row['time_init'];?></td>
        <td class="time_end"><?php echo $row['time_end'];?></td>
        <td class="room"><?php echo $row['room'];?></td>
        <td>
            <a href="#" class="confirm-edit btn mini btn-default" role="button" data-id="<?php echo $row['id_signature_active'];?>">Editar</a>
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

<div class="modal fade" id="modalSignatureEdit" tabindex="-1" role="dialog" aria-labelledby="modalSignatureEdit" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Clase Edición</h4>
          </div>

          <div class="modal-body p-a-0 js-modalBody">
              <div class="container-fluid">
                  <form id="formRegisterSignatureEdit">
                    <div class="form-group">
                      <label for="idSignatureEdit">Materia</label>
                      <select class="form-control" id="idSignatureEdit">
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
                      <label for="nrcNumberEdit">NRC</label>
                      <input type="text" class="form-control" id="nrcNumberEdit" data-validation="number required" >
                    </div>
                    <div class="form-group">
                      <label for="periodNumberEdit">Periodo</label>
                      <select class="form-control" id="periodNumberEdit">
                        <option value="1">Primavera</option>
                        <option value="2">Verano</option>
                        <option value="3">Otoño</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="roomNumberEdit">Salón</label>
                      <input type="text" class="form-control" id="roomNumberEdit" data-validation="number required">
                    </div>
                    <!--DATES-->
                    <div class="form-group row">
                        <div class="col-md-6">
                          <label for="datetimeinitEdit">Fecha Inicio Curso</label>
                          <div class='input-group date' id='datetimeinitEdit'>
                              <input id="datetimeinitvalueEdit" type='text' class="form-control" data-validation="required date" data-validation-format="YYYY/MM/DD"/>
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="datetimeend">Fecha Fin Curso</label>
                          <div class='input-group date' id='datetimeendEdit'>
                              <input id='datetimeendvalueEdit' type='text' class="form-control" data-validation="required date" data-validation-format="YYYY/MM/DD" />
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                          <label for="timeinit">Hora Inicio Clase</label>
                          <div class='input-group date' id='timeinitEdit'>
                              <input id="timeinitvalueEdit" type='text' class="form-control" />
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-time"></span>
                              </span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="timeend">Fecha Fin Clase</label>
                          <div class='input-group date' id='timeendEdit'>
                              <input id="timeendvalueEdit" type='text' class="form-control" />
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
    $('#timeinitEdit').datetimepicker({
      format: 'LT'
    });
        
    $('#timeendEdit').datetimepicker({
      format: 'LT',
      useCurrent: false //Important! See issue #1075
    });

    $("#timeinitEdit").on("dp.change", function (e) {
      $('#timeendEdit').data("DateTimePicker").minDate(e.date);
    });

    $("#timeendEdit").on("dp.change", function (e) {
      $('#timeinitEdit').data("DateTimePicker").maxDate(e.date);
    });

    ///******
     //XXX DATES
    $('#datetimeinitEdit').datetimepicker({
      format: 'YYYY/MM/DD'
    });
        
    $('#datetimeendEdit').datetimepicker({
      format: 'YYYY/MM/DD',
      useCurrent: false //Important! See issue #1075
    });

    $("#datetimeinitEdit").on("dp.change", function (e) {
      $('#datetimeendEdit').data("DateTimePicker").minDate(e.date);
    });

    $("#datetimeendEdit").on("dp.change", function (e) {
      $('#datetimeinitEdit').data("DateTimePicker").maxDate(e.date);
    });

    //XXX TIME
    $('#timeinitEdit').datetimepicker({
      format: 'LT'
    });
        
    $('#timeendEdit').datetimepicker({
      format: 'LT',
      useCurrent: false //Important! See issue #1075
    });

    $("#timeinitEdit").on("dp.change", function (e) {
      $('#timeend').data("DateTimePicker").minDate(e.date);
    });

    $("#timeendEdit").on("dp.change", function (e) {
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


      $.ajax({
          type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
          url         : 'registersignature', // the url where we want to POST
          data        : formData, // our data object
          dataType    : 'json', // what type of data do we expect back from the server
          encode          : true,
          success: function(data){
            $('#modalSignature').modal('hide');
            $('#formRegisterSignature').each (function(){
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

    $('.confirm-edit').on('click',function(e){
        e.preventDefault();

        var idObject = $(this).data('id');
        var row = $(this).closest('tr');    // Find the row
        var nrc = row.find('.nrc').text(); // Find the text
        var name = row.find('.name_signature').text();
        var period = row.find('.period').text();
        var key_signature = row.find('.key_signature').text();
        var date_init = row.find('.date_init').text();
        date_init = date_init.replace(/-/g, '\/');
        var date_end = row.find('.date_end').text();
        date_end = date_end.replace(/-/g, '\/');
        var time_init = row.find('.time_init').text();
        var time_end = row.find('.time_end').text();
        var room = row.find('.room').text();

        var idSignature = 0;
        switch(name){

          case 'Metodologia de la Programacion ':
            idSignature = 1;
            break;

          case 'Programacion I':
            idSignature = 2;
            break;

          case 'Programacion II':
            idSignature = 3;
            break;

          case 'Estructuras de datos':
            idSignature = 4;
            break;

          case 'Programacion Distribuida':
            idSignature = 5;
            break;

          case 'Aplicaciones web':
            idSignature = 6;
            break;   

          case 'Programacion Concurrente y paralela':
            idSignature = 7;
            break;         
          }

        var periodNumber = 0;
        switch(period){
          case 'Primavera':
            periodNumber = 1;
            break;
          case 'Verano':
            periodNumber = 2;
            break;
          case 'Otoño':
            periodNumber = 3;
            break;
        }

        $('#idSignatureEdit').val(idSignature).change();
        $('#periodNumberEdit').val(periodNumber).change();
        $('#nrcNumberEdit').val(nrc);
        $('#roomNumberEdit').val(room);
        $('#datetimeinitvalueEdit').val(date_init);
        $('#datetimeendvalueEdit').val(date_end);
        $('#timeinitvalueEdit').val(time_init);
        $('#timeendvalueEdit').val(time_end);



        $('#modalSignatureEdit').modal('show');

        //Submit new alert to database
        $('#formRegisterSignatureEdit').submit(function(event) {

          var formData = {
                        'id': idObject,
                        'idSignature': $('#idSignatureEdit').val(),
                        'nrc' :  $('#nrcNumberEdit').val(),
                        'numberPeriod' : $('#periodNumberEdit').val(),
                        'roomNumber': $('#roomNumberEdit').val(),
                        'dateinit': $('#datetimeinitvalueEdit').val(),
                        'dateend': $('#datetimeendvalueEdit').val(),
                        'timeinit': $('#timeinitvalueEdit').val(),
                        'timeend': $('#timeendvalueEdit').val() 
                    };

              $.ajax({
                  type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                  url         : 'editsignature', // the url where we want to POST
                  data        : formData, // our data object
                  dataType    : 'json', // what type of data do we expect back from the server
                  encode          : true,
                  success: function(data){
                    $('#modalSignatureEdit').modal('hide');
                    $('#formRegisterSignatureEdit').each (function(){
                      this.reset();
                    });
                     swal(
                        'Materia editada correctamente',
                        'Has editado una materia correctamente!',
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

            event.preventDefault();

    });
    

</script>


</html>
