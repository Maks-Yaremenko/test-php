<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        return view('ingredient/ingredient');
    }

        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home');
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