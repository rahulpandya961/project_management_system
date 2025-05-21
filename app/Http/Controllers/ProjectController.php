<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function index()
    {
        $project_data = Project::latest()->get();
        return view('projects.index', compact('project_data'));
    }
    public function create()
    {
        return view('projects.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'due_date' => 'required',
            'description' => 'required',
        ]);
        $store_project_data = new Project();
        $store_project_data->name = $request->name;
        $store_project_data->price = $request->price;
        $store_project_data->due_date = $request->due_date;
        $store_project_data->description = $request->description;
        $store_project_data->save();
        return redirect()->route('projects.index')
            ->with('success', 'Project Created Successfully.');

    }
    public function edit($id)
    {
        $project_data = Project::find($id);
        return view('projects.edit', compact('project_data'));
    }
    public function update($id,Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'due_date' => 'required',
            'description' => 'required',
        ]);

        $update_project_data = Project::find($id);
        $update_project_data->name = $request->name;
        $update_project_data->price = $request->price;
        $update_project_data->due_date = $request->due_date;
        $update_project_data->description = $request->description;
        $update_project_data->save();
        return redirect()->route('projects.index')
            ->with('success', 'Project Updated Successfully.');
    }
    public function delete($id)
    {
        $delete_project_data = Project::find($id);
        $delete_project_data->delete();
         return redirect()->route('projects.index')
                        ->with('success','Project Deleted Successfully');
    }
}
