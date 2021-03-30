@extends('layout.front')
@section('title', 'Masuk Sebagai Pengguna')
@section('content')
<form method="post" action="{{ url('login') }}">
@csrf
<input type="hidden" name="role" value="user">
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">LOGIN</button>
    </div>
</form>
@endsection