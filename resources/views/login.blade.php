@extends('layouts.app')

@section('content')
<div class="panel-body">
    <div class="container">
        <form action="/login" method="post" class="col-xs-12 col-sm-5 col-md-4 col-lg-3 col-sm-offset-3 col-md-offset-4 col-lg-offset-4">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <h1 class="text-center">Login</h1>
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="admin@gmail.com" name="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="admin" name="password">
            </div>
            <input type="submit" class="btn btn-success center-block" name="form_button" value="Login">
        </form>
    </div>
</div>
@endsection