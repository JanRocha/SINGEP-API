@extends('layouts.padrao')
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     @section('content')
     <div id="cadastro">
       @section('content')
       @include('cadastro.participante.partes.painel')
     </div>
     <script type="text/javascript" src="js/cadastro/app.participante.js"></script>
     @endsection
   </body>
 </html>
