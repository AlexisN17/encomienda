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

                           <input type="text" name="busqueda" id="busqueda" size="30" placeholder="Ingrese código de encomienda..">

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

                              <tbody id="tablabusqueda">
                              <tbody id="tabla">

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
                              </tbody>


                            </table>

                            {{ $encomienda->links() }}

                         </div>

<script>

  $("#busqueda").keydown(function (e) {
    if(e.keyCode == 13) {
      var valor = this.value;
      if (valor.length>0){
        $.ajax({  //asicrono x default
              url:"buscarencomiendadespach", //obligatorio donde se mandan
              data:{valor,"_token":"{{csrf_token()}}"},     //obligatorio
              type:'POST',    //obligatorio por donde se manda
              datatype:'JSON', //obligatorio
              success: function(data){
                $("#tabla").hide(500);
                $("#tablabusqueda").show(500);
                var nuevafila= "<tr><td>" +
                data[0].nombre_clienter + "</td><td>" +
                data[0].apellido_clienter + "</td><td>" +
                data[0].dni_clienter + "</td><td>" +
                data[0].destino_encomienda + "</td><td>" +
                data[0].descripcion_encomienda + "</td><td>" +
                data[0].pago_encomienda + "</td><td>" +
                data[0].nombre_cliente + "</td><td>" +
                data[0].apellido_cliente + "</td><td>" +
                data[0].dni_cliente + "</td><td>" +
                data[0].id + "</td></tr>"

                $("#tablabusqueda").append(nuevafila)
              }, //si sale bien se ejecuta
              error: function(){
                alert("dsadsa")
              } //si hay error se ejecuta

        });
      } else{
         $("#tabla").show(500);
         $("#tablabusqueda").empty();
      }
   }
  });




</script>



</body>
</html>
