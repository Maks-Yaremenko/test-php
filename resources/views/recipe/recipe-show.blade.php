@extends('layouts.app')

@section('sidebar')
    @include('sidebar')
@endsection

@section('content')
    <div class="col-md-9">
        <h2>
            {{ $recipe->name }}
            <input type="hidden" id="recipe-id" value="{{ $recipe->id }}">
            <a id="edit-recipe" class="btn btn-link" href="/recipe/{{ $recipe->id }}"><i class="material-icons">edit</i></a>
        </h2>
        <hr align="center" width="90%" color="gray"/>
        <div class="form-group row">
            <label for="description" class="col-sm-3 control-label">Description</label>
            <div class="col-sm-8">
                <span>{{ $recipe->description }}</span>
            </div>
        </div>
        <hr align="center" width="90%" color="gray"/>

        <div class="col-sm-8">
            <table id="ingredients" class="table table-striped table-hover">
                <thead>
                    <th>Ingredient</th>
                    <th>Amount</th>
                </thead>
                <tbody>
                @foreach ($ingredients as $ingredient)
                    <tr>
                        <td id="{{$ingredient->id}}" class="col-sm-6"><span>{{ $ingredient->name }}</span></td>
                        <td class="col-sm-6"><span>{{ $ingredient->pivot->amount }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <hr align="center" width="90%" color="gray"/>
    </div>
@endsection