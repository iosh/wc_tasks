<?php

namespace App\Http\Controllers;

use App\Authorizable;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    use Authorizable;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->hasRole('Admin')) {
            $result = Task::latest()->with('user')->paginate();            
        } else {
            $result = Task::where('user_id', $user->id)
                ->orderBy('id', 'desc')
                ->paginate();
        }
        return view('task.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:10',
            'body' => 'required|min:20'
        ]);

        $request->user()->tasks()->create($request->all());

        flash('Task has been added');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $task = Task::findOrFail($task->id);

        return view('task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $this->validate($request, [
            'title' => 'required|min:10',
            'body' => 'required|min:20'
        ]);

        $me = $request->user();

        if( $me->hasRole('Admin') ) {
            $task = Task::findOrFail($task->id);
        } else {
            $task = $me->tasks()->findOrFail($task->id);
        }

        $task->update($request->all());

        flash()->success('Task has been updated.');

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $me = Auth::user();

        if( $me->hasRole('Admin') ) {
            $task = Task::findOrFail($task->id);
        } else {
            $task = $me->tasks()->findOrFail($task->id);
        }

        $task->delete();

        flash()->success('Task has been deleted.');

        return redirect()->route('tasks.index');
    }
}
