<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Item;
use App\Models\Karyawan;
use App\Models\User;
use Spatie\Permission\Models\Role;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = auth()->user()->roles->pluck('id')->toArray();

        foreach($roles as $role){
            if($role == 1){
                $projects = Project::all();
            }else {
                $projects = Project::where('role_id', $role)->get();
            }
        }

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
        $rolename = date('mdYhi', time());
        $role = Role::create(['name' => $rolename]);
        $role_id = $role->id;

        $project = Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'role_id' => $role_id
        ]);

        // $user = auth()->user()->id;
        // $user->assignRole(1);

        return redirect()->action([ProjectController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function indexTodo(Project $project, Request $request)
    {
        $roles = auth()->user()->roles->pluck('id')->toArray();
        $projectMember = array_search($project->role_id, $roles);
        $admin = array_search(1, $roles);

        if($projectMember || $admin !== false){
            $todos = Todo::where('project_id', $project->id)->orderBy('priority')->get();
        }else{
            return redirect()->action([ProjectController::class, 'index']);
        }

        $karyawans = Karyawan::all();

        return view('projects.show', [
            'project' => $project,
            'todos' => $todos,
            'karyawans' => $karyawans
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

        return redirect()->action([ProjectController::class, 'indexTodo'], ['project' => $project]);
    }

    public function editTodo(Project $project, Todo $todo)
    {
        return view('todo.edit', [
            'project' => $project,
            'todo' => $todo,
        ]);
    }

    public function updateTodo(Request $request, Project $project, Todo $todo)
    {
        $date = $request->date;
        $time = $request->time;

        $due_date = $date . ' ' . $time;
        $project_id = $project->id;
        $author = Karyawan::where('user_id', auth()->user()->id)->first();

        $todo->update([
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

        return redirect()->action([ProjectController::class, 'indexTodo'], ['project' => $project]);
    }

    public function bulkDestroy(Request $request)
    {
        Item::whereIn('todo_id',$request->ids)->delete();
        Todo::whereIn('id',$request->ids)->delete();
        return response()->json(['message' => 'Todo deleted successfully']);
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

    public function assign(Project $project, Request $request)
    {
        $role_id = $request->project_id;
        $user = User::find($request->karyawan_id);

        $user->assignRole($role_id);

        return redirect()->action([ProjectController::class, 'indexTodo'], ['project' => $project]);
    }
}
