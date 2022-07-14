<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;


class taskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return VIEW('dashboard', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return VIEW('dashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $task = $request->input('task');
        $user = $request->input('user');

       $infos = array(
         'task' => $task,
         'user' => $user,
       );
       DB::table('tasks') ->insert($infos);
       
        return redirect ('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return VIEW('dashboard');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function deleteTask($id)
    {
        
        DB::table('tasks')->where('id', $id)->delete();
        
        return redirect ('/dashboard');
    }

    public function finishedTask($id)
    {
        
        DB::table('tasks')->where('id', $id)->update([
            
              'statut' => 1,
        ]);
        
        return redirect ('/dashboard');
    }





      /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Controllers\Input;
     *
     */
     

    public function edittask(){

        
    }
}
