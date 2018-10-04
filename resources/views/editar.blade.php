<!DOCTYPE html>
<html lang="en">
<head>
  <title>Editar</title>
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
     <li><a href="{{url('/inicio')}}">Envios</a></li>
     <li><a href="{{url('/entrega')}}">Entrega</a></li>
     <li><a href="{{url('/despechados')}}">Despachados</a></li>
     <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">Cerrar Sesión
       </a>


       <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
       {{ csrf_field() }}
       </form></li>
   </ul>
   <img src="{{ asset('css/logos_ip_flecha.jpg')}}" width="200" height="50">
 </div>
</nav>

@if ($errors->any())
   <div class="alert alert-danger">
       <ul>
           @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
           @endforeach
       </ul>
   </div>
@endif


@if (!empty($errores))
   <div class="alert alert-danger">
       <ul>
               <li>{{ 'Hubo un error al intentar guardar los datos',$errores }}</li>
   </div>
@endif


<div id="contenedorrr">




  {{Form::model($encomienda, ['url' => ['encomiendas', $encomienda[0]->id,'actualizar']])}}
   <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

   <div id="izquierda">
   <H3>Datos remitente</H3><br>
   <H4>{{Form::label('nombre', 'Nombre:')}}</H4>
   {{Form::text('nombre', $encomienda[0]->nombre_clienter)}}
   <br>
   <br>
   <H4>{{Form::label('apellido', 'Apellido:')}}</H4>
   {{Form::text('apellido', $encomienda[0]->apellido_clienter)}}
   <br>
   <br>
   <H4>{{Form::label('dni', 'DNI:')}}</H4>
   {{Form::text('dni', $encomienda[0]->dni_clienter)}}
   <br>
   <br>
   <H4>{{Form::label('telefono', 'Telefono:')}}</H4>
   {{Form::text('telefono', $encomienda[0]->telefono_clienter)}}
   <br>
   <br>
   <H4>{{Form::label('direccion', 'Dirección:')}}</H4>
   {{Form::text('direccion', $encomienda[0]->direccion_clienter)}}
   </div>

   <div id="medio">
       <H3>Datos encomienda</H3><br>
   <H4>{{Form::label('peso', 'Peso:')}}</H4>
   {{Form::text('peso', $encomienda[0]->peso_encomienda)}}
   <br>
   <br>
   <H4>{{Form::label('tamaño', 'Tamaño:')}}</H4>
   {{Form::text('tamaño', $encomienda[0]->tamaño_encomienda)}}
   <br>
   <br>
   <H4>{{Form::label('destino', 'Destino:')}}</H4>
   {{Form::text('destino', $encomienda[0]->destino_encomienda)}}
   <br>
   <br>
   <H4>{{Form::label('formapago', 'Forma de pago:')}}</H4>
   <H5>{{ Form::radio('pago', 'Pago en destino', true) }}  {{Form::label('pagodestino', 'Pago en destino')}}</H5>
   <H5>{{ Form::radio('pago', 'Pago realizado' ) }} {{Form::label('pagorealizado', 'Pago realizado')}}</H5>

   <br>
   <H4>{{Form::label('descripcion', 'Descripción:')}}</H4>
   {{Form::textarea('descripcion', $encomienda[0]->descripcion_encomienda, ['rows' => 6, 'cols' => 25, 'style' => 'resize:none'])}}
   </div>


   <div id="derecha">
       <H3>Datos destinatario</H3><br>
   <H4>{{Form::label('nombre2', 'Nombre:')}}</H4>
   {{Form::text('nombre2', $encomienda[0]->nombre_cliente)}}
   <br>
   <br>
   <H4>{{Form::label('apellido2', 'Apellido:')}}</H4>
   {{Form::text('apellido2', $encomienda[0]->apellido_cliente)}}
   <br>
   <br>
   <H4>{{Form::label('dni2', 'DNI:')}}</H4>
   {{Form::text('dni2', $encomienda[0]->dni_cliente)}}
   <br>
   <br>
   <H4>{{Form::label('telefono2', 'Telefono:')}}</H4>
   {{Form::text('telefono2', $encomienda[0]->telefono_cliente)}}
   <br>
   <br>
   <H4>{{Form::label('direccion2', 'Dirección:')}}</H4>
   {{Form::text('direccion2', $encomienda[0]->direccion_cliente)}}
   <br>
   <br>
   <br>
   <br>
   <div class="form-group">
     <button type="submit" name="button" class="btn btn-primary"> Registrar</button>
   </div>
   </div>
</div>
<form>

    <script>
        function stopRKey(evt) {
           var evt = (evt) ? evt : ((event) ? event : null);
           var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
           if ((evt.keyCode == 13) && (node.type=="text")) {return false;}
        }
        document.onkeypress = stopRKey;


    </script>

  </body>
  </html>
