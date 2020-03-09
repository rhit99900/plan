@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register</div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="text" class="form-control" placeholder="First Name" name="first_name"/>
                        <input type="text" class="form-control" placeholder="Last Name" name="last_name"/>
                        <input type="email" class="form-control" placeholder="Email" name="email"/>
                        <input type="text" class="form-control" placeholder="Phone" name="phone"/>                        
                        
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
