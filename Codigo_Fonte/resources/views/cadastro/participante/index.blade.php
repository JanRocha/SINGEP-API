@extends('layouts.padrao')
<div id="part">
<div class="card">
  <div class="card-header">
 @include('cadastro.participante.partes.filtro')
  </div>
  <div class="card-body">
  @include('cadastro.participante.partes.tabela')
  @include('cadastro.participante.partes.modal')

  </div>
  <div class="card-footer">

  </div>
</div>
</div>

    <script type="text/javascript" src="js/cadastro/app.participante.js">

    </script>
