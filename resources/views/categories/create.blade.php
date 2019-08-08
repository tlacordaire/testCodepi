@extends('layouts.app')

@section('title', 'Ajouter une catégorie')

@section('content')
    <div class="row">
        <div class="container">
            <div class="card bg-light text-dark">
                <div class="card-body">
                    <h2 class="display-4">Ajouter une catégorie</h2>
                    @if (session('status'))
                        <br>
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>
                    <form method="POST" action="/category" @if ($errors->any()) class="was-validated" @endif>
                        @csrf
                        <div class="form-group">
                            <label for="name">@lang('labels.category_name'):</label>
                            <input type="text" class="form-control" id="name" placeholder="Exemple : Mobilier" name="name">
                            @if ($errors->first('name'))
                                <div class="invalid-feedback" style="display: block">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                        <a href="/categories" class="btn btn-secondary">Retour</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('jquery')

@endsection
