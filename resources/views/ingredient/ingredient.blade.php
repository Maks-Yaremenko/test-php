
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
    <form action="{{ url('/ingredient') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Имя задачи -->
        <div class="form-group">
            <label class="col-sm-2" for="ingredient-name" >Ingredient</label>

            <div class="col-sm-7">
                <input class="form-control" type="text" name="name" id="ingredient-name" >
            </div>
            <div class=" col-sm-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add ingredient
                </button>
            </div>
        </div>
    </form>
    <hr align="center" width="90%" color="gray"/>
    <!-- Текущие задачи -->
    @if (count($ingredients) > 0)
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-striped table-hover">

            <!-- Заголовок таблицы -->
            <thead>
                <th class="col-md-10">Ingredients</th>
                <th class="col-md-2">Actions</th> 
            <th>&nbsp;</th>
            </thead>

            <!-- Тело таблицы -->
                <tbody>
                    @foreach ($ingredients as $ingredient)
                    <tr>
                        <!-- Имя задачи -->
                        <td class="col-md-10">
                            <div>{{ $ingredient->name }}</div>
                        </td>

                        <td class="col-md-2">
                        <!-- Кнопка Удалить -->
                            <form action="{{ url('ingredient/'.$ingredient->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" class="btn btn-link">
                                <i class="material-icons">edit</i>
                            </button>
                            <button type="submit" class="btn btn-link">
                                <i class="material-icons">delete</i>
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