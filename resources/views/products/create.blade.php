@extends('layouts.app')

@section('title', 'Ajouter un produit')

@section('content')
    <div class="row">
        <div class="container">
        <div class="card bg-light text-dark">
            <div class="card-body">
                <h2 class="display-4">Ajouter un produit</h2>
                @if (session('status'))
                    <br>
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <br>
                <form method="POST" action="/product">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nom du produit:</label>
                        <input type="text" class="form-control" id="name" placeholder="Exemple : Renault Twingo" name="name">
                    </div>
                    <div class="form-group">
                        <label for="categories">Catégorie(s): <button type="button" id="add-categorie" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></button></label>
                        <select class="categories" name="categories[]" id="categories" multiple="multiple" style="width: 100%;">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="features">Caractéristiques: <i class="small font-weight-lighter">(3 minimum)</i></label>
                        <select class="features" name="features[]" multiple="multiple" id="features" style="width: 100%;">
                            @foreach ($features as $feature)
                                <option value="{{ $feature->id }}">{{ $feature->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
        </div>
    </div>
@endsection

@section('jquery')
    <script>
        $(document).ready(function() {
            // Initialisation des selects
            $('.categories').select2();
            $('.features').select2();

            /*
            BONUS : On peut ajouter une catégorie dynamiquement, il suffit d'appuyer sur le "+"
            Techno utilisées : "SweetAlert2", Jquery, Ajax
             */
            $( "#add-categorie" ).click(function() {
                Swal.fire({
                    title: 'Ajoutez une catégorie',
                    html: 'Ajoutez ici une catégorie rapidement !<br>Entrez un nom de catégorie :',
                    backdrop: `rgba(0,0,123,0.4) url("../img/nyan-cat.gif") center left no-repeat`,
                    input: 'text',
                    inputAttributes: {
                    autocapitalize: 'off'
                    },
                    showCancelButton: true,
                    confirmButtonText: 'Ajouter',
                    cancelButtonText: 'Annuler',
                    showLoaderOnConfirm: true,

                    // On récupère la valeur dans la pop-up
                    preConfirm: (name) => {
                        $.ajax({
                            type:'POST',
                            url:'/category/add/jquery',
                            data:{
                                "_token": "{{ csrf_token() }}",
                                "name": name
                            },

                            // Au succès on vient afficher une deuxième pop-up pour confirmer l'ajout
                            // On vient ensuite rafraîchir le select des catégories
                            success:function(data) {
                               Swal.fire({
                                  type: 'success',
                                  title: 'Hourra !',
                                  text: 'Votre catégorie "'+ data.name + '" a bien été ajoutée !',
                                  confirmButtonText: 'Ok !'
                               });

                               var newOption = new Option(data.name, data.id, false, false);
                               $(".categories").append(newOption).trigger('change');
                            },
                            error: function(data) {
                               Swal.showValidationMessage(`Request failed: ${data.error}`)
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
