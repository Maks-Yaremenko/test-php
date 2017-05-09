
<!-- resources/views/ingredient/ingredient.blade.php -->

@extends('layouts.app')

@section('sidebar')
    @include('sidebar')
@endsection

@section('content')

<!-- Bootstrap шаблон... -->

<div class="col-md-9">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors') 
    <!-- Форма новой задачи -->
    <form action="{{ url('/recipe') }}" method="POST" class="row">
        {{ csrf_field() }}
        <h2>Add Recipe</h2>
        <!-- Имя задачи -->
        <div class="form-group row">
            <label for="name" class="col-sm-3 control-label">Name</label>
            <div class="col-sm-4">
                <input type="text" name="name" id="recipe-name" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-sm-3 control-label">Description</label>
            <div class="col-sm-8">
                <textarea rows="5" name="description" id="recipe-description" class="form-control"></textarea>
            </div>
        </div>
        <hr align="center" width="90%" color="gray"/>

        <div class="col-sm-8">
            <table class="table table-striped table-hover">
                <thead>
                    <th>Ingredient</th>
                    <th>Amount</th> 
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="text" name="ingredient[]" id="ingredient-name" class="form-control">
                        </td>
                        <td>
                            <input type="text" name="ingredient[]" id="ingredient-amount" class="form-control">
                        </td>
                    </tr>
                    <tfoot>
                    <tr>
                        <td colspan="2"><button on-click="addIngredientField($event)" class="btn btn-primary"> Add ingredient </button></td>
                    </tr>
                        
                    </tfoot>
                </tbody>
            </table>
        </div>
        <hr align="center" width="90%" color="gray"/>
        <!-- Кнопка добавления задачи -->
        <div class="form-group">
            <div class="col-sm-offset-10 col-sm-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Create recipe
                </button>
            </div>
        </div>
    </form>
    <!-- Текущие задачи -->
    @if (count($recipes) > 0)
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-striped ingredient-table">

            <!-- Заголовок таблицы -->
            <thead>
            <th>Рецепты</th>
            <th>&nbsp;</th>
            </thead>

            <!-- Тело таблицы -->
                <tbody>
                    @foreach ($recipes as $recipe)
                    <tr>
                        <!-- Имя задачи -->
                        <td class="table-text">
                            <div>{{ $recipe->name }}</div>
                        </td>
                        <td class="table-text">
                            <div>{{ $recipe->description }}</div>
                        </td>
                        <td>
                        <!-- Кнопка Удалить -->
                            <form action="{{ url('recipe/'.$recipe->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash"></i> Удалить
                            </button>
                            </form>                  
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

</div>
@endsection