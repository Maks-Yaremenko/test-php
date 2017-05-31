
<!-- resources/views/ingredient/ingredient.blade.php -->

@extends('layouts.app')

@section('sidebar')
    @include('sidebar')
@endsection

@section('content')

<!-- Bootstrap шаблон... -->

<div class="col-md-9 main-content">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors') 
    <!-- Форма новой задачи -->
    <form class="row" id="recipe">
        {{ csrf_field() }}
        <h2>Edit Recipe</h2>
        <!-- Имя задачи -->
        <div class="form-group row">
            <label for="name" class="col-sm-3 control-label">Name</label>
            <div class="col-sm-4">
                <input type="hidden" id="recipe-id" value="{{$recipe->id}}">
                <input type="text" name="name" id="recipe-name" class="form-control" value="{{$recipe->name}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-sm-3 control-label">Description</label>
            <div class="col-sm-8">
                <textarea rows="5" name="description" id="recipe-description" class="form-control">{{$recipe->description}}</textarea>
            </div>
        </div>
        <hr align="center" width="90%" color="gray"/>

        <div class="col-sm-8">
            <table id="ingredients" class="table table-striped table-hover">
                <thead>
                    <th>Ingredient</th>
                    <th colspan="2">Amount</th> 
                </thead>
                <tbody>
                    @foreach ($ingredients as $indexKey => $ingredient)
                    <tr id="{{$indexKey}}">
                        <td class="col-sm-6">
                            <div class="input-group target">
                                <input type="hidden" name="ingredient[{{$indexKey}}][ingredient_id]" class="form-control ingredient-id" value="{{ $ingredient->id }}">
                                <span type="text" class="ingredient-name">{{ $ingredient->name }}</span>
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default add-ingredient" >Add</button>
                                </span>
                            </div>
                        </td>
                        <td class="col-sm-6">
                            <input type="text" name="ingredient[{{$indexKey}}][amount]" class="form-control ingredient-amount" value="{{ $ingredient->pivot->amount }}">
                        </td>
                        <td>
                            <button id="{{$ingredient->id}}" class="btn btn-link detach-ingredient">
                                <i class="material-icons">delete_forever</i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    <tfoot>
                    <tr>
                        <td colspan="3"><button type="button" id="add-field" class="btn btn-primary"> Add ingredient </button></td>
                    </tr>
                        
                    </tfoot>
                </tbody>
            </table>
        </div>
        <hr align="center" width="90%" color="gray"/>
        <!-- Кнопка добавления задачи -->
        <div class="form-group">
            <div class="col-sm-offset-10 col-sm-2">
                <button type="button" id="update-recipe" class="btn btn-primary">Update recipe</button>
            </div>
        </div>
    </form>
</div>
@endsection