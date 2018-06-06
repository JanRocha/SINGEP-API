<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Singep</title>
    <link rel="stylesheet" href="resources/vendor/css/vendor.css">
    <link rel="stylesheet" href={{asset('css/stylesheet.css')}}>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
    <style>
      body{
        /* cinza */
        background-color: #dfe4ea;
      }
    </style>
  </head>
  <body>
<div class="content">
  <script type="text/javascript" src="resources/vendor/js/vendor.js"></script>
  <!-- <script type="text/javascript" src="js/components/app.components.js"></script> -->
  @yield('content')
  @yield('script')
</div>
  </body>
</html>
