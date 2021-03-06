<?php

namespace App\Http\Controllers;

use Request;
use App\Ingredient;
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
     * Autocomplete method.
     */
    public function autocomplete(Request $request)
    {
        $ingredients = Ingredient::where('name', 'like', '%'.Request::get('term').'%')
        ->orderBy('id', 'desc')
        ->take(5)
        ->get();

        // convert to json
        $results = [];
        foreach ($ingredients as $ingredient) {
            $results[] = ['id' => $ingredient->id, 'value' => $ingredient->name];
        }

        return response()->json($results);
    }

     /**
     * Create new ingredient.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make(Request::all(), [
            'name' => 'required|max:20',
        ]);

        if ($validator->fails()) {
            return redirect('/ingredient')
                ->withInput()
                ->withErrors($validator);
        }

        $ingredient = new Ingredient;
        $ingredient->name = Request::instance()->name;
        $ingredient->save();

        if (Request::ajax())
        {
            return response($ingredient);
        }

        return redirect('/ingredient');
        
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