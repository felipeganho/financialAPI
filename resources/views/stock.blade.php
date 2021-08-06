<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <title>Laravel</title>
    </head>
    <body class="container">
        <form action="{{ route('consultarAcao')}}" id="formStock" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-control" style="margin-top: 20px;">
            <label for="inputStock">Informe a ação desejada:</label>
            <input type="text" class="form-control" id="inputStock" name="inputStock">
          </div>
        </form>
        <button type="submit" class="btn btn-primary" form="formStock" style="margin-top: 20px;">Consultar</button>        
    </body>
    <div class="container" style="margin-top: 20px;">
        <ul class="list-group">
            <li class="list-group-item"><b>Empresa:</b> {{ $companyName ? $companyName : '' }}</li>
            <li class="list-group-item"><b>Última cotação:</b> {{ $latestPrice ? $latestPrice : '' }} USD</li>
          </ul>
    </div>
</html>
