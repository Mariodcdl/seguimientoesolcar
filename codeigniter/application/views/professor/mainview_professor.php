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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <style type="text/css">
      
      .list-admin a:hover { 
          background-color: #3097D1;
          color: white;
      }

    </style>
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
                
            </ul>

            <ul class="nav navbar-nav navbar-right m-r-0 hidden-xs">
                <li>
                    <a data-toggle="modal" href="<?=base_url()?>index.php/professor/logout">Logout</a>
                </li>
            </ul>

            <ul class="nav navbar-nav hidden-sm hidden-md hidden-lg">
                <li><a data-toggle="modal" href="<?=base_url()?>index.php/professor/logout">Logout</a></li>
            </ul>

          </div>
      </div>
    </nav>


<div class="container p-t-md">
  <div class="row">
    <div class="col-md-3">
      <div class="panel panel-default panel-profile m-b-md">
        <div class="panel-heading" style="background-image: url(<?=base_url()?>assets/img/iceland.jpg);"></div>
        <div class="panel-body text-center">
          <img
          class="panel-profile-img"
          src="<?=base_url()?>assets/img/avatar-dhg.png">
            
          <h5 class="panel-title">
            <p class="text-inherit"><?php echo $professor->name ?></p>
          </h5>

          <p class="m-b-md">Profesor de la Facultad de Ciencias de la Computación. BUAP</p>

        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-body">
          <h5 class="m-t-0">Información </h5>
          <ul class="list-unstyled list-spaced">
            <li><span class="text-muted icon icon-users m-r"></span>Id: <?php echo $professor->id ?>
            <li><span class="text-muted icon icon-email m-r"></span>Email: <?php echo $professor->email ?>
            <li><span class="text-muted icon icon-home m-r"></span>Cubículo: <?php echo $professor->cubicle ?>
            <li><span class="text-muted icon icon-phone m-r"></span>Extensión:<?php echo $professor->telephone ?>
          </ul>
        </div>
      </div>

      
    </div>

    <div class="col-md-6">

      <div class="list-group list-admin">
        <a href="<?=base_url()?>index.php/professor/signature" class="list-group-item list-group-item-action" >
            <h4>Asignaturas <small>Administra tus materias</small></h4>
        </a>
      </div>

    </div>
    <div class="col-md-3">
      <div class="panel panel-default m-b-md ">
        <div class="panel-body">
          <h5 class="m-t-0">Avisos</h5>
          <ul class="list-group">

            <?php foreach ($announcements as $item):{ ?>
            <div class="list-group-item list-group-item-action flex-column align-items-start">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><?php  echo $item['title']; ;?></h5>
              </div>
              <p class="mb-1"><?php echo $item['description'];?></p>
              <small>Publicado: <?php  echo $item['date']; ;?></small>
            </div>
            <?php } ?>
            <?php endforeach; ?>

          </ul>
        </div>
      </div>

     
    </div>
  </div>
</div>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="<?=base_url()?>styles/dist/toolkit.js"></script>
<script>

</script>


</html>
