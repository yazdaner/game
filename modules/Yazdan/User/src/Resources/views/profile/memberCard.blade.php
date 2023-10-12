<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tandorfia - تاندورفیا</title>
    <style>
      @font-face {
        font-family: myFirstFont;
        src: url({{asset('./memberCard/Exima-Geometric.ttf')}});
      }
      body {
        font-family: myFirstFont;
        background-color: black;
      }
      canvas {
        margin: 0 auto;
      }
      .text-center {
        text-align: center;
        max-width: 100%;
        max-height: 100%;
      }
    </style>
  </head>
  <body>
    <div class="text-center">
      <canvas id="canvas" width="360" height="640"></canvas>
    </div>
  </body>
  <script src="{{asset('./memberCard/js.js')}}"></script>
  <script>

    document.addEventListener("DOMContentLoaded",draw('{{auth()->user()->key}}','{{auth()->user()->username}}','{{auth()->user()->mobile}}',"{{verta(auth()->user()->created_at)->format('Y-m-d')}}",'{{auth()->user()->getAvatar(600)}}'));
  </script>
</html>
