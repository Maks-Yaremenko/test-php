
<!-- resources/views/ingredient/ingredient.blade.php -->

@extends('layouts.app')

@section('content')

<!-- Bootstrap шаблон... -->

<div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors') 
    <!-- Форма новой задачи -->
    <form action="{{ url('/recipe') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Имя задачи -->
        <div class="form-group">
            <label for="ingredient-name" class="col-sm-3 control-label">Рецепт</label>
            <div class="col-sm-6">
                <input type="text" name="name" id="recipe-name" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="ingredient-name" class="col-sm-3 control-label">Описание</label>
            <div class="col-sm-6">
                <input type="text" name="description" id="recipe-description" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="ingredient[]" class="col-sm-3 control-label">Ингредиент 1</label>
            <div class="col-sm-6">
                <input type="text" name="ingredient[]" id="ingredient-name" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="ingredient[]" class="col-sm-3 control-label">Ингредиент 2</label>
            <div class="col-sm-6">
                <input type="text" name="ingredient[]" id="ingredient-name" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="ingredient[]" class="col-sm-3 control-label">Ингредиент 3</label>
            <div class="col-sm-6">
                <input type="text" name="ingredient[]" id="ingredient-name" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="ingredient[]" class="col-sm-3 control-label">Ингредиент 4</label>
            <div class="col-sm-6">
                <input type="text" name="ingredient[]" id="ingredient-name" class="form-control">
            </div>
        </div>

        <!-- Кнопка добавления задачи -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Добавить рецепт
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