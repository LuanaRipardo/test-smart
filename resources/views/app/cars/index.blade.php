@extends('layouts.app')


@section('title', 'Carros')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Carros</h1>
        </div>

        <div class="card">
            <form action="" class="form">
                <div class="card-header">
                    <h4>Busca de carros</h4>
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
                    <h4>Todos os carros</h4>
                    <a href="{{ route('carros.create') }}" class="btn btn-round btn-primary">Novo carros</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Imagem</th>
                            <th>Nome</th>
                            <th>Marca</th>
                            <th>Ano</th>
                            <th>Câmbio</th>
                            <th>Combustivel</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cars as $car)
                            <tr>
                                <td>{{ $car->id }}</td>
                                <td><img src="{{ asset('storage/'.$car->image) }}" width="50" alt=""></td>
                                <td>{{ $car->name }}</td>
                                <td>{{ $car->brand->name ?? 'não encontrado' }}</td>
                                <td>{{ $car->year}}</td>
                                <td>{{ $car->exchange}}</td>
                                <td>{{ $car->fuel}}</td>
                                <td>
                                    <a href="{{ route('carros.show', $car->id) }}" class="btn btn-primary">Ver/Editar</a>

                                    <form action="{{ route('carros.destroy', $car->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button href="#" class="btn btn-danger">Apagar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $cars->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
