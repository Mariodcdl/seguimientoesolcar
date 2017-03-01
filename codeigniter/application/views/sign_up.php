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
    <link href="<?=base_url()?>styles/main.css" rel="stylesheet">
    <style>

        #formStudent {
            display: none;
        }

        #formCoordinador{
            display: none;
        }

        body {
            width: 1px;
            min-width: 100%;
            *width: 100%;
        }

    </style>

</head>

<body>


    <div class="container-fluid container-fill-height">
      <div class="container-content-middle">

          <div class="m-x-auto text-center app-login-form">
              <!--Form changin-->
              <div>
                  <label class="radio-inline ">
                      <input type="radio" name="optradio" value="Profesor" checked="checked">Profesor
                  </label>
                  <label class="radio-inline">
                      <input type="radio" name="optradio" value="Alumno">Alumno
                  </label>
                  <label class="radio-inline">
                      <input type="radio" name="optradio" value="Coordinador">Coordinador
                  </label>
               </div>
          </div><br><br><br><br>
<!--FORM PROFESSOR-->
          <form id="formProfessor" method="post" role="form" class="m-x-auto text-center app-login-form" action="/sistema_seguimiento_ing/codeigniter/index.php/register/registerprofessor">

              <div class="form-group row">
                  <label for="nameProfessor" class="col-sm-5 col-md-5  col-form-label col-form-label-lg">Nombre <span class="label_required_input">*</span></label>
                  <div class="col-sm-7 com-md-7">
                      <input name="nameProfessor" class="form-control" data-validation="custom required" data-validation-regexp="^[a-zA-Z\s]*$">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="idProfessor" class="col-sm-5 col-md-5 col-form-label col-form-label-lg">ID <span class="label_required_input">*</span></label>
                  <div class="col-sm-7 com-md-7">
                      <input name="idProfessor" class="form-control" data-validation="number required length" data-validation-length="9-9">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="emailProfessor" class="col-sm-5 col-md-5 col-form-label col-form-label-lg">Email <span class="label_required_input">*</span></label>
                  <div  class="col-sm-7 com-md-7">
                      <input name="emailProfessor" class="form-control" name="email" data-validation="email required">
                  </div>

              </div>

              <div class="form-group row">
                  <label for="cubicleProfessor" class="col-sm-5 col-md-5 col-form-label col-form-label-lg">Cubículo <span class="label_required_input">*</span></label>
                  <div  class="col-sm-7 com-md-7">
                      <input name="cubicleProfessor" class="form-control" data-validation="number required" data-validation-allowing="range[1;30]">
                  </div>

              </div>

              <div class="form-group row">
                  <label for="phoneProfessor" class="col-sm-5 col-md-5 col-form-label col-form-label-lg">Ext. Tel <span class="label_required_input">*</span></label>
                  <div  class="col-sm-7 com-md-7">
                      <input name="phoneProfessor" class="form-control" data-validation="number required length" data-validation-length="4-4">
                  </div>

              </div>

              <div class="form-group row">
                  <label for="passwordProfessor" class="col-sm-5 col-md-5 col-form-label col-form-label-lg">Contraseña <span class="label_required_input">*</span></label>
                  <div  class="col-sm-7 com-md-7">
                      <input name="passwordProfessor" type="password" class="form-control" placeholder="ej.PABC123" data-validation="custom" data-validation-regexp="^[P][a-zA-Z0-9]{6}$">
                  </div>
              </div>


              <div>
                  <input type="submit" class="btn btn-primary" value="Registrate como profesor" name="submit"></button>
              </div>

          </form>

