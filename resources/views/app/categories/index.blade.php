@extends('layouts.app')


@section('title', 'Categorias')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Categorias de produto</h1>
        </div>
        @if(\Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="section-body">
            <div class="card">
                <div class="d-flex justify-content-between card-header">
                    <h4>Todas categorias</h4>
                    <a href="{{ route('categorias.create') }}" class="btn btn-round btn-primary">Nova categoria</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <form action="{{ route('categorias.destroy', $category->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button href="#" class="btn btn-danger">Apagar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
