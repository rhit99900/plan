<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Project as Project;
use App\Http\Resources\Projects as ProjectResource;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::paginate(15);
        return ProjectResource::collection($projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function createProject(Request $request){
     
        if(Project::where('name',$request->input('project_name'))->where('owner_team_id',$request->input('team'))->firstOrFail()){        
            $project = Project::where('name',$request->input('project_name'))
                        ->where('owner_team_id',$request->input('team'))->first();            
        }
        else{
            $project = new Project;
            $project->name = $request->input('project_name');
            $project->description = $request->input('project_desc');
            $project->status = '1';
            $project->est_hours = $request->input('est_hours');
            $project->actual_hours = 0;
            $project->owner_team_id = $request->input('team');            
        }

        if($project->save()){
            return view('dashboard.index')->with('projects',Project::all());
        }
        else{
            return view('dashboard.error')->with('message','Could not create Project');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //
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
        //
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
}
