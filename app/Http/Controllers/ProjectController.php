<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Item;
use App\Models\Karyawan;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', ['projects'=>$projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = Project::create($request->all());
        return redirect()->action([ProjectController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function indexTodo(Project $project)
    {
        $todos = Todo::orderBy('priority')
            ->where('project_id', $project->id)
            ->get();

        return view('projects.show', [
            'project' => $project,
            'todos' => $todos,
        ]);
    }

    public function addTodo(Project $project)
    {
        return view('todo.create', [
            'project' => $project,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTodo(Request $request, Project $project)
    {
        $date = $request->date;
        $time = $request->time;

        $due_date = $date . ' ' . $time;
        $project_id = $project->id;
        $author = Karyawan::where('user_id', auth()->user()->id)->first();

        $todo = Todo::create([
            'name' => $request->name,
            'description' => $request->description,
            'due_date' => $due_date,
            'priority' => $request->priority,
            'project_id' => $project_id,
            'author' => $author->user_id
        ]);


        if ($request->items) {
            foreach($request->items as $item){
                if (empty($item)) continue;
                Item::create([
                    'title'  => $item,
                    'todo_id'   => $todo->id
                ]);
            }
        }

        return redirect()->action([ProjectController::class, 'show', $request->project_id]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit', [
            'project' => $project
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $project=Project::find($project->id);
        $project->update($request->all());
        return redirect()->action([ProjectController::class, 'indexTodo'], ['project' => $project]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project=Project::find($project->id);
        $project->delete();
        return redirect()->action([ProjectController::class, 'index']);
    }
}
