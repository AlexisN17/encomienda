<!DOCTYPE html>
<html lang="en">
<head>
  <title>Integral Pack</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/estilo.css">
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> -->

  <script src="js/jquery-3.3.1.min.js"></script>
<!--  <script src="js/vue.js"></script>-->

</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Integral Pack Express</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="{{url('/inicio')}}">Envios</a></li>
      <li><a href="{{url('/entrega')}}">Entrega</a></li>
      <li class="active"><a>Cliente</a></li>
      <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">Cerrar Sesión
      </a>
      <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
      </form></li>
    </ul>
    <img src="../public/css/logos_ip_flecha.jpg" width="200" height="50">
  </div>
</nav>

<div id="contenedorrr">

    <div id="izquierda">
    <H3>Datos remitente</H3><br>
    <H4>{{Form::label('nombre', 'Nombre:')}}</H4>
    {{Form::text('nombre')}}
    <br>
    <br>
    <H4>{{Form::label('apellido', 'Apellido:')}}</H4>
    {{Form::text('apellido')}}
    <br>
    <br>
    <H4>{{Form::label('dni', 'DNI:')}}</H4>
    {{Form::text('dni')}}
    <br>
    <br>
    <H4>{{Form::label('telefono', 'Telefono:')}}</H4>
    {{Form::text('telefono')}}
    <br>
    <br>
    <H4>{{Form::label('direccion', 'Dirección:')}}</H4>
    {{Form::text('direccion')}}
    </div>

</div>
</body>
</html>
