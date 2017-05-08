<?php

namespace App\Http\Controllers;

use App\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IngredientController extends Controller
{
    /**
     * Show all available ingredients.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $ingredients = Ingredient::orderBy('created_at', 'asc')->get();

        return view('ingredient/ingredient', [
            'ingredients' => $ingredients
        ]);
    }

     /**
     * Create new ingredient.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:20',
        ]);

        if ($validator->fails()) {
            return redirect('/ingredient')
                ->withInput()
                ->withErrors($validator);
        }

        $ingredient = new Ingredient;
        $ingredient->name = $request->name;
        $ingredient->save();

        return redirect('/ingredient');

    // создание задачи
    }

     /**
     * Delete existing ingredient.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Ingredient $ingredient)
    {
        $ingredient->delete();

        return redirect('/ingredient');
    }
    
}