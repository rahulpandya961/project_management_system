<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $task_data = Task::with('project')->get();
        return view('tasks.index', compact('task_data'));
    }
    public function create()
    {
        $projects = Project::all(); 
        return view('tasks.create',compact('projects'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'project' => 'required',
            'due_date' => 'required',
            'description' => 'required',
        ]);
        $store_task_data = new Task();
        $store_task_data->name = $request->name;
        $store_task_data->project_id = $request->project;
        $store_task_data->due_date = $request->due_date;
        $store_task_data->description = $request->description;
        $store_task_data->save();
        return redirect()->route('tasks.index')
            ->with('success', 'Task Created Successfully.');

    }
    public function edit($id)
    {
        $task_data = Task::find($id);
        $projects = Project::all();
        return view('tasks.edit', compact('task_data','projects'));
    }
    public function update($id,Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'project' => 'required',
            'due_date' => 'required',
            'description' => 'required',
        ]);

        $update_task_data = Task::find($id);
        $update_task_data->name = $request->name;
        $update_task_data->project_id = $request->project;
        $update_task_data->due_date = $request->due_date;
        $update_task_data->description = $request->description;
        $update_task_data->save();
        return redirect()->route('tasks.index')
            ->with('success', 'Task Updated Successfully.');
    }
    public function delete($id)
    {
        $delete_task_data = Task::find($id);
        $delete_task_data->delete();
         return redirect()->route('tasks.index')
                        ->with('success','Task Deleted Successfully');
    }
}
