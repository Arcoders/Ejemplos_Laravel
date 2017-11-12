<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\IngredientRequest;
use App\Ingredient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IngredientController extends Controller
{


    public function index()
    {
        return view('admin.ingredients.index', [
            'ingredients' => Ingredient::paginate(2)
        ]);
    }

    public function  create()
    {
        $ingredient = new Ingredient();
        return view('admin.ingredients.create')->withIngredient($ingredient);
    }

    public function store(IngredientRequest $ingredientRequest)
    {

    }

}
