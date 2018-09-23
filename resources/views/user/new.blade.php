@extends('app')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('store') }}">
            @csrf
            <div class="form-group">
                <label for="user-name">User Name</label>
                <input type="text" class="form-control" id="user-name" name="userName" placeholder="User Name">
                @if ($errors->has('userName'))
                    <small>{{ $errors->first('userName') }}</small>
                @endif
            </div>
            <div class="form-group">
                <label for="first-name">First Name</label>
                <input type="text" class="form-control" id="first-name" name="firstName" placeholder="First Name">
                @if ($errors->has('firstName'))
                    <small>{{ $errors->first('firstName') }}</small>
                @endif
            </div>
            <div class="form-group">
                <label for="family-name">Family Name</label>
                <input type="text" class="form-control" id="family-name" name="familyName" placeholder="Family Name">
                @if ($errors->has('familyName'))
                    <small>{{ $errors->first('familyName') }}</small>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
@endsection