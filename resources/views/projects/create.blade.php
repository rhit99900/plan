@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Project</div>                
                <form method="POST" action="{{route('projects/create')}}">
                    @csrf
                    <input type="text" class="form-control" placeholder="Project Name" name="project_name"/>
                    <textarea name="project_desc" cols="30" rows="10" class="form-control" placeholder="Project Desc."></textarea>
                    <select name="team" id="" class="form-control">
                    @foreach ($teams as $team)
                        <option value="{{$team->id}}">{{$team->name}}</option>
                    @endforeach
                    </select>
                    <input type="number" class="form-control" name="est_hours" placeholder="Estimated Hours"/>

                    <button class="btn" type="submit">Create Project</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
