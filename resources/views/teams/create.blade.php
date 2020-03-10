@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Team</div>                
                <form method="POST" action="{{route('teams/create')}}">
                    @csrf
                    <input type="text" class="form-control" placeholder="Team Name" name="team_name"/>                    
                    <button class="btn" type="submit">Create Team</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
