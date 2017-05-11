
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
    <form class="row" id="recipe">
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
            <table id="ingredients" class="table table-striped table-hover">
                <thead>
                    <th>Ingredient</th>
                    <th>Amount</th> 
                </thead>
                <tbody>

                    <tr>
                        <td class="col-sm-6">
                            <div class="input-group target">
                                <input type="hidden" name="ingredient[0][id]" class="form-control ingredient-id">
                                <input type="text" class="form-control ingredient-name">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default add-ingredient" >Add</button>
                                </span>
                            </div>
                        </td>
                        <td class="col-sm-6">
                            <input type="text" name="ingredient[0][amount]" class="form-control ingredient-amount">
                        </td>
                    </tr>
                    <tfoot>
                    <tr>
                        <td colspan="2"><button type="button" id="add-field" class="btn btn-primary"> Add ingredient </button></td>
                    </tr>
                        
                    </tfoot>
                </tbody>
            </table>
        </div>
        <hr align="center" width="90%" color="gray"/>
        <!-- Кнопка добавления задачи -->
        <div class="form-group">
            <div class="col-sm-offset-10 col-sm-2">
                <button type="button" id="submit" class="btn btn-primary">Create recipe</button>
            </div>
        </div>
    </form>
</div>
@endsection