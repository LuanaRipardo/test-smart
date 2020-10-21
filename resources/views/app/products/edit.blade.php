@extends('layouts.app')


@section('title', 'Criação de produto')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Criação de produto</h1>
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
                    <h4>Crie um novo produto</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('produtos.update', $product->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    Nome do produto
                                    <input type="text" id="name" name="name" class="form-control"
                                           value="{{ $product->name }}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                Categoria
                                <select name="categories_id" class="form-control">
                                    @foreach($categorias as $categoria)
                                        <option
                                            value="{{ $categoria->id }}" {{ $product->categories_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                Valor do produto
                                <input type="text" name="price" value="{{ $product->price }}" class="form-control">
                            </div>
                            <div class="col-sm-12">
                                Descrição do produto
                                <textarea name="description" class="form-control"
                                          style="height: 100px;">{{ $product->description }}</textarea>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
