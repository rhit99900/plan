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

                

            </div>
        </div>
    </div>
</div>

@endsection
