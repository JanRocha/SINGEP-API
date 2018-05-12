@extends('layouts.padrao')
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<div class="card">
  <div class="card-header">
 @include('cadastro.participante.partes.filtro')
  </div>
  <div class="card-body">
  @include('cadastro.participante.partes.tabela')
  </div>
  <div class="card-footer">
@include('cadastro.participante.partes.paginacao')
  </div>
</div>

    <script type="text/javascript" src="js/cadastro/app.participante.js">

    </script>
  </body>
</html>
