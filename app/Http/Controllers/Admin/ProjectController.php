<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $my_projects = Project::where('name', 'like', "%$search%")->paginate(7);
        } else {
            $my_projects = Project::orderBy('id', 'desc')->paginate(7);
        }
        $direction = 'asc';
        return view('admin.projects.index', compact('my_projects', 'direction'));
    }

    //ordinamento tabella
    public function orderby($column, $direction)
    {
        $direction = $direction === 'desc' ? 'asc' : 'desc';
        $my_projects = Project::orderBy($column, $direction)->paginate(7);

        return view('admin.projects.index', compact('my_projects', 'direction'));
    }

    public function ordertypes()
    {
        $types = Type::all();
        return view('admin.projects.ordertypes', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $form_data = $request->all();
        //dd($form_data['cover_image']);
        $form_data['slug'] = Project::generateSlug($form_data['name']);

        if (array_key_exists('cover_image', $form_data)) {

            //salvo nome originale del file
            $form_data['image_original_name'] = $request->file('cover_image')->getClientOriginalName();

            //salvo file sul filesystem ed il path in cover_image
            $form_data['cover_image'] = Storage::put('uploads', $form_data['cover_image']);
        }

        //forma compatta del fill e save
        $new_project = Project::create($form_data);

        return redirect(route('admin.projects.index'))->with('create', "<strong>$new_project->name</strong> aggiunto al database.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        return view('admin.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $form_data = $request->all();

        if ($form_data['name'] != $project->name) {
            $form_data['slug'] = Project::generateSlug($form_data['name']);
        } else {
            $form_data['slug'] = $project->slug;
        }

        if (array_key_exists('cover_image', $form_data)) {

            //elimina immagine se presente nello storage
            if ($project->cover_image) Storage::disk('public')->delete($project->cover_image);

            //salvo nome originale del file
            $form_data['image_original_name'] = $request->file('cover_image')->getClientOriginalName();

            //salvo file sul filesystem ed il path in cover_image
            $form_data['cover_image'] = Storage::put('uploads', $form_data['cover_image']);
        }

        $project->update($form_data);

        return redirect(route('admin.projects.index'))->with('edit', "<strong>$project->name</strong> aggiornato con successo.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //elimina immagine se presente nello storage
        if ($project->cover_image) Storage::disk('public')->delete($project->cover_image);

        $project->delete();

        return redirect(route('admin.projects.index'))->with('create', "<strong>$project->name</strong> eliminato dal database.");
    }
}
