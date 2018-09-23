@extends('app')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('update', ['id' => $user->id]) }}">
            @csrf
            <div class="form-group">
                <label for="user-name">User Name</label>
                <input type="text" class="form-control" id="user-name" name="userName" value="{{ $user->userName }}">
            </div>
            <div class="form-group">
                <label for="first-name">First Name</label>
                <input type="text" class="form-control" id="first-name" name="firstName" value="{{ $user->firstName }}">
            </div>
            <div class="form-group">
                <label for="family-name">Family Name</label>
                <input type="text" class="form-control" id="family-name" name="familyName" value="{{ $user->familyName }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection