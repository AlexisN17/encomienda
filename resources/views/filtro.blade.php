<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

<body>

<form class="" action="{{ URL('excel') }}" method="POST">
  {{ csrf_field() }}

   @if (!empty($destinos))
      <select class="" name="destino">
        @foreach ($destinos as $destino)
           <option name="destino" value="{{$destino->destino_encomienda}}">{{$destino->destino_encomienda}}</option>
        @endforeach
     </select>
  @else
    <input type="text" name="destinatario" value="">
  @endif

 <input type="submit" name="" value="Exportar">
</form>

  </body>
</html>
