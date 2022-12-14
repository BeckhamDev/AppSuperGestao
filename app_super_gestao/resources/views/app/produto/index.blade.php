@extends('app.layouts.basico')

@section('titulo', 'Produtos')

@section('conteudo')
    <div class = 'conteudo-pagina'>

        <div class= 'titulo-pagina-2'>
        <p>Produtos em Estoque</p>
        </div>

        <div class= 'menu'>
            <ul>
                <li><a href="{{route('produto.create')}}">Novo</a></li>
                <li><a href="/">Consultar</a></li>
            </ul>
        </div>

        <div class='informacao-pagina'>
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border= "1" width = "100%">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>descrição</th>
                                <th>Peso</th>
                                <th>Número da Unidade</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produtos as $produto)
                                <tr>
                                    <th>{{ $produto->nome }}</th>
                                    <th>{{$produto->descricao}} </th>
                                    <th>{{$produto->peso}} </th>
                                    <th>{{$produto->unidade_id}} </th>
                                    <th><a href="{{route('produto.show', ['produto'=>$produto->id])}}" target='_blank'>Infos</a></th>
                                    <th><a href="/" target='_blank'>Excluir</a></th>
                                    <th><a href="/" target='_blank'>Editar</a></th>
                                </tr>

                            @endforeach
                        </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
