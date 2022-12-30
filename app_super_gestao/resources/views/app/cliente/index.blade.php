@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class = 'conteudo-pagina'>

        <div class= 'titulo-pagina-2'>
        <p>Listagem de Clientes</p>
        </div>

        <div class= 'menu'>
            <ul>
                <li><a href="{{route('cliente.create')}}">Novo</a></li>
                <li><a href="{{route('cliente.index')}}">Consultar</a></li>
            </ul>
        </div>

        <div class='informacao-pagina'>
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border= "1" width = "100%">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)

                                <tr>
                                    <td>{{$cliente->nome }}</td>
                                    <th><a href="{{route('cliente.show', ['cliente'=>$cliente->id])}}">Visualizar</a></th>
                                    <th><a href="{{route('cliente.edit', ['cliente'=>$cliente->id])}}">Editar</a></th>
                                    <th>
                                        <form id="form_{{$cliente->id}}" method="post" action="{{route('cliente.destroy', ['cliente'=>$cliente->id])}}">
                                            @method('DELETE')
                                            @csrf
                                            <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a>
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
