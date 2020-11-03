@extends('layouts.app')


@section('title', 'Edição de carro')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edição de carro</h1>
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
                    <h4>Edite o carro</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('carros.update', $car->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    Nome do carro
                                    <input type="text" id="name" name="name" class="form-control"
                                           value="{{ $car->name }}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                Categoria
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option
                                            value="{{ $category->id }}" {{ $car->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                Ano do carro
                                <input type="text" name="year" value="{{ $car->year }}" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                Combustivel
                                <input type="text" name="fuel" value="{{ $car->fuel }}" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                Câmbio
                                <input type="text" name="exchange" value="{{ $car->exchange }}" class="form-control">
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
