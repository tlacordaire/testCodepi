@extends('layouts.app')

@section('title', 'Editer un produit')

@section('content')
    <div class="row">
        <div class="container">
        <div class="card bg-light text-dark">
            <div class="card-body">
                <h2 class="display-4">Editer un produit</h2>
                <br>
                <form method="POST" action="/product/update" @if ($errors->any()) class="was-validated" @endif>
                    @csrf
                    <div class="form-group">
                        <label for="name">@lang('labels.product_name'):</label>
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="text" class="form-control" id="name" placeholder="Exemple : Chemise de Luxe" name="name" value="{{ $product->name }}">
                        @if ($errors->first('name'))
                            <div class="invalid-feedback" style="display: block">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="categories">@lang('labels.category'):</label>
                        <select class="categories" name="categories[]" id="categories" multiple="multiple" style="width: 100%;">
                            @foreach($categories as $category)
                                {{$selected = ''}}
                                @foreach($product->categories as $categoryProduct)
                                    @if($category->id == $categoryProduct->id) {{$selected = 'selected="selected"'}} @endif
                                @endforeach
                                <option value="{{$category->id}}" {{$selected}}> {{ $category->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->first('categories'))
                            <div class="invalid-feedback" style="display: block">{{ $errors->first('categories') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="features">@lang('labels.feature'): <i class="small font-weight-lighter">(3 minimum)</i></label>
                        <select class="features" name="features[]" id="features" multiple="multiple" style="width: 100%;">
                            @foreach($features as $feature)
                                {{$selected = ''}}
                                @foreach($product->features as $featureProduct)
                                    @if($feature->id == $featureProduct->id) {{$selected = 'selected="selected"'}} @endif
                                @endforeach
                                <option value="{{$feature->id}}" {{$selected}}> {{ $feature->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->first('features'))
                            <div class="invalid-feedback" style="display: block">{{ $errors->first('features') }}</div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Editer</button>
                </form>
            </div>
        </div>
        </div>
    </div>
@endsection

@section('jquery')
    <script>
        $(document).ready(function() {
            $('.categories').select2();
            $('.features').select2();
        });
    </script>
@endsection
