
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatório das Propriedades</title>

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        img{
            width: 50px;
            height: 50px;
            padding-left: 45%;
        }
        p{
            font-size: 10px;
        }
        .content h3{
            text-align: center;
            margin-top: 5rem;
        }


        table{
            border-collapse: collapse;
            width: 100%;
        }
        th,td{
            border: solid 1px #000;
            padding: 3x;
        }
        th{
            background: #4d4747;
            color: #fff;
        }
        tr{
            padding: 0px;
            margin: 0px;
        }

    </style>
</head>
<body>

    <section class="header">
        <p style="padding-left: 40%"></p>
        <P style="padding-left: 39%"></P>

    <section class="content">
        <h3>RELATÓRIO PERÌODICO DO ARENDAMENTO DE PROPRIEDADES</h3>


        <div class="table">
            <table border="1">
                <thead>
                    <tr>
                        <th>PROVÍNCIA</th>
                        <th>MUNICÍPIO</th>
                        <th>BAIRRO</th>
                        <th>LARGURA</th>
                        <th>COMPRIMENTO</th>
                        <th>QUINTAL</th>
                        <th>ANDAR</th>
                        <th>TIPO</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($propriedades as $propriedade)
                    <tr>
                        <td>{{$propriedade->provincia}}</td>
                        <td>{{$propriedade->municipio}}</td>
                        <td>{{$propriedade->bairro}}</td>
                        <td>{{$propriedade->largura}}</td>
                        <td>{{$propriedade->comprimento}}</td>
                        <td>{{$propriedade->quintal}}</td>
                        <td>{{$propriedade->andar}}</td>
                        <td>{{$propriedade->tipo}}</td>

                    </tr>

                    @endforeach

                </tbody>
                <tfoot>
                    <tr>Total Arrendadas: {{$propriedades->where('estado',2)->count()}}</tr>
                    <tr>Total Aprovadas: {{$propriedades->where('estado',1)->count()}}</tr>
                    <tr>Total Reprovadas: {{$propriedades->where('estado',3)->count()}}</tr>
                    <tr>Total Em Espera: {{$propriedades->where('estado',0)->count()}}</tr>
                    <tr>Total: {{$propriedades->count()}}</tr>
                </tfoot>
            </table>
        </div>
    </section>
</body>
</html>