<!--FORM STUDENT-->
          <form id="formStudent" method="post" role="form" class="m-x-auto text-center app-login-form"  action="/sistema_seguimiento_ing/codeigniter/index.php/register/registerstudent">

              <div class="form-group row">
                  <label for="nameStudent" class="col-sm-5 col-md-5 col-form-label col-form-label-lg">Nombre <span class="label_required_input">*</span></label>
                  <div class="col-sm-7 com-md-7">
                      <input name="nameStudent" class="form-control" placeholder="Nombre Completo Ej. Jose Peréz García" data-validation="custom required" data-validation-regexp="^[a-zA-Z\s]*$">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="idStudent" class="col-sm-5 col-md-5 col-form-label col-form-label-lg">Matrícula <span class="label_required_input">*</span></label>
                  <div class="col-sm-7 com-md-7">
                      <input name="idStudent" class="form-control" placeholder="Matrícula" data-validation="number required length" data-validation-length="9-9">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="emailStudent" class="col-sm-5 col-md-5 col-form-label col-form-label-lg">Email <span class="label_required_input">*</span></label>
                  <div class="col-sm-7 com-md-7">
                      <input name="emailStudent" class="form-control" placeholder="E-mail" name="email" data-validation="email required">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="emailStudent" class="col-sm-5 col-md-5 col-form-label col-form-label-lg">Celular <span class="label_required_input">*</span></label>
                  <div class="col-sm-7 com-md-7">
                      <input name="phoneStudent" class="form-control" placeholder="10 dígitos" data-validation="number required length" data-validation-length="10-10">
                  </div>

              </div>

              <div class="form-group row">
                  <label for="sel1"  class="col-sm-5 col-md-5 col-form-label col-form-label-lg">Programa educativo:</label>
                  <div class="col-sm-7 com-md-7">
                      <select class="form-control" name="programEducStudent">
                          <option value="1">Licenciatura en Ciencias de la Computación</option>
                          <option value="2">Ingeniería en Ciencias de la Computación</option>
                      </select>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="emailStudent" class="col-sm-5 col-md-5 col-form-label col-form-label-lg">Constraseña <span class="label_required_input">*</span></label>
                  <div class="col-sm-7 com-md-7">
                      <input name="passwordStudent" type="password" class="form-control" placeholder="Contraseña ej.A1BC123" data-validation="custom" data-validation-regexp="^[A][a-zA-Z0-9]{6}$">
                  </div>

              </div>

              <div>
                  <input type="submit" class="btn btn-primary" value="Registrate como alumno" name="submit"></input>
              </div>

          </form>

          <!---FORM COORDINADOR-->

          <form id="formCoordinador" method="post" role="form" class="m-x-auto text-center app-login-form"  action="/sistema_seguimiento_ing/codeigniter/index.php/register/registerCoordinator">

              <div class="form-group row">
                  <label for="emailStudent" class="col-sm-5 col-md-5 col-form-label col-form-label-lg">ID <span class="label_required_input">*</span></label>
                  <div class="col-sm-7 com-md-7">
                      <input name="idCoordinator" class="form-control" placeholder="ID de Profesor" data-validation="number required length" data-validation-length="9-9">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="passwordCoordinator" class="col-sm-5 col-md-5 col-form-label col-form-label-lg">Contraseña<span class="label_required_input">*</span></label>
                  <div class="col-sm-7 com-md-7">
                    <input name="passwordCoordinator" type="password" class="form-control" placeholder="Contraseña C Mes de Nac. 3 caracteres" data-validation="custom" data-validation-regexp="^[C](1[0-2]|[1-9])[a-zA-Z0-9]{3}$">
                  </div>
              </div>

              <div>
                  <input type="submit" class="btn btn-primary" value="Registrate como coordinador" name="submit"></input>
              </div>

          </form>


          <br>
          <div class="m-x-auto text-center"><span class="label_required_input">*</span> Campos requeridos</div>

      </div>

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script>
        $.validate();

        $('input[type=radio][name=optradio]').change(function() {
            if (this.value == 'Profesor') {
                $("#formStudent").css("display", "none");
                $("#formCoordinador").css("display", "none");
                $("#formProfessor").css("display", "block");
            } else if (this.value == 'Alumno') {
                $("#formStudent").css("display", "block");
                $("#formProfessor").css("display", "none");
                $("#formCoordinador").css("display", "none");
            } else if (this.value == 'Coordinador'){
                $("#formStudent").css("display", "none");
                $("#formCoordinador").css("display", "block");
                $("#formProfessor").css("display", "none");
            }
        });
    </script>

</body>



</html>
