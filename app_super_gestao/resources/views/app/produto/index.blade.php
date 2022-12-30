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
                <li><a href="{{route('produto.index')}}">Consultar</a></li>
            </ul>
        </div>

        <div class='informacao-pagina'>
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border= "1" width = "100%">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>descrição</th>
                                <th>Fornecedor</th>
                                <th>Peso</th>
                                <th>Número da Unidade</th>
                                <th>comprimento</th>
                                <th>Altura</th>
                                <th>Largura</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produtos as $produto)

                                <tr>
                                    <td>{{ $produto->nome }}</td>
                                    <td>{{$produto->descricao}} </td>
                                    <td>{{$produto->fornecedor->nome}} </td>
                                    <td>{{$produto->peso}} </td>
                                    <td>{{$produto->unidade_id}} </td>
                                    <td>{{$produto->itemDetalhe->comprimento ?? ''}}</td>
                                    <td>{{$produto->itemDetalhe->altura ?? ''}}</td>
                                    <td>{{$produto->itemDetalhe->largura ?? ''}}</td>

                                    <th><a href="{{route('produto.show', ['produto'=>$produto->id])}}" target='_blank'>Infos</a></th>
                                    <th><a href="{{route('produto.edit', ['produto'=>$produto->id])}}" target='_blank'>Editar</a></th>
                                    <th>
                                        <form id="form_{{$produto->id}}" method="post" action="{{route('produto.destroy', ['produto'=>$produto->id])}}">
                                            @method('DELETE')
                                            @csrf
                                            <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
                                        </form>

                                    </th>
                                </tr>

                            @endforeach
                        </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
