@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class = 'conteudo-pagina'>

        <div class= 'titulo-pagina-2'>
        <p>Adicionar - Fornecedor</p>
        </div>

        <div class= 'menu'>
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar')}}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor')}}">Consultar</a></li>
            </ul>
        </div>

        <div class='informacao-pagina'>
        {{ $msg ?? ' '}}
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form method='post' action= "{{ route('app.fornecedor.adicionar') }}">
                    <input type='hidden' name='id' value="{{$dadosFornecedor->id ?? ''}}">
                    @csrf
                    <input type='text' name='nome' value= "{{ $dadosFornecedor->nome ??  old('nome')}}" placeholder='Nome' class= 'borda-preta'>
                    {{$errors->has('nome') ? $errors->first('nome') : ''}}
                    <input type='text' name='site' value= "{{$dadosFornecedor->site ??  old('site')}}" placeholder='Site' class= 'borda-preta'>
                    {{$errors->has('site') ? $errors->first('site') : ''}}
                    <input type='text' name='uf' value= "{{$dadosFornecedor->uf ??  old('uf')}}" placeholder='UF' class= 'borda-preta'>
                    {{$errors->has('uf') ? $errors->first('uf') : ''}}
                    <input type='text' name='email' value= "{{$dadosFornecedor->email ??  old('email')}}" placeholder='Email' class= 'borda-preta'>
                    {{$errors->has('email') ? $errors->first('email') : ''}}
                    <button type='submit' class='borda-preta'>Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
