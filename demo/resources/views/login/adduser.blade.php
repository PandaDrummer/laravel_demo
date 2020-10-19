@extends('layouts.front')
@section('content')
    <div class="container">
        <form method="post" action="{{ route('login,addnewuserstore') }}">
            @csrf
            <div class="form-group">
                <label for="username"> Name:</label>
                <input type="text" class="form-control" name="username" />
            </div>

            <div class="form-group">
                <label for="password">password:</label>
                <input type="text" class="form-control" name="password"/>
            </div>

            <button type="submit" class="btn btn-primary-outline">Add contact</button>
        </form>
    </div>
@endsection('content')
