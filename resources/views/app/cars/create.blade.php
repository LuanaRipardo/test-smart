@extends('layouts.app')


@section('title', 'Criação de carro')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Criação de carro</h1>
        </div>

        @if(\Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="section-body">
            <div class="card">
                <div class="d-flex justify-content-between card-header">
                    <h4>Crie um novo carro</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('carros.store') }}" method="post">
                        @csrf

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    Nome do carro
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                Marca
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                Ano
                                <input type="text" name="year" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                Combustivel
                                <input type="text" name="fuel" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                Câmbio
                                <input type="text" name="exchange" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="image">Imagem</label>
                            <input type="file" name="image" class="form-control" id="image">
                        </div>
                        <br>
                        <button class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
