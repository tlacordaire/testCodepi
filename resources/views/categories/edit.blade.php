@extends('layouts.app')

@section('title', 'Editer cette catégorie')

@section('content')
    <div class="row">
        <div class="container">
            <div class="card bg-light text-dark">
                <div class="card-body">
                    <h2 class="display-4">Editer cette catégorie</h2>
                    @if (session('status'))
                        <br>
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>
                    <form method="POST" action="/category/update">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nom de la catégorie:</label>
                            <input type="hidden" name="id" value="{{ $category->id }}">
                            <input type="text" class="form-control" id="name" placeholder="Exemple : Mobilier" name="name" value="{{ $category->name }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Editer</button>
                        <a href="/categories" class="btn btn-secondary">Retour</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('jquery')

@endsection
