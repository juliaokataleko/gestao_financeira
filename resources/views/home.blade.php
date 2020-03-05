<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gerenciador Financeiro</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        html, body {
            height: 100%;
        }

        body {
            padding: 2em;
            background: #eee;
        }

        a {
            color: #3498db;
            text-decoration: none;
        }

        .title {
            color: #e74c3c;
            text-transform: uppercase;
        }

        form {
            margin: 0;
        }

        ul {
            margin: 0;
        }

        li {
            list-style: none;
            padding: 10px;
            background: #ddd;
            margin-bottom: 10px;
        }

        hr {
            margin: 13px 0;
        }

        input, select, textarea {
            margin-top: 20px;
            padding: 10px;
        }
        .container {
            max-width: 600px;
            width: 100%;
            margin-bottom: 20px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="title">Kibaya</h1> 
        <p>Te mantem sempre a par das suas contas</p>
        <hr>
        <h2 style="padding: 1.3em; background: #ddd;">
            @if($total < 1)
            Total: <b style="color: #e74c3c">{{ $total }} kwanzas</b> <br>
            @else 
            Total: <b>{{ $total }} kwanzas</b> <br>
            @endif
            Positivo: <b>{{ $positivo }} kwanzas</b> <br>
            Negativo: <b>{{ $negativo }} kwanzas</b>
        </h2>
        <hr>
        <form action="" method="post">
            @csrf
            <input  style="width:100%" type="number" name="money_quantity" placeholder="Valor">
            <select  style="width:100%"  name="type_movement" id="type_movement">
                <option value="1">Ganho</option>
                <option value="2">Despesa</option>
                <option value="3">Dívida</option>
            </select>
            <textarea name="description" style="width:100%" 
            id="description" placeholder="Descrição"></textarea>
            <input type="submit"  style="width:100%"  value="Registar Movimento">
        </form>
        <hr>
        @if(count($movements) > 0)
            <ul>
                @foreach ($movements as $move)
                <li>{{ $move->description }} - {{ $move->money_quantity }} Kz <a href="edit/{{$move->id}}">Editar</a> <a href="delete/{{$move->id}}">Eliminar</a></li> 
                @endforeach
            </ul>
        @else 
            <p>Sem Movimentos de Momento</p>
        @endif
    </div>    
</body>
</html>