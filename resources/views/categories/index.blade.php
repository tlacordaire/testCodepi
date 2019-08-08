@extends('layouts.app')

@section('title', 'Liste des catégories')

@section('content')
    <div class="row">
        <div class="container">
            <div class="card bg-light text-dark">
                <div class="card-body">
                    <h2 class="display-4">Liste des catégories</h2>
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
                            <th class="text-center">Créée le</th>
                            <th class="text-center">Modifiée le</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td class="text-center">{{ $category->created_at->formatLocalized('%d/%m/%Y') }}</td>
                                    <td class="text-center">{{ $category->updated_at->formatLocalized('%d/%m/%Y') }}</td>
                                    <td class="text-muted"><a href="{{ route('category_edit', $category->id) }}" class="btn btn-warning">Editer <i class="fa fa-pencil-square"></i></a></td>
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