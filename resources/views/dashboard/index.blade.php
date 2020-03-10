@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    <h1>Welcome, {{Auth::user()->first_name}} </h1>
                    <p>Email: {{Auth::user()->email}} </p>
                </div>

                <div class="row">
                    <div class="col">
                        <a href="{{route('teams/create')}}">Create Team</a>
                    </div>
                    <div class="col">
                        <a href="{{route('projects/create')}}">Create Project</a>
                    </div>                    
                </div>
                
                @if(isset($projects))
                <div class="row">
                @foreach ($projects as $project)
                    <h1>{{$project->name}}</h1>
                    <p>{{$project->description}}</p>
                @endforeach
                </div>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection
