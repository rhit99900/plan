@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <input type="email" class="form-control" placeholder="Email" name="email"/>
                        <input type="password" class="form-control" placeholder="Password" name="password"/>                        
                        
                        <button class="btn btn-primary" type="submit">Login</button>
                    </form>                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
