<!DOCTYPE html>
<html lang="en">
<head>
  <title>Integral Pack</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
 <link rel="stylesheet" type="text/css" href="{{ asset('css/estilo.css')}}">
 <!--   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">-->

 <script src="{{ asset('js/jquery-3.3.1.min.js')}}"></script>
 <!--   <script src="js/vue.js"></script>-->

</head>
<body >


<nav class="navbar navbar-default">
 <div class="container-fluid">
   <div class="navbar-header">
     <a class="navbar-brand" href="#">Integral Pack Express</a>
   </div>
   <ul class="nav navbar-nav">
     <li ><a href="{{url('/inicio')}}">Envios</a></li>
     <li><a href="{{url('/entrega')}}">Entregas</a></li>
     <li><a href="{{url('/despachados')}}">Despachados</a></li>
     <li class="active"><a>Reportes</a></li>
     <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">Cerrar Sesión
       </a>


       <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
       {{ csrf_field() }}
       </form></li>
   </ul>
   <img src="{{ asset('css/logos_ip_flecha.jpg')}}" width="200" height="50">
 </div>
</nav>

<form action="{{ URL('encomiendasexcel') }}" method="POST">
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
<H4>Exportar encomiendas a excel</H4>
<input type="submit" value="Exportar" class="btn btn-default btn-sm">
<br><br>

   <label>Localidad</label><br>
   <select class="" name="localidades">
     <option value="">Seleccione una opción</option>
     @foreach ($localidades as $localidad)
        <option name="localidad" value="{{$localidad->destino_encomienda}}">{{$localidad->destino_encomienda}}</option>
     @endforeach
   </select>
   <br><br>
   <label>Rango de fecha</label><br>
   <label for="">Desde</label>  <input name="fechadesde" type="date"><br><br>
   <label>Hasta</label>  <input name="fechahasta" type="date">


</form>

</body>
</html>
