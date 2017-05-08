
<!-- resources/views/ingredient/ingredient.blade.php -->

@extends('layouts.app')

@section('content')

<!-- Bootstrap шаблон... -->

<div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors') 
    <!-- Форма новой задачи -->
    <form action="{{ url('/ingredient') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Имя задачи -->
        <div class="form-group">
            <label for="ingredient-name" class="col-sm-3 control-label">Ингредиент</label>

            <div class="col-sm-6">
                <input type="text" name="name" id="ingredient-name" class="form-control">
            </div>
        </div>

        <!-- Кнопка добавления задачи -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Добавить ингредиент
                </button>
            </div>
        </div>
    </form>
    <!-- Текущие задачи -->
    @if (count($ingredients) > 0)
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-striped ingredient-table">

            <!-- Заголовок таблицы -->
            <thead>
            <th>Ингредиенты</th>
            <th>&nbsp;</th>
            </thead>

            <!-- Тело таблицы -->
                <tbody>
                    @foreach ($ingredients as $ingredient)
                    <tr>
                        <!-- Имя задачи -->
                        <td class="table-text">
                            <div>{{ $ingredient->name }}</div>
                        </td>
                        <td>
                        <!-- Кнопка Удалить -->
                            <form action="{{ url('ingredient/'.$ingredient->id) }}" method="POST">
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