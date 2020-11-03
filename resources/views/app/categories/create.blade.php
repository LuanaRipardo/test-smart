@extends('layouts.app')


@section('title', 'Criação de categoria')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Criação da marca</h1>
        </div>

        @if(\Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="section-body">
            <div class="card">
                <div class="d-flex justify-content-between card-header">
                    <h4>Crie uma nova marca</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('categorias.store') }}" method="post">
                        @csrf

                        <div class="form-group">
                            Nome da marca
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                        <button class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
