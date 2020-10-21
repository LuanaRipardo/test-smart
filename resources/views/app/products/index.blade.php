@extends('layouts.app')


@section('title', 'Produtos')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Produtos</h1>
        </div>

        <div class="card">
            <form action="" class="form">
                <div class="card-header">
                    <h4>Busca de produtos</h4>
                </div>
                <div class="card-body">
                    Nome
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="card-footer">
                    <button class="btn btn-primary">Pesquisar</button>
                </div>
            </form>
        </div>

        @if(\Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="section-body">
            <div class="card">
                <div class="d-flex justify-content-between card-header">
                    <h4>Todos produtos</h4>
                    <a href="{{ route('produtos.create') }}" class="btn btn-round btn-primary">Nova produto</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Categoria</th>
                            <th>Valor</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>
                                    <b>R$ {{ number_format($product->price, 2, ',', '.') }}</b>
                                </td>
                                <td>
                                    <a href="{{ route('produtos.show', $product->id) }}" class="btn btn-primary">Ver/Editar</a>

                                    <form action="{{ route('produtos.destroy', $product->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button href="#" class="btn btn-danger">Apagar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
