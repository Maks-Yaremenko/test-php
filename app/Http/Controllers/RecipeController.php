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
    public function show(Recipe $recipe)
    {
        return view('recipe/recipe-show', ['recipe' => $recipe, 'ingredients' => $recipe->ingredients]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function make()
    {
        return view('recipe/recipe-new');
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

        foreach($request->ingredient as $value){
            if(is_null($value['id'])) { continue; }
            $recipe->ingredients()->attach($recipe->id, array('ingredient_id' => $value['id'], 'amount' => $value['amount']));
        };

        return redirect('/recipe');
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Recipe $recipe)
    {
        $recipe->delete();

        return redirect('/recipe');
    }

}
