<?php

namespace App\Http\Controllers;

use Request;
use App\Recipe;
use Illuminate\Support\Facades\Validator;

class RecipeController extends Controller
{
    /**
     * Fetch all recipes from db.
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
     * Show clear page for new recipe.
     *
     * @return \Illuminate\Http\Response
     */
    public function make(Request $request)
    {
        return view('recipe/recipe-new');
    }

     /**
     * Create recipes.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $validator = Validator::make(Request::all(), [
            'name' => 'required|max:20',
            'description' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return redirect('/recipe/new')
                ->withInput()
                ->withErrors($validator);
        }

        $recipe = new Recipe;
        $recipe->name = Request::instance()->name;
        $recipe->description = Request::instance()->description;
        $recipe->save();

        $recipe->ingredients()->sync(Request::instance()->ingredient);
        return redirect('/recipe');

        /*foreach(Request::instance()->ingredient as $value){
            if(is_null($value['id'])) { continue; }
            $recipe->ingredients()->attach($recipe->id, array('ingredient_id' => $value['id'], 'amount' => $value['amount']));
        };

        return redirect('/recipe');*/
    }

    /**
     * Update recipe with ingredieants.
     *
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request, $id) {

        $recipe = Recipe::findOrFail($id);

        if (Request::ajax()) {

            $validator = Validator::make(Request::all(), [
                'name' => 'required|max:20',
                'description' => 'required|max:255'
            ]);

            if ($validator->fails()) {

                return response($validator->errors(), 400);
            }

            $recipe->update([
                'name' => Request::instance()->name,
                'description' => Request::instance()->description
                ]);

            $recipe->ingredients()->sync(Request::instance()->ingredient);
            return response(['id' => $recipe->id], 200);
        }
       
       return view('recipe/recipe-update', ['recipe' => $recipe, 'ingredients' => $recipe->ingredients]);
    }
 
     /**
     * Delete selected recipe.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Recipe $recipe)
    {
        $recipe->delete();

        return redirect('/recipe');
    }

}
