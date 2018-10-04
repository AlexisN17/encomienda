<!DOCTYPE html>
<html lang="en">
<head> <title>Integral Pack</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/estilo.css')}}">
  <!--   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> -->

  <script src="{{ asset('js/jquery-3.3.1.min.js')}}"></script>
  <!--   <script src="js/vue.js"></script> -->

</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Integral Pack Express</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="{{url('/inicio')}}">Envios</a></li>
      <li ><a href="{{url('/entrega')}}">Entrega</a></li>
      <li class="active"><a>Despachados</a></li>
      <!-- <li><a href="{{url('/cliente')}}">Cliente</a></li> -->
      <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">Cerrar Sesión
      </a>
      <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
      </form></li>
    </ul>
    <img src="{{ asset('css/logos_ip_flecha.jpg')}}" width="200" height="50">
  </div>
</nav>


                         <div class="panel-body">

                            <table class="table table-bordered">


                                <th>Nombre Remitente</th>
                                <th>Apellido</th>
                                <th>DNI</th>


                                 <!-- <th>Peso</th>
                                 <th>Tamaño</th> -->
                                 <th>Destino</th>
                                 <th>Descripcion</th>
                                 <th>Pago</th>


                                 <th>Nombre Destinatario</th>
                                 <th>Apellido</th>
                                 <th>DNI</th>
                                 <th>Codigo Encomienda</th>
                              </thead>
                              <tbody>

                              @foreach($encomienda as $encomiendas)


                                 <tr class="elementoBuscar">
                                   <td>{{$encomiendas->nombre_clienter}}</td>
                                   <td>{{$encomiendas->apellido_clienter}}</td>
                                   <td>{{$encomiendas->dni_clienter}}</td>

                                    <!-- <td>{{$encomiendas->peso_encomienda}}</td>
                                    <td>{{$encomiendas->tamaño_encomienda}}</td> -->
                                    <td>{{$encomiendas->destino_encomienda}}</td>
                                    <td>{{$encomiendas->descripcion_encomienda}}</td>
                                    <td>{{$encomiendas->pago_encomienda}}</td>

                                    <td>{{$encomiendas->nombre_cliente}}</td>
                                    <td>{{$encomiendas->apellido_cliente}}</td>
                                    <td>{{$encomiendas->dni_cliente}}</td>
                                    <td>{{$encomiendas->id}}</td>


                                 </tr>

                                 @endforeach

                              </tbody>


                            </table>

                            {{ $encomienda->links() }}

                         </div>




</body>
</html>
