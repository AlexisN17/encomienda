<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Editar</title>
  </head>
  <body>

    <H3>Datos encomienda</H3><br>
<H4>{{Form::label('peso', 'Peso:')}}</H4>
{{Form::text('peso')}}
<br>
<br>
<H4>{{Form::label('tamaño', 'Tamaño:')}}</H4>
{{Form::text('tamaño')}}
<br>
<br>
<H4>{{Form::label('destino', 'Destino:')}}</H4>
{{Form::text('destino')}}
<br>
<br>
<H4>{{Form::label('formapago', 'Forma de pago:')}}</H4>
<H5>{{ Form::radio('pago', 'Pago en destino', true) }}  {{Form::label('pagodestino', 'Pago en destino')}}</H5>
<H5>{{ Form::radio('pago', 'Pago realizado' ) }} {{Form::label('pagorealizado', 'Pago realizado')}}</H5>

<br>
<H4>{{Form::label('descripcion', 'Descripción:')}}</H4>
{{Form::textarea('descripcion', null, ['rows' => 6, 'cols' => 25, 'style' => 'resize:none'])}}
</div>


  </body>
</html>
