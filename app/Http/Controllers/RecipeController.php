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

        echo var_dump($request->ingredient);

        

        $ids = array_filter(array_map(array($this, 'executeId'), $request->ingredient));

        echo print_r($ids);

        return;

        $recipe->ingredients()->attach([1,3,4]);

        return redirect('/recipe');
    }

    public function executeId ($value) {
        return $value['id'];
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

    private function filter ($value) {
        if (is_null($value)) { continue; }
        return $value;
    }

}
