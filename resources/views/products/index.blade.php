@extends('layouts.app')

@section('title', 'Liste des produits')

@section('content')
    <div class="row">
        <div class="container">
            <div class="card bg-light text-dark">
                <div class="card-body">
                    <h2 class="display-4">Liste des produits</h2>
                    @if (session('status'))
                        <br>
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>
                    <table id="table_id" class="display">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Catégorie(s)</th>
                            <th>Caractéristiques</th>
                            <th class="text-center">Créé le</th>
                            <th class="text-center">Modifié le</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        <ul>
                                            @foreach ($product->categories as $categorie)
                                                <li>{{ $categorie->name }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            @foreach ($product->features as $feature)
                                                <li>{{ $feature->name }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="text-center">{{ $product->created_at->formatLocalized('%d/%m/%Y') }}</td>
                                    <td class="text-center">{{ $product->updated_at->formatLocalized('%d/%m/%Y') }}</td>
                                    <td class="text-muted">
                                        <a href="{{ route('product_edit', $product->id) }}" class="btn btn-warning">Editer <i class="fa fa-pencil-square"></i></a>
                                        <a href="{{ route('product_delete', $product->id) }}" class="btn btn-danger">Supprimer <i class="fa fa-times-circle-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('jquery')
    <script>
        $(document).ready(function () {
            $('#table_id').DataTable();
        });
    </script>
@endsection()
