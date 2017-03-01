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

</head>

<body>


    <div class="container-fluid container-fill-height">
      <div class="container-content-middle">

        <form id="formLogin" class="m-x-auto text-center app-login-form" role="form" action="
        <?=base_url()?>/login/init" method="post">

          <div class="form-group row" id="aoc">
            <label for="id" class="col-sm-6 col-md-6 col-form-label-lg">Matrícula o ID <span class="label_required_input">*</span></label>
            <div class="col-sm-6 col-md-6">
                <input name="id" class="form-control" data-validation="number required length" data-validation-length="9-9">
            </div>
          </div>

          <div class="form-group row">
            <label for="password" class="col-sm-6 col-md-6 col-form-label col-form-label">Contraseña <span class="label_required_input">*</span></label>
            <div class="col-sm-6 col-md-6">
                <input name="password" type="password" class="form-control" data-validation="alphanumeric required length" data-validation-length="max7">
            </div>
          </div>

          <div class="m-b-lg">
              <br>
            <input type="submit" value="Ingresa" name="submit" class="btn btn-primary"></input>
            <a href="../register/create" class="btn btn-info" role="button">Regístrate</a>
          </div>

        </form>

        <div class="m-x-auto text-center"><span class="label_required_input">*</span> Campos requeridos</div>
      </div>


    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="<?=base_url()?>styles/dist/toolkit.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script>

        $.validate();

    </script>

</body>



</html>
