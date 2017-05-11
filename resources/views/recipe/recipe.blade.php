
<!-- resources/views/ingredient/ingredient.blade.php -->

@extends('layouts.app')

@section('sidebar')
    @include('sidebar')
@endsection

@section('content')

<div class="col-md-9">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors') 
    </form>
    <!-- Текущие задачи -->
    @if (count($recipes) > 0)
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-striped ingredient-table">

            <!-- Заголовок таблицы -->
            <thead>
            <th class="col-md-2">Recipes</th>
            <th class="col-md-7">Description</th>
            <th class="col-md-3">Actions</th>
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
                            <a class="btn btn-link" href="{{ url('recipe/show/'.$recipe->id) }}">
                                <i class="material-icons">visibility</i>
                            </a>
                            <a class="btn btn-link" href="{{ url('recipe/new') }}">
                                <i class="material-icons">exposure_plus_1</i>
                            </a>
                            <form class="inline-block" action="{{ url('recipe/'.$recipe->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

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