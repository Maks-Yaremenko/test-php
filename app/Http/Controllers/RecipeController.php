<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RecipeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $recipes = Recipe::orderBy('created_at', 'asc')->get();

        return view('recipe/recipe', [
            'recipes' => $recipes
        ]);
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:20',
        ]);

        if ($validator->fails()) {
            return redirect('/recipe')
                ->withInput()
                ->withErrors($validator);
        }
        
        $recipe = new Recipe;
        $recipe->name = $request->name;
        $recipe->description = $request->description;
        $recipe->save();
        $ingredient = [];
        foreach ($request->get('ingredient') as $ingredient) {
            array_push($ingredient, new IngredientRecipe([
                'recipe_id' => $recipe->id,
                'ingredient_id' => $ingredient->id
            ]));
        }

        $ingRec = new IngredientRecipe($id_rec, $ing1);

        $ingRec->recipe_id = $recipe->id;
        $ingRec->ingredient_id = $ingredient->id;
        $ingRec->save();

        return view('recipe/recipe');
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete()
    {
        return view('home');
    }

}
