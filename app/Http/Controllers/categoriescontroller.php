<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class categoriescontroller extends Controller
{

public function __construct(){
    $this->middleware("auth");
}




    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=category::all();
        //la fonction compact sert a transmettre les variables la vue
        return view("admin.categories.index",compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     //securité : controle sur les chemps
$request->validate([
    "name"=>"required|max:100|unique:categories"
]);
         //insertion dans la base de données
     category::create($request->all());
     //redirection vers la page liste avec l'envoi d'un message de success
     //with envoi des variable sous forme de session flash
     return redirect()->route ("categories.index")->with("message","une nouvelle categorie est ajoutee avec succes");

    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        return view("admin.categories.edit",compact("category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        //validation
        $request->validate([
        'name'=> 'required',
    ]);
    //meis a jour avec eloquent
         $category->update($request->all());
    //redirection vers index
        return redirect()->route("categories.index")->with("message","la  categorie est modifiée avec succes");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        $category->delete();
       return redirect()->route("categories.index")->with("message","une  categorie est supprime avec succes");
    }
}
