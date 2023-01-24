<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::orderBy('id', 'desc')->paginate(5);
        return view('admin.types.index', compact('types'));
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

        Type::create($form_data);

        return redirect()->back()->with('create', "Linguaggio <strong> $name </strong> aggiunto correttamente al DB.");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $form_data = $request->validate([
            'name' => 'required|unique:types|min:2'
        ]);

        $form_data['slug'] = Str::slug($form_data['name']);

        $type->update($form_data);

        return redirect()->back()->with('update', "Linguaggio <strong>$request->name</strong> aggiornato correttamente.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return redirect()->back()->with('delete', "Linguaggio <strong>$type->name</strong> eliminato.");
    }
}
