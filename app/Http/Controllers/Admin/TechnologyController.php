<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technologies = Technology::orderBy('id', 'desc')->paginate(5);
        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = $request->validate([
            'name' => 'required|min:2|unique:types'
        ]);

        $form_data['slug'] = Str::slug($form_data['name']);
        $name = $form_data['name'];

        Technology::create($form_data);

        return redirect()->back()->with('create', "Tecnologia <strong> $name </strong> aggiunta correttamente al DB.");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Technology $technology)
    {
        $form_data = $request->validate([
            'name' => 'required|unique:types|min:2'
        ]);

        $form_data['slug'] = Str::slug($form_data['name']);

        $technology->update($form_data);

        return redirect()->back()->with('update', "Tecnologia <strong>$request->name</strong> aggiornata correttamente.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();

        return redirect()->back()->with('delete', "Tecnologia <strong>$technology->name</strong> eliminata dal db.");
    }
}
