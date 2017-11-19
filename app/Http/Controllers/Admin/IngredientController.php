<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\IngredientRequest;
use App\Ingredient;
use App\Http\Controllers\Controller;

class IngredientController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.ingredients.index', [
            'ingredients' => Ingredient::paginate(2)
        ]);
    }

    /**
     * @return mixed
     */
    public function  create()
    {
        $ingredient = new Ingredient();
        return view('admin.ingredients.create')->withIngredient($ingredient);
    }

    /**
     * @param IngredientRequest $ingredientRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(IngredientRequest $ingredientRequest)
    {
        Ingredient::create($ingredientRequest->input());
        return redirect('administration/ingredients')->with('message', 'El ingrediente se ha creado...');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        return view('admin.ingredients.edit', [
           'ingredient' => Ingredient::find($id)
        ]);
    }

    /**
     * @param IngredientRequest $ingredientRequest
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(IngredientRequest $ingredientRequest, $id)
    {
        $ingredient = Ingredient::find($id);
        $ingredient->fill($ingredientRequest->all())->save();
        return redirect('administration/ingredients')->with('message', 'Ingrediente actualizado');
    }

}
