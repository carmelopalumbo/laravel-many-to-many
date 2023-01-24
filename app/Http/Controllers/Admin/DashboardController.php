<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    //controller admin che gestisce tutte le rotte della dashboard previo login

    public function index()
    {
        $projects = Project::count();
        $types = Type::count();
        return view('admin.home', compact('projects', 'types'));
    }
}
