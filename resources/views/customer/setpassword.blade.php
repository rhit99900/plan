@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Set Password</h2>
                    <p>Hi {{$customer->first_name}}, Set your password </p>
                    <p>Email: {{$customer->email}}</p>
                </div>

                <form method="POST" action="{{ route('setpassword') }}">
                    @csrf
                    <input type="hidden" value="{{$customer->id}}" name="customer_id"/>
                    <input type="password" class="form-control" placeholder="Password" name="password"/>
                    <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password"/>                    
                    
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>                                
            </div>
        </div>
    </div>
</div>
@endsection
