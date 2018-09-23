@extends('app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Delete User</div>

                    <div class="card-body">
                        <h5>ID</h5>
                        <p>{{ $user->id }}</p>

                        <h5>User Name</h5>
                        <p>{{ $user->userName }}</p>

                        <h5>First Name</h5>
                        <p>{{ $user->firstName }}</p>

                        <h5>Family Name</h5>
                        <p>{{ $user->familyName }}</p>

                        <form method="post" action="{{ route('destroy', ['id' => $user->id]) }}">
                            @csrf
                            <div class="form-group">
                                <a href="{{ url('/') }}" class="btn btn-secondary">Back</a>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection